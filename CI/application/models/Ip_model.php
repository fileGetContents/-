<?php
class  Ip_model extends CI_Model{



    public function ip(){

        $ip='';
        if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
        { $ip = getenv("HTTP_CLIENT_IP");}
        else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
        { $ip = getenv("HTTP_X_FORWARDED_FOR");}
        else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
        { $ip = getenv("REMOTE_ADDR");}
        else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown")){
            $ip = $_SERVER['REMOTE_ADDR'];}
        else{
            $ip = "unknown";
        }

       return  $ip;
    }


  public function   ip_address($ip=""){


      if(empty($ip)){
          $ip = GetIp();
      }
      $res = @file_get_contents('http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js&ip=' . $ip);
      if(empty($res)){ return false; }
      $jsonMatches = array();
      preg_match('#\{.+?\}#', $res, $jsonMatches);
      if(!isset($jsonMatches[0])){ return false; }
      $json = json_decode($jsonMatches[0], true);
      if(isset($json['ret']) && $json['ret'] == 1){
          $json['ip'] = $ip;
          unset($json['ret']);
      }else{
          return false;
      }
      return $json;

  }




}