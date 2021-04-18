<?php
/*
 * @copyright 2019-2021 Dicr http://dicr.org
 * @author Igor A Tarasov <develop@dicr.org>
 * @license proprietary
 * @version 18.04.21 12:13:50
 */

declare(strict_types = 1);
namespace dicr\yookassa;

use yii\base\Component;
use YooKassa\Client;

/**
 * Компонент YooKassa.
 *
 * @property-read Client $client клиент YooKassa
 *
 * @link https://github.com/yoomoney/yookassa-sdk-php
 * @link https://yookassa.ru/developers/api
 */
class YooKassa extends Component
{
    /** @var ?string авторизация через OAuth-токен */
    public $token;

    /** @var ?string ID магазина (из личного кабинета) */
    public $shopId;

    /** @var ?string секретный ключ (из личного кабинета) */
    public $secretKey;

    /** @var ?array конфиг клиента */
    public $config;

    /** @var Client */
    private $_client;

    /**
     * Клиент YoKassa.
     *
     * @return Client
     */
    public function getClient(): Client
    {
        if ($this->_client === null) {
            $this->_client = new Client();

            if ($this->token !== null) {
                $this->_client->setAuthToken($this->token);
            }

            if ($this->shopId !== null && $this->secretKey !== null) {
                $this->_client->setAuth($this->shopId, $this->secretKey);
            }

            if ($this->config !== null) {
                $this->_client->setConfig($this->config);
            }
        }

        return $this->_client;
    }
}
