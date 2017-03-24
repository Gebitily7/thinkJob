<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Home\Controller;
use Think\Controller;
use User\Api\UserApi;
use User\Api\UserUserApi;
/**
 * 前台公共控制器
 * 为防止多分组Controller名称冲突，公共Controller名称统一使用分组名称
 */
class HomeController extends Controller {

	public $ParentCate = array();

	/* 空操作，用于输出404页面 */
	public function _empty(){
		$this->redirect('Index/index');
	}

	protected function getHead($id, $field = true, $ismenu){
		//echo $id;
		$category = D('Category')->getTree($id, $field, $ismenu);
        return $category;
	}

    protected function _initialize(){
        /* 读取站点配置 */
        $config = api('Config/lists');
        C($config); //添加配置

        if(!C('WEB_SITE_CLOSE')){
            $this->error('站点已经关闭，请稍后访问~');
        }
    }

	/* 用户登录检测 */
	protected function login(){
		/* 用户登录检测 */
		is_login() || $this->error('您还没有登录，请先登录！', U('User/login'));
	}

	/**
	 * [getCate 获取所有链式路径]
	 * @param  [type] $id  [本id]
	 * @param  [type] $pid [父id]
	 * @return [type]      [结果集数组]
	 */
	protected function getCate($id=null,$pid){
		if($id == null){
			$this->error('没有指定文档分类！');
		}
		$cate = D('Category')->where('id='.$id)->select();
		$this->ParentCate[] = $cate;
		if($cate[0]['pid'] != 0){
			$this->getCate($cate[0]['pid']);
		}
		sort($this->ParentCate);
		return $this->ParentCate;
	}

	/* 登陆的获取用户字段信息 */
    protected function userDetail($uid = 0,$type = 2){
    	/* 不穿参数的情况下获取登录用户的信息 */
    	if(is_login() && $uid == 0){

    		$uid = is_login();

    		if(session('user_auth.type') == 2){
	           $user = new UserApi;
	            return $user->infoDetail($uid); 
	        }elseif(session('user_auth.type') == 1){
	            $user = new UserUserApi;
	            $userBase = D('user')->where('uid = '.$uid)->find();
	            $userDetail = $user->infoDetail($uid);
	            return array_merge($userBase,$userDetail);
	        }else{
	            return 0;
        	}
    	}else{
    		if($type == 2){
	           $user = new UserApi;
	            return $user->infoDetail($uid); 
	        }elseif($type == 1){
	            $user = new UserUserApi;
	            $userBase = D('user')->where('uid = '.$uid)->find();
	            $userDetail = $user->infoDetail($uid);
	            return array_merge($userBase,$userDetail);
	        }else{
	            return 0;
        	}
    	}
        
    }

	protected function get_job($uid,$iscate){
		$document = D('document');
		$data = $document->detailInfo($uid,$iscate);
		return $data;
	}

	/**/
	
}
