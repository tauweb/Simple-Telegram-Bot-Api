# Simple-Telegram-Bot-Api
Простой способ использования Telegram Bot Api.

## Установка
```php
composer require tauweb/simple-tg-bot-api
```
Пример использования 
```php
$bot = new Bot('Your Bot Token');

$bot->sendMessage([
  'chat_id' => 11111,
  'text' => 
]);
```
или 
```php
$result = (new Bot('Your Bot Token'))->setWebHook(['url' => 'https://bot_webhook_url']);
var_dump($result);
```
