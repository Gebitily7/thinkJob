<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Home\Controller;
use User\Api\UserUserApi;

/**
 * 用户控制器
 * 包括用户中心，用户登录及注册
 */
class UserpController extends HomeController {

	private $likeCount;
	private $replyCount;
	private $jianCount;

	/* 用户中心首页 */
	public function index(){
		
	}

	/* 注册页面 */
	public function register($username = '', $password = '', $repassword = '', $email = '', $verify = ''){
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
            $user = new UserUserApi;
			$uid = $user->register($username, $password, $email);
			if(0 < $uid){ //注册成功
				//TODO: 发送验证邮件
				/* 登录用户 */
				$User = D('User');
				if($User->login($uid)){ //登录用户
					//TODO:跳转到登录前页面
					$this->success('登录成功！',U('Home/Index/index'));
				} else {
					$this->error('1',$User->getError());
				}
			} else { //注册失败，显示错误信息
				$this->error($this->showRegError($uid));
			}

		} else { //显示注册表单
			$this->display('User/register');
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
			$user = new UserUserApi;
			$uid = $user->login($username, $password);
			if(0 < $uid){ //UC登录成功
				/* 登录用户 */
				$User = D('User');
				if($User->login($uid)){ //登录用户
					//TODO:跳转到登录前页面
					$this->success('登录成功！',U('Home/Index/index'));
				} else {
					$this->error('1',$User->getError());
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
			$this->display('User\login');
		}
	}

	/* 退出登录 */
	public function logout(){
		if(is_login()){
			D('User')->logout();
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
			default:  $error = '未知错误';
		}
		return $error;
	}

	public function updateInfo(){
		if(!is_login()){	
			$this->redirect('{home/index/index}');
		}
		if(session('user_type') != 1){
			$this->error('当前用户没有权限访问该页面');
		}
		$id = is_login();
		if(IS_POST){
			$data = $_POST;
			if(!empty($data['birthday'])){
				$data1 = strtotime($data['birthday']);
    			$_POST['birthday'] = $data1;
			}
	        foreach ($data as $key => $value) {
	            if($value == ''){
	                $return['status'] = 0;
	                $return['info']   = $key.'不能为空';
	                $this->ajaxReturn($return);
	            }
	        }
	        $user = new UserUserApi;
	        $model = $user->uModel();
	        if($model->where('id = '.$id)->save($_POST)){
	            $return['status'] = 1;
	            $return['info']   = '提交成功，请等待';
	        }
	        $this->ajaxReturn($return);
		}
	}

    /**
     * 修改密码提交
     * @author huajie <banhuajie@163.com>
     */
    public function profile(){
		if ( !is_login() ) {
			$this->error( '您还没有登陆',U('User/login') );
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

            $Api = new UserUserApi();
            $res = $Api->updateInfo($uid, $password, $data);
            if($res['status']){
                $this->success('修改密码成功！');
            }else{
                $this->error($res['info']);
            }
        }else{
            $this->display('User/profile');
        }
    }

    /* 检测用户名的唯一性 */
    public function checkUserNameUnique(){
    	$name = I('post.username','');
    	/* 调用UC登录接口登录 */
		$user = new UserUserApi;
		$type = $user->checkUsername($name);
		$info = $this->showRegError($type);
		$data = array('type' => $type,'info'=>$info);
		$this->ajaxReturn($data);
    }
    public function checkPassword(){
    	$name = I('post.password','');
    	/* 调用UC登录接口登录 */
		$user = new UserUserApi;
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
		$user = new UserUserApi;
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


    /* 个人用户中心 */
    public function center(){

    	if ( !is_login()) {
			$this->error( '您还没有登陆',U('User/login') );
		}
		if(session('user_type') != 1){
			$this->error( '非法访问，请登录',U('User/login') );
		}

		$uid = is_login();

    	$nav = D('Channel')->lists();
    	$ce = array(
    		'id' => 101,
    		'title' => '个人中心',
    		'url'   => 'userp/center'
    		);
    	setCookie('dataId',$ce['id']);
    	$nav1 = array($nav[0],$ce);
    	$this->assign('nav',$nav1);

    	/* 用户信息 */
    	$user = M('user')->where('uid = '.$uid)->find();
    	/* 用户详细信息 */
    	$userInfo = $this->userDetail();
    	$this->assign('user',$user);
    	$this->assign('userInfo',$userInfo);
    	/* 技能标签 */
    	$label = parse_label($userInfo['skill']);
        $this->assign('label',json_encode($label));

        /* 左侧菜单的显示参数 */
        $this->assign('leftId',1);
        $this->uNum();

    	$this->display();
    }

    /* ajax提交信息并修改 */
    public function upUser(){
    	if ( !is_login()) {
			$this->error( '您还没有登陆',U('User/login') );
		}
		if(session('user_type') != 1){
			$this->error( '非法访问，请登录',U('User/login') );
		}
    	if(IS_POST){
    		$data = $_POST;
    		$uid = is_login();
    		$data = array(
    			$data['name'] => $data['val']
    			);

    		$user = D('user');
    		if($user->updateUserFields($uid,$data)){
    			$return['status'] = 1;
    			$return['info']   = '成功^-^';
    		}else{
    			$return['status'] = 1;
    			$return['info']   = '已上传';
    		}
    		$this->ajaxReturn($return);
    	}
    }

    /* 简历中心页 */
    public function resume(){
    	if ( !is_login()) {
			$this->error( '您还没有登陆',U('User/login') );
		}
		if(session('user_type') != 1){
			$this->error( '非法访问，请登录',U('User/login') );
		}

		$uid = is_login();

    	$nav = D('Channel')->lists();
    	$ce = array(
    		'id' => 102,
    		'title' => '简历中心',
    		'url'   => 'userp/center'
    		);
    	setCookie('dataId',$ce['id']);
    	$nav1 = array($nav[0],$ce);
    	$this->assign('nav',$nav1);

    	/* 用户信息 */
    	$User = D('user');

    	$user = $User->where('uid = '.$uid)->find();
    	/* 用户详细信息 */
    	$userInfo = $this->userDetail();
    	$this->assign('user',$user);
    	$this->assign('userInfo',$userInfo);
    	/* 技能标签 */
    	$label = parse_label($userInfo['skill']);
        $this->assign('label',json_encode($label));

        /* 获取简历个数 */
        $resumeCount = $this->resumeNum();
        $this->assign('resumeCount',$resumeCount);

        /* 获取用户简历列表信息 */
        $base = $User->baseInfo();
        $this->assign('base',$base);
        $this->uNum();

        /* 左侧菜单的显示参数 */
        $this->assign('leftId',2);
    	$this->display();
    }


    /* 刷新时间 */
    public function refresh(){
    	if ( !is_login()) {
			$this->error( '非法访问',U('User/login') );
		}
		if(session('user_type') != 1){
			$this->error( '非法访问，请登录',U('User/login') );
		}

		$uid = is_login();
		$data = null;
        /* 新增或更新简历 */
        $base = D('user');
        $time = time();
        $_POST['create_time'] = $time;

    	if($return = $base->updateBase()){
			// var_dump($_POST);exit;
			$data['status'] = 1;
    		$data['info']   = '更改成功';
    		$data['time']   = date('Y-m-d H:i:s',$time);
		}else{
			$data['status'] = 0;
    		$data['info']   = '更改失败';
    	}
    	$this->ajaxReturn($data);
    }

    /* 简历编辑页 */

    public function editresume(){
		if ( !is_login()) {
			$this->error( '您还没有登陆',U('User/login') );
		}
		if(session('user_type') != 1){
			$this->error( '非法访问，请登录',U('User/login') );
		}

		$uid = is_login();
		$jid = 0;

		if(empty($_GET['id'])){
			$this->redirect('home/userp/resume');
		}
		if(IS_GET){
			$jid = $_GET['id'];
		}

    	$nav = D('Channel')->lists();
    	$ce = array(
    		'id' => 102,
    		'title' => '简历中心',
    		'url'   => 'userp/center'
    		);
    	setCookie('dataId',$ce['id']);
    	$nav1 = array($nav[0],$ce);
    	$this->assign('nav',$nav1);

    	/* 用户信息 */
    	$User = D('user');
    	$user = $User->where('uid = '.$uid)->find();
    	/* 用户详细信息 */
    	$userInfo = $this->userDetail();
    	$this->assign('user',$user);
    	$this->assign('userInfo',$userInfo);
    	/* 技能标签 */
    	$label = parse_label($userInfo['skill']);
        $this->assign('label',json_encode($label));

        /* 基础简历信息 */
        $base = $User->baseInfo(0,$jid);
        $this->assign('base',$base[0]);

        $xid = $base[0]['id'];
        /* 工作经历信息 */
		$work = $User->resumeAttachInfo($xid,'sql_u_work');
		$this->assign('work',$work);
		$workNum = $this->uresumeNum($xid,'sql_u_work');
		$this->assign('workNum',$workNum);

		/* 教育经历 */
		$edu = $User->resumeAttachInfo($xid,'sql_u_edu');
		$this->assign('edu',$edu);
		$eduNum = $this->uresumeNum($xid,'sql_u_edu');
		$this->assign('eduNum',$eduNum);


		/* 项目经验 */
		$pro = $User->resumeAttachInfo($xid,'sql_u_project');
		$this->assign('pro',$pro);
		$proNum = $this->uresumeNum($xid,'sql_u_project');
		$this->assign('proNum',$proNum);

		/* 培训经历 */
		$train = $User->resumeAttachInfo($xid,'sql_u_train');
		$this->assign('train',$train);
		$trainNum = $this->uresumeNum($xid,'sql_u_train');
		$this->assign('trainNum',$trainNum);

		$this->uNum();

        /* 左侧菜单的显示参数 */
        $this->assign('leftId',2);
    	$this->display();
    }

    /* 添加或更新工作经历表 */
    public function updateWork(){
    	if ( !is_login()) {
			$this->error( '您还没有登陆',U('User/login') );
		}
		if(session('user_type') != 1){
			$this->error( '非法访问，请登录',U('User/login') );
		}

		$data = $_POST;
		$_POST['start_time'] = strtotime($data['start_time']);
		$_POST['end_time'] = strtotime($data['end_time']);

		/* 新增或更新简历 */
        $base = D('user');
        $count = $this->uresumeNum($_POST['uid'],'sql_u_work');
        if($count < 5){
        	if($return = $base->updateReAttach('sql_u_work')){
				// var_dump($_POST);exit;
				$data['status'] = 1;
	    		$data['info']   = '更改成功';
			}else{
				$data['status'] = 0;
	    		$data['info']   = '更改失败';
	    	}
        }else{
        	$data['status'] = 1;
	    	$data['info']   = '你已经添加了5个，超过限制数量';
        }    	
    	$this->ajaxReturn($data);
    }

    /* 添加或更新教育经历表 */
    public function updateEdu(){
    	if ( !is_login()) {
			$this->error( '您还没有登陆',U('User/login') );
		}
		if(session('user_type') != 1){
			$this->error( '非法访问，请登录',U('User/login') );
		}

		$data = $_POST;
		$_POST['start_time'] = strtotime($data['start_time']);
		$_POST['end_time'] = strtotime($data['end_time']);

		/* 新增或更新简历 */
        $base = D('user');
        $count = $this->uresumeNum($_POST['uid'],'sql_u_edu');
        if($count < 3){
        	if($return = $base->updateReAttach('sql_u_edu')){
				// var_dump($_POST);exit;
				$data['status'] = 1;
	    		$data['info']   = '更改成功';
			}else{
				$data['status'] = 0;
	    		$data['info']   = '更改失败';
	    	}
        }else{
        	$data['status'] = 1;
	    	$data['info']   = '你已经添加了5个，超过限制数量';
        }    	
    	$this->ajaxReturn($data);
    }

    /* 添加或更新项目经历表 */
    public function updatePro(){
    	if ( !is_login()) {
			$this->error( '您还没有登陆',U('User/login') );
		}
		if(session('user_type') != 1){
			$this->error( '非法访问，请登录',U('User/login') );
		}

		$data = $_POST;
		$_POST['start_time'] = strtotime($data['start_time']);
		$_POST['end_time'] = strtotime($data['end_time']);

		/* 新增或更新简历 */
        $base = D('user');
        $count = $this->uresumeNum($_POST['uid'],'sql_u_project');
        if($count < 5){
        	if($return = $base->updateReAttach('sql_u_project')){
				// var_dump($_POST);exit;
				$data['status'] = 1;
	    		$data['info']   = '更改成功';
			}else{
				$data['status'] = 0;
	    		$data['info']   = '更改失败';
	    	}
        }else{
        	$data['status'] = 1;
	    	$data['info']   = '你已经添加了5个，超过限制数量';
        }    	
    	$this->ajaxReturn($data);
    }

    /* 添加或更新培训经历表 */
    public function updateTrain(){
    	if ( !is_login()) {
			$this->error( '您还没有登陆',U('User/login') );
		}
		if(session('user_type') != 1){
			$this->error( '非法访问，请登录',U('User/login') );
		}

		$data = $_POST;
		$_POST['start_time'] = strtotime($data['start_time']);
		$_POST['end_time'] = strtotime($data['end_time']);

		/* 新增或更新简历 */
        $base = D('user');
        $count = $this->uresumeNum($_POST['uid'],'sql_u_train');
        if($count < 2){
        	if($return = $base->updateReAttach('sql_u_train')){
				// var_dump($_POST);exit;
				$data['status'] = 1;
	    		$data['info']   = '更改成功';
			}else{
				$data['status'] = 0;
	    		$data['info']   = '更改失败';
	    	}
        }else{
        	$data['status'] = 1;
	    	$data['info']   = '你已经添加了5个，超过限制数量';
        }    	
    	$this->ajaxReturn($data);
    }

    /* 添加基础建立列表页 */
    public function addBase(){
    	if ( !is_login()) {
			$this->error( '您还没有登陆',U('User/login') );
		}
		if(session('user_type') != 1){
			$this->error( '非法访问，请登录',U('User/login') );
		}

		$uid = is_login();

    	 /* 获取简历个数 */
        $resumeCount = $this->resumeNum();
        $this->assign('resumeCount',$resumeCount);
        /* 新增或更新简历 */
        $base = D('user');
        
        $data = null;
    	if($resumeCount < 5){
    		$_POST['uid']   = $uid;
    		$_POST['jname'] = '我的简历';
    		$_POST['create_time'] = time();
    		if($return = $base->updateBase()){
    			//var_dump($_POST);exit;
    			$data['status'] = 1;
    			$data['info']   = '新增成功';
    		}else{
    			$data['status'] = 0;
    			$data['info']   = '新增失败';
    		}
    	}
        $this->ajaxReturn($data);
    }

    /* 更新基础简历 */
    public function updateBase(){
    	if ( !is_login()) {
			$this->error( '非法访问',U('User/login') );
		}
		if(session('user_type') != 1){
			$this->error( '非法访问，请登录',U('User/login') );
		}

		$uid = is_login();
		$data = null;
        /* 新增或更新简历 */
        $base = D('user');
    	if($return = $base->updateBase()){
			// var_dump($_POST);exit;
			$data['status'] = 1;
    		$data['info']   = '更改成功';
		}else{
			$data['status'] = 0;
    		$data['info']   = '更改失败';
    	}
    	$this->ajaxReturn($data);
    }
    /* 设置默认简历 */
    public function setDefault(){
    	if ( !is_login()) {
			$this->error( '非法访问',U('User/login') );
		}
		if(session('user_type') != 1){
			$this->error( '非法访问，请登录',U('User/login') );
		}

		$uid = (int)is_login();
		
		$data = null;
        /* 新增或更新简历 */
        $base = D('user'); 
        $base->updateStatus($uid);
        //var_dump($_POST);exit;
    	if($return = $base->updateStatus()){
			$data['status'] = 1;
    		$data['info']   = '更改成功';
		}else{
			$data['status'] = 0;
    		$data['info']   = '更改失败';
    	}
    	$this->ajaxReturn($data);
    }

    /* 删除简历 */
    public function deleteById(){
    	if ( !is_login()) {
			$this->error( '非法访问',U('User/login') );
		}
		if(session('user_type') != 1){
			$this->error( '非法访问，请登录',U('User/login') );
		}
		$id = $_POST['id'];
		if(empty($id)){
			return false;
		}
		$map = array(
			'uid' => $id
			);
		$uid = (int)is_login();
		$return = array();
		M()->table('sql_u_project')->where($map)->delete();
		M()->table('sql_u_work')->where($map)->delete();
		M()->table('sql_u_train')->where($map)->delete();
		M()->table('sql_u_edu')->where($map)->delete();

		if(M()->table('sql_u_base')->where('id = '.$id)->delete()){
			$return['status'] = 1;
			$return['info']   = '删除成功';
		}else{
			$return['status'] = 0;
			$return['info']   = '删除失败';
		}

		$this->ajaxReturn($return);
    }

    /* 删除简历的小附件 */
    public function deleteEdit(){
    	if ( !is_login()) {
			$this->error( '非法访问',U('User/login') );
		}
		if(session('user_type') != 1){
			$this->error( '非法访问，请登录',U('User/login') );
		}
		$uid = (int)is_login();
		$return = array();
		$data = $_POST;
		$table = M()->table($data['sql']);
		if($table->where(array('id'=>$data['id']))->delete()){
			$return = array(
				'status' => 1,
				'info'   => '删除成功'
				);
		}else{
			$return = array(
				'status' => 0,
				'info'   => '删除失败'
				);
		}
		$this->ajaxReturn($return);
    }


    public function percent(){
    	if(!is_login()){
    		$this->redirect('User/login');
    	}
    	$id   = is_login();
    	$jid = $_POST['id'];
    	if(empty($jid)){
    		return false;
    	}
    	$User = D('user');
    	$count = 0;
    	$data1 = $this->userDetail();
    	foreach($data1 as $val){
    		if($val == ''){
    			$count++;
    		}
    	}
    	$data2 = $this->baseCount($jid);

    	$zi = 30 - $count;

    	$a = $zi/30;

    	$b = $data2/9;

    	$c = ($a + $b*2)/3;

    	$d = (int)($c*100);

    	$f = $d/100;

    	$this->ajaxReturn($f);
    }

    private function baseCount($uid=0){
    	if($uid == 0){
    		return false;
    	}
    	$User = D('user');
    	$data1 = $User->resumeAttachCount($uid,'sql_u_work');
    	$data2 = $User->resumeAttachCount($uid,'sql_u_project');
    	$data3 = $User->resumeAttachCount($uid,'sql_u_edu');
    	$data4 = $User->resumeAttachCount($uid,'sql_u_train');
    	return ($data1+$data2+$data3+$data4);
    }



    /* 获取简历个数 */
    private function resumeNum($uid = 0){
    	if($uid == 0){
    		$uid = is_login();
    	}
    	$count = M()->table('sql_u_base')->where('uid ='.$uid)->count();
    	return $count;
    }

    /* 获取简历的附件个数 */
    private function uresumeNum($uid = 0,$sql=''){
    	if($sql == ''){
    		return false;
    	}
    	$count = M()->table($sql)->where('uid ='.$uid)->count();
    	return $count;
    }

    /* 预览 */

    public function viewj(){
    	if ( !is_login()) {
			$this->error( '非法访问',U('User/login') );
		}
		if(session('user_type') != 1){
			$this->error( '非法访问，请登录',U('User/login') );
		}
    	$uid = is_login();
		$jid = 0;

		if(empty($_GET['id'])){
			$this->redirect('home/userp/resume');
		}
		if(IS_GET){
			$jid = $_GET['id'];
		}

    	$nav = D('Channel')->lists();
    	$ce = array(
    		'id' => 103,
    		'title' => '简历预览',
    		'url'   => 'userp/viewJ/id/'.$jid
    		);
    	setCookie('dataId',$ce['id']);
    	$nav1 = array($nav[0],$ce);
    	$this->assign('nav',$nav1);

    	/* 用户信息 */
    	$User = D('user');
    	$user = $User->where('uid = '.$uid)->find();
    	/* 用户详细信息 */
    	$userInfo = $this->userDetail();
    	$this->assign('user',$user);
    	$this->assign('userInfo',$userInfo);
    	/* 技能标签 */
    	$label = parse_label($userInfo['skill']);
        $this->assign('label',json_encode($label));

        /* 基础简历信息 */
        $base = $User->baseInfo(0,$jid);
        $this->assign('base',$base[0]);

        $xid = $base[0]['id'];
        /* 工作经历信息 */
		$work = $User->resumeAttachInfo($xid,'sql_u_work');
		$this->assign('work',$work);
		$workNum = $this->uresumeNum($xid,'sql_u_work');
		$this->assign('workNum',$workNum);

		/* 教育经历 */
		$edu = $User->resumeAttachInfo($xid,'sql_u_edu');
		$this->assign('edu',$edu);
		$eduNum = $this->uresumeNum($xid,'sql_u_edu');
		$this->assign('eduNum',$eduNum);


		/* 项目经验 */
		$pro = $User->resumeAttachInfo($xid,'sql_u_project');
		$this->assign('pro',$pro);
		$proNum = $this->uresumeNum($xid,'sql_u_project');
		$this->assign('proNum',$proNum);

		/* 培训经历 */
		$train = $User->resumeAttachInfo($xid,'sql_u_train');
		$this->assign('train',$train);
		$trainNum = $this->uresumeNum($xid,'sql_u_train');
		$this->assign('trainNum',$trainNum);

    	$this->display();
    }

    /* 公司预览 */
     /* 预览 */

    public function gsview(){
    	if ( !is_login()) {
			$this->error( '非法访问',U('User/login') );
		}
		if(session('user_type') != 2){
			$this->error( '非法访问，请登录',U('User/login') );
		}

		if(empty($_GET['id'])){
			$this->redirect('home/userp/resume');
		}
		if(IS_GET){
			$uid = $_GET['uid'];
			$jid = $_GET['id'];
		}

    	$nav = D('Channel')->lists();
    	$ce = array(
    		'id' => 103,
    		'title' => '简历预览',
    		'url'   => 'userp/viewJ/id/'.$jid
    		);
    	setCookie('dataId',$ce['id']);
    	$nav1 = array($nav[0],$ce);
    	$this->assign('nav',$nav1);

    	/* 用户信息 */
    	$User = D('user');
    	$user = $User->where('uid = '.$uid)->find();
    	/* 用户详细信息 */
    	$userInfo = $this->userDetail($uid,1);
    	$this->assign('user',$user);
    	$this->assign('userInfo',$userInfo);
    	/* 技能标签 */
    	$label = parse_label($userInfo['skill']);
        $this->assign('label',json_encode($label));

        /* 基础简历信息 */
        $base = $User->baseInfo($uid,$jid);
        $this->assign('base',$base[0]);

        $xid = $base[0]['id'];
        /* 工作经历信息 */
		$work = $User->resumeAttachInfo($xid,'sql_u_work');
		$this->assign('work',$work);
		$workNum = $this->uresumeNum($xid,'sql_u_work');
		$this->assign('workNum',$workNum);

		/* 教育经历 */
		$edu = $User->resumeAttachInfo($xid,'sql_u_edu');
		$this->assign('edu',$edu);
		$eduNum = $this->uresumeNum($xid,'sql_u_edu');
		$this->assign('eduNum',$eduNum);


		/* 项目经验 */
		$pro = $User->resumeAttachInfo($xid,'sql_u_project');
		$this->assign('pro',$pro);
		$proNum = $this->uresumeNum($xid,'sql_u_project');
		$this->assign('proNum',$proNum);

		/* 培训经历 */
		$train = $User->resumeAttachInfo($xid,'sql_u_train');
		$this->assign('train',$train);
		$trainNum = $this->uresumeNum($xid,'sql_u_train');
		$this->assign('trainNum',$trainNum);

    	$this->display('viewj');
    }


    /* 进展 */
    public function progress(){
    	if ( !is_login()) {
			$this->error( '您还没有登陆',U('User/login') );
		}
		if(session('user_type') != 1){
			$this->error( '非法访问，请登录',U('User/login') );
		}

		$uid = is_login();
		$jid = 0;

    	$nav = D('Channel')->lists();
    	$ce = array(
    		'id' => 103,
    		'title' => '求职进展',
    		'url'   => 'userp/progress'
    		);
    	setCookie('dataId',$ce['id']);
    	$nav1 = array($nav[0],$ce);
    	$this->assign('nav',$nav1);

    	/* 用户信息 */
    	$User = D('user');
    	$user = $User->where('uid = '.$uid)->find();
    	/* 用户详细信息 */
    	$userInfo = $this->userDetail();
    	$this->assign('user',$user);
    	$this->assign('userInfo',$userInfo);

    	$this->get_jian_all();
    	$this->get_jian_read();
    	$this->get_jian_treated();
    	$this->get_jian_reject();
    	$this->uNum();

    	/* 左侧菜单的显示参数 */
        $this->assign('leftId',3);
    	$this->display();
    }


    /* 关注和收藏的职位 */
    public function collect(){
    	if ( !is_login()) {
			$this->error( '您还没有登陆',U('User/login') );
		}
		if(session('user_type') != 1){
			$this->error( '非法访问，请登录',U('User/login') );
		}

		$uid = is_login();
		$jid = 0;

    	$nav = D('Channel')->lists();
    	$ce = array(
    		'id' => 104,
    		'title' => '我的收藏',
    		'url'   => 'userp/progress'
    		);
    	setCookie('dataId',$ce['id']);
    	$nav1 = array($nav[0],$ce);
    	$this->assign('nav',$nav1);

    	/* 用户信息 */
    	$User = D('user');
    	$user = $User->where('uid = '.$uid)->find();
    	/* 用户详细信息 */
    	$userInfo = $this->userDetail();
    	$this->assign('user',$user);
    	$this->assign('userInfo',$userInfo);

    	$this->get_like();
    	$this->uNum();

    	/* 左侧菜单的显示参数 */
        $this->assign('leftId',4);
    	$this->display();

    }


    /* 账号设置 */

    public function setting(){
    	if ( !is_login()) {
			$this->error( '您还没有登陆',U('User/login') );
		}
		if(session('user_type') != 1){
			$this->error( '非法访问，请登录',U('User/login') );
		}

		$uid = is_login();
		$jid = 0;

    	$nav = D('Channel')->lists();
    	$ce = array(
    		'id' => 105,
    		'title' => '账号设置',
    		'url'   => 'userp/setting'
    		);
    	setCookie('dataId',$ce['id']);
    	$nav1 = array($nav[0],$ce);
    	$this->assign('nav',$nav1);

    	$this->uNum();

    	/* 用户信息 */
    	$User = D('user');
    	$user = $User->where('uid = '.$uid)->find();
    	/* 用户详细信息 */
    	$userInfo = $this->userDetail();
    	$this->assign('user',$user);
    	$this->assign('userInfo',$userInfo);

    	/* 左侧菜单的显示参数 */
        $this->assign('leftId',5);



    	$this->display();
    }


    public function mod(){
    	if ( !is_login()) {
			$this->error( '您还没有登陆',U('User/login') );
		}
		if(session('user_type') != 1){
			$this->error( '非法访问，请登录',U('User/login') );
		}
		$uid = is_login();
		$data = $_POST;
		$return = array();
		foreach($data as $k => $v){
			if(empty($v)){
				if($k == 'nickname'){
					$return = array(
						'status' => 1,
						'info'   => '昵称不能为空'
						);
					$this->ajaxReturn($return);
				}else{
					$return = array(
						'status' => 1,
						'info'   => '帐号不能为空'
						);
					$this->ajaxReturn($return);
				}
			}
		}
		$user = D('user');
		if($user->updateUserFields($data['id'],array('nickname' =>$data['nickname']))){
			$return['status'] = 1;
			$return['info']   = '更改成功';
		}
		if($user->updateCenterUserFields($data['id'],array('username' =>$data['username']))){
			$return['status'] = 1;
			$return['info']   = '更改成功';
		}
		$this->ajaxReturn($return);
    }

    private function get_jian_all(){
        if(!is_login()||is_user_type()!=1){
            $this->error('非法访问，请企业用户登录');
        }
        $map['uid'] = is_login();


        $jian = D('cjian');
        $data = $jian->detailInfo($map['uid']);
  		
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

   private function get_jian_read(){
        if(!is_login()||is_user_type()!=1){
            $this->error('非法访问，请企业用户登录');
        }
        $map = array(
            'uid'    => is_login(),
            'is_read' => 1
            );

        $jian = D('cjian');

        $data = $jian->detailInfo($map);
  
        $order = 'id desc';
        $list = $jian -> getLists($map,5,$order);
        $page = $jian -> getPage($map,5,$order);

        $count = $jian->where($map)->count();
        $pageAll = ceil($count/5);
        $this->assign('readCount',$count);
        $this->assign('readAllPage',$pageAll);
        $this->assign('readList',$list);// 赋值数据集
        $this->assign('readPage',$page);
   }

   private function get_jian_treated(){
        if(!is_login()||is_user_type()!=1){
            $this->error('非法访问，请企业用户登录');
        }
        $map = array(
            'uid'    => is_login(),
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
        if(!is_login()||is_user_type()!=1){
            $this->error('非法访问，请企业用户登录');
        }
        $map = array(
            'uid'    => is_login(),
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

   private function uNum(){
   		$uid = is_login();
   		$map1 = array(
            'uid'    => $uid,
            'cj_status' => 1
            );
   		$map2 = array(
   			'uid' => $uid,
   			);
   		$jian = D('cjian');

   		$like = M()->table('sql_u_like');

   		$count3 = $like->where(array('uid'=>$uid,'status'=>1))->count();
   		$this->assign('likeNum1',$count3);

   		$count1 = $jian->where($map1)->count();

   		$count2 = $jian->where($map2)->count();

   		$this->assign('treatedCount1',$count1);
   		$this->assign('resumeCount1',$count2);

   }


   /* 关注收藏 */
   public function ulike(){
   		if(!is_login()||is_user_type()!=1){
            $return = array(
            	'status' => '0',
            	'info'   => '你还没有登录'
            	);
        }

        $data = $_POST;
		$_POST['like_time'] = time();
		$_POST['uid']       = is_login();

		/* 新增或更新简历 */
        $base = D('user');
        //$count = $this->uresumeNum($_POST['uid'],'sql_u_like');
        
        $info = M()->table('sql_u_like')->where(array('uid'=>$_POST['uid'],'jid'=>$_POST['jid']))->find();
        
        $_POST['id'] = $info['id'];

    	if($return = $base->updateLike('sql_u_like')){
			// var_dump($_POST);exit;
			$data['status'] = 1;
    		$data['info']   = '更改成功';
		}else{
			$data['status'] = 0;
    		$data['info']   = '更改失败';
    	}
      	
    	$this->ajaxReturn($data);
   }


 
   /* 发送 */
   public function usend(){
   		if(!is_login()||is_user_type()!=1){
            $this->error('非法访问，请企业用户登录');
        }
        $map = array(
            'uid'    => is_login(),
            'status' => 1
            );
        $base = M()->table('sql_u_base')->where($map)->find();

        if(empty($base['id'])){
        	$base = M()->table('sql_u_base')->where('uid ='.$map['uid'])->order('create_time desc')->find();
        }
        $jian_id = $base['id'];
        $uid = is_login();
       
        $map1 = array(
        		'uid' => $uid,
        		'jid' => $_POST['jid']
        	);
        $data = $_POST;

        $jian = D('cjian');
        $_POST['uid']  = $uid;
        $_POST['jid']  = $data['jid'];
        $_POST['jian_id'] = $jian_id;
        $_POST['create_time'] = time();
        $_POST['is_send']  = 1;
        var_dump($map1);


   		$data = $jian->where($map1)->find();
   		var_dump($data['id']);
   		if(!empty($data['id'])){
   			$jian->where('id ='.$data['id'])->setField('is_send',1);
   		}else{		
   			$data = $jian->field(true)->create();
   			$id = $jian->add();
   			if(!$id){
                $base->error = '添加基础内容出错！';
            }
            $jian->where('id ='.$id)->setField('uid',$uid);
   		}

   		$this->ajaxReturn();
   }

   private function get_like(){
   		if(!is_login()||is_user_type()!=1){
            $this->error('非法访问，请企业用户登录');
        }
        $map = array(
            'uid'    => is_login(),
            'status' => 1
            );

        $jian = D('cjian');

        //$data = $jian->likeDetail($map);
  		

        $order = 'id desc';
        $list = $jian -> getLikes($map,5,$order);
        $page = $jian -> getLike($map,5,$order);
        $count = M()->table('sql_u_like')->where($map)->count();
        $pageAll = ceil($count/5);
        $this->assign('likeCount',$count);
        $this->assign('likeAllPage',$pageAll);
        $this->assign('likeList',$list);// 赋值数据集
        $this->assign('likePage',$page);
        // var_dump($list);exit;
   }

   public function qxsc(){
   	 	if(!is_login()||is_user_type()!=1){
            $this->error('非法访问，请企业用户登录');
        }
        $id = $_POST['id'];
        $status = $_POST['status'];
        if(M()->table('sql_u_like')->where('id ='.$id)->setField('status',$status)){
        	$return['status'] = 1;
        	$return['info']   = '成功';
        }
        $this->ajaxReturn($return);  
    }

}
