<?php
return array(
	 //此处根据实际情况进行修改
	//'配置项'=>'配置值'
	"service"             => 'create_direct_pay_by_user',
    'seller_id'           => '',
    'partner'             => '',//合作身份者id，以2088开头的16位纯数字
    'payment_type'        => '1',// 支付类型 ，无需修改
    'private_key_path'    => './Libs/Alipay/key/rsa_private_key.pem',//商户的私钥（后缀是.pen）文件相对路径 此处根据实际情况进行修改
    'ali_public_key_path' => './Libs/Alipay/key/rsa_public_key.pem',//支付宝公钥（后缀是.pen）文件相对路径 此处根据实际情况进行修改
    'sign_type'           => strtoupper('RSA'),//签名方式 不需修改
    '_input_charset'      => strtolower('utf-8'),//字符编码格式 目前支持 gbk 或 utf-8
    'cacert'              => './Libs/Alipay/key/cacert.pem',//ca证书路径地址，用于curl中ssl校验  此处根据实际情况进行修改
    'transport'           => 'http',//访问模式,根据自己的服务器是否支持ssl访问，若支持请选择https；若不支持请选择http
    'anti_phishing_key'   => '',//防钓鱼时间戳  若要使用请调用类文件submit中的query_timestamp函数
    'exter_invoke_ip'     => '',//客户端的IP地址 非局域网的外网IP地址，如：221.0.0.1
);