<?php

namespace liu\tsp;

class Auth {
    private $config = null;
    private $transId = '';

    public function __construct($params = [])
    {
        $this->config = $params;
        if (!isset($this->config['gateway']) || empty($this->config['gateway']) || !isset($this->config['appkey']) || empty($this->config['appkey']) || !isset($this->config['secret']) || empty($this->config['secret'])) {
            throw new \Exception('Configure File Miss Gateway Or Appkey Or Secret Param!');
        }
        $this->transId = $this->config['appkey'].date("YmdHis",time()).mt_rand(100000,999999).mt_rand(100000,999999);
    }

    public function getToken()
    {
        $request = new Request();
        $sign = sha1($this->config['secret'].$this->config['appkey'].$this->transId.$this->config['secret']);
        $url = $this->config['gateway'].$request::TSPAuthPath;
        $param = [
            "appkey" => $this->config['appkey'],
            "sign" => $sign,
            "transid" => $this->transId
        ];
        $res = $request->get('','',$url,$param);
        var_dump($res);
        if ($res['status'] == 0) {
            return $res['data'];
        } else {
            return $res["message"];
        }
    }
}
