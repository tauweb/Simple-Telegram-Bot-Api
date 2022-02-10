<?php

namespace Tauweb\SimpleTelegramBotApi\Types;

use phpDocumentor\Reflection\Types\Integer;

/**
 * @method int getId()
 * @method string getType()
 * @method string getTitle()
 * @method string getUsername()
 * @method string getFirstName()
 * @method string getLastName()
 * @method ChatPhoto getPhoto()
 * @method string getBio()
 * @method bool getHasPrivateForwards()
 * @method string getDescription()
 * @method string getInviteLink()
 * @method ChatPermissions getPermissions()
 * @method int getSlowModeDelay()
 * @method int getMessageAutoDeleteTime()
 * @method bool getHasProtectedContent()
 * @method string getStickerSetName()
 * @method bool getCanSetStickerSet()
 * @method int getLinkedChatId()
 * @method ChatLocation getLocation()
 *
 */
class Chat extends BaseType
{
    protected array $subTypes = [
        'photo' => ChatPhoto::class,
        'pinned_message' => Message::class,
        'permissions' => ChatPermissions::class,
        'location' => ChatLocation::class,
    ];
}
