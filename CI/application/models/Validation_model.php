<?php
 class   Validation_model  extends CI_Model{


     public function validation(){

         $vals = array(
             'word'      => '',
             'img_path'  => './captcha/',
             'img_url'   => 'http://localhost/0111/index.php/Registered/index',
             'font_path' => './path/to/fonts/texb.ttf',
             'img_width' => '150',
             'img_height'    => 30,
             'expiration'    => 7200,
             'word_length'   =>4,
             'font_size' => 16,
             'img_id'    => 'Imageid',
             'pool'      => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

             // White background and border, black text and red grid
             'colors'    => array(
                 'background' => array(255, 255, 255),
                 'border' => array(255, 255, 255),
                 'text' => array(0, 0, 0),
                 'grid' => array(255, 40, 40)
             )
         );

         $cap = create_captcha($vals);
         return  $cap['image'];


     }

 }