<?php 
namespace Home\Model;
use Think\Model;
use Think\Page;
use User\Api\UserApi;
use User\Api\UserUserApi;

/**
 * 企业收到简历基础模型
 */
class CjianModel extends Model{

/* 自动完成规则 */
    protected $_auto = array(
        array('uid', 'session', self::MODEL_INSERT, 'function', 'user_auth.uid'),
        array('is_read', 0, self::MODEL_INSERT),
        array('status', 0, self::MODEL_INSERT),
        array('create_time', NOW_TIME, self::MODEL_INSERT),
    );

     /**
     * [getListNum 根据条件查询已有数据条数]
     * @param  [type] $filed [条件]
     * @return [type]        [数字]
     */
    public function getListNum($filed=null){
        if(empty($filed)){
            return "参数错误";
        }
        $map = $filed;
        return $this->where($map)->count('id');
    }

    /**
     * 获取详情页数据
     * @param  integer $id 文档ID
     * @return array       详细数据
     */
    public function detail($id){
        /* 获取基础数据 */
        $info = $this->field(true)->find($id);
        if ( !$info ) {
            $this->error = '文档不存在';
            return false;
        }elseif(!(is_array($info))){
            $this->error = '文档被禁用或已删除！';
            return false;
        }
        
        $user = $this->userDetailc($info['uid'],'uname,phone,email,sex,birthday,present_addr,max_edu,skill,work_experience');

        $company = $this->userDetailc($info['cid'],'c_name,c_range,industry,step,c_label',2);
        $document = D('document');

        $data = $document->detail($info['jid']);

        $job = array(
        	'title'     => $data['title'],
        	'iscate'    => $data['iscate'],
        	'work_place'=> $data['work_place'],
        	'job_skill' => $data['skill'],
        	'work_time' => $data['work_time'],
        	'y_experience' => $data['work_experience'],
        	'salary'       => $data['salary'],
        	'salary_range' => $data['salary_range'],
        	'academic_career' => $data['academic_career'],
        	'phone'           => $data['phone'],
        	'phone_num'       => $data['phone_num'],
        	'update_time'     => $data['update_time'],
        	'deadline'        => $data['deadline'],
        	'settle_type'     => $data['settle_type']
        	);

        return array_merge($info,$user,$company,$job);

        //return $info;
    }

    /* 根据uid获取所有数据 */
    public function detailInfo($uid = 0,$iscate = 0){
        /* 获取基础数据 */
        if(is_user_type() == 1){
        	if($uid != 0 && is_numeric($uid)){
	            $map['uid'] = $uid;
	        }
        }elseif(is_user_type() == 2){
        	if($uid != 0 && is_numeric($uid)){
	            $map['cid'] = $uid;
	        }
        }else{
        	return false;
        }
        $info = $this->where($map)->field('id')->select();

        $data = [];

        foreach($info as $v){
            $data[$v['id']] = $this->detail($v['id']);
        }
        return $data;
    }

    public function listInfo($map,$count,$listrows,$order){
        $Page= new \Think\Page($count,$listrows);
        $info=$this->where($map)->order($order)->field('id')->limit($Page->firstRow.','.$Page->listRows)->select();
        $data = [];

        foreach($info as $v){
            $data[$v['id']] = $this->detail($v['id']);
        }
        return $data;
    }

    public function getLists($map,$listrows,$order){   

        $count=$this->where($map)->count();
                
        $list=$this->listInfo($map,$count,$listrows,$order);
        return $list;
    }
    public function getPage($map,$listrows,$order){           
        $count=$this->where($map)->count();
        $Page= new \Think\Page($count,$listrows);
        $Page->setConfig('prev','上一页');
        $Page->setConfig('next','下一页');
        $Page->setConfig('first','第一页');
        $Page->setConfig('last','尾页');
        $Page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
        $show= $Page->show();       
        return $show;
    }





    /* 登陆的获取用户字段信息 */
    protected function userDetailc($uid = 0,$field,$type = 1){
    	/* 不穿参数的情况下获取登录用户的信息 */
    	if(is_login() && $uid == 0){

    		//$uid = is_login();

    		if($type == 2){
	           $user = new UserApi;
	            return $user->infoDetailc($uid,$field); 
	        }elseif($type == 1){
	            $user = new UserUserApi;
	            return $user->infoDetailc($uid,$field);
	        }else{
	            return 0;
        	}
    	}else{
    		if($type == 2){
	           $user = new UserApi;
	            return $user->infoDetailc($uid,$field); 
	        }elseif($type == 1){
	            $user = new UserUserApi;
	            return $user->infoDetailc($uid,$field);
	        }else{
	            return 0;
        	}
    	}
        
    }


   public function likeDetail($id){
   	/* 获取基础数据 */
        $info = M()->table('sql_u_like')->field(true)->find($id);
        if ( !$info ) {
            $this->error = '文档不存在';
            return false;
        }elseif(!(is_array($info))){
            $this->error = '文档被禁用或已删除！';
            return false;
        }
        
        $user = $this->userDetailc($info['uid'],'uname,phone,email,sex,birthday,present_addr,max_edu,skill,work_experience');

        $company = $this->userDetailc($info['gid'],'c_name,c_range,industry,step,c_label',2);
        $document = D('document');

        $data = $document->detail($info['jid']);

        $job = array(
        	'title'     => $data['title'],
        	'iscate'    => $data['iscate'],
        	'work_place'=> $data['work_place'],
        	'job_skill' => $data['skill'],
        	'work_time' => $data['work_time'],
        	'y_experience' => $data['work_experience'],
        	'salary'       => $data['salary'],
        	'salary_range' => $data['salary_range'],
        	'academic_career' => $data['academic_career'],
        	'phone'           => $data['phone'],
        	'update_time'     => $data['update_time'],
        	'deadline'        => $data['deadline'],
        	'settle_type'     => $data['settle_type'],
        	'update_time'     => $data['update_time'],
        	'linkman_phone'   => $data['linkman_phone']
         	);

        return array_merge($info,$user,$company,$job);
   }

   public function likeInfo($map,$count,$listrows,$order){
   		$Page= new \Think\Page($count,$listrows);
        $info=M()->table('sql_u_like')->where($map)->order($order)->field('id')->limit($Page->firstRow.','.$Page->listRows)->select();
        $data = [];

        foreach($info as $v){
            $data[$v['id']] = $this->likeDetail($v['id']);
        }
        return $data;
   }
    public function getLikes($map,$listrows,$order){   

        $count=M()->table('sql_u_like')->where($map)->count();
             
        $list=$this->likeInfo($map,$count,$listrows,$order);
        return $list;
    }
    public function getLike($map,$listrows,$order){           
        $count=$this->where($map)->count();
        $Page= new \Think\Page($count,$listrows);
        $Page->setConfig('prev','上一页');
        $Page->setConfig('next','下一页');
        $Page->setConfig('first','第一页');
        $Page->setConfig('last','尾页');
        $Page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
        $show= $Page->show();       
        return $show;
    }

}




 ?>