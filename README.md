##How to install

step1: run command `git clone https://github.com/zhennong/testyii2mall.git`;

step2: customize local database config file `/common/config/local-main.php` as

```php
'db' => [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=192.168.0.98;dbname=testyii2mall',
    'username' => 'root',
    'password' => 'nongyao001',
    'charset' => 'utf8',
],
```

step3: customize local web and domain name for frontend and backend

step4: download composer relation use command `php composer.phar install` or copy from server

step5: edit params for example:

edit `/common/config/params-local`

```php
return [
    'frontUrl' => 'http://wodrow.front.yii2mall.cn/',
    'backUrl' => 'http://wodrow.back.yii2mall.cn/',
];
```