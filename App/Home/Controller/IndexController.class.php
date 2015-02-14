<?php
namespace Home\Controller;
use Think\Controller;
header('Content-type: text/html; charset=utf-8');
include_once(dirname(__FILE__)."/BaseController.class.php");
class IndexController extends BaseController {
    public function index(){
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
        //曝光动态
        $page_size_dt = 10;
        $time=date("Y-m-d 00:00:00");
        $news=strtotime($time);
        $content_dt['page_size'] = $page_size_dt;
        $content_dt['where'] = array(
               'add_blk_amount'=>array('neq',0),
               );
        $result = $this->_call('Inexposal.dynamic');
        if (200 == $result['status_code']) {
            $bgdt = $result['content']['list'];
            foreach ($bgdt as $key => $rs) {
                $bgdt[$key]['add_time_ex'] = date('H:i:s',$rs['add_time']);
                $bgdt[$key]['add_time_exx'] = date('Y-m-d',$rs['add_time']);
            }
            $record_count = $result['content']['flat_form_count'];
            $record_count_ex = $result['content']['record_count'];
            $this->assign('bgdt',$bgdt);
            $this->assign('news',$news); 
            $this->assign('record_count',$record_count);
            $this->assign('record_count_ex',$record_count_ex);
        }
        //查询动态
        $page_size_cxdt = 30;
        $content['page_size'] = $page_size_cxdt;
        $res_cx = $this->_call('Querylog.get_list',
                               $content);
        if (200 == $res_cx['status_code']) {
            $cx_list = $res_cx['content']['list'];
            $this->assign('cx_list',$cx_list);
        }
        //查询曝光最多
        $bg_content = array('field_name'=>'add_blk_amount');
        $bg_result = $this->_call('Company.Max',$bg_content);
        if($bg_result){
			if (200 == $bg_result['status_code']) {
			   $bg_max = $bg_result['content']['id'];
			   $this->assign('bg_max',$bg_max);   	
			}
        }else{
        	$this->error('暂无数据');
        }
        //加黑最多
        $jh_content = array('field_name'=>'exp_amount');
        $jh_result = $this->_call('Company.Max',$jh_content);
        if($jh_result){
        	if (200 == $jh_result['status_code']) {
               $jh_max = $jh_result['content']['id'];
			   $this->assign('jh_max',$jh_max);  	
            }
        }else{
        	$this->error('暂无数据');
        }
        //查询评论最多
        $pl_content = array('field_name'=>'com_amount');
        $pl_result = $this->_call('Company.Max',$pl_content);
        if($pl_result){
            if (200 == $pl_result['status_code']) {
               $pl_max = $pl_result['content']['id'];
               $pl_auth_level = $pl_result['content']['auth_level'];
               if ('006001' == $pl_auth_level) {
                   $pl_url = "Home/Query/query_hpt/resid/$pl_max/p/1";
                   $this->assign('pl_url',$pl_url);
               }else if ('006002' == $pl_auth_level) {
                   $pl_url = "Home/Query/query_wrz/resid/$pl_max/p/1";
                   $this->assign('pl_url',$pl_url);
               } else if ('006003' == $pl_auth_level) {
                   $pl_url = "Home/Query/query_yrz/resid/$pl_max/p/1";
                   $this->assign('pl_url',$pl_url);
               }   
            }
        }else{
            $this->error('暂无数据');
        }
        $this->display();
    }
    /*
    *曝光动态加载更多
    */
    public function send(){
        //曝光动态
        $p=isset($_POST['k'])?intval(trim($_POST['k'])):0;
        $page_size = 10;
        $page_index = 1;
        if($p <= 10)
        {
            $page_index = $p;
            $content['page_size']  = $page_size;
            $content['page_index'] = $page_index;
        }else{
            exit();
        }
        //$time=date("Y-m-d 00:00:00");
        //$news=strtotime($time);
        $content['page_size'] = $page_size;
        $content['where'] = array(
               'add_blk_amount'=>array('neq',0),
               );
        $result = $this->_call('Inexposal.dynamic',
                               $content);
        if (200 == $result['status_code']) {
            $data = $result['content']['list'];
            foreach ($data as $key => $rs) {
                $data[$key]['nickname_ex'] = $this->cutstr($rs['nickname'],10);
                $data[$key]['company_name_ex']  = $this->cutstr($rs['company_name'],20);
                $data[$key]['content_ex']  = $this->cutstr($rs['content'],105);
                $data[$key]['add_time_ex'] = date('H:i:s',$rs['add_time']);
                $data[$key]['add_time_exx'] = date('Y-m-d',$rs['add_time']);
            }
            if(count($data)>0){
                echo json_encode($data);
                exit();
            }else{
                exit();
            }
        } 
    }
    //字符截断
   public function cutstr($string, $length) {
        preg_match_all("/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/", $string, $info);
        for($i=0; $i<count($info[0]); $i++) {
            $wordscut .= $info[0][$i];
            $j = ord($info[0][$i]) > 127 ? $j + 2 : $j + 1;
            if ($j > $length - 3) {
                return $wordscut." ...";
            }
        }
        return join('', $info[0]);
    }
    /*
    *首页搜索
    */
    public function search(){
        //用户登录返回信息
        $userid = session('user_id');
        $nickname = session('nickname');
        $this->assign('nickname',$nickname);
        $this->assign('userid',$userid);
        //用户搜索
    	if ($_POST['submit']) {
            $user_id     = $userid;
    		$search_name = I('post.search_name');
    		if ($search_name == "") {
    			echo "<script>alert('请输入搜索内容');location.href='../Index/index'</script>";
    		}
            if ($user_id == "") {
                echo "<script>alert('对不起，请登录后在搜索！');location.href='../Index/index'</script>";
            }
    		//print_r($search_name);
    		$content = array(
    			'name'    => urlencode($search_name),
                'user_id' => $user_id
    			);
    		$result = $this->_call('Company.search',
    			                  $content);
            if($result){
        		if (200 == $result['status_code']) {
                    $search_list = $result['content']['list'];
                        foreach ($search_list as $key => $rs) {
                            $search_list[$key]['auth_level'] = $rs['auth_level'];
                            $search_list[$key]['id']  = $rs['id']; 
                        }
                        $auth_level = $search_list[$key]['auth_level'];
                        $id = $search_list[$key]['id'];
                        if ("006001" == $auth_level) {
                            $this->redirect("/Home/Query/query_hpt/resid/$id/p/1");
                        }
                        elseif ("006002" == $auth_level) {
                            $this->redirect("/Home/Query/query_wrz/resid/$id/p/1");
                        }
                        elseif ("006003" == $auth_level) {
                            $this->redirect("/Home/Query/query_yrz/resid/$id/p/1");
                        }
                        else{
                            $wsl=$search_name;
                            header("Location: ../Query/query_wsl/wsl/$wsl");
                            exit;

                        }
                }
                else{
                    $this->error("查询失败！");
                }
            }
    	}
    }
    public function search_ex(){
            $user_id     = I('post.usaa');
            $search_name = I('post.search_name');
            if ($search_name == "") {
                echo "<script>alert('请输入搜索内容');location.href='../Index/index'</script>";
            }
            if ($user_id == "") {
                echo "<script>alert('对不起，请登录后在搜索！');location.href='../Index/index'</script>";
            }
            $content = array(
                'name'    => urlencode($search_name),
                'user_id' => $user_id
                );
            $result = $this->_call('Company.search',
                                  $content);
            if (200 == $result['status_code']) {
                $search_list = $result['content']['list'];
                if (!empty($search_list)) {
                    echo json_encode($search_list); 
                }else{
                    echo 0;
                }       
            }
            else{
                echo 0;
            }
    }
}