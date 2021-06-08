TspSDK
------
Tsp系统的HTTP中间件层连接SDK。

`V 1.0.0`

## 使用方法

```php
use liu\tsp\Auth;
use liu\tsp\TspClient;

try{
     $config = [
        'gateway'=>'',
        'secret'=>'',
        'appkey'=>''
     ];
     $auth = new Auth($config);
     $token = $client->getToken();
     //获取到token后将token存储，调用其他接口时作为必传参数传入；
     $client = new TspClient($config);
     $token = $client->getToken();
     $conf = [
        'gateway'=>'',
        'appkey'=>'',
        'token'=>''
     ];
     $client = new TspClient($conf);
     $res = $client->setHost($imei_sn,$host,$port);
     if($res['status'] == 0){
        return true;
     }
}catch(\Excetion $e){
     ......
}
```

## 设置亲情号码

`setFamilies`

```php
$families = [
    [
        'relation'=>'爷爷',
        'mobile'=>'13533333333'
    ],
    [
        'relation'=>'爸爸',
        'mobile'=>'13533333332'
    ]
];

$client->setFamilies($imei_sn,$families);

```
**注意：每次设置，必须把此设备所有的亲情号码传输过来**
