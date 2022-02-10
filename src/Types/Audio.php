<?php

namespace Tauweb\SimpleTelegramBotApi\Types;

/**
 * @method string getFileId()
 * @method string getFileUniqueId()
 * @method int getDuration()
 * @method string getPerformer()
 * @method string getTitle()
 * @method string getFileName()
 * @method string getMimeType()
 * @method int getFileSize()
 * @method PhotoSize getThumb()
 */
class Audio
{
    /**
     * @var array|string[]
     */
    protected array $subTypes = [
        'thumb' => PhotoSize::class,
    ];
}
