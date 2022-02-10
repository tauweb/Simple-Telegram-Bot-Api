<?php

namespace Tauweb\SimpleTelegramBotApi\Types;

/**
 * @method string getType()
 * @method int getOffset()
 * @method int getLength()
 * @method string getUrl()
 * @method User getUser()
 * @method string getLanguage()
 */
class MessageEntity extends BaseType
{
    protected array $subTypes = [
        'user' => User::class,
    ];
}
