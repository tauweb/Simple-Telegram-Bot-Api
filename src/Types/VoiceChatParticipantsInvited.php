<?php

namespace Tauweb\SimpleTelegramBotApi\Types;

/**
 * Class VoiceChatParticipantsInvited
 *
 * This object represents a service message about new members invited to a voice chat.
 *
 * @link https://core.telegram.org/bots/api#voicechatparticipantsinvited
 *
 * @method User[] getUsers() Optional. New members that were invited to the voice chat
 */
class VoiceChatParticipantsInvited extends BaseType
{
    protected array $subTypes = [
        'users' => [User::class],
    ];
}
