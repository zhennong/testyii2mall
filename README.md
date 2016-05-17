##How to install

step1: run command `git clone https://github.com/zhennong/testyii2mall.git`;

step2: customize local database config file `/common/config/main.php` as

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

step6: install yii2-admin reference [mdmsoft/yii2-admin](https://github.com/mdmsoft/yii2-admin)

##数据库命名总规则

	所有名称的字符范围为：a-z（小写字母）, 0-9 和_(下划线)。不允许使用其他字符作为名称。
	采用英文单词或英文短语（包括缩写）作为名称，不能使用无意义的字符或汉语拼音。
	名称应该清晰明了，能够准确表达事物的含义，最好可读，遵循“见名知意”的原则。

##数据表命名规范

	不使用tab或tbl作为表前缀（无需重复说明）
	表名以代表表内的内容的一个和多个名词组成，以下划线分隔，使用单数形式命名（CakePHP 是用复数形式命名表名的）。
	使用表的内容分类作为表名的前缀：如，与用户信息相关的表使用前缀 user，与内容相关的信息使用前缀 content。
	表的前缀以后，是表的具体内容的描述。如：用户登录信息的表名为：user_login，用户在论坛中的信息的表名为：user_bbs_info
	一些作为多对多连接的表，可以使用两个表的前缀作为表名：
	如：用户登录表 user_login，用户分组表 group_info，这两个表建立多对多关系的表名为：user_group_relation
	当系统中有一些少量的，重复出现的值时，使用字典表来节约存储空间和优化查询。如地区、系统中用户类型的代号等。这类值不会在程序的运行期变化，但是需要存储在数据库中。

##数据表字段命名规范

	字段不使用任何前缀（表名代表了一个名称空间，字段前面再加前缀显得罗嗦）
	外键字段为当前表名加 _id，，比如：user_id，product_id
	字典名也避免采用过于普遍过于简单的名称：例如，用户表中，用户名的字段为 username 比 name 更好。
	布尔型的字段，以一些助动词开头，更加直接生动：如，用户是否有留言 has_message，用户是否通过检查 is_checked 等。
	字段名为英文短语、形容词+名词或助动词+动词时态的形式表示，遵循“见名知意”的原则。

##php规范遵循[PSR](https://github.com/hfcorriez/fig-standards)规范，可维护性参考[要把代码编写得有自己的灵魂](http://www.yiichina.com/topic/6388)