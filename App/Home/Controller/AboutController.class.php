<?php
namespace Home\Controller;
use Think\Controller;
header('Content-type: text/html; charset=utf-8');
include_once(dirname(__FILE__)."/BaseController.class.php");
class AboutController extends BaseController {
	//关于我们
    public function about_us(){
    	//用户登录返回信息
        $userid = session('user_id');
        $nickname = session('nickname');
        $this->assign('nickname',$nickname);
        $this->assign('userid',$userid);

        //曝光平台总数
        $content_dt["where"]['add_blk_amount'] = array('neq',0);
        $result_num = $this->_call('Inexposal.dynamic',
                               $content_dt);
        if (200 == $result_num['status_code']) {
            $record_count = $result_num['content']['flat_form_count'];
            $this->assign('record_count',$record_count);
        }
        $result1 = $this->_call('Company.get_list',
                                $content1);
        if (200 == $result1['status_code']) {
            $w_list = $result1['content']['record_count'];
            $this->assign('w_list',$w_list);
        }
        $time = date('Y-m-d',time());
        $this->assign('time',$time);
        $this->display();
    }
    //联系我们
    public function contact_us(){
    	//用户登录返回信息
        $userid = session('user_id');
        $nickname = session('nickname');
        $this->assign('nickname',$nickname);
        $this->assign('userid',$userid);

        $this->display();
    }
    //帮助中心
    public function help_center(){
    	//用户登录返回信息
        $userid = session('user_id');
        $nickname = session('nickname');
        $this->assign('nickname',$nickname);
        $this->assign('userid',$userid);
        
        $result1 = $this->_call('Company.get_list',
                                $content1);
        if (200 == $result1['status_code']) {
            $w_list = $result1['content']['record_count'];
            $this->assign('w_list',$w_list);
        }
        $this->display();
    }
}