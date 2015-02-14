<?php
namespace Home\Controller;
use Think\Controller;
header('Content-type: text/html; charset=utf-8');
include_once(dirname(__FILE__)."/BaseController.class.php");
class RegulatorsController extends BaseController {
	/*
	*监管机构
	*/
    public function regulators(){
        //用户登录返回信息
        $userid = session('user_id');
        $nickname = session('nickname');
        $this->assign('nickname',$nickname);
        $this->assign('userid',$userid);
        
        //监管机构数据查询
    	$type1 = "002001";//贵金属监管机构
        $type2 = "002002";//外汇监管机构	
        //贵金属监管机构
        $content['where'] = array('type' => $type1);
        $result = $this->_call('Regulators.get_list',
                                $content);
        if (200 == $result['status_code']) {
        	$g_list = $result['content']['list'];
            foreach ($g_list as $key => $rs) {
                $g_list[$key]['content'] =base64_decode($rs['content']);  
            }
        	$this->assign('g_list', $g_list);
        }
        //外汇监管机构
        $content1['where'] = array('type' => $type2);
        $result1 = $this->_call('Regulators.get_list',
                                $content1);
        if (200 == $result1['status_code']) {
        	$w_list = $result1['content']['list'];
            foreach ($w_list as $key => $rs) {
                $w_list[$key]['content'] =base64_decode($rs['content']);  
            }
        	$this->assign('w_list', $w_list);
        }
        $this->display();
    }
}
