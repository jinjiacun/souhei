<?php
namespace Home\Controller;
use Think\Controller;
header('Content-type: text/html; charset=utf-8');
include_once(dirname(__FILE__)."/BaseController.class.php");
class RankingController extends BaseController {
	/*
	*曝光台
	*/
    public function machine(){
        //用户登录返回信息
        $userid = session('user_id');
        $nickname = session('nickname');
        $this->assign('nickname',$nickname);
        $this->assign('userid',$userid);
        //统计曝光人数
         $res = $this->_call('Inexposal.stat_user_amount',
                              $content);
        if (200 == $res['status_code']) {
             $this->assign('user_amout',$res['content']);
        }
        //曝光平台总数
        $content_dt["where"]['add_blk_amount'] = array('neq',0);
        $result_num = $this->_call('Inexposal.dynamic',
                               $content_dt);
        if (200 == $result_num['status_code']) {
            $record_count_ex = $result_num['content']['flat_form_count'];
            $this->assign('record_count_ex',$record_count_ex);
        }
        //曝光信息查询
    	$auth_level = "006001";
    	$content['where'] = array('auth_level'=>$auth_level);
        $content['order'] = array(
                    'add_blk_amount'=>'DESC',
                    'exp_amount'    =>'DESC'
                    );
    	$result = $this->_call('Company.black_sort',
                                  $content);
        //print_r($result);
    	if (200 == $result['status_code']) {
            $get_list = $result['content']['list'];
            foreach ($get_list as $key => $rs) {
                    $get_list[$key]['last_time'] = date('Y-m-d H:i:s',$rs['last_time']);
            }
            $record_count = $result['content']['record_count'];
    		$this->assign('get_list', $get_list);
            $this->assign('record_count',$record_count);
    	}
        //最新曝光
        //$page_size = 7;
        //$content_zx['where'] = array('company_id' => array('gt',0));
        //$content_zx['page_size'] = $page_size;
        $res_zx = $this->_call('Inexposal.last_exposal',
                                $content_zx);
        if (200 == $res_zx['status_code']) {
            $list_zx = $res_zx['content'];
            $this->assign('list_zx',$list_zx);
        }
        $this->display();
    }
}
