<?php

/*
 * 功能： 畅捷支付  收银台
 * 官方说明： http://dev.chanpay.com/doku.php/sdwg:%E6%94%B6%E5%8D%95%E7%BD%91%E5%85%B3%E6%8E%A5%E5%8F%A3%E6%96%87%E6%A1%A3#%E6%95%B0%E6%8D%AE%E
 4%BA%A4%E4%BA%92%E6%B5%81%E7%A8%8B%E8%AF%B4%E6%98%8E
 **************************************************************
 * author:chiefyang
 * date:2016/5/19
 * 参数：
 * return:
 */
class  Pay_model  extends  CI_Model
{
 public   function index($where)
    {
        $postData = array();
        $postData['service'] = 'cjt_create_instant_trade';
        $postData['version'] = '1.0';
        $postData['partner_id'] = 200000660275;  //合作者id
        $postData['_input_charset'] = 'UTF-8';
        $postData['sign_type'] = 'RSA'; //签名类型
        $postData['return_url'] =   $where["return_url"];  //前端回调地址
        $postData['out_trade_no'] = $where["out_trade_no"]; //商户唯一订单id
        $postData['trade_amount'] = $where["trade_amount"];
        $postData['product_name'] = $where["product_name"];
        $postData['notify_url'] =   $where["notify_url"];//通知回调地址
        $postData['buyer_id'] = 1; //用户id
        $postData['buyer_id_type'] = 'MEMBER_ID';
        $postData['pay_method'] = '2';
        $postData['is_anonymous'] = 'Y';
        $postData['expired_time']='25m';
        $postData['sign'] =$this-> rsaSign($postData);
        $query = http_build_query($postData);
        $url = 'https://pay.chanpay.com/mag/gateway/receiveOrder.do?' . $query;  //该url为正式环境
        header('Location: ' . $url);

    }


    /**
     * 功能： 签名
     * 官方说明： http://dev.chanpay.com/doku.php/sdwg:%E6%94%B6%E5%8D%95%E7%BD%91%E5%85%B3%E6%8E%A5%E5%8F%A3%E6%96%87%E6%A1%A3#%E6%95%B0%E6%8D%AE%E4%BA%A4%E4%BA%92%E6%B5%81%E7%A8%8B%E8%AF%B4%E6%98%8E
     **************************************************************
     * author:chiefyang
     * date:2016/5/19
     * 参数：
     * $args 签名字符串数组
     * return:
     *
     * return 签名结果
     *
     */
    public   function rsaSign($args)
    {
        $args = array_filter($args);//过滤掉空值

        ksort($args);

        $query = '';
        foreach ($args as $k => $v) {
            if ($k == 'sign_type') {
                continue;
            }
            if ($query) {
                $query .= '&' . $k . '=' . $v;
            } else {
                $query = $k . '=' . $v;
            }
        }
        //这地方不能用 http_build_query  否则会urlencode
        //$query=http_build_query($args);
        $path = "fonts/rsa_private_key.pem";  //私钥地址
        $private_key = file_get_contents($path);
        $pkeyid = openssl_get_privatekey($private_key);
        openssl_sign($query, $sign, $pkeyid);
//        echo  4;
//        exit();
        openssl_free_key($pkeyid);




        $sign = base64_encode($sign);
        return $sign;


    }



    /*
     * 功能： 畅捷支付  回调
     * 官方说明： http://dev.chanpay.com/doku.php/sdwg:%E6%94%B6%E5%8D%95%E7%BD%91%E5%85%B3%E6%8E%A5%E5%8F%A3%E6%96%87%E6%A1%A3#%E6%95%B0%E6%8D%AE%E
     4%BA%A4%E4%BA%92%E6%B5%81%E7%A8%8B%E8%AF%B4%E6%98%8E
     **************************************************************
     * author:chiefyang
     * date:2016/5/19
     * 参数：
     * params {"notify_time":"20160519202857","sign_type":"RSA","notify_type":"trade_status_sync","trade_status":"TRADE_SUCCESS","gmt_payment":"201605
     19202857","version":"1.0","sign":"oEQbJA9kGz3j ZdSWqobS6bKCB\/OB28LEqqbj6NbAGrN7mVcrXonscLskJ5rFafxQz5dOD5LHx BNvFOHcCoVs6y1xVaodsz FalRAABSm4WIcLXR
     1Lnsq9cBYn0u0MuoQnVzud6j9kH 1gOQMeTouGS\/l4j5GxYNS5l4Z2l6lQ=","extension":"{}","gmt_create":"20160519202857","_input_charset":"UTF-8","outer_trade_n
     o":"150","trade_amount":"9.99","inner_trade_no":"101146366086633549464","notify_id":"14fb4632c5264dd1b50a537c61c8bbc4"}
     * return:
     */
 public   function notify($params)
    {
        $result = array();
        $sign = $params['sign'];
        unset($params['sign']);
        unset($params['sign_type']);
        $flag =$this->rsaVerify($params, $sign);
//        if ($flag) {
//            //签名验证通过  处理商户业务
//        } else {
//            //签名验证失败
//        }
       return  $flag;

    }



    /**
     * 功能： 验证签名
     * 官方说明： http://dev.chanpay.com/doku.php/sdwg:%E6%94%B6%E5%8D%95%E7%BD%91%E5%85%B3%E6%8E%A5%E5%8F%A3%E6%96%87%E6%A1%A3#%E6%95%B0%E6%8D%AE%E4%BA%A4%E4%BA%92%E6%B5%81%E7%A8%8B%E8%AF%B4%E6%98%8E
     **************************************************************
     * author:chiefyang
     * date:2016/5/19
     * 参数：
     * @param $args 需要签名的数组
     * @param $sign 签名结果
     * return 验证是否成功
     */
 public   function rsaVerify($args, $sign)
    {
        $args = array_filter($args);//过滤掉空值
        ksort($args);
        $query = '';
        foreach ($args as $k => $v) {
            if ($k == 'sign_type' || $k == 'sign') {
                continue;
            }
            if ($query) {
                $query .= '&' . $k . '=' . $v;
            } else {
                $query = $k . '=' . $v;
            }
        }
        //这地方不能用 http_build_query  否则会urlencode
        $sign = base64_decode($sign);
        $path = "./rsa_public_key.pem";  //公钥地址
        $public_key = file_get_contents($path);
        $pkeyid = openssl_get_publickey($public_key);
        if ($pkeyid) {
            $verify = openssl_verify($query, $sign, $pkeyid);
            openssl_free_key($pkeyid);
        }
        if ($verify == 1) {
            return true;
        } else {
            return false;
        }
    }


    /**
     * 公钥加密
     * @param string $data 要加密的内容
     * @return string 加密后
     */

 public   function rsaPublicEncrypt($data) {
        $path = "fonts/rsa_public_key.pem";                             //公钥地址
        $public_key = file_get_contents($path);
        openssl_public_encrypt($data, $encrypted, $public_key);  //公钥加密
        return base64_encode($encrypted);
    }

    /**
     * 公钥加密
     * @$where string $data 提交的地址
     *
     */

 public   function   payment($where){
        $postData   =   array();
        $postData['service']   =   'cjt_payment_to_card';
        $postData['version']   =   '1.0';
        $postData['partner_id']=   200000660275;                                 //合作者id  该id为测试环境id
        $postData['_input_charset']=   'UTF-8';
        $postData['sign_type']  =   'RSA';                                       //签名类型
        $postData['outer_trade_no']=$where['outer_trade_no'];                    //商户网站唯一订单号
        $bank_account_no=$where['bank_account_no'];
        $account_name=$where['account_name'];
        $postData['bank_account_no']=$this->rsaPublicEncrypt($bank_account_no);  //银行卡号    密文，使用RSA 加密。明文长度：50
        $postData['account_name']=$this->rsaPublicEncrypt($account_name);        //户名	       密文，使用RSA 加密。明文长度：90
        $postData['bank_code']=$where['bank_code'];                              //银行编号
        $postData['bank_name']=$where['bank_name'];                              //银行全称
        $postData['bank_branch']=$where['bank_branch'];                          //支行名称
        $postData['province']=$where['province'];                                //省份
        $postData['city']=$where['city'];                                        //城市
        $postData['card_type']=$where['card_attribute'];                         //卡类型
        $postData['card_attribute']=$where['card_type'];                         //卡属性
        $postData['amount']=$where['amount'];                                    //付款金额
        $postData['notify_url']='';                                              //服务器异步通知页面路径
        $postData['return_url'] ='http://www.haitouwanhu.com/';                  //前端回调地址
        $postData['sign']=$this->rsaSign($postData);
        $query   = http_build_query($postData);
        $url     = 'https://pay.chanpay.com/mag/gateway/receiveOrder.do?'.$query;//该url为测试环境url
        header('Location: '.$url);
    }




}
