# Simple-Telegram-Bot-Api

An easy way to use Telegram Bot Api. Works with all Telegram methods.

## Install
```php
composer require tauweb/simple-telegram-bot-api
```
Usage example 
```php
$bot = new Bot('Your Bot Token');

$bot->sendMessage([
  'chat_id' => 11111,
  'text' => 'Hello, World',
]);

$bot->sendPhoto([
    'chat_id' => 11111,
    'photo' => 'http://url_to_image.jpg,
]);
```
or 
```php
$result = (new Bot('Your Bot Token'))->setWebHook(['url' => 'https://bot_webhook_url']);
var_dump($result);
```
or

```php
(new Bot('Your Bot Token'))->getChatMember(['chat_id' => 111, 'user_id' => 222]);
```

TODO: Продолжить от https://core.telegram.org/bots/api#keyboardbutton
