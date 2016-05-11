##How to install

step1: run command `git clone https://github.com/zhennong/testyii2mall.git`;

step2: customize local web and domain name for frontend and backend

step3: download composer relation use command `php composer.phar install` or copy from server

step4: customize local database config file `/common/config/main.php` as

```php
'db' => [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=192.168.0.98;dbname=testyii2mall',
    'username' => 'root',
    'password' => 'nongyao001',
    'charset' => 'utf8',
],
```

if you want to use your self database, run `php yii migrate`

step5: edit params for example:

edit `/common/config/params-local`

```php
return [
    'frontUrl' => 'http://wodrow.front.yii2mall.cn/',
    'backUrl' => 'http://wodrow.back.yii2mall.cn/',
];
```