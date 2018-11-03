# 国医奇谈API文档

## song.php

#### 直接请求

随机返回一个广播  
json的格式为
```json
{
  "id": "9",
  "name": "\u7559\u5728\u6211\u8eab\u8fb9",
  "mp3": "https://xxxxx/chinese_medicine/mp3/withyou.mp3",
  "img": "https://xxxxx/chinese_medicine/img/images.jpeg",
  "description": "\u8ba9\u4f60\u7559\u5728\u6211\u8eab\u8fb9",
  "creat_time": "2018-11-03 08:04:49",
  "listening_times": "3"
}
```
`id`为广播的id号  
`name` 为广播的标题  
`mp3` 为广播的音频文件url  
`img` 为广播的图片url  
`description` 为广播的简短描述
`creat_time` 为广播的上架时间
`listening_times` 为广播的被点击次数


#### GET参数ID ?id={int}

返回ID号为 {int} 的广播json  
格式与上相同


## song_list.php

### 直接请求

返回所有的广播的json
如下
```json
[
  {
    "id": "9",
    "name": "\u7559\u5728\u6211\u8eab\u8fb9",
    "mp3": "https://xxxxx/chinese_medicine/mp3/withyou.mp3",
    "img": "https://xxxxx/chinese_medicine/img/images.jpeg",
    "description": "\u8ba9\u4f60\u7559\u5728\u6211\u8eab\u8fb9",
    "creat_time": "2018-11-03 08:04:49",
    "listening_times": "3"
  },
  {
    "id": "10",
    "name": "\u4e0a\u4f20\u6d4b\u8bd52",
    "mp3": "https://xxxxx/chinese_medicine/mp3/test.txt",
    "img": "https://xxxxx/chinese_medicine/img/_DSC0052.jpg",
    "description": "\u4e0a\u4f20\u6d4b\u8bd52",
    "creat_time": "2018-11-03 08:12:46",
    "listening_times": "0"
  }
]
```

详情见上


## get_comment.php

### GET 参数 songid = {int}
返回广播ID号为 {int} 的所有评论
```json
[
  {
    "content": "ascots",
    "username": "123"
  }
]
```
`content`:评论内容  
`username` : 评论人

注：目前决定在用户登录时将用户的username存到数据库里  
这样就不用再用openid去找username   
每次登陆的时候更新一次username


## login.php

### GET 参数 code = {code}

会自动记录下用户的openid
返回如下
```json
{
  "session_key": "xxxxxxxxxxxxx",
  "openid": "xxxxxxxxxxxxx"
}
```

## get_username.php
### GET ?username={username}

用于更新当前用户的用户名
需要在登陆之后请求一次

```json
{
  "status": "success"
}
```

## NOTE：
在单独播放一个广播时候希望请求一次`song.php`  
这样会增加一次播放记录


