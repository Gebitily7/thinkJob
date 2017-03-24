<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Home\Controller;
use User\Api\UserApi;

/**
 * 用户控制器
 * 包括用户中心，用户登录及注册
 */
class UserController extends HomeController {

	/* 用户中心首页 */
	public function index(){
		
	}

	/* 注册页面 */
	public function register($username = '', $password = '', $repassword = '', $email = '', $c_name = '', $verify = ''){
        if(!C('USER_ALLOW_REGISTER')){
            $this->error('注册已关闭');
        }
		if(IS_POST){ //注册用户
			/* 检测验证码 */
			if(!check_verify($verify)){
				$this->error('验证码输入错误！');
			}

			/* 检测密码 */
			if($password != $repassword){
				$this->error('密码和重复密码不一致！');
			}			

			/* 调用注册接口注册用户 */
            $User = new UserApi;
			$uid = $User->register($username, $password, $email, $c_name);
			if(0 < $uid){ //注册成功
				//TODO: 发送验证邮件
				$this->success('注册成功！',U('login'));
			} else { //注册失败，显示错误信息
				$this->error($this->showRegError($uid));
			}

		} else { //显示注册表单
			$this->display();
		}
	}

	/* 登录页面 */
	public function login($username = '', $password = '', $verify = ''){
		if(IS_POST){ //登录验证
			/* 检测验证码 */
			if(!check_verify($verify)){
				$data = array('3','验证码输入错误！');
				$this->error($data);
			}
			/* 调用UC登录接口登录 */
			$user = new UserApi;
			$uid = $user->login($username, $password);
			if(0 < $uid){ //UC登录成功
				/* 登录用户 */
				$Member = D('Member');
				if($Member->login($uid)){ //登录用户
					//TODO:跳转到登录前页面
					$this->success('登录成功！',U('Home/Index/index'));
				} else {
					$this->error('1',$Member->getError());
				}
			} else { //登录失败
				switch($uid) {
					case -1: $data = array('1','用户不存在或被禁用！'); break; //系统级别禁用
					case -2: $data = array('2','密码错误！'); break;
					default: $data = array('1','未知错误'); break; // 0-接口参数错误（调试阶段使用）
				}
				$this->error($data);
			}

		} else { //显示登录表单
			$this->display();
		}
	}

	/* 退出登录 */
	public function logout(){
		if(is_login()){
			D('Member')->logout();
			$this->success('退出成功！', U('Home/Index/index'));
		} else {
			$this->redirect('Home/Index/index');
		}
	}

	/* 验证码，用于登录和注册 */
	public function verify(){
		$config =    array(    'fontSize'    =>    20,    // 验证码字体大小    
								'length'      =>    4,     // 验证码位数    
								'useNoise'    =>    false, // 关闭验证码杂点
							);
		$verify = new \Think\Verify($config);
		$verify->entry(1);
	}

	/**
	 * 获取用户注册错误信息
	 * @param  integer $code 错误编码
	 * @return string        错误信息
	 */
	private function showRegError($code = 0){
		switch ($code) {
			case -1:  $error = '用户名长度必须在16个字符以内！'; break;
			case -2:  $error = '用户名被禁止注册！'; break;
			case -3:  $error = '用户名被占用！'; break;
			case -4:  $error = '密码长度必须在6-30个字符之间！'; break;
			case -5:  $error = '邮箱格式不正确！'; break;
			case -6:  $error = '邮箱长度必须在1-32个字符之间！'; break;
			case -7:  $error = '邮箱被禁止注册！'; break;
			case -8:  $error = '邮箱被占用！'; break;
			case -9:  $error = '手机格式不正确！'; break;
			case -10: $error = '手机被禁止注册！'; break;
			case -11: $error = '手机号被占用！'; break;
			case -12: $error = '公司名字长度必须在2-30个字符之间！'; break;
			case -13: $error = '公司被禁止注册！'; break;
			case -14: $error = '公司已经注册！'; break;
			default:  $error = '未知错误';
		}
		return $error;
	}


    /**
     * 修改密码提交
     * @author huajie <banhuajie@163.com>
     */
    public function profile(){
		if ( !is_login() ) {
			$this->error( '您还没有登陆',U('User/login') );
		}
		if(session('user_type') != 2){
			$this->error( '非法访问，请登录',U('User/login') );
		}
        if ( IS_POST ) {
            //获取参数
            $uid        =   is_login();
            $password   =   I('post.old');
            $repassword = I('post.repassword');
            $data['password'] = I('post.password');
            empty($password) && $this->error('请输入原密码');
            empty($data['password']) && $this->error('请输入新密码');
            empty($repassword) && $this->error('请输入确认密码');

            if($data['password'] !== $repassword){
                $this->error('您输入的新密码与确认密码不一致');
            }

            $Api = new UserApi();
            $res = $Api->updateInfo($uid, $password, $data);
            if($res['status']){
                $this->success('修改密码成功！');
            }else{
                $this->error($res['info']);
            }
        }else{
            $this->display();
        }
    }

    /* 检测用户名的唯一性 */
    public function checkUserNameUnique(){
    	$name = I('post.username','');
    	/* 调用UC登录接口登录 */
		$user = new UserApi;
		$type = $user->checkUsername($name);
		$info = $this->showRegError($type);
		$data = array('type' => $type,'info'=>$info);
		$this->ajaxReturn($data);
    }
    public function checkPassword(){
    	$name = I('post.password','');
    	/* 调用UC登录接口登录 */
		$user = new UserApi;
		$type = $user->checkPassword($name);
		$info = $this->showRegError($type);
		$data = array('type' => $type,'info'=>$info);
		$this->ajaxReturn($data);
    }

    public function checkRePassword(){
    	$name = I('post.username','');
    	/* 调用UC登录接口登录 */
		$rename = I('post.password','');
		if($name != $rename || $name == ''){
			$type = 0;
			$info = '两次密码不一致';
		}else{
			$type = 1;
		}
		$data = array('type' => $type,'info'=>$info);
		$this->ajaxReturn($data);
    }

    public function checkEmail(){
    	$name = I('post.username','');
    	/* 调用UC登录接口登录 */
		$user = new UserApi;
		$type = $user->checkEmail($name);
		$info = $this->showRegError($type);
		$data = array('type' => $type,'info'=>$info);
		$this->ajaxReturn($data);
    }

    public function checkMobile(){
    	$name = I('post.username','');
    	/* 调用UC登录接口登录 */
    	$name1 = preg_replace('/[^\w]*/','',$name);
		if(strlen($name1) != 11){
			$info = '手机格式不正确！';
			$type = -1;
		}else{
			$type = 1;
		}
		$data = array('type' => $type,'info'=>$info);
		$this->ajaxReturn($data);
    }

    public function checkCname(){
    	$name = I('post.username','');
    	/* 调用UC登录接口登录 */
		$user = new UserApi;
		$type = $user->checkCname($name);
		$info = $this->showRegError($type);
		$data = array('type' => $type,'info'=>$info);
		$this->ajaxReturn($data);
    }


    /* 企业中心 */
    public function center(){
    	if ( !is_login()) {
			$this->error( '您还没有登陆',U('User/login') );
		}
		if(session('user_type') != 2){
			$this->error( '非法访问，请登录',U('User/login') );
		}
    	$uid = session('user_auth')['uid'];

    	$nav = D('Channel')->lists();
    	$ce = array(
    		'id' => 99,
    		'title' => '企业中心',
    		'url'   => 'user/center'
    		);
    	setCookie('dataId',$ce['id']);
    	$nav1 = array($nav[0],$ce);
    	$this->assign('nav',$nav1);

    	/* 公司行业 */
    	$category = $this->getHead(0,$field = true, $ismenu = 1);
    	$this->assign('category',$category);

    	/* 当前刷新时间 */
    	$time = time();
    	$this->assign('time',$time);

    	/* 用户信息 */
    	$userInfo = $this->userDetail();
    	$label = parse_label($userInfo['c_label']);
    	$this->assign('label',json_encode($label));
    	$this->assign('userInfo',$userInfo);

        /* 获取职位信息 */
        //$this->get_job_list();

        /* 获取已过期的职位 */
        $this->get_job_deadline();

        /* 获取已发布的职位 */
        $this->get_job_now();

        /* 获取待发布的职位 */
        $this->get_job_wait();

        /* 获取简历 */
        $this->get_jian_all();

        /* 获取未处理的简历 */
        $this->get_jian_untreated();

        /* 已回复 */
        $this->get_jian_treated();

        /* 拒绝 */
        $this->get_jian_reject();

    	$this->display('CenterUser/center');
    }

    /* 职位编辑页 */
     public function edit(){
        if ( !is_login()) {
            $this->error( '您还没有登陆',U('User/login') );
        }
        if(session('user_type') != 2){
            $this->error( '非法访问，请登录',U('User/login') );
        }
        $id = I('id',0);
        if($id == 0){
            $this->error('参数错误');
        }

        $uid = session('user_auth')['uid'];

        $nav = D('Channel')->lists();
        $ce = array(
            'id' => 99,
            'title' => '企业中心',
            'url'   => 'user/center'
            );
        setCookie('dataId',$ce['id']);
        $nav1 = array($nav[0],$ce);
        $this->assign('nav',$nav1);

        /* 用户信息 */
        $userInfo = $this->userDetail();
        $this->assign('userInfo',$userInfo);

        /* 职位信息 */
        $document = D('document');
        $jobInfo = $document->detail($id);
        $label = parse_label($jobInfo['skill']);
        $this->assign('label',json_encode($label));
        $this->assign('jobInfo',$jobInfo);

        $this->display('CenterUser/edit');
     }

    /* ajax提交信息并修改 */
    public function upUcenterMember(){
    	if(IS_POST){
    		$data = $_POST;
    		$uid = is_login();
    		$data = array(
    			$data['name'] => $data['val']
    			);
    		$user = new UserApi;
    		$return = $user->updateCompany($uid,$data);
    		$this->ajaxReturn($return);
    	}
    }

    /* 职位 */
    // 全职
    public function quanZhi(){
    	if(IS_POST){
            // 获取用户提交的职位信息数据
    		$data =$_POST;
    		$return = array();
            // 获取企业用户详细信息
            $userInfo = $this->userDetail();
    		$data1 = strtotime($data['put_time']);                 // 发布时间
    		$data2 = strtotime($data['deadline']);                 // 失效时间
    		$_POST['put_time'] = $data1;                           // 
    		$_POST['deadline'] = $data2;
    		$_POST['iscate']   = 1;                                // 职位分类，为1表示为全职
    		$_POST['title']    = $data['jobname'];                 // 把职位的名称赋值给基础文档类
            $_POST['description'] = $data['job_desc'];
            $_POST['rocover']     = $data['rocover'];              // 是否为待发布
            $_POST['salary_a']    = $data['salary_range'];         // 薪资范围赋值给基础文档类
            $_POST['wep']         = $data['work_experience'];      // 工作经验赋值给基础文档类
            $_POST['acm']         = $data['academic_career'];      // 职位学历要求赋值给基础文档类
            $_POST['step']        = $userInfo['step'];             // 公司发展阶段赋值给基础文档类
            $_POST['pty']         = $userInfo['property'];         // 公司属性赋值给基础文档类
    		$document = D('document');                             // 实例化基础文档类
    		$uid = is_login();                                     // 用来判断用户是否登陆
    		$filed = array(
    			'uid'         => $uid,
    			'title'       => $data['jobname'],
    			'iscate'      => 1,
    			'category_id' => $data['category_id']
    			);
    		$list = $document->getListNum($filed);                 // 获取指定内容数量
    		if(empty($data['id']) || $data['id'] <= 0){
                    if($list > 0){
                    $return['status'] = 1;
                    $return['info']   = '该职位你已经发布过';
                    $this->ajaxReturn($return);
                    return false;
                }
            }
    		if(D('document')->update()){
    			$return['status'] = 1;
    			$data['rocover'] == 1 ? $return['info']   = '职位创建成功' : $return['info']   = '职位待发布成功';
    		}else{
    			$return['status'] = 0;
    			$return['info']   = '创建失败';
    		}
    		$this->ajaxReturn($return);                           // 通过ajax以json数据格式返回给前台
    	}
    }

    // 兼职
    public function jianZhi(){
    	if(IS_POST){
    		$data =$_POST;
            $userInfo = $this->userDetail();
    		//var_dump($data);
    		$data1 = strtotime($data['put_time']);
    		$data2 = strtotime($data['deadline']);
    		$_POST['put_time'] = $data1;
    		$_POST['deadline'] = $data2;
    		$_POST['iscate']   = 2;
    		$_POST['title']   = $data['jobname'];
            $_POST['description'] = $data['job_desc'];
            $_POST['rocover']    = $data['rocover'];

            $_POST['salary_a']   = $data['salary'];
            $_POST['acm']        = $data['academic_career']; 
            $_POST['step']       = $userInfo['step'];
            $_POST['pty']        = $userInfo['property'];
            $document = D('document');
    		$return = array();

    		$document = D('document');
    		$uid = is_login();
    		$filed = array(
    			'uid'         => $uid,
    			'title'       => $data['jobname'],
    			'iscate'      => 2,
    			'category_id' => $data['category_id']
    			);
    		$list = $document->getListNum($filed);
            if(empty($data['id']) || $data['id'] <= 0){
                    if($list > 0){
                    $return['status'] = 1;
                    $return['info']   = '该职位你已经发布过';
                    $this->ajaxReturn($return);
                    return false;
                }
            }
    		


    		if(D('document')->update()){
    			$return['status'] = 1;
    			$data['rocover'] == 1 ? $return['info']   = '创建成功' : $return['info']   = '职位待发布成功';
    		}else{
    			$return['status'] = 0;
    			$return['info']   = '创建失败';
    		}
    		$this->ajaxReturn($return);
    	}
    }

    /* 获取字段信息 */
    protected function userDetail1(){
    	$uid = is_login();
    	$user = new UserApi;
    	return $user->infoDetail($uid);
    }

    /* 按ismenu获取分类 */
    public function getCate(){
    	if(IS_POST){
    		$menu = $_POST;
    	}
    	$cate1 = $this->getHead(0,'id,name,title,pid,model,ishot',$menu['menu']);
    	$this->ajaxReturn($cate1);
    }



    /* 企业认证 */

    public function gsIdentify(){
        $data = $_POST;
        foreach ($data as $key => $value) {
            if($value == ''){
                $return['status'] = 0;
                $return['info']   = $key.'不能为空';
                $this->ajaxReturn($return);
            }
        }
        $user = new UserApi;
        $id = is_login();
        $model = $user->uModel();
        if($model->where('id = '.$id)->save($_POST)){
            $return['status'] = 1;
            $return['info']   = '提交成功，请等待';
        }
        $this->ajaxReturn($return);
    }

    /* 头像上传 */
    public function upPicture(){
        $img = I('post.');
        $base64 = $img['img'];
        
        if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64, $result)){
            $fname =  './Uploads/Picture/'.date("Y-m-d");
            $filename = time();
            if (!file_exists($fname)){ 
                $zpath = mkdir($fname);

                $savenamepath= $fname.'/'.$filename.'.png';
                 if (file_put_contents($savenamepath, base64_decode(str_replace($result[1], '', $base64)))){
                        /*$file['name'] = (string)$filename;
                        $file['tmp_name'] = 'D:\wamp\tmp\phpBF6B.tmp';
                        $this->uploadPicture($file);*/
                        $User = M('Picture');
                        $data['create_time'] = time();
                        $data['path']  = $savenamepath;   
                        $data['md5']  = md5_file($savenamepath);
                        $data['sha1'] = sha1_file($savenamepath);  

                       $map = array(
                            'md5' => $data['md5'],
                            'sha1' => $data['sha1']
                            );
                        $list = $User->where($map)->find();
                        if(!!$list){
                            unlink($savenamepath);
                            $list['status'] = 2;
                            $list['info']   = '成功保存';
                            $this->ajaxReturn($list);
                        }else{
                            $data['status'] = 1;
                            if($imgid = $User->add($data)){
                                $data['id'] =$imgid;
                                $data['info']   = '上传成功';
                                $this->ajaxReturn($data);
                            }
                        }  
                        
                  }
            } else {
                $savenamepath= $fname.'/'.$filename.'.png';
                 if (file_put_contents($savenamepath,base64_decode(str_replace($result[1], '',$base64)))){
                        /*$file['name'] = (string)$filename;
                        //$file['tmp_name'] = 'D:\wamp\tmp\phpBF6B.tmp';
                        $this->uploadPicture($file); */

                        $User = M('Picture');
                        $data['create_time'] = time();
                        $data['path']  = $savenamepath;   
                        $data['md5']  = md5_file($savenamepath);
                        $data['sha1'] = sha1_file($savenamepath);   
                        $map = array(
                            'md5' => $data['md5'],
                            'sha1' => $data['sha1']
                            );
                        $list = $User->where($map)->find();
                        if(!!$list){
                            unlink($savenamepath);
                            $list['status'] = 2;
                            $list['info']   = '成功保存';
                            $this->ajaxReturn($list);
                        }else{
                            $data['status'] = 1;
                            if($imgid = $User->add($data)){
                                $data['id'] =$imgid;
                                $data['info']   = '上传成功';
                                $this->ajaxReturn($data);
                            }
                        }  
                  }
              }
         }
    }

    /* 个人设置 */
    public function userCenter(){
        $data = $_POST;
        foreach ($data as $key => $value) {
            if($value == ''){
                $return['status'] = 0;
                $return['info']   = '不能有空项';
                $this->ajaxReturn($return);
            }
        }
        $id = is_login();
        $Member = M('Member');
        $data1 = array(
            'nickname' => $data['nickname']
            );
        
        if($Member->where('uid = '.$id)->save($data1)){
            $return['status'] = 1;
            $return['info']   = '提交成功，请等待';
            session('user_auth.nickname',$data['nickname']);
        }

        $user = new UserApi;
        unset($_POST['nickname']);
        $model = $user->uModel();
        if($model->where('id = '.$id)->save($_POST)){
            $return['status'] = 1;
            $return['info']   = '提交成功，请等待';
            session('user_auth.username',$data['username']);
        }
        $this->ajaxReturn($return);
    }
 
 /* 获取job的详细列表信息 */  
   private function get_job_list1(){
        if(!is_login()||is_user_type()!=2){
            $this->error('非法访问，请企业用户登录');
        }
        $map['uid'] = is_login();
        $map['status'] = 1;
        $order = 'id desc';
        $document = D('document');
        $list = $document -> getLists($map,10,$order);
        $page = $document -> getPage($map,10,$order);

        // print_r($page);
        // print_r(is_user_type());
        // //print_r($list);

        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$page);
   }

   private function get_job_deadline(){
        if(!is_login()||is_user_type()!=2){
            $this->error('非法访问，请企业用户登录');
        }
        $map['uid'] = is_login();
        $map['status'] = 1;
        $map['rocover'] = 1;
        $map['_string'] = 'deadline != 0 and deadline <= ' . NOW_TIME;
        $order = 'id desc';
        $document = D('document');
        
        $list = $document -> getLists($map,5,$order);
        $page = $document -> getPage($map,5,$order);

        // print_r($page);
        // print_r(is_user_type());
        // //print_r($list);
        $count = $document->where($map)->count();
        $pageAll = ceil($count/5);
        $this->assign('deadAll',$count);
        $this->assign('deadPage',$pageAll);
        $this->assign('listDeadline',$list);// 赋值数据集
        $this->assign('pageDeadline',$page);
   }

   private function get_job_now(){
        if(!is_login()||is_user_type()!=2){
            $this->error('非法访问，请企业用户登录');
        }
        $map['uid'] = is_login();
        $map['status'] = 1;
        $map['rocover'] = 1;
        $map['_string'] = 'deadline = 0 OR deadline > ' . NOW_TIME;
        $order = 'id desc';
        $document = D('document');
        $list = $document -> getLists($map,5,$order);
        $page = $document -> getPage($map,5,$order);

        $count = $document->where($map)->count();
        $pageAll = ceil($count/5);
        $this->assign('nowAll',$count); // 当前简历数
        $this->assign('nowPage',$pageAll);
        $this->assign('listNow',$list);// 赋值数据集
        $this->assign('pageNow',$page);
   }

   private function get_job_wait(){
        if(!is_login()||is_user_type()!=2){
            $this->error('非法访问，请企业用户登录');
        }
        $map['uid'] = is_login();
        $map['status'] = 1;
        $map['rocover'] = 0;
        $map['_string'] = 'deadline = 0 OR deadline > ' . NOW_TIME;
        $order = 'id desc';
        $document = D('document');
        $list = $document -> getLists($map,5,$order);
        $page = $document -> getPage($map,5,$order);

        $count = $document->where($map)->count();
        $pageAll = ceil($count/5);
        $this->assign('waitAll',$count);
        $this->assign('waitPage',$pageAll);
        $this->assign('listWait',$list);// 赋值数据集
        $this->assign('pageWait',$page);
   }

   private function get_jian_all(){
        if(!is_login()||is_user_type()!=2){
            $this->error('非法访问，请企业用户登录');
        }
        $map['cid'] = is_login();

        $jian = D('cjian');
        $data = $jian->detailInfo($map['cid']);
  
        $order = 'id desc';
        $list = $jian -> getLists($map,5,$order);
        $page = $jian -> getPage($map,5,$order);

        $count = $jian->where($map)->count();
        $pageAll = ceil($count/5);
        $this->assign('resumeCount',$count);
        $this->assign('resumeAllPage',$pageAll);
        $this->assign('resumeList',$list);// 赋值数据集
        $this->assign('resumePage',$page);
   }

   private function get_jian_untreated(){
        if(!is_login()||is_user_type()!=2){
            $this->error('非法访问，请企业用户登录');
        }
        $map = array(
            'cid'    => is_login(),
            'cj_status' => 0
            );

        $jian = D('cjian');

        $data = $jian->detailInfo($map);
  
        $order = 'id desc';
        $list = $jian -> getLists($map,5,$order);
        $page = $jian -> getPage($map,5,$order);

        $count = $jian->where($map)->count();
        $pageAll = ceil($count/5);
        $this->assign('untdCount',$count);
        $this->assign('untdAllPage',$pageAll);
        $this->assign('untdList',$list);// 赋值数据集
        $this->assign('untdPage',$page);
   }

   private function get_jian_treated(){
        if(!is_login()||is_user_type()!=2){
            $this->error('非法访问，请企业用户登录');
        }
        $map = array(
            'cid'    => is_login(),
            'cj_status' => 1
            );

        $jian = D('cjian');

        $data = $jian->detailInfo($map);
  
        $order = 'id desc';
        $list = $jian -> getLists($map,5,$order);
        $page = $jian -> getPage($map,5,$order);

        $count = $jian->where($map)->count();
        $pageAll = ceil($count/5);
        $this->assign('treatedCount',$count);
        $this->assign('treatedAllPage',$pageAll);
        $this->assign('treatedList',$list);// 赋值数据集
        $this->assign('treatedPage',$page);
   }

    private function get_jian_reject(){
        if(!is_login()||is_user_type()!=2){
            $this->error('非法访问，请企业用户登录');
        }
        $map = array(
            'cid'    => is_login(),
            'cj_status' => 2
            );

        $jian = D('cjian');

        $data = $jian->detailInfo($map);
  
        $order = 'id desc';
        $list = $jian -> getLists($map,5,$order);
        $page = $jian -> getPage($map,5,$order);

        $count = $jian->where($map)->count();
        $pageAll = ceil($count/5);
        $this->assign('rejectCount',$count);
        $this->assign('rejectAllPage',$pageAll);
        $this->assign('rejectList',$list);// 赋值数据集
        $this->assign('rejectPage',$page);
   }

 
   /* 公司详情页 */
   public function company(){
        if(empty($_GET['id']) || $_GET['id'] == 0){
            $this->redirect('Index/index');
        }

        $id = (int)$_GET['id'];

        /* 导航 */
        $nav = D('Channel')->lists();
        $ce = array(
            'id' => 100,
            'title' => '公司详情',
            'url'   => 'home/user/company/id/'.$id
            );
        setCookie('dataId',$ce['id']);
        $nav1 = array($nav[0],$ce);
        $this->assign('nav',$nav1);

        /* 获取所有职位 */
        $map['uid'] = $id;
        $map['status'] = 1;
        $map['rocover'] = 1;
        $map['_string'] = 'deadline = 0 OR deadline > ' . NOW_TIME;
        $order = 'id desc';
        $document = D('document');
        $list = $document -> getLists($map,3,$order);
        $page = $document -> getPage($map,3,$order);
        $count = $document->where($map)->count();
        $pageAll = ceil($count/3);

        $this->assign('jobCount',$count);
        $this->assign('pageAll',$pageAll);
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$page);

        /* 企业用户信息 */
        $userInfo = $this->userDetail($id,2);
        if(empty($userInfo['id'])){
            $this->redirect('home/user/company/id/3');
        }
        $this->assign('userInfo', $userInfo);
        //var_dump($userInfo);exit;
        $this->display('user/company');
   }

   /* 回复 */
   public function replay(){
        if(!is_login()||is_user_type()!=2){
            $this->error('非法访问，请企业用户登录');
        }
        if(!IS_POST){
            $this->redirect('home/user/center');
        }
        $data = $_POST;
        $_POST['reply_time'] = time();
        $_POST['cj_status']  = 1;
        $_POST['ms_time']    = strtotime($data['ms_time']);
        $_POST['is_read']    = 1;

        $Cjian = D('Cjian');
        $list  = $Cjian->field('place,reply_time,ms_time,cj_status,content,is_read')->create();
        //var_dump($list);exit;
        if($Cjian->where(array('id'=>$data['id']))->save()){
            $return['status'] = 1;
            $return['info']   = '回复成功';
        }else{
            $return['status'] = 0;
            $return['info']   = '回复失败';
        }
        $this->ajaxReturn($return);
   }

   /* 拒绝 */
   public function reject(){
        if(!is_login()||is_user_type()!=2){
            $this->error('非法访问，请企业用户登录');
        }
        if(!IS_POST){
            $this->redirect('home/user/center');
        }
        $data = $_POST;
        $_POST['reply_time'] = time();
        $_POST['cj_status']  = 2;
        $_POST['is_read']    = 1;
        unset($_POST['ms_time']);
        unset($_POST['place']);

        $Cjian = D('Cjian');
        $list  = $Cjian->field('reply_time,cj_status,content,is_read')->create();
        //var_dump($list);exit;
        if($Cjian->where(array('id'=>$data['id']))->save()){
            $return['status'] = 1;
            $return['info']   = '回复成功';
        }else{
            $return['status'] = 0;
            $return['info']   = '回复失败';
        }
        $this->ajaxReturn($return);
   }

   /* 已读 */

   public function isRead(){
        if(!is_login()||is_user_type()!=2){
            $this->error('非法访问，请企业用户登录');
        }
        if(!IS_POST){
            $this->redirect('home/user/center');
        }
        $data = $_POST;
        $_POST['is_read']    = 1;
        $_POST['reply_time'] = time();

        $Cjian = D('Cjian');
        $list  = $Cjian->field('is_read,reply_time')->create();
        //var_dump($list);exit;
        if($Cjian->where(array('id'=>$data['id']))->save()){
            $return['status'] = 1;
            $return['info']   = '回复成功';
        }else{
            $return['status'] = 0;
            $return['info']   = '回复失败';
        }
        $this->ajaxReturn($return);
   }

}
