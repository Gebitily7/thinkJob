<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Admin\Controller;
use User\Api\UserApi;

/**
 * 后台用户控制器
 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
 */
class UserController extends AdminController {

    /**
     * 用户管理首页
     * @author 麦当苗儿 <zuojiazi@vip.qq.com>
     */
    public function index(){
        $nickname       =   I('nickname');
        $map['status']  =   array('egt',0);
        if(is_numeric($nickname)){
            $map['uid|nickname']=   array(intval($nickname),array('like','%'.$nickname.'%'),'_multi'=>true);
        }else{
            $map['nickname']    =   array('like', '%'.(string)$nickname.'%');
        }

        $list   = $this->lists('Member', $map);
        int_to_string($list);
        $this->assign('_list', $list);
        $this->meta_title = '用户信息';
        $this->display();
    }

    /* 企业认证 */
    public function identify(){
        $REQUEST    =   (array)I('request.');
        $order = '';
        if(IS_GET){
            $id = (int)I('id');
            $name = I('name');
            if(!is_numeric($id)){
                $this->error('参数非法');
            }
            $map['identify'] = $id;
            if(is_numeric($nickname)){
                $map['id|c_name']=   array(intval($name),array('like','%'.$name.'%'),'_multi'=>true);
            }else{
                $map['c_name']    =   array('like', '%'.(string)$name.'%');
            }
            $field = 'id,c_name,c_range,industry,corporation,last_login_ip,c_place_detail,licence,identify,identity_x,identity_y,identity_num';
            $list = $this->ulists($map,$REQUEST,$order,$field);
            int_to_string($list);
            $this->assign('_list', $list);
            if($id == 0){
                $this->assign('title_name', '未认证');
            }elseif($id == 1){
                $this->assign('title_name', '新认证');
            }elseif($id == 2){
                $this->assign('title_name', '已认证');
            }elseif($id == 3){
                $this->assign('title_name', '认证失败');
            }
            $this->assign('id',$id);
        }
        
        $this->display();
    }

    /* 编写企业user的字段 */
    final protected function editUserRow ( $model ,$data, $where , $msg ){
        $id    = array_unique((array)I('id',0));
        $id    = is_array($id) ? implode(',',$id) : $id;
        //如存在id字段，则加入该条件
        $user = new UserApi();
        $model = $user->uModel();
        $fields = $model->getDbFields();
        if(in_array('id',$fields) && !empty($id)){
            $where = array_merge( array('id' => array('in', $id )) ,(array)$where );
        }

        $msg   = array_merge( array( 'success'=>'操作成功！', 'error'=>'操作失败！', 'url'=>'' ,'ajax'=>IS_AJAX) , (array)$msg );
        if( $model->where($where)->save($data)!==false ) {
            $this->success($msg['success'],$msg['url'],$msg['ajax']);
        }else{
            $this->error($msg['error'],$msg['url'],$msg['ajax']);
        }
    }

    /**
     * 企业认证未通过
     * @param string $model 模型名称,供D函数使用的参数
     * @param array  $where 查询时的 where()方法的参数
     * @param array  $msg   执行正确和错误的消息,可以设置四个元素 array('success'=>'','error'=>'', 'url'=>'','ajax'=>false)
     *                     url为跳转页面,ajax是否ajax方式(数字则为倒数计时秒数)
     *
     * @author 葛小哨  <zhuyajie@topthink.net>
     */
    protected function unsanctioned ( $model , $where = array() , $msg = array( 'success'=>'状态未通过成功！', 'error'=>'状态未通过失败！')){
        $data    =  array('identify' => 3);
        $this->editUserRow( $model , $data, $where, $msg);
    }

    /**
     * 通过
     * @param string $model 模型名称,供D函数使用的参数
     * @param array  $where 查询时的where()方法的参数
     * @param array  $msg   执行正确和错误的消息 array('success'=>'','error'=>'', 'url'=>'','ajax'=>false)
     *                     url为跳转页面,ajax是否ajax方式(数字则为倒数计时秒数)
     *
     * @author 葛小哨  <zhuyajie@topthink.net>
     */
    protected function sanctioned (  $model , $where = array() , $msg = array( 'success'=>'认证通过！', 'error'=>'认证通过失败！')){
        $data    =  array('identify' => 2);
        $this->editUserRow(   $model , $data, $where, $msg);
    }

    /**
     * 恢复通过
     * @param string $model 模型名称,供D函数使用的参数
     * @param array  $where 查询时的where()方法的参数
     * @param array  $msg   执行正确和错误的消息 array('success'=>'','error'=>'', 'url'=>'','ajax'=>false)
     *                     url为跳转页面,ajax是否ajax方式(数字则为倒数计时秒数)
     *
     * @author 葛小哨  <zhuyajie@topthink.net>
     */
    protected function resanctioned (  $model , $where = array() , $msg = array( 'success'=>'认证通过！', 'error'=>'认证通过失败！')){
        $data    =  array('identify' => 0);
        $this->editUserRow(   $model , $data, $where, $msg);
    }

    /**
     * 设为热门
     * @param string $model 模型名称,供D函数使用的参数
     * @param array  $where 查询时的where()方法的参数
     * @param array  $msg   执行正确和错误的消息 array('success'=>'','error'=>'', 'url'=>'','ajax'=>false)
     *                     url为跳转页面,ajax是否ajax方式(数字则为倒数计时秒数)
     *
     * @author 葛小哨  <zhuyajie@topthink.net>
     */
    protected function ishot (  $model , $where = array() , $msg = array( 'success'=>'热门设置成功！', 'error'=>'热门设置失败！')){
        $data     =  array('hot' => 1);
        if(M($model)->where($where)->save($data)){
            $this->ajaxReturn($msg['success']);
        }else{
           $this->ajaxReturn($msg['error']);
        }
    }
    /**
     * 取消热门
     * @param string $model 模型名称,供D函数使用的参数
     * @param array  $where 查询时的where()方法的参数
     * @param array  $msg   执行正确和错误的消息 array('success'=>'','error'=>'', 'url'=>'','ajax'=>false)
     *                     url为跳转页面,ajax是否ajax方式(数字则为倒数计时秒数)
     *
     * @author 葛小哨  <zhuyajie@topthink.net>
     */
    protected function nohot (  $model , $where = array() , $msg = array( 'success'=>'热门取消成功！', 'error'=>'热门取消失败！')){
       $data     =  array('hot' => 0);
        if(M($model)->where($where)->save($data)){
            $this->ajaxReturn($msg['success']);
        }else{
           $this->ajaxReturn($msg['error']);
        }
    }


    /**
     * [ulists 企业用户的列表页获取]
     * @param  array   $where   [description]
     * @param  [type]  $request [description]
     * @param  string  $order   [description]
     * @param  boolean $field   [description]
     * @return [type]           [description]
     */
    public function ulists ($where=array(),$request,$order='',$field=true){
        $options    =   array();
        $user = new UserApi();
        $model = $user->uModel();
        $OPT        =   new \ReflectionProperty($model,'options');
        $OPT->setAccessible(true);

        $pk         =   $model->getPk();
        if($order===null){
            //order置空
        }else if ( isset($request['_order']) && isset($request['_field']) && in_array(strtolower($request['_order']),array('desc','asc')) ) {
            $options['order'] = '`'.$request['_field'].'` '.$request['_order'];
        }elseif( $order==='' && empty($options['order']) && !empty($pk) ){
            $options['order'] = $pk.' desc';
        }elseif($order){
            $options['order'] = $order;
        }
        unset($request['_order'],$request['_field']);

        if(empty($where)){
            $where  =   array('status'=>array('egt',0));
        }
        if( !empty($where)){
            $options['where']   =   $where;
        }
        $options      =   array_merge( (array)$OPT->getValue($model), $options );
        $total        =   $model->where($options['where'])->count();

        if( isset($request['r']) ){
            $listRows = (int)$request['r'];
        }else{
            $listRows = C('LIST_ROWS') > 0 ? C('LIST_ROWS') : 10;
        }
        $page = new \Think\Page($total, $listRows, $request);
        if($total>$listRows){
            $page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
        }
        $p =$page->show();
        $this->assign('_page', $p? $p: '');
        $this->assign('_total',$total);
        $options['limit'] = $page->firstRow.','.$page->listRows;

        $model->setProperty('options',$options);

        $data1 = $model->field($field)->select();
        $data2  = array();
        $data  = array();
        foreach ($data1 as $k => $v) {
            $data2[$k] = M('member')->where(array('uid'=>$data1[$k]['id']))->field('login,hot')->select();
        }
        foreach ($data2 as $k => $v) {
            $data[] = array_merge($data1[$k],$v[0]);
        }
        return $data;
    }

    /**
     * 修改昵称初始化
     * @author huajie <banhuajie@163.com>
     */
    public function updateNickname(){
        $nickname = M('Member')->getFieldByUid(UID, 'nickname');
        $this->assign('nickname', $nickname);
        $this->meta_title = '修改昵称';
        $this->display('updatenickname');
    }

    /**
     * 修改昵称提交
     * @author huajie <banhuajie@163.com>
     */
    public function submitNickname(){
        //获取参数
        $nickname = I('post.nickname');
        $password = I('post.password');
        empty($nickname) && $this->error('请输入昵称');
        empty($password) && $this->error('请输入密码');

        //密码验证
        $User   =   new UserApi();
        $uid    =   $User->login(UID, $password, 4);
        ($uid == -2) && $this->error('密码不正确');

        $Member =   D('Member');
        $data   =   $Member->create(array('nickname'=>$nickname));
        if(!$data){
            $this->error($Member->getError());
        }

        $res = $Member->where(array('uid'=>$uid))->save($data);

        if($res){
            $user               =   session('user_auth');
            $user['username']   =   $data['nickname'];
            session('user_auth', $user);
            session('user_auth_sign', data_auth_sign($user));
            $this->success('修改昵称成功！');
        }else{
            $this->error('修改昵称失败！');
        }
    }

    /**
     * 修改密码初始化
     * @author huajie <banhuajie@163.com>
     */
    public function updatePassword(){
        $this->meta_title = '修改密码';
        $this->display('updatepassword');
    }

    /**
     * 修改密码提交
     * @author huajie <banhuajie@163.com>
     */
    public function submitPassword(){
        //获取参数
        $password   =   I('post.old');
        empty($password) && $this->error('请输入原密码');
        $data['password'] = I('post.password');
        empty($data['password']) && $this->error('请输入新密码');
        $repassword = I('post.repassword');
        empty($repassword) && $this->error('请输入确认密码');

        if($data['password'] !== $repassword){
            $this->error('您输入的新密码与确认密码不一致');
        }

        $Api    =   new UserApi();
        $res    =   $Api->updateInfo(UID, $password, $data);
        if($res['status']){
            $this->success('修改密码成功！');
        }else{
            $this->error($res['info']);
        }
    }

    /**
     * 用户行为列表
     * @author huajie <banhuajie@163.com>
     */
    public function action(){
        //获取列表数据
        $Action =   M('Action')->where(array('status'=>array('gt',-1)));
        $list   =   $this->lists($Action);
        int_to_string($list);
        // 记录当前列表页的cookie
        Cookie('__forward__',$_SERVER['REQUEST_URI']);

        $this->assign('_list', $list);
        $this->meta_title = '用户行为';
        $this->display();
    }

    /**
     * 新增行为
     * @author huajie <banhuajie@163.com>
     */
    public function addAction(){
        $this->meta_title = '新增行为';
        $this->assign('data',null);
        $this->display('editaction');
    }

    /**
     * 编辑行为
     * @author huajie <banhuajie@163.com>
     */
    public function editAction(){
        $id = I('get.id');
        empty($id) && $this->error('参数不能为空！');
        $data = M('Action')->field(true)->find($id);

        $this->assign('data',$data);
        $this->meta_title = '编辑行为';
        $this->display('editaction');
    }

    /**
     * 更新行为
     * @author huajie <banhuajie@163.com>
     */
    public function saveAction(){
        $res = D('Action')->update();
        if(!$res){
            $this->error(D('Action')->getError());
        }else{
            $this->success($res['id']?'更新成功！':'新增成功！', Cookie('__forward__'));
        }
    }

    /**
     * 会员状态修改
     * @author 朱亚杰 <zhuyajie@topthink.net>
     */
    public function changeStatus($method=null){
        $id = array_unique((array)I('id',0));
        if( in_array(C('USER_ADMINISTRATOR'), $id)){
            $this->error("不允许对超级管理员执行该操作!");
        }
        $id = is_array($id) ? implode(',',$id) : $id;
        if ( empty($id) ) {
            $this->error('请选择要操作的数据!');
        }
        $map['uid'] =   array('in',$id);
        switch ( strtolower($method) ){
            case 'forbiduser':
                $this->forbid('Member', $map );
                break;
            case 'resumeuser':
                $this->resume('Member', $map );
                break;
            case 'deleteuser':
                $this->delete('Member', $map );
                break;
            default:
                $this->error('参数非法');
        }
    }

    /**
     * 企业认证状态修改
     * @author 葛小哨 
     */
    public function changeIdentify($method=null){
        $id = array_unique((array)I('id',0));
        $id = is_array($id) ? implode(',',$id) : $id;
        if ( empty($id) ) {
            $this->error('请选择要操作的数据!');
        }
        $map['id'] =   array('in',$id);
        switch ( strtolower($method) ){
            case 'unsanctioned':
                $this->unsanctioned('Member', $map );
                break;
            case 'sanctioned':
                $this->sanctioned('Member', $map );
                break;
            case 'resanctioned':
                $this->resanctioned('Member', $map );
                break;     
            default:
                $this->error('参数非法');
        }
    }
     /**
     * 企业认证状态修改
     * @author 葛小哨 
     */
    public function changeHot($method=null){
        $uid = array_unique((array)I('uid',0));
        $uid = is_array($uid) ? implode(',',$uid) : $uid;
        if ( empty($uid) ) {
            $this->error('请选择要操作的数据!');
        }
        $map['uid'] =   array('in',$uid);
        switch ( strtolower($method) ){
            case 'ishot':
                $this->ishot('Member', $map );
                break;
            case 'nohot':
                $this->nohot('Member', $map );
                break;   
            default:
                $this->error('参数非法');
        }
    }

    public function add($username = '', $password = '', $repassword = '', $email = ''){
        if(IS_POST){
            /* 检测密码 */
            if($password != $repassword){
                $this->error('密码和重复密码不一致！');
            }

            /* 调用注册接口注册用户 */
            $User   =   new UserApi;
            $uid    =   $User->register($username, $password, $email);
            if(0 < $uid){ //注册成功
                $user = array('uid' => $uid, 'nickname' => $username, 'status' => 1);
                if(!M('Member')->add($user)){
                    $this->error('用户添加失败！');
                } else {
                    $this->success('用户添加成功！',U('index'));
                }
            } else { //注册失败，显示错误信息
                $this->error($this->showRegError($uid));
            }
        } else {
            $this->meta_title = '新增用户';
            $this->display();
        }
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

    /* 认证详情页 */
    public function detail(){
        $tid = I('tid','0');
        $id  = I('id');
        $user = new UserApi();

        $userDetail = $user->infoDetail($id);

        $this->assign('tid',$tid);
        $this->assign('userDetail',$userDetail);

        $this->display();
    }

    public function pre_identify(){
        $data = $_POST;
        if(empty($data)){ 
            $this->error('参数非法');
        }
        $user = new UserApi();
        $uid = $data['cid'];

        $map = array(
                'identify' => $data['identify']
                );
        $return = $user->updateCompany($uid,$map);

        if((int)$data['identify'] == 3){

            $_POST['create_time'] = time();
            unset($_POST['identify']);
            $model1 = M()->table('sql_reason');
            $reason = $model1->field('create_time')->where('cid = '.$uid)->order('id desc')->find();
            if($_POST['create_time'] - $reason['create_time'] > 60*60*5){
                $list = $model1->create();
                if(M()->table('sql_reason')->add($_POST)){
                    $return['info'] = '没通过理由已回执';
                }
            }else{
                $return['info'] = '5个小时只能回复一次';
            }
        }
        
        $this->ajaxReturn($return);
    }

}