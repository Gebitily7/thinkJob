<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace User\Api;
use User\Api\Api;
use User\Model\UcenterMemberModel;

class UserApi extends Api{
    /**
     * 构造方法，实例化操作模型
     */
    protected $view = null;
    protected function _init(){
        $this->model = new UcenterMemberModel();
    }

    /**
     * 注册一个新用户
     * @param  string $username 用户名
     * @param  string $password 用户密码
     * @param  string $email    用户邮箱
     * @param  string $mobile   用户手机号码
     * @return integer          注册成功-用户信息，注册失败-错误编号
     */
    public function register($username, $password, $email, $c_name, $mobile = ''){
        return $this->model->register($username, $password, $email, $c_name, $mobile);
    }

    /**
     * 用户登录认证
     * @param  string  $username 用户名
     * @param  string  $password 用户密码
     * @param  integer $type     用户名类型 （1-用户名，2-邮箱，3-手机，4-UID）
     * @return integer           登录成功-用户ID，登录失败-错误编号
     */
    public function login($username, $password, $type = 1){
        return $this->model->login($username, $password, $type);
    }

    /**
     * 获取用户信息
     * @param  string  $uid         用户ID或用户名
     * @param  boolean $is_username 是否使用用户名查询
     * @return array                用户信息
     */
    public function info($uid, $is_username = false){
        return $this->model->info($uid, $is_username);
    }
    /* 根据id获取用户信息 */
    public function infoDetail($uid, $is_username = false){
        return $this->model->infoDetail($uid, $is_username);
    }
     /* 根据id获取用户信息 */
    public function infoDetailc($uid, $field, $is_username = false){
        return $this->model->infoDetailc($uid, $field, $is_username);
    }
    /**
     * 检测用户名
     * @param  string  $field  用户名
     * @return integer         错误编号
     */
    public function checkUsername($username){
        return $this->model->checkField($username, 1);
    }

    /**
     * 检测邮箱
     * @param  string  $email  邮箱
     * @return integer         错误编号
     */
    public function checkEmail($email){
        return $this->model->checkField($email, 2);
    }

    /**
     * 检测手机
     * @param  string  $mobile  手机
     * @return integer         错误编号
     */
    public function checkMobile($mobile){
        return $this->model->checkField($mobile, 3);
    }

    public function checkPassword($password){
        return $this->model->checkField($password, 4);
    }

    public function checkCname($Cname){
        return $this->model->checkField($Cname, 5);
    }

    /**
     * 更新用户信息
     * @param int $uid 用户id
     * @param string $password 密码，用来验证
     * @param array $data 修改的字段数组
     * @return true 修改成功，false 修改失败
     * @author huajie <banhuajie@163.com>
     */
    public function updateInfo($uid, $password, $data){
        if($this->model->updateUserFields($uid, $password, $data) !== false){
            $return['status'] = true;
        }else{
            $return['status'] = false;
            $return['info'] = $this->model->getError();
        }
        return $return;
    }


    /**
     * [updateCompany 更新企业用户的企业管理的信息]
     * @param  [type] $uid  [description]
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public function updateCompany($uid, $data){
        if($this->model->updateCompanyFields($uid, $data) !== false){
            $return['status'] = true;
            $return['info']   = "成功^-^";
        }else{
            $return['status'] = false;
            $return['info'] = $this->model->getError();
        }
        return $return;
    }


    /**/
    public function userLists($id,$map,$field){
        return $this->model->infoLists($id,$map,$field);
    }

    public function uModel(){
        return $this->model;
    } 

    

    public function infoLists($id = 0, $map, $field = true){
        $map['identify'] = $id;
        $map['status']   = 1;
        $user = $this->where($map)->field($field)->select();
        if(is_array($user)){
            return $user;
        }
    }

    protected function assign($name,$value='') {
        $this->view->assign($name,$value);
        return $this;
    }
}
