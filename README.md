# 国医奇谈小程序PHP后端

## 部署

在网站根目录下（例如：/var/www/html）

`git clone https://github.com/taropowder/chinese_medicine.git`

则在此目录下生成一个`chinese_medicine`的目录
如需更改此目录名  
`mv chinese_medicine {what_you_want}`

然后更改项目文件夹下的
`sqlhelper.php`中的
```php
$mp3_dir = "https://xxxxx/chinese_medicine/mp3/";
$img_dir = "https://xxxxx/chinese_medicine/img/";
    class sqlhelper{
        private $mysqli;
        private static $host="localhost";
        private static $user="root";
        private static $pwd="root";
        private static $db="wechat";
```

`mp3_dir` 为音频文件夹所在url
`img_dir` 为图片文件夹所在url

## NOTE：
不要忘记赋予你的文件夹权限  
`chmod -R 777 mp3/`  
`chmod -R 777 img/`

请连接你的小程序吧
 
API 详细说明请见 api目录下README
