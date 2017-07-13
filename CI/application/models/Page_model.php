<?php

/**
 * Created by PhpStorm.
 * User: 庾治超
 * Date: 2016/9/6
 * Time: 12:10
 */
class  Page_model extends CI_Model {

    public function page($total_rows , $base_url , $page = 6) {
        $config[ 'base_url' ] = $base_url;                                              //分页显示地址
        $config[ "first_link" ] = "";                                                     //首页显示
        $config[ "last_link" ] = "";                                                     //尾页显示
        $config[ "num_links" ] = 3;                                                       //样式选择
        $config[ 'total_rows' ] = $total_rows;                                           //一共多少条
        $config[ 'per_page' ] = $page;                                                   //每页显示多少条
        $config[ 'prev_link' ] = '上一页';                                               //上一页
        $config[ 'next_link' ] = '下一页';                                                //下一页
        $config[ 'first_tag_open' ] = '';                                           //第一个链接的起始标签。
        $config[ 'first_tag_close' ] = '';                                         //第一个链接的结束标签。
        $config[ 'next_tag_open' ] = '';                                            //下一页链接的起始标签。
        $config[ 'next_tag_close' ] = '';                                          //下一页链接的结束标签。
        $config[ 'prev_tag_open' ] = '';                                            //上一页链接的起始标签。
        $config[ 'prev_tag_close' ] = '';                                          //上一页链接的结束标签。
        $config[ 'cur_tag_open' ] = '<a  class="active">';                           //当前页链接的起始标签。可以加多个标签(因为当前页会自动屏蔽了a标签需要手动加上，为保持样式一致)
        $config[ 'cur_tag_close' ] = '</a>';                                       //当前页链接的结束标签。
        $config[ 'num_tag_open' ] = '';                                             //数字链接的起始标签
        $config[ 'num_tag_close' ] = '';                                           //数字链接的结束标签。
        return $config;
    }

}