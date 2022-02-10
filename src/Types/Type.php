<?php

namespace Tauweb\SimpleTelegramBotApi\Types;

use Illuminate\Support\Facades\Log;

abstract class Type
{
    private array $rawUpdateData;

    protected array $subTypes;

    public function __construct(array $data = [])
    {
        $this->rawUpdateData = $data
            ? $data
            : json_decode(file_get_contents('php://input'), true) ?? [];

        $this->assignObjectVariables();
    }

    public function getRawData(): ?array
    {
        return $this?->rawUpdateData;
    }

    protected function assignObjectVariables(): void
    {
        foreach ($this->rawUpdateData as $key => $value) {
            $this->$key = $value;
        }
    }

    public function __call(string $method, array $arguments)
    {
        // Конвкертация метода в snake_case (это имя свойства tg)
        $propertyName = mb_strtolower(
            ltrim(
                preg_replace('/[A-Z]/', '_$0', substr($method, 3)),
                '_'
            )
        );

        return $this->makeType($propertyName);
    }

    protected function makeType(string $propertyName)
    {
        // Если это просто свойство, а не вложенный тип, возвращаем его значение
        if (!isset($this->subTypes)) {
            return $this->$propertyName ?? null;
        }

        // Если свойсто вложенный тип данных
        if (array_key_exists($propertyName, $this->subTypes)) {
            $class = $this->subTypes[$propertyName];

            // Если свойством является массивом вложенных типов
            if (is_array($this->subTypes[$propertyName])) {
                foreach ($this->$propertyName as $i => $propertyData) {
                    $arrayClassName = $this->subTypes[$propertyName][0] ?? $this->subTypes;
                    $this->$propertyName[$i] = class_exists($arrayClassName)
                        ? new $arrayClassName($this->$propertyName[$i]) : null;
                }
                return $this->$propertyName;
            }

            if (!isset($this->$propertyName)) {
                return null;
            }

            return class_exists($class) ? new $class($this->$propertyName) : null;
        }

        return $this->$propertyName ?? null;
    }
}
