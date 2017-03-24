<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Home\Model;
use Think\Model;
use User\Api\UserUserApi;

/**
 * 文档基础模型
 */
class UserModel extends Model{

    /* 用户模型自动完成 */
    protected $_auto = array(
        array('login', 0, self::MODEL_INSERT),
        array('reg_ip', 'get_client_ip', self::MODEL_INSERT, 'function', 1),
        array('reg_time', NOW_TIME, self::MODEL_INSERT),
        array('last_login_ip', 0, self::MODEL_INSERT),
        array('last_login_time', 0, self::MODEL_INSERT),
        array('status', 1, self::MODEL_INSERT),
    );

    /**
     * 登录指定用户
     * @param  integer $uid 用户ID
     * @return boolean      ture-登录成功，false-登录失败
     */
    public function login($uid){
        /* 检测是否在当前应用注册 */
        session('user_type',1);
        $user = $this->field(true)->find($uid);
        if(!$user){ //未注册
            /* 在当前应用中注册用户 */
        	$Api = new UserUserApi();
        	$info = $Api->info($uid);
            $user = $this->create(array('nickname' => $info[1], 'status' => 1));
            $user['uid'] = $uid;
            if(!$this->add($user)){
                $this->error = '前台用户信息注册失败，请重试！';
                return false;
            }
        } elseif(1 != $user['status']) {
            $this->error = '用户未激活或已禁用！'; //应用级别禁用
            return false;
        }

        /* 登录用户 */
        $this->autoLogin($user);

        //记录行为
        action_log('user_login', 'user', $uid, $uid);

        return true;
    }

    /**
     * 注销当前用户
     * @return void
     */
    public function logout(){
        session('user_auth', null);
        session('user_auth_sign', null);
    }

    /**
     * 自动登录用户
     * @param  integer $user 用户信息数组
     */
    private function autoLogin($user){
        /* 更新登录信息 */
        $data = array(
            'uid'             => $user['uid'],
            'login'           => array('exp', '`login`+1'),
            'last_login_time' => NOW_TIME,
            'last_login_ip'   => get_client_ip(1),
        );
        $this->save($data);

        /* 记录登录SESSION和COOKIES */
        $auth = array(
            'type'            => 1,
            'uid'             => $user['uid'],
            'username'        => get_username($user['uid']),
            'last_login_time' => $user['last_login_time'],
            'nickname'        => get_nickname_now($user['uid']),
        );

        
        session('user_auth', $auth);
        session('user_auth_sign', data_auth_sign($auth));
    }

    public function updateUserFields($uid, $data){
        if(empty($uid)){
            $this->error = '参数错误！';
            return false;
        }
        //更新用户信息
        $data = $this->create($data);
        if($data){
            return $this->where(array('uid'=>$uid))->save($data);
        }
        return false;
    }

    public function updateCenterUserFields($id, $data){
        if(empty($id)){
            $this->error = '参数错误！';
            return false;
        }
        //更新用户信息
        
        $user = new UserUserApi();
        $model = $user->uModel();
        $data = $model->create($data);
        unset($data['password']);
        if($data){
            return $model->where(array('id'=>$id))->save($data);
        }
        return false;
    }

    /* 更新或新增u_base */
    public function updateBase(){

        /* 获取数据对象 */
        $base = M()->table('sql_u_base');

        $data = $base->field('status,display', true)->create();

      
        if(empty($data)){
            return false;
        }
       
        /* 添加或新增基础简历内容 */
        if(empty($data['id'])){ //新增数据
            $id = $base->add(); //添加基础内容

            if(!$id){
                $base->error = '添加基础内容出错！';
                return false;
            }
            $data['id'] = $id;
        } else { //更新数据
            $status = $base->save(); //更新基础内容
            if(false === $status){
                $base->error = '更新基础内容出错！';
                return false;
            }
        }

        //内容添加或更新完成
        return $data;
    }

    /* 更新或新增u_work */
    public function updateReAttach($sqlName = ''){

        if($sqlName == ''){
            return false;
        }
        /* 获取数据对象 */
        $base = M()->table($sqlName);

        $data = $base->field(true)->create();

      
        if(empty($data)){
            return false;
        }
        /* 添加或新增基础简历内容 */
        if(empty($data['id'])){ //新增数据
            $id = $base->add(); //添加基础内容

            if(!$id){
                $base->error = '添加基础内容出错！';
                return false;
            }
            $data['id'] = $id;
        } else { //更新数据
            $status = $base->save(); //更新基础内容
            if(false === $status){
                $base->error = '更新基础内容出错！';
                return false;
            }
        }

        //内容添加或更新完成
        return $data;
    }

    /* 更新或新增u_work */
    public function updateLike($sqlName = ''){

        if($sqlName == ''){
            return false;
        }
        /* 获取数据对象 */
        $base = M()->table($sqlName);

        $data = $base->field(true)->create();

      
        if(empty($data)){
            return false;
        }
        $map = array(
            'uid' => $_POST['uid'],
            'jid' => $_POST['jid']
            );
        
        //$data1 = $base->where($map)->find();
       
        /* 添加或新增基础简历内容 */
        if(empty($data['id'])){ //新增数据
            $id = $base->add(); //添加基础内容

            if(!$id){
                $base->error = '添加基础内容出错！';
                return false;
            }
            $data['id'] = $id;
        } else { //更新数据
            $status = $base->save(); //更新基础内容
            if(false === $status){
                $base->error = '更新基础内容出错！';
                return false;
            }
        }

        //内容添加或更新完成
        return $data;
    }

    public function updateStatus($uid = 0){

        /* 获取数据对象 */
        $base = M()->table('sql_u_base');

        if($uid == 0){
            $data = $base->field('id,status')->create();
            if(empty($data)){
                return false;
            }
            if(empty($data['id'])){ //新增数据
                $base->error = '设置默认失败';
            } else { //更新数据
                $status = $base->save(); //更新基础内容
                if(false === $status){
                    $base->error = '设置默认失败';
                    return false;
                }
            }
        }else{
            $data = $base->field('uid')->create();
            $base->where(array('uid' => $uid))->setField('status',0);
        }



        //内容添加或更新完成
        return $data;
    }


    public function baseInfo($uid = 0, $id = 0, $map = null){
        if($uid == 0){
            $uid = is_login();
        }
        $map['uid'] = $uid;
        if($id != 0){
            $map['id'] = $id;
        }

        $base = M()->table('sql_u_base');
        $data = $base->where($map)->select();
        return $data;
    }

    public function resumeAttachInfo($uid,$sql = '',$map = null){
        if($sql == ''){
            return false;
        }
        if($uid == 0){
            return false;
        }
        if($map == null){
            $map['uid'] = $uid;
        }
        $base = M()->table($sql);
        $data = $base->where($map)->select();
        return $data;
    }

    public function resumeAttachInfoById($id,$sql = '',$map = null){
        if($sql == ''){
            return false;
        }
        if($id == 0){
            return false;
        }
        if($map == null){
            $map['id'] = $id;
        }
        $base = M()->table($sql);
        $data = $base->where($map)->find();
        return $data;
    }

    public function resumeAttachCount($uid,$sql = '',$map = null){
        if($sql == ''){
            return false;
        }
        if($uid == 0){
            return false;
        }
        if($map == null){
            $map['uid'] = $uid;
        }
        $base = M()->table($sql);
        $data = $base->where($map)->count();
        return $data;
    }

     /* 关注收藏 */
    public function like($jid,$uid,$gid,$status){
        $like = M()->table('sql_u_like');
        $return = array();

        $map = array(
            'jid' => $jid,
            'uid' => $uid
            );

        $data = array(
            'status'    => $status,
            'like_time' => time()
            );



        if($like->where($map)->count() > 0){
            $like->where($map)->setField($data);
        }else{
            $_POST['uid'] = $uid;
            $_POST['jid'] = $jid;
            $_POST['gid'] = $gid;
            $_POST['status']=$status;
            $_POST['like_time'] = time();

            $id = $like->add($_POST);
            if(!$id){
                $return['status'] = 0;
                $return['info']   = '收藏失败';
                return $return;
            }
        }

        
        $return = array(
            'status' => 0,
            'info'   => '收藏成功'
            );

        return $return;

    }

}
