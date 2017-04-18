<?php
$config = array (
		//签名方式,默认为RSA2(RSA2048)
		'sign_type' => "RSA",

		//支付宝公钥
		'alipay_public_key' => "MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDDI6d306Q8fIfCOaTXyiUeJHkrIvYISRcc73s3vF1ZT7XN8RNPwJxo8pWaJMmvyTn9N4HQ632qJBVHf8sxHi/fEsraprwCtzvzQETrNRwVxLO5jVmRGi60j8Ue1efIlzPXV9je9mkjzOmdssymZkh2QhUrCmZYI/FCEa3/cNMW0QIDAQAB",

		//商户私钥
		'merchant_private_key' => "MIICXgIBAAKBgQDD5yeySHTOUUJO9dVA6VWe3SRMjgtIXrc42h5+Pi97H7leV+vnYb2h37gsrL6gxJRAYJOCJQn8Pn9bbduAOjiMaUd71JJOSEA8mby8q7dDqRQatdm/akJ8fDBPbTDszKKwS7oCTy95B8tg6DYrozSuBFDbIzGgnTG6RYJYNxXj6wIDAQABAoGBAIyssAfJGf+RwHDc/R7Yr4AdwtQqaBW21hFAKAd1djkO5djGgAMuX7Me6K1D+ruNjfvQnfwlxs7YvjGUaLvikvmV1zkIVOGTLNMloCaZ0X1KXAY1lGlQ5x6Azy3W4vnKBcMS6WcLmR9lc1I8hguFGaupI6GObq8AqPeS4e5DNm+JAkEA98BDGVrnkSA/9KzeV1UBdatfv4vY8hzYSVNxbqPZVhYIEt0jWCx6BcOnxHrmmEm4hLDrHgjqq+QLsWrEkCTlxwJBAMps9Y2HR2zzqX2GNuOOuPZUdAp0h0s09+lO5wu0lMxt34CrmRMzFsbJk2ZCE8pWCUoUaOFQsij8IMJ2lMhlwL0CQQCt3Vc5a/omdqNragV+9EDZ+zJukg3lmyiODOkF5CaZq0xvMJGlR1E6ylvqHvXE2beMJzxZD5jgmGE8WNko7zvxAkAM3uayDALvm4KQV6NPzrhV+UKzk3syvfhxXjH0nZPEd8v5O2/tN5dgJlr36oWlnNjUW/3bLa1WS8mtc6q8HzQlAkEAxyRNKG9nWwmDDQOo25QjtXSEMsJTH6uwrFpidvtMzFwbycSDBCswYrgQo1d4gBuOE1QcKnPKc7x/ogQGy2FeZg==",

		//编码格式
		'charset' => "UTF-8",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipay.com/gateway.do",

		//应用ID
		'app_id' => "2016042901349061",

		//异步通知地址,只有扫码支付预下单可用
		'notify_url' => "你的网址/index.php/Home/Index/check_alipay",//此处需根据实际情况进行修改，请注意支付宝回调得搁到外网

		//最大查询重试次数
		'MaxQueryRetry' => "10",

		//查询间隔
		'QueryDuration' => "3"
);