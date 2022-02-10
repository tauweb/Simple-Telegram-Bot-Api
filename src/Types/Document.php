<?php

namespace Tauweb\SimpleTelegramBotApi\Types;

/**
 * @method string getFileId()
 * @method string getFileUniqueId()
 * @method PhotoSize getThumb()
 * @method string getFileName()
 * @method string getMimeType()
 * @method int getFileSize()
 */
class Document extends Type
{
    /**
     * @var array|string[]
     */
    protected array $subTypes = [
        'thumb' => PhotoSize::class,
    ];
}
