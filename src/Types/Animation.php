<?php

namespace Tauweb\SimpleTelegramBotApi\Types;

/**
 * @method string getFileId()
 * @method string getFileUniqueId()
 * @method int getWidth()
 * @method int getHeight()
 * @method int getDuration()
 * @method PhotoSize getThumb()
 * @method string getFileName()
 * @method string getMimeType()
 * @method int getFileSize()
 */
class Animation extends Type
{
    /**
     * @var array|string[]
     */
    protected array $subTypes = [
        'thumb' => PhotoSize::class,
    ];
}
