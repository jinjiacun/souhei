<?php
namespace Home\Controller;
use Think\Controller;
header('Content-type: text/html; charset=utf-8');
include_once(dirname(__FILE__)."/BaseController.class.php");
class InexposureController extends BaseController{
    /*
    *申请搜黑可信企业认证数据添加
    */
    public function authentication(){
        //用户登录返回信息
        $userid = session('user_id');
        $nickname = session('nickname');
        $this->assign('nickname',$nickname);
        $this->assign('userid',$userid);

        $this->display();
    }
	/*
	*申请搜黑可信企业认证数据添加
	*/
    public function authentication_ex(){
        //用户登录返回信息
            $userid = session('user_id');
        //申请搜黑可信企业认证数据添加
            $user_id  = $userid;
            $nature              = I('post.nature');
            $trade               = I('post.trade');
            $company_name        = I('post.company_name');
            $corporation         = I('post.corporation');
            $reg_address         = I('post.reg_address');
            //$company_type        = I('post.company_type');
            $busin_license_ex    = $_FILES['busin_license']['tmp_name'];
            $code_certificate_ex = $_FILES['code_certificate']['tmp_name'];
            $telephone           = I('post.telephone');
            $website             = I('post.website');
            $contact             = I('post.contact');
            $mobile              = I('post.mobile');
            $record              = I('post.record');
            $agent_platform      = I('post.agent_platform');
            $mem_sn              = I('post.mem_sn');
            $certificate_ex      = $_FILES['certificate']['tmp_name'];
            $find_website        = I('post.find_website');
            if ($user_id == "") {
                 echo 6;
                 exit();
            }
            if($company_name == ""){
                echo 6;
                exit();
            }
            if($reg_address == ""){
                echo 6;
                exit();
            }
            if($telephone == ""){
                echo 6;
                exit();
            }
            if ($contact == "") {
                echo 6;
                exit();
            }
            if ($mobile == "") {
                echo 6;
                exit();
            }
            //判断营业执照是否上传
            if (!empty($busin_license_ex)) {
                $fp  = fopen($busin_license_ex, "rb");
                $fpp = $_FILES['busin_license']['size'];
                if ($fpp > 409600) {
                    echo 4;
                    exit();
                }
                $buf = fread($fp,$fpp);
                fclose($fp);
                $filename = $busin_license_ex;
                $result = $this->_call('Media.upload', 
                                             array(
                                              'file_name'=>$filename,  #文件名称
                                              'buf'      =>$buf,       #要上传的二进制数据
                                              'file_ext' =>'jpg',      #图片后缀
                                              'module_sn'=>'001003',   #营业执照
                                              ),
                                            'resource',
                                            $fp);
                if($result)
                {
                    if(200 == $result['status_code'])
                    {
                        if(0 == $result['content']['is_success']){
	                    	$busin_license = $result['content']['id'];
	                    }else if (-1 == $result['content']['is_success']) {
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
                        $this->error("营业执照上传失败");
                        exit();
                    }
                }
            }else{
                $this->error("请上传营业执照");
            }
            //判断机构代码证是否上传
            if (!empty($code_certificate_ex)) {
                $fp  = fopen($code_certificate_ex, "rb");
                $fpp = $_FILES['code_certificate']['size'];
                if ($fpp > 409600) {
                    echo 4;
                    exit();
                }
                $buf = fread($fp,$fpp);
                fclose($fp);
                $filename = $code_certificate_ex;
                $result = $this->_call('Media.upload', 
                                             array(
                                              'file_name'=>$filename,  #文件名称
                                              'buf'      =>$buf,       #要上传的二进制数据
                                              'file_ext' =>'jpg',      #图片后缀
                                              'module_sn'=>'001004',   #机构代码证
                                              ),
                                            'resource',
                                            $fp);
                if($result)
                {
                    if(200 == $result['status_code'])
                    {  
                        if(0 == $result['content']['is_success']){
	                    	$code_certificate = $result['content']['id'];
	                    }else if (-1 == $result['content']['is_success']) {
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
                        $this->error("机构代码证上传失败");
                        exit();
                    }
                }
            }else{
                $this->error("请上传机构代码证");
            }
            //资质证明图片上传
            if(!empty($certificate_ex)){
                $fp  = fopen($certificate_ex, "rb");
                $fpp = $_FILES['certificate']['size'];
                if ($fpp > 409600) {
                    echo 4;
                    exit();
                }
                $buf = fread($fp,$fpp);
                fclose($fp);
                $filename = $certificate_ex;
                $result = $this->_call('Media.upload', 
                                             array(
                                              'file_name'=>$filename,  #文件名称
                                              'buf'      =>$buf,       #要上传的二进制数据
                                              'file_ext' =>'jpg',      #图片后缀
                                              'module_sn'=>'001005',   #资质证明
                                              ),
                                            'resource',
                                            $fp);
                if($result)
                {
                    if(200 == $result['status_code'])
                    {
                        if(0 == $result['content']['is_success']){
	                    	$certificate = $result['content']['id'];
	                    }else if (-1 == $result['content']['is_success']) {
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
                        $this->error("机构代码证上传失败");
                        exit();
                    }
                }
            }else{
                $certificate = "";
            }
            $content = array(
                'user_id'          => $user_id,
                'nature'           => $nature,
                'trade'            => $trade,
                'company_name'     => urlencode($company_name),
                'corporation'      => urlencode($corporation),
                'reg_address'      => urlencode($reg_address),
                //'company_type'     => urlencode($company_type),
                'busin_license'    => $busin_license,
                'code_certificate' => $code_certificate,
                'telephone'        => urlencode($telephone),
                'website'          => urlencode($website),
                'contact'          => urlencode($contact),
                'mobile'           => $mobile,
                'record'           => urlencode($record),
                'agent_platform'   => urlencode($agent_platform),
                'mem_sn'           => urlencode($mem_sn),
                'certificate'      => $certificate,
                'find_website'     => urlencode($find_website),
                );
            $result = $this->_call('Inexposal.add_ex',
                                   $content);
            if(200 == $result['status_code']
            &&  0  == $result['content']['is_success'])
            {
                echo 0;
                exit(); 
            }
            else
            {
                echo -1;
                exit(); 
            }
    }
    /*
	*我要曝光数据添加
	*/
    public function exposure(){
        //用户登录返回信息
        $userid = session('user_id');
        $nickname = session('nickname');
        $this->assign('nickname',$nickname);
        $this->assign('userid',$userid);
        
        $this->display();
    }
    public function exposure_ex(){
        //用户登录返回信息
        $userid = session('user_id');
        $nickname = session('nickname');
        $this->assign('nickname',$nickname);
        $this->assign('userid',$userid);
        
        //我要曝光数据添加           
            $user_id      = $userid;
            $nature       = I('post.nature');
            $trade        = I('post.trade');
            $company_name = I('post.company_name');
            $amount       = I('post.amount');
            $website      = I('post.website');
            $content      = str_replace(PHP_EOL, '', I('post.content'));
            //$content      = I('post.content');
            $pic_1        = $_FILES['pic_1']['tmp_name'];
            if ($user_id == "") {
                echo 6;
                exit();
            }
            if ($company_name =="") {
                echo 6;
                exit();
            }
            if ($content =="") {
                echo 6;
                exit();
            }
            //用户照片的上传
            if (!empty($pic_1)) {
                $fp  = fopen($pic_1, "rb");
                $fpp = $_FILES['pic_1']['size'];
                if ($fpp > 409600) {
                    echo 4;
                    exit();
                }
                $buf = fread($fp, $fpp);
                fclose($fp);
                $filename = $_FILES['pic_1']["tmp_name"];
                $result = $this->_call('Media.upload', 
                                       array(
                                          'file_name'=>$filename,  #文件名称
                                          'buf'      =>$buf,       #要上传的二进制数据
                                          'file_ext' =>'jpg',      #图片后缀
                                          'module_sn'=>'001001',   #曝光图片
                                          ),
                                       'resource',
                                       $fp);
                if($result)
                {
                    if(200 == $result['status_code'])
                    {
                        if(0 == $result['content']['is_success']){
                            $pic_1 = $result['content']['id'];
                        }else if (-1 == $result['content']['is_success']) {
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
                        $this->error("图片上传失败");
                        exit();
                    }
                }
            }else{
                $pic_1 = "";
            }
            $content = array(
                'user_id'      =>$user_id,
                'nature'       =>$nature,
                'trade'        =>$trade,
                'company_name' =>urlencode($company_name),
                'amount'       =>$amount,
                'website'      =>urlencode($website),
                'content'      =>urlencode($content),
                'pic_1'        =>$pic_1, 
                );
            $result = $this->_call('Inexposal.add',
                                   $content);
            if(200 == $result['status_code']
            &&  0  == $result['content']['is_success'])
            {
                echo 0;
                exit(); 
            }
            else
            {
                echo -1;
                exit();
            }
    }
}