<?php

namespace Tauweb\SimpleTelegramBotApi\Types;
/**
 * Class PollAnswer
 *
 * @link https://core.telegram.org/bots/api#pollanswer
 *
 * @method string getPollId()    Unique poll identifier
 * @method User   getUser()      The user, who changed the answer to the poll
 * @method array  getOptionIds() 0-based identifiers of answer options, chosen by the user. May be empty if the user retracted their vote.
 */
class PollAnswer extends BaseType
{
    protected array $subTypes = [
        'user' => User::class,
    ];
}
