<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
	function __construct()
	{
		parent::__construct();
		//此处数据写在配置文件中，也可以写在数据库中，具体随意
		$this->_alipay_config=array(
			'partner'=>C('partner'),//合作身份者id，以2088开头的16位纯数字
			'private_key_path'=>C('private_key_path'),//商户的私钥（后缀是.pen）文件相对路径
			'ali_public_key_path'=>C('ali_public_key_path'),//支付宝公钥（后缀是.pen）文件相对路径
			'sign_type'=>C('sign_type'),//签名方式 不需修改
			'input_charset'=>C('input_charset'),//字符编码格式 目前支持 gbk 或 utf-8
			'cacert'=>C('cacert'),//ca证书路径地址，用于curl中ssl校验
			'transport'=>C('transport'),//访问模式,根据自己的服务器是否支持ssl访问，若支持请选择https；若不支持请选择http
		);
		$this->_out_trade_no=I('post.out_trade_no');//订单号
		$this->_spbill_create_ip=I('post.spbill_create_ip');//客户端IP
		$this->_trade_status=I('post.trade_status');//订单状态
		$this->_zfb_result=I('post.zfb_result');//支付宝同步交易信息
	}

    public function index(){
        $this->display();
    }

    //支付宝回调
    public function check_alipay(){
    	$verify_result=$this->verify();
        if($verify_result) {
            if(empty($this->_out_trade_no)){
                echo "fail";
                return ;
            }
            if( !isset($_POST['seller_id']) || $_POST['seller_id'] !=C('partner')){
                echo "fail";
                return ;
            }
            //此处根据实际情况进行修改
            // $order_detail=$this->_find('SecondHandBond',array('order_sn'=>$this->_out_trade_no));
            // if (!$order_detail) {
            //     echo 'fail';
            //     return;
            // }
            if(!$_POST['total_fee']){
                echo 'fail';                                          
                return ;
            }
            $this->_total_fee = $_POST['total_fee'];
            if(!$this->_total_fee ){
                echo 'fail';
                return ;
            }
            if (floatval($order_detail['pay_fee'])==floatval($this->_total_fee)) {
                if($this->_trade_status == 'TRADE_FINISHED' || $this->_trade_status == 'TRADE_SUCCESS') {
                    $this->change_second_hand_bond_status();
                    echo "success";		//请不要修改或删除
                }
            }
        }else {
            echo "fail";
        }
    }

    //验证
	private function verify()
	{	    
		require_once('./ThinkPHP/Library/Org/AliPay/lib/alipay_notify.class.php');
		// 计算得出通知验证结果
		$alipayNotify = new \AlipayNotify($this->_alipay_config);//该配置信息在该文件第8行
		//验证信息
        /*echo '<pre>';
        var_dump($alipayNotify);
        exit;*/
		$verify_result = $alipayNotify->verifyNotify();
		
		return $verify_result;
	}
}