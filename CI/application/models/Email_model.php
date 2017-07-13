<?php
/**
 * CI 邮件发送
 * User: 庾治超
 * Date: 2016/12/12
 * Time: 14:18
 */

class  Email_model extends CI_Model{
    /**
     * @param $ToEmail  对方邮件
     * @param $title    标题
     * @param $content  消息内容
     * @return bool
     */

   public   function  email($ToEmail,$title,$content){

       $this->load->library('email');                 //加载email
       $config['protocol'] = 'smtp';                  //邮件发送协议
       $config['smtp_host'] = 'ssl://smtp.qq.com';    //SMTP 服务器地址
       $config['smtp_user'] = '1932425337@qq.com';    //SMTP 用户名
       $config['smtp_pass'] = 'upqchykuwdtvdccj';     //授权码
       $config['smtp_port'] = 465;                    //端口号
       $config['smtp_timeout'] = 30;                  //SMTP 超时时间（单位：秒）
       $config['mailtype'] = 'text';                  //邮件类型。如果发送的是 HTML 邮件，必须是一个完整的网页， 确保网页中没有使用相对路径的链接和图片地址，它们在邮件中不能正确显示。
       $config['charset'] = 'utf-8';                  //字符集
       $config['wordwrap'] = TRUE;                    //是否启用自动换行
       $this->email->initialize($config);             //加载配置
       $this->email->set_newline("\r\n");
       $config['crlf'] = "\r\n";
       $this->email->from('1932425337@qq.com', $title);
       $this->email->to($ToEmail);                        //对方电子邮件
       $this->email->subject($title);                     //消息标题
       $this->email->message($content);                   //消息内容
       $this->email->send();
       $status = $this->email->print_debugger();
       if($status){
           return false;
       } else {
           return  true;
       }

   }





}