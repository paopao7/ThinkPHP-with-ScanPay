<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
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
		$alipayNotify = new \AlipayNotify($this->_alipay_config);//此处根据实际情况进行修改
		//验证信息
        /*echo '<pre>';
        var_dump($alipayNotify);
        exit;*/
		$verify_result = $alipayNotify->verifyNotify();
		
		return $verify_result;
	}
}