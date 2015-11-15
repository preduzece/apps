<?php

defined('USER') or define('USER', 1);
defined('WRITER') or define('WRITER', 2);
defined('ADMIN') or define('ADMIN', 3);

// comment out the following two lines when deployed to production
if ($_SERVER['HTTP_HOST'] == 'localhost') {
	defined('YII_DEBUG') or define('YII_DEBUG', true);
	defined('YII_ENV') or define('YII_ENV', 'dev');
}

require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

$config = require(__DIR__ . '/../config/web.php');

(new yii\web\Application($config))->run();

?>
