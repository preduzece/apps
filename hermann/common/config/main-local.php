<?php

if ($_SERVER['HTTP_HOST'] == 'localhost')
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=izlozba',
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
    ],
];
else
    return [
        'components' => [
            'db' => [
                'class' => 'yii\db\Connection',
                'dsn' => 'mysql:host=localhost;dbname=imagecon_hermann',
                'username' => 'imagecon_paysalp',
                'password' => 'O%zVK@[Gu9TX,W&.dB',
                'charset' => 'utf8',
            ],
            'mailer' => [
                'class' => 'yii\swiftmailer\Mailer',
                'viewPath' => '@common/mail',
                // send all mails to a file by default. You have to set
                // 'useFileTransport' to false and configure a transport
                // for the mailer to send real emails.
                'useFileTransport' => true,
            ],
        ],
    ];
?>
