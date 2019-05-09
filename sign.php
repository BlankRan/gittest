<?php

$data = $_POST ? $_POST : $_GET;

$url = $data['url'];
$hostname = $data['hostname'] ?? '';
$url = $hostname.$url;
unset($data['url']);
if(isset($data['hostname'])) unset($data['hostname']);

ksort($data);

$str  = '';
foreach ($data as $key =>$v){
    if ($key == 'sign') continue;
    $str .= $v;
}

$data['sign'] =  md5($str.'0gD9vMYFCHKobaFM7XMhYhNw97lTpkYG');
// if (md5($str.env('APP_KEY')) !== $this->params['sign']) {
//     $this->errorCode = self::PARAMS_CHECK_ILLEGAL;
// }

//echo  json_encode($data);

$ret = curlGet($url,$data);
echo $ret;
echo "\n\n";
print_r(json_decode($ret,true));
echo "\n\n";

function curlGet($url, $params)
{print_r($params);
    $headers = array(
//        "Content-type: application/json;charset='utf-8'",
    );
//    print_r($params);exit();
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); 
    $data = curl_exec($ch);
    curl_close($ch);

    return $data;
}