<?php
namespace Tauweb\SimpleTelegramBotApi;

class TelegramBotApi
{
    const BASE_BOT_API_URL = 'https://api.telegram.org/bot';

    protected $proxy = null;

    protected $accessToken = null;

    public function __construct(string $token)
    {
        $this->accessToken = $token;
    }

    /**
     * Get bot token
     * @return string Bot token
     */
    public function getToken(): string
    {
        return $this->accessToken;
    }

    /**
     * Set the SOCKS5 proxy
     * @param string $proxy
     */
    public function setProxy(string $proxy): void
    {
        $this->proxy = $proxy;
    }

    /**
     * Call Telegram Bot Api Methods (can be found on https://core.telegram.org/bots/api#available-methods)
     *
     * @param string $method Telegram Bot Api method name (can be found on https://core.telegram.org/bots/api#available-methods)
     * @param array $params Telegram Bot Api method params (can be found on https://core.telegram.org/bots/api#available-methods)
     * @return string Telegram Bot Api response JSON-objects
     * @throws \Exception
     */
    public function __call(string $method, array $params = []): string
    {
        return $this->sendRequest($method, $params[0] ?? []);
    }

    protected function sendRequest(string $method, array $params): string
    {
        foreach ($params as $param => $value) {
            if (is_array($value)) {
                $params[$param] = json_encode($params[$param]);
            }
        }

        $attachments = ['certificate', 'photo', 'sticker', 'audio', 'document', 'video'];

        foreach ($attachments as $attachment) {
            if (isset($params[$attachment])) {
                $params[$attachment] = $this->curlFile($params[$attachment]);
                break;
            }
        }

        $curlParams = [
            CURLOPT_SAFE_UPLOAD => true,
            CURLOPT_URL => self::BASE_BOT_API_URL . $this->accessToken .'/'.$method,
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTFIELDS => $params
        ];

        if ($this->proxy !== null) {
            $curlParams[CURLOPT_PROXY] = $this->proxy;
            $curlParams[CURLOPT_PROXYTYPE] = CURLPROXY_SOCKS5;
        }

        $handle = curl_init();
        curl_setopt_array($handle, $curlParams);
        $response = curl_exec($handle);
        $err = curl_error($handle);

        if ($response === false) {
            $errno = curl_errno($handle);
            $error = curl_error($handle);

            error_log(
                date("Y-m-d H:i:s") . ": No response from telegram server: $errno: $error\n",
                3,
                './simple_telegram_bot_api.log'
            );
            curl_close($handle);

            throw new \Exception("No response from telegram server: $errno: $error\n");
        }

        $http_code = intval(curl_getinfo($handle, CURLINFO_HTTP_CODE));

        curl_close($handle);

        // Detect response errors
        $responseObj = json_decode($response);
        if (isset($responseObj->ok) && $responseObj->ok === false) {
            error_log(
                date("Y-m-d H:i:s") . ": Telegram response error: $responseObj->error_code: $responseObj->description\n",
                3,
                './simple_telegram_bot_response_errors.log'
            );
        }

        return $response;
    }

    protected function curlFile(string $path)
    {
//        if (is_array($path))
//            return $path['file_id'];

        $realPath = realpath($path);

        if (class_exists('CURLFile')) {
            $curlFile = new \CURLFile($realPath);
        }

        // если не файл (например передан file_id или нет такого файла)
        if ($curlFile->name !== '') {
            return $curlFile;
        }

        return $path;
    }
}
