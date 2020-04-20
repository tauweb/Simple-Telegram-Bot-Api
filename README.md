# Simple-Telegram-Bot-Api
Простой способ использования Telegram Bot Api.

## Установка
composer require tauweb/simple-tg-bot-api

Пример использования 

$bot = new Bot('Your Bot Token');


$bot->sendMessage([
  'chat_id' => 11111,
  'text' => 
]);

или 

$result = (new Bot(static::$token))->setWebHook(['url' => 'https://bot_webhook_url']);
var_dump($result);
