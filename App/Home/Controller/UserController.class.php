<?php
namespace Home\Controller;
use Think\Controller;
header('Content-type: text/html; charset=utf-8');
include_once(dirname(__FILE__)."/BaseController.class.php");
class UserController extends BaseController {
    /**
    *登录
    */
    public function login(){
        $mobile   = I('post.mobile');
        $password = I('post.password');
        $userip   = get_client_ip();
        $content = array(
            'mobile' => $mobile,
            'pswd'   => $password,
            'userip' => $userip
            );
        $result = $this->_call('User.login',
                                $content);
        if (200 == $result['status_code']) {
            if (0 == $result['content']['is_success']) {
                $_SESSION['nickname'] = $result['content']['nickname'];
                $_SESSION['user_id']  = $result['content']['user_id'];
                echo 0;
            }elseif (-1 == $result['content']['is_success']) {
                echo -1;
            }elseif (-2 == $result['content']['is_success']) {
                echo -2;
            }elseif (-3 == $result['content']['is_success']) {
                echo -3;
            }elseif (-4 == $result['content']['is_success']) {
                echo -4;
            }
        }
    }
    /*
    *退出登录
    */
    public function logout(){
        $_SESSION = array(); //清除SESSION值.
        if(isset($_COOKIE[session_name()])){  //判断客户端的cookie文件是否存在,存在的话将其设置为过期.
                setcookie(session_name(),'',time()-1,'/');
        }
        session_destroy();  //清除服务器的sesion文件
        $this->redirect('Index/index');
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
        //$Verify->codeSet = '0123456789'; 
        $Verify->useImgBg = true; 
        $Verify->imageW = 130;  
        $Verify->imageH = 50;  
        //$Verify->expire = 600;  
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
    public function check_verify_ex(){
        $verify   = I('param.param','');
        //验证码
        if(!$this->check_verify($verify)){  
            echo '{
                    "info":"验证码错误",
                    "status":"n"
                  }';
            exit();  
        }else{
            echo '{
                    "info":"验证码正确",
                    "status":"y"
                  }';
            exit();
        } 
    }
    /*
    *验证手机
    */
    public function check_mobile(){
        $mobile = I('post.param');
        $content = array('mobile'=>$mobile);
        $res_mobile = $this->_call('User.check_mobile',
                                    $content);
        if (200 == $res_mobile['status_code'])
        {
           if (0 == $res_mobile['content']['is_exists']) {
              echo '{
                      "info":"手机号码已存在",
                      "status":"n"
                    }';
              exit();
           }else{
              echo '{
                      "info":"可以注册",
                      "status":"y"
                    }';
              exit();
           }
        }
        echo '{
                "info":"手机号码已存在",
                "status":"n"
              }';
    }
    /*
    *验证手机
    */
    public function check_mobile_ex(){
        $mobile = I('post.param');
        $content = array('mobile'=>$mobile);
        $res_mobile = $this->_call('User.check_mobile',
                                    $content);
        if (200 == $res_mobile['status_code'])
        {
           if (0 == $res_mobile['content']['is_exists']) {
              echo '{
                      "info":"手机号码存在",
                      "status":"y"
                    }';
              exit();
           }else{
              echo '{
                      "info":"请输入正确的手机号码",
                      "status":"n"
                    }';
              exit();
           }
        }
   }
	/*
	*用户注册
	*/
    public function user_register(){
        if ($_POST['submit']) {
            $nickname = I('post.nickname');
            $mobile   = I('post.mobile');
            $pswd     = I('post.pswd');
            $verify   = I('post.verify');
            if ($mobile == "") {
                $this->error("手机号码不能为空！");
                exit();
            }
            if ($pswd == "") {
                $this->error("密码不能为空！");
                exit();
            }
            //验证码
            if ($verify == "") {
                $this->error('验证码不能为空！');
                exit();
            }
            // if(!$this->check_verify($verify)){  
            //     $this->error("亲，验证码输错了哦！",$this->site_url);  
            // } 
            $content = array(
                'nickname' => urlencode($nickname),
                'mobile'   => $mobile,
                'pswd'     => $pswd,
                );
            $result = $this->_call('User.register',
                                  $content);
            if (200 == $result['status_code']) {
                if (0 == $result['content']['is_success']) {
                    $_SESSION['nickname'] = $result['content']['nickname'];
                    $_SESSION['user_id']  = $result['content']['user_id'];
                    $this->redirect("/Home/Index/index");
                    //echo "<script>location.href='../Index/index'</script>";
                    //$this->success("注册成功！","../Index/index");
                    exit();
                }
                else if (-1 == $result['content']['is_success']) {
                    $this->error("注册失败！");
                    exit();
                }
                else if (-2 == $result['content']['is_success']) {
                    $this->error("手机号码已存在！");
                    exit();
                }
            }else{
                $this->error("注册失败！");
                exit();
            }
        }
        $this->display();
    }
    /*
	*验证码
	*/
    public function find_password(){
        $result = $this->_call('User.get_pic_validate',
                                $content);
        $this->assign('yzm',$result['content']);
        if ($_POST['mobile']) {
      		$mobile = I('post.mobile');
          $imagecode = I('post.imagecode');
          $content_ex = array('mobile'=>$mobile,
                               'imagecode'=>$imagecode);
          $result_ex = $this->_call('User.send_validate',$content_ex);
          if (200 == $result_ex['status_code'] &&
           0 == $result_ex['content']['is_success']) {
              $_SESSION['mobile'] = $mobile;
              echo 0;
              exit();
          }else{
              echo -1;
              exit();
          }
    		// $_SESSION['mobile'] = $mobile;
    		// echo "<script>location.href='../User/find_password_ex'</script>";
    	}
        $this->display();
    }
    /*
	*手机验证
	*/
    public function find_password_ex(){
        if ($_POST['submit']) {
    		$message_code = I('post.message_code');
    		$_SESSION['message_code'] = $message_code;
    		echo "<script>location.href='../User/modify_password'</script>";
    	}
    	
        $this->display();
    }
    /*
    *密码找回
    */
    public function modify_password(){
    	$mobile = session('mobile');
    	$message_code = session('message_code');
    	$this->assign('mobile',$mobile);
    	$this->assign('message_code',$message_code);
      $this->display();
    }
    /*
    *用户中心
    */
    public function user_center(){   
      $user_id = session('user_id');
      if ($user_id) {     
        $content = array(
            'uid' => $user_id
            );
        $result = $this->_call('User.get_info',
                                   $content);
        if(200 == $result['status_code'])
        {
            $us_list = $result['content'];
            $this->assign('userid', $user_id);
            $this->assign('us_list', $us_list);
        }
        $this->display();
      }else{
        $this->redirect("/Home/Index/index");
      }
    }
    //用户信息修改
    public function information_modify(){
       $nickname = I('post.nickname');
       $uid      = I('post.userid');
       $sex      = I('post.sex');
       $birthday = I('post.birthday');
       $job      = I('post.job');
       $address  = I('post.address');
       $content = array(
       	'nickname'=>urlencode($nickname),
       	'uid'     =>$uid,
       	'sex'     =>$sex,
       	'birthday'=>$birthday,
       	'job'     =>$job,
       	'address' =>$address,
       	);
       $result = $this->_call('User.update',
       	                       $content);
       if (200 == $result['status_code'] &&
           0 == $result['content']['is_success']) {
       	$_SESSION['nickname'] = $nickname;
       	echo 0;
       }else{
       	echo -1;
       }
    }
    /*
    *用户密码修改
    */
    public function update_passwd(){
      $uid      = session('user_id');
      $old_pswd = I('post.old_pswd');
      $new_pswd = I('post.new_pswd');
      if ($old_pswd == "") {
        $this->error('原密码不能为空！');
      }
      if ($new_pswd == "") {
        $this->error('新密码不能为空！');
      }
      $content = array(
        'uid'      => $uid,
        'old_pswd' => $old_pswd,
        'new_pswd' => $new_pswd
        );
      $result = $this->_call('User.update_passwd',$content);
      if (200 == $result['status_code']) {
        if (0 == $result['content']['is_success']) {
          $_SESSION = array(); //清除SESSION值.
          if(isset($_COOKIE[session_name()])){ 
                  setcookie(session_name(),'',time()-1,'/');
          }
          session_destroy();
          echo 0;
        }else if (-1 == $result['content']['is_success']) {
          echo -1;
        }else if (-2 == $result['content']['is_success']) {
          echo -2;
        }else if (-3 == $result['content']['is_success']) {
          echo -3;
        }
      }
    }
    /*
    *用户头像上传
    */
    public function touxiang(){
        $uid = session('user_id');
        $pic_1 = $_FILES['N']['tmp_name'];
        $safekey = $this->md5_16($uid."|".date('Ymd')."|souhei975427");
        $fp  = fopen($pic_1, "rb");
        $fpp = $_FILES['N']['size'];
        if ($fpp > 358400) {
          echo -5;
          exit();
        }
        $buf = fread($fp, $fpp);
        fclose($fp);
        $filename = "1.jpg";

        //$filename = $content['file_name'];
        $varname  = "imageUpLoad";
        $key      = "$varname\";filename=\"$filename\"\r\nContent-Type:image/jpeg\r\n";
        $handler  = $key;
        $data_arr[$key]     = $buf;
        $data_arr['uid']     = $uid;
        $data_arr['safekey'] = $safekey;
        $data = $data_arr;
        $res  = $this->post(C('user_url'), $data, $header);
        $result = json_decode($res,ture);
        if (1 == $result['State']) {
          echo 1;
          exit();
        }elseif (0 == $result['State']) {
          echo 0;
          exit();
        }elseif (-1 == $result['State']) {
          echo -1;
          exit();
        }elseif (-2 == $result['State']) {
          echo -2;
          exit();
        }elseif (-3 == $result['State']) {
          echo -3;
          exit();
        }elseif (-4 == $result['State']) {
          echo -4;
          exit();
        }
    }
    public function md5_16($str){
              return substr(md5($str),8,16);
    }
    function post($url, $params = false, $header = array()){

        //$cookie_file = tempnam(dirname(__FILE__),'cookie');
        //$cookie_file = __PUBLIC__.'cookies.tmp';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_POST, 1); 
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60); 
        //curl_setopt($ch, CURLOPT_COOKIEJAR, $cookieFile);
        curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file); 
        //curl_setopt($ch, CURLOPT_COOKIEFILE,$cookieFile); 
        curl_setopt($ch, CURLOPT_COOKIEFILE,$cookie_file); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,FALSE); 
        curl_setopt($ch, CURLOPT_HTTPGET, true); 
        curl_setopt($ch, CURLOPT_TIMEOUT, 30); 
        if($params !== false){
          curl_setopt($ch, CURLOPT_POSTFIELDS , $params);
        } 
        curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 5.1; rv:21.0) Gecko/20100101 Firefox/21.0'); 
        curl_setopt($ch, CURLOPT_URL,$url); 
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header); 
        $result = curl_exec($ch); 
        curl_close($ch); 
         
        return $result; 
  } 
}