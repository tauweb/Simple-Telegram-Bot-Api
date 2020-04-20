<?php
namespace Tauweb\SimpleTelegramBotApi;

use foo\bar;

class TelegramBotApi {
    const BASE_BOT_API_URL = 'https://api.telegram.org/bot';

    protected $accessToken = null;

    public function __construct(string $token)
    {
        $this->setBotToken($token);
    }

    protected function setBotToken(string $token)
    {
        $this->accessToken = $token;
    }

    public function __call(string $method, array $arguments = [])
    {
        return $this->sendRequest($method, $arguments[0] ?? []);
    }

    protected function sendRequest(string $method, array $params)
    {
        foreach ($params as $param => $value) {
            if (is_array($value)) {
                $params[$param] = json_encode($params[$param]);
            }
        }

        $curlParams = [
            CURLOPT_SAFE_UPLOAD => true,
            CURLOPT_URL => self::BASE_BOT_API_URL . $this->accessToken .'/'.$method,
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTFIELDS => $params
        ];

        $handle = curl_init();
        curl_setopt_array($handle, $curlParams);
        $response = curl_exec($handle);
        $err = curl_error($handle);

        if ($response === false) {
            $errno = curl_errno($handle);
            $error = curl_error($handle);
            error_log(date("Y-m-d H:i:s") . ": No response from telegram server: $errno: $error\n", 3, './simple_telegram_bot_api.log');
            curl_close($handle);
            throw new \Exception("No response from telegram server: $errno: $error\n");
        }

        $http_code = intval(curl_getinfo($handle, CURLINFO_HTTP_CODE));
        curl_close($handle);
        return $response;
    }
}
