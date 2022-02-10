<?php

namespace Tauweb\SimpleTelegramBotApi\Types;

/**
 * Class ProximityAlertTriggered
 *
 * @link https://core.telegram.org/bots/api#proximityalerttriggered
 *
 * @method User getTraveler() User that triggered the alert
 * @method User getWatcher()  User that set the alert
 * @method int  getDistance() The distance between the users
 */
class ProximityAlertTriggered extends Type
{
    protected array $subTypes = [
        'traveler' => User::class,
        'watcher' => User::class,
    ];
}
