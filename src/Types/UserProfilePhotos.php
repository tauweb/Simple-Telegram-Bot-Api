<?php

namespace Tauweb\SimpleTelegramBotApi\Types;

/**
 * Class UserProfilePhotos
 *
 * @link https://core.telegram.org/bots/api#userprofilephotos
 *
 * @method int getTotalCount() Total number of profile pictures the target user has
 *
 * @method PhotoSize[][] getPhotos()
 */
class UserProfilePhotos extends Type
{
    protected array $subTypes = [
        'photos' => PhotoSize::class,
    ];

    // TODO:
//    public function getPhotos(): array
}
