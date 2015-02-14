<?php
namespace Home\Controller;
use Think\Controller;
header('Content-type: text/html; charset=utf-8');
include_once(dirname(__FILE__)."/BaseController.class.php");
class QueryController extends BaseController {
    /*
    *新闻换一换功能
    */
    public function news_hyh(){
        $p          = isset($_POST['k'])?intval(trim($_POST['k'])):0;
        $sign       = I('post.sign');
        $id         = I('post.comment_id');
        $page_size  = 5;
        $page_index = 1;
        if($p)
        {
            $page_index = $p;
            $content['page_size']  = $page_size;
            $content['page_index'] = $page_index;
        }
        if ($sign == "") {
            $content['where'] = array(
            'company_id'=>$id,
            );
        }else{
            $content['where'] = array(
            'company_id'=>$id,
            'sign'      =>$sign
            );
        }
        $content['page_size'] = $page_size;
        $result = $this->_call('News.get_list',
                                $content);
        if (200 == $result['status_code']) {
            //输出新闻列表
            $data = $result['content']['list'];
            //解码base64_decode
            $html_g = "/<(.*?)>/";
            foreach ($data as $key => $rs) {
                $data[$key]['add_time'] = date('Y-m-d H:i',$rs['add_time']);
                $data[$key]['content'] =preg_replace($html_g,"",htmlspecialchars_decode(base64_decode($rs['content'])));  
            }
            if(count($data)>0){
                echo json_encode($data);
                exit();
            }else{
                exit();
            }
        }
    }
	/*
	*黑平台
	*/
    public function query_hpt(){
        //用户登录返回信息
        $userid = session('user_id');
        $nickname = session('nickname');
        $this->assign('nickname',$nickname);
        $this->assign('userid',$userid);
        //企业id
        $id = I('get.resid');
        //黑平台信息查询
        $content_hpt['id'] = $id;
        $result_hpt = $this->_call('Company.get_info',
                                    $content_hpt);
        if (200 == $result_hpt['status_code']) {
            $hpt_list = $result_hpt['content'];
            $rzjb     = $hpt_list['agent_platform_auth_level'];
            $agent_platform = $hpt_list['agent_platform'];
            if ($rzjb == '006001') {
                $rzjb_url = 'Query/query_hpt/resid/'.$agent_platform.'/p/1';
                $this->assign('rzjb_url',$rzjb_url);
            }else if($rzjb == '006002'){
                $rzjb_url = 'Query/query_wrz/resid/'.$agent_platform.'/p/1';
                $this->assign('rzjb_url',$rzjb_url);
            }else if ($rzjb == '006003'){
                $rzjb_url = 'Query/query_yrz/resid/'.$agent_platform.'/p/1';
                $this->assign('rzjb_url',$rzjb_url);
            }
            //黑平台信息输出
            $this->assign('hpt_list', $hpt_list);
            //企业别名
            $content_bm['where'] = array('company_id'=>$id);
            $res_bm = $this->_call('Companyalias.get_list',
                                    $content_bm);
            if (200 == $res_bm['status_code']) {
                $bm_list = $res_bm['content']['list'];
                $this->assign('bm_list',$bm_list);
            }
            //查询新闻
            $page_size  = 5;
            $content['where'] = array(
                'company_id'=>$id,
                'sign'      =>1
                );
            $content['page_size'] = $page_size;
            $result = $this->_call('News.get_list',
                                    $content);
            if (200 == $result['status_code']) {
                //相应条件下数据总条数
                $record_count = $result['content']['record_count'];
                //输出新闻列表
                $new_list = $result['content']['list'];
                //解码base64_decode
                $html_g = "/<(.*?)>/";
                foreach ($new_list as $key => $rs) {
                    $new_list[$key]['content'] =preg_replace($html_g,"",htmlspecialchars_decode(base64_decode($rs['content'])));  
                }
                $this->assign('record_count', $record_count);
                $this->assign('new_list', $new_list);
            }
            //评论列表
            $page_index_p = 1;
            $page_size_p  = 10;
            $p_content = array();
            if(I('get.p'))
            {
                $page_index_p = I('get.p');
                $p_content['page_size']  = $page_size_p;
                $p_content['page_index'] = $page_index_p;
            }
            if ($userid > 0) {
                $p_content['where'] = array(
                    '_string'    => 'user_id = '.$userid.' or is_validate = 1',
                    'company_id' => $id,
                    'parent_id'  => 0,
                    'is_delete'  => 0);
            }else{
                $p_content['where'] = array(
                    'is_validate'=> 1,
                    'company_id' => $id,
                    'parent_id'  => 0,
                    'is_delete'  => 0);
            }
            $p_result = $this->_call('Comment.get_list_ex',
                                        $p_content);
            if (200 == $p_result['status_code']) {
                $con_p = $p_result['content']['list'];
                $pat     = '#\[em_([0-9]+)\]#';
                $bq      = C('bq_url');
                $replace = "<img src='$bq/$1.gif' />";
                $a       = '/\s+/';
                $avatar  = 'avatar.jpg';
                foreach ($con_p as $key => $rs) {
                    $con_p[$key]['add_time'] = date('Y-m-d H:i:s',$rs['add_time']);
                    $con_p[$key]['content']  = preg_replace($pat,$replace,$rs['content']);
                    $con_p[$key]['user_id']  = C('user_photo_url').preg_replace($a,'/',chunk_split($rs['user_id'],2)).$avatar;
                    $con_p[$key]['suiji']    = '****'.mb_substr($rs['nickname'], mb_substr($rs['nickname'])-1,1,'utf-8');
                } 
                $this->assign('con_p',$con_p);
                $record_count_p = $p_result['content']['record_count'];
                $this->assign('record_count_p', $record_count_p);
                $this->get_page($record_count_p, $page_size_p);
            }
            //网友曝光列表
            $page_index_b = 1;
            $page_size_b  = 10;
            $b_content = array();
            if(I('get.np'))
            {
                $page_index_b = I('get.np');
                $b_content['page_size']  = $page_size_b;
                $b_content['page_index'] = $page_index_b;
            }
            $b_content['where'] = array(
                'company_id' => $id,
                'type'       => 0,
                'is_delete'  => 0,
                );
            if ($userid > 0) {
                $b_content['user_id'] = $userid;
            }else{
                $b_content['user_id'] = 0;
            }
            $b_result = $this->_call('Inexposal.get_list_com',
                                     $b_content);
            if (200 == $b_result['status_code']) {
                $con_b = $b_result['content']['list'];
                $bq      = C('bq_url');
                $a       = '/\s+/';
                $avatar  = 'avatar.jpg';
                foreach ($con_b as $key => $rs) {
                    $con_b[$key]['add_time'] = date('Y-m-d H:i:s',$rs['add_time']);
                    $con_b[$key]['user_id']  = C('user_photo_url').preg_replace($a,'/',chunk_split($rs['user_id'],2)).$avatar;
                    $con_b[$key]['suiji']    = '****'.mb_substr($rs['nickname'], mb_substr($rs['nickname'])-1,1,'utf-8');
                }
                $this->assign('con_b',$con_b);
                $record_count_b = $b_result['content']['record_count'];
                $this->assign('record_count_b', $record_count_b);
                $this->get_pages($record_count_b, 10);
            }
        }
        $this->display();
    }
    /*
	*未认证
	*/
    public function query_wrz(){
       //用户登录返回信息
        $userid = session('user_id');
        $nickname = session('nickname');
        $this->assign('nickname',$nickname);
        $this->assign('userid',$userid);


        $id = I('get.resid');
        //未认证信息的查询
        // $content_wrz['where'] = array('id'=>$id);
        $content_wrz['id'] = $id;
        $result_wrz = $this->_call('Company.get_info',
                                   $content_wrz);
        if (200 == $result_wrz['status_code']) {
            $wrz_list = $result_wrz['content'];
            $rzjb     = $wrz_list['agent_platform_auth_level'];
            $agent_platform = $wrz_list['agent_platform'];
            if ($rzjb == '006001') {
                $rzjb_url = 'Query/query_hpt/resid/'.$agent_platform.'/p/1';
                $this->assign('rzjb_url',$rzjb_url);
            }else if($rzjb == '006002'){
                $rzjb_url = 'Query/query_wrz/resid/'.$agent_platform.'/p/1';
                $this->assign('rzjb_url',$rzjb_url);
            }else if ($rzjb == '006003'){
                $rzjb_url = 'Query/query_yrz/resid/'.$agent_platform.'/p/1';
                $this->assign('rzjb_url',$rzjb_url);
            }
            //未认证信息输出
            $this->assign('wrz_list', $wrz_list);
            //企业别名
            $content_bm['where'] = array('company_id'=>$id);
            $res_bm = $this->_call('Companyalias.get_list',
                                    $content_bm);
            if (200 == $res_bm['status_code']) {
                $bm_list = $res_bm['content']['list'];
                $this->assign('bm_list',$bm_list);
            }
            //查询新闻
            $page_size  =5;
            $content['where'] = array(
                'company_id'=>$id,
                );
            $content['page_size'] = $page_size;
            $result = $this->_call('News.get_list',
                                    $content);
            if (200 == $result['status_code']) {
                //相应条件下数据总条数
                $record_count = $result['content']['record_count'];
                //输出新闻列表
                $new_list = $result['content']['list'];
                //解码base64_decode
                $html_g = "/<(.*?)>/";
                foreach ($new_list as $key => $rs) {
                    $new_list[$key]['content'] = preg_replace($html_g,"",htmlspecialchars_decode(base64_decode($rs['content'])));   
                }
                $this->assign('record_count', $record_count);
                $this->assign('new_list', $new_list);
            }
            //评论列表
            $page_index_p = 1;
            $page_size_p  = 10;
            $p_content = array();
            if(I('get.p'))
            {
                $page_index_p = I('get.p');
                $p_content['page_size']  = $page_size_p;
                $p_content['page_index'] = $page_index_p;
            }
            //$p_content['where'] = "(user_id = $userid or is_validate = 1) and company_id = $id and parent_id = 0";
            if ($userid > 0) {
                $p_content['where'] = array(
                    '_string'    => 'user_id = '.$userid.' or is_validate = 1',
                    'company_id' => $id,
                    'parent_id'  => 0,
                    'is_delete'  => 0
                                );
            }else{
                $p_content['where'] = array(
                    'is_validate'=> 1,
                    'company_id' => $id,
                    'parent_id'  => 0,
                    'is_delete'  => 0
                                );
            }
            
            $p_result = $this->_call('Comment.get_list_ex',
                                        $p_content);
            if (200 == $p_result['status_code']) {
                $con_p = $p_result['content']['list'];
                $pat     = '#\[em_([0-9]+)\]#';
                $bq      = C('bq_url');
                $replace = "<img src='$bq/$1.gif' />";
                $a       = '/\s+/';
                $avatar  = 'avatar.jpg';
                foreach ($con_p as $key => $rs) {
                    $con_p[$key]['add_time'] = date('Y-m-d H:i:s',$rs['add_time']);
                    $con_p[$key]['content']  = preg_replace($pat,$replace,$rs['content']);
                    $con_p[$key]['user_id']  = C('user_photo_url').preg_replace($a,'/',chunk_split($rs['user_id'],2)).$avatar;
                    $con_p[$key]['suiji']    = '****'.mb_substr($rs['nickname'], mb_substr($rs['nickname'])-1,1,'utf-8');
                }
                $this->assign('con_p',$con_p);
                $record_count_p = $p_result['content']['record_count'];
                $this->assign('record_count_p', $record_count_p);
                $this->get_page($record_count_p, $page_size_p);
            }
            //网友曝光列表
            $page_index_b = 1;
            $page_size_b  = 10;
            $b_content = array();
            if(I('get.np'))
            {
                $page_index_b = I('get.np');
                $b_content['page_size']  = $page_size_b;
                $b_content['page_index'] = $page_index_b;
            }
            $b_content['where'] = array(
                'company_id' => $id,
                'type'       => 0,
                'is_delete'  => 0,
                );
            if ($userid > 0) {
                $b_content['user_id'] = $userid;
            }else{
                $b_content['user_id'] = 0;
            }
            $b_result = $this->_call('Inexposal.get_list_com',
                                     $b_content);
            if (200 == $b_result['status_code']) {
                $con_b = $b_result['content']['list'];
                $bq      = C('bq_url');
                $a       = '/\s+/';
                $avatar  = 'avatar.jpg';
                foreach ($con_b as $key => $rs) {
                    $con_b[$key]['add_time'] = date('Y-m-d H:i:s',$rs['add_time']);
                    //$con_b[$key]['content']  = preg_replace($pat,$replace,$rs['content']);
                    $con_b[$key]['user_id']  = C('user_photo_url').preg_replace($a,'/',chunk_split($rs['user_id'],2)).$avatar;
                    $con_b[$key]['suiji']    = '****'.mb_substr($rs['nickname'], mb_substr($rs['nickname'])-1,1,'utf-8');
                }
                //print_r($con_p);
                $this->assign('con_b',$con_b);
                $record_count_b = $b_result['content']['record_count'];
                $this->assign('record_count_b', $record_count_b);
                $this->get_pages($record_count_b, 10);
            }

        }
        $this->display();
    }
    /*
    *已认证
    */
    public function query_yrz(){
        //用户登录返回信息
        $userid = session('user_id');
        $nickname = session('nickname');
        $this->assign('nickname',$nickname);
        $this->assign('userid',$userid);

        $id = I('get.resid');
        //已认证信息的查询
        $content_yrz['id'] = $id;
        $result_yrz = $this->_call('Company.get_info',
                                   $content_yrz);
        if (200 == $result_yrz['status_code']) {
            $yrz_list = $result_yrz['content'];
            $rzjb     = $yrz_list['agent_platform_auth_level'];
            $agent_platform = $yrz_list['agent_platform'];
            if ($rzjb == '006001') {
                $rzjb_url = 'Query/query_hpt/resid/'.$agent_platform.'/p/1';
                $this->assign('rzjb_url',$rzjb_url);
            }else if($rzjb == '006002'){
                $rzjb_url = 'Query/query_wrz/resid/'.$agent_platform.'/p/1';
                $this->assign('rzjb_url',$rzjb_url);
            }else if ($rzjb == '006003'){
                $rzjb_url = 'Query/query_yrz/resid/'.$agent_platform.'/p/1';
                $this->assign('rzjb_url',$rzjb_url);
            }
            //已认证信息输出
            $this->assign('yrz_list', $yrz_list);
            //企业别名
            $content_bm['where'] = array('company_id'=>$id);
            $res_bm = $this->_call('Companyalias.get_list',
                                    $content_bm);
            if (200 == $res_bm['status_code']) {
                $bm_list = $res_bm['content']['list'];
                $this->assign('bm_list',$bm_list);
            }
            //查询新闻
            $page_size_news  = 5;
            $content_n['where'] = array(
                'company_id'=>$id,
                'sign'      =>0
                );
            $content_n['page_size'] = $page_size_news;
            $result_n = $this->_call('News.get_list',
                                    $content_n);
            if (200 == $result_n['status_code']) {
                //相应条件下数据总条数
                $record_count_n = $result_n['content']['record_count'];
                //输出新闻列表
                $new_list = $result_n['content']['list'];
                //解码base64_decode
                $html_g = "/<(.*?)>/";
                foreach ($new_list as $key => $rs) {
                    $new_list[$key]['content'] =preg_replace($html_g,"",htmlspecialchars_decode(base64_decode($rs['content'])));  
                }
                $this->assign('record_count_n', $record_count_n);
                $this->assign('new_list', $new_list);
            }
            //评论列表
            $page_index = 1;
            $page_size  = 10;
            if(I('get.p'))
            {
                $page_index = I('get.p');
                $yrz_content['page_size']  = $page_size;
                $yrz_content['page_index'] = $page_index;
            }
            if ($userid > 0) {
                $yrz_content['where'] = array(
                    '_string'    => 'user_id = '.$userid.' or is_validate = 1',
                    'company_id' => $id,
                    'parent_id'  => 0,
                    'is_delete'  => 0
                                    );
            }else{
                $yrz_content['where'] = array(
                    'is_validate'=> 1,
                    'company_id' => $id,
                    'parent_id'  => 0,
                    'is_delete'  => 0
                                    );
            }
            //$yrz_content['where'] = "(user_id = $userid or is_validate = 1) and company_id = $id and parent_id = 0";
            $yrz_result = $this->_call('Comment.get_list_ex',
                                        $yrz_content);
            if (200 == $yrz_result['status_code']) {
                $con_yrz = $yrz_result['content']['list'];
                $pat     = '#\[em_([0-9]+)\]#';
                $bq      = C('bq_url');
                $replace = "<img src='$bq/$1.gif' />";
                $a       = '/\s+/';
                $avatar  = 'avatar.jpg';
                $suiji   = rand(100,999);
                foreach ($con_yrz as $key => $rs) {
                    $con_yrz[$key]['add_time'] = date('Y-m-d H:i:s',$rs['add_time']);
                    $con_yrz[$key]['content']  = preg_replace($pat,$replace,$rs['content']);
                    $con_yrz[$key]['user_id']  = C('user_photo_url').preg_replace($a,'/',chunk_split($rs['user_id'],2)).$avatar;
                    $con_yrz[$key]['suiji']    = '****'.mb_substr($rs['nickname'], mb_substr($rs['nickname'])-1,1,'utf-8');
                    $con_yrz[$key]['id']       = $rs['id'];
                }
                $this->assign('con_yrz',$con_yrz);
                $record_count = $yrz_result['content']['record_count'];
                $this->assign('record_count', $record_count);
                $this->get_page($record_count, 10);
            }       
        }
        $this->display();
    }
    /*
    *评论回复信息查询
    */
    public function query_yrz_hf($parent_id,$uId){
    	$userid = session('user_id');
        $page_size = 5;
        $page_index = 1;
        if(I('get.p'))
        {
            $page_index = I('get.p');
            $content['page_size']  = $page_size;
            $content['page_index'] = $page_index;
        }
        $content['page_size'] = $page_size;
        if ($userid > 0) {
            $content['where']="(user_id = $userid or is_validate = 1) and company_id = $uId and parent_id = $parent_id and is_delete = 0";
        }else{
            $content['where']="is_validate = 1 and company_id = $uId and parent_id = $parent_id and is_delete = 0";
        }
        $result = $this->_call('Comment.get_list',
                               $content);
        if (200 == $result['status_code']) {
            $record_count = $result['content']['record_count'];
            $Page = new \Think\Page($record_count, $page_size);
            $pageShow = $Page->show();
            $hf_result = $result['content']['list'];
            $pat       = '#\[em_([0-9]+)\]#';
            $bq        = C('bq_url');
            $replace   = "<img src='$bq/$1.gif' />";
            $a         = '/\s+/';
            $avatar    = 'avatar.jpg';
            foreach ($hf_result as $key => $rs) {
                $hf_result[$key]['add_time'] = date('Y-m-d H:i:s',$rs['add_time']);
                $hf_result[$key]['content']  = preg_replace($pat,$replace,$rs['content']);
                $hf_result[$key]['user_id']  = C('user_photo_url').preg_replace($a,'/',chunk_split($rs['user_id'],2)).$avatar;
                $hf_result[$key]['suiji']    = '****'.mb_substr($rs['nickname'], mb_substr($rs['nickname'])-1,1,'utf-8');
                //$hf_result[$key]['pages']    = $pageShow;
            }
            if ($pageShow) {
                $hf_result['pages'] = $pageShow;
            }
            echo json_encode($hf_result);
        }
    }
    /*
    *网友曝光评论列表
    */
    public function query_wybg_hf($exposal_id){
    	$userid = session('user_id');
        $page_size = 5;
        $page_index = 1;
        if(I('get.p'))
        {
            $page_index = I('get.p');
            $content['page_size']  = $page_size;
            $content['page_index'] = $page_index;
        }
        $content['page_size'] = $page_size;
        if ($userid > 0) {
            $content['where']="(user_id = $userid or is_validate = 1) and exposal_id = $exposal_id ";
        }else{
            $content['where']="is_validate = 1 and exposal_id = $exposal_id ";
        }
        
        $result = $this->_call('Comexposal.get_list',
                               $content);
        if (200 == $result['status_code']) {
            $record_count = $result['content']['record_count'];
            $Page = new \Think\Page($record_count, $page_size);
            $pageShow = $Page->show();
            $hf_result = $result['content']['list'];
            $pat       = '#\[em_([0-9]+)\]#';
            $bq        = C('bq_url');
            $replace   = "<img src='$bq/$1.gif' />";
            $a         = '/\s+/';
            $avatar    = 'avatar.jpg';
            foreach ($hf_result as $key => $rs) {
                $hf_result[$key]['add_time'] = date('Y-m-d H:i:s',$rs['add_time']);
                $hf_result[$key]['content']  = preg_replace($pat,$replace,$rs['content']);
                $hf_result[$key]['user_id']  = C('user_photo_url').preg_replace($a,'/',chunk_split($rs['user_id'],2)).$avatar;
                //$hf_result[$key]['pages']    = $pageShow;
            }
            //print_r($hf_result);
            if ($pageShow) {
                $hf_result['pagess'] = $pageShow;
            }
            echo json_encode($hf_result);
        }
    }
    /*
    *未收录
    */
    public function query_wsl(){
        //用户登录返回信息
        $userid = session('user_id');
        $nickname = session('nickname');
        $this->assign('nickname',$nickname);
        $this->assign('userid',$userid);
        $wsl = I('get.wsl');
        $this->assign('wsl',$wsl);
        $this->display();
    }
     /** 
     *  
     * 验证码生成 
     */  
    public function verify_c()
    {  
        $Verify = new \Think\Verify();  
        $Verify->fontSize = 18;  
        $Verify->length   = 4;  
        $Verify->useNoise = false;  
        $Verify->codeSet = '0123456789'; 
        $Verify->useImgBg = false; 
        $Verify->imageW = 130;  
        $Verify->imageH = 50;  
        $Verify->expire = 300;  
        $Verify->useCurve = false;
        $Verify->entry();  
    }
    /*
    *判断验证码输入是否正确
    */
    public function check_verify($code, $id = ""){  
        $verify = new \Think\Verify();  
        return $verify->check($code, $id);  
    }
    /*
    *动态判断验证码
    */
    // public function check_verify_ex(){
    //     $verify   = I('param.param','');
    //     //print_r($verify);
    //     //验证码
    //     if(!$this->check_verify($verify)){  
    //         echo '{
    //                 "info":"验证码错误",
    //                 "status":"n"
    //               }';
    //         exit();  
    //     }else{
    //         echo '{
    //                 "info":"验证码正确",
    //                 "status":"y"
    //               }';
    //         exit();
    //     } 
    // }
    /*
    *用户评论
    */
    public function comment_add(){
	    	$userid       = session('user_id');
	    	$company_id   = I('post.company_id');
	        $type         = I('post.wypl');
	        $content      = I('post.content');
	        $is_anonymous = I('post.is_anonymous');
            $verify       = I('param.verify','');  
	        $pic_1        = $_FILES['N']['tmp_name'];
	        $pic_2        = $_FILES['N1']['tmp_name'];
	        $pic_3        = $_FILES['N2']['tmp_name'];
	        $pic_4        = $_FILES['N3']['tmp_name'];
	        $pic_5        = $_FILES['N4']['tmp_name'];
	        //图片1上传
	        if ($content == "") {
	        	echo 6;
                exit();
	        }
            if(!$this->check_verify($verify)){  
                echo 7;
                exit();  
            } 
	        if(!empty($pic_1)){
	            $fp  = fopen($pic_1, "rb");
                $fpp = $_FILES['N']['size'];
                if ($fpp > 358400) {
                   echo 4;
                   exit();
                }
	            $buf = fread($fp, $fpp);
	            fclose($fp);
	            $filename = $pic_1;
	            $result = $this->_call('Media.upload', 
	                                         array(
	                                          'file_name'=>$filename,  #文件名称
	                                          'buf'      =>$buf,       #要上传的二进制数据
	                                          'file_ext' =>'jpg',      #图片后缀
	                                          'module_sn'=>'001009',   #评论图片
	                                          ),
	                                        'resource',
	                                        $fp);
	            if($result)
	            {
	                if(200 == $result['status_code'])
	                {
	                    if(0 == $result['content']['is_success']){
	                    	$files_1 = $result['content']['id'];
	                    }else if(-1 == $result['content']['is_success']) {
	                    	echo 1;
	                    	exit();
	                    }else if (-2 == $result['content']['is_success']) {
	                    	echo 2;
	                    	exit();
	                    }else if (-3 == $result['content']['is_success']) {
	                    	echo 3;
	                    	exit();
	                    }else if (-4 == $result['content']['is_success']) {
	                    	echo 4;
	                    	exit();
	                    }else if (-5 == $result['content']['is_success']) {
	                    	echo 5;
	                    	exit();
	                    }
	                }else{
	                    echo 1;
	                    exit();
	                }
	            }
	        }else{
	            $files_1 = "";
	        }
	        //图片2上传
	        if(!empty($pic_2)){
	            $fp  = fopen($pic_2, "rb");
	            $fpp = $_FILES['N1']['size'];
                if ($fpp > 358400) {
                   echo 4;
                   exit();
                }
                $buf = fread($fp, $fpp);
	            fclose($fp);
	            $filename = $pic_2;
	            $result = $this->_call('Media.upload', 
	                                         array(
	                                          'file_name'=>$filename,  #文件名称
	                                          'buf'      =>$buf,       #要上传的二进制数据
	                                          'file_ext' =>'jpg',      #图片后缀
	                                          'module_sn'=>'001009',   #评论图片
	                                          ),
	                                        'resource',
	                                        $fp);
	            if($result)
	            {
	                if(200 == $result['status_code'])
	                {
	                    if(0 == $result['content']['is_success']){
	                    	$files_2 = $result['content']['id'];
	                    }else if(-1 == $result['content']['is_success']) {
                            echo 1;
                            exit();
                        }else if (-2 == $result['content']['is_success']) {
                            echo 2;
                            exit();
                        }else if (-3 == $result['content']['is_success']) {
                            echo 3;
                            exit();
                        }else if (-4 == $result['content']['is_success']) {
                            echo 4;
                            exit();
                        }else if (-5 == $result['content']['is_success']) {
                            echo 5;
                            exit();
                        }
	                }else{
	                    echo 1;
	                    exit();
	                }
	            }
	        }else{
	            $files_2 = "";
	        }
	        //图片3上传
	        if(!empty($pic_3)){
	            $fp  = fopen($pic_3, "rb");
	            $fpp = $_FILES['N2']['size'];
                if ($fpp > 358400) {
                   echo 4;
                   exit();
                }
                $buf = fread($fp, $fpp);
	            fclose($fp);
	            $filename = $pic_3;
	            $result = $this->_call('Media.upload', 
	                                         array(
	                                          'file_name'=>$filename,  #文件名称
	                                          'buf'      =>$buf,       #要上传的二进制数据
	                                          'file_ext' =>'jpg',      #图片后缀
	                                          'module_sn'=>'001009',   #评论图片
	                                          ),
	                                        'resource',
	                                        $fp);
	            if($result)
	            {
	                if(200 == $result['status_code'])
	                {
	                    if(0 == $result['content']['is_success']){
	                    	$files_3 = $result['content']['id'];
	                    }else if(-1 == $result['content']['is_success']) {
	                    	echo 1;
	                    	exit();
	                    }else if (-2 == $result['content']['is_success']) {
	                    	echo 2;
	                    	exit();
	                    }else if (-3 == $result['content']['is_success']) {
	                    	echo 3;
	                    	exit();
	                    }else if (-4 == $result['content']['is_success']) {
	                    	echo 4;
	                    	exit();
	                    }else if (-5 == $result['content']['is_success']) {
	                    	echo 5;
	                    	exit();
	                    }
	                }else{
	                    echo 1;
	                    exit();
	                }
	            }
	        }else{
	            $files_3 = "";
	        }
	        //图片4上传
	        if(!empty($pic_4)){
	            $fp  = fopen($pic_4, "rb");
	            $fpp = $_FILES['N3']['size'];
                if ($fpp > 358400) {
                   echo 4;
                   exit();
                }
                $buf = fread($fp, $fpp);
	            fclose($fp);
	            $filename = $pic_4;
	            $result = $this->_call('Media.upload', 
	                                         array(
	                                          'file_name'=>$filename,  #文件名称
	                                          'buf'      =>$buf,       #要上传的二进制数据
	                                          'file_ext' =>'jpg',      #图片后缀
	                                          'module_sn'=>'001009',   #评论图片
	                                          ),
	                                        'resource',
	                                        $fp);
	            if($result)
	            {
	                if(200 == $result['status_code'])
	                {
	                    if(0 == $result['content']['is_success']){
	                    	$files_4 = $result['content']['id'];
	                    }else if(-1 == $result['content']['is_success']) {
                            echo 1;
                            exit();
                        }else if (-2 == $result['content']['is_success']) {
                            echo 2;
                            exit();
                        }else if (-3 == $result['content']['is_success']) {
                            echo 3;
                            exit();
                        }else if (-4 == $result['content']['is_success']) {
                            echo 4;
                            exit();
                        }else if (-5 == $result['content']['is_success']) {
                            echo 5;
                            exit();
                        }
	                }else{
	                    echo 1;
	                    exit();
	                }
	            }
	        }else{
	            $files_4 = "";
	        }
	        //图片5上传
	        if(!empty($pic_5)){
	            $fp  = fopen($pic_5, "rb");
	            $fpp = $_FILES['N4']['size'];
                if ($fpp > 358400) {
                   echo 4;
                   exit();
                }
                $buf = fread($fp, $fpp);
	            fclose($fp);
	            $filename = $pic_5;
	            $result = $this->_call('Media.upload', 
	                                         array(
	                                          'file_name'=>$filename,  #文件名称
	                                          'buf'      =>$buf,       #要上传的二进制数据
	                                          'file_ext' =>'jpg',      #图片后缀
	                                          'module_sn'=>'001009',   #评论图片
	                                          ),
	                                        'resource',
	                                        $fp);
	            if($result)
	            {
	                if(200 == $result['status_code'])
	                {
	                    if(0 == $result['content']['is_success']){
	                    	$files_5 = $result['content']['id'];
	                    }else if(-1 == $result['content']['is_success']) {
                            echo 1;
                            exit();
                        }else if (-2 == $result['content']['is_success']) {
                            echo 2;
                            exit();
                        }else if (-3 == $result['content']['is_success']) {
                            echo 3;
                            exit();
                        }else if (-4 == $result['content']['is_success']) {
                            echo 4;
                            exit();
                        }else if (-5 == $result['content']['is_success']) {
                            echo 5;
                            exit();
                        }
	                }else{
	                    echo 1;
	                    exit();
	                }
	            }
	        }else{
	            $files_5 = "";
	        }
	        $content = array(
	        	'user_id'=>$userid,
	        	'company_id'=>$company_id,
	        	'type'=>$type,
	        	'content'=>urlencode($content),
	            'is_anonymous'=>$is_anonymous,
	            'pic_1'=>$files_1,
	            'pic_2'=>$files_2,
	            'pic_3'=>$files_3,
	            'pic_4'=>$files_4,
	            'pic_5'=>$files_5
	        	);
	        $result = $this->_call('Comment.add',$content);
	        if (200 == $result['status_code'] 
	        	&& 0 == $result['content']['is_success']) {
                echo 0;
                exit();
	        }else{
                echo -1;
                exit();
	        }

        }
}