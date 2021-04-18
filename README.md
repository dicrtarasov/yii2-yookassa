# YooKassa API для Yii2

YooKassa является преемником Яндекс.Касса.

Компонент предназначения для настройки и использования официального SDK
YooKassa: https://github.com/yoomoney/yookassa-sdk-php

API: https://yookassa.ru/developers/using-api/

## Настройка

```php
$config = [
    'components' => [
        'yookassa' => [
            'class' => dicr\yookassa\YooKassa::class,
            'shopId' => 'ID магазина',
            'secretKey' => 'секретный ключ'
        ]
    ]
];
```

## Использование

```php
/** @var dicr\yookassa\YooKassa $yookassa */
$yooKassa = Yii::$app->get('yookassa');

/** @var YooKassa\Client $client */
$client = $yooKassa->client;
```
