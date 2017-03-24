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

/**
 * 分类模型
 */
class CategoryModel extends Model{

    protected $_validate = array(
        array('name', 'require', '标识不能为空', self::EXISTS_VALIDATE, 'regex', self::MODEL_BOTH),
        array('name', '', '标识已经存在', self::VALUE_VALIDATE, 'unique', self::MODEL_BOTH),
        array('title', 'require', '名称不能为空', self::MUST_VALIDATE , 'regex', self::MODEL_BOTH),
    );

    protected $_auto = array(
        array('model', 'arr2str', self::MODEL_BOTH, 'function'),
        array('model', null, self::MODEL_BOTH, 'ignore'),
        array('extend', 'json_encode', self::MODEL_BOTH, 'function'),
        array('extend', null, self::MODEL_BOTH, 'ignore'),
        array('create_time', NOW_TIME, self::MODEL_INSERT),
        array('update_time', NOW_TIME, self::MODEL_BOTH),
        array('status', '1', self::MODEL_BOTH),
    );


    /**
     * 获取分类详细信息
     * @param  milit   $id 分类ID或标识
     * @param  boolean $field 查询字段
     * @return array     分类信息
     * @author 麦当苗儿 <zuojiazi@vip.qq.com>
     */
    public function info($id, $field = true){
        /* 获取分类信息 */
        $map = array();
        if(is_numeric($id)){ //通过ID查询
            $map['id'] = $id;
        } else { //通过标识查询
            $map['name'] = $id;
        }
        return $this->field($field)->where($map)->find();
    }

    /**
     * 获取分类树，指定分类则返回指定分类极其子分类，不指定则返回所有分类树
     * @param  integer $id    分类ID
     * @param  boolean $field 查询字段
     * @return array          分类树
     * @author 麦当苗儿 <zuojiazi@vip.qq.com>
     */
    public function getTree($id = 0, $field = true, $ismenu = 1){
        /* 获取当前分类信息 */
        if($id){
            $info = $this->info($id);
            $id   = $info['id'];
        }

        /* 获取所有分类 */
        $map  = array('status' => 1,'ismenu'=> $ismenu);
        $list = $this->field($field)->where($map)->order('sort')->select();
        $list = list_to_tree($list, $pk = 'id', $pid = 'pid', $child = '_', $root = $id);
        
        /* 获取返回数据 */
        if(isset($info)){ //指定分类则返回当前分类极其子分类
            $info['_'] = $list;
        } else { //否则返回所有分类
            $info = $list;
        }

        return $info;
    }

    // public function getChildCate($id,$field=true,$ismenu = 1){

    // }

    public function makeTree(){
        $category = $this->getTree ();
        foreach ( $category as $k => $v ) {
            $cid=array();
            $arr=array();
            array_push($cid,$v['id']);
            array_push($arr,$v['id']);
              foreach ( $v ['_'] as $ks => $vs ) {
                  array_push($cid,$vs['id']);
                     foreach ( $vs ['_'] as $kgs => $vgs ) {
                        array_push($cid,$vgs['id']);
                     }
             }
            /**分类商品**/
            $category [$k] ['doc'] = array ( );
            $map['category_id']=array("in",$cid);
            $map['status']=1;
            $category [$k]['doc'] = M('Document')->where($map)->order("id desc")->limit(10)->select();
           
            /**子分类**/
            $category [$k] ['child']= array ();    
            $condition['pid'] = array('in',$arr);
            $condition['ismenu'] = 1;   
            $condition['status']=1;
            $category [$k] ['child']= $this->where($condition)->limit(10)->order("id desc")->select();    
           
            /**品牌**/
            $category [$k] ['brand']= array ();    
            $condition2['ypid'] = array('in',$cid);
            $condition2['status']=1;
            $category [$k] ['brand']= M('brand')->where($condition2)->order("id desc")->select();

           /**广告**/
            $category [$k] ['ad']= array ();    
            $condition3['ypid'] = array('in',$cid);
            $condition3['status']=1;
            $category [$k] ['ad']= M('ad')->where($condition3)->order("id desc")->select();
        }

        return $category;

      }

    /**
     * 获取指定分类的同级分类
     * @param  integer $id    分类ID
     * @param  boolean $field 查询字段
     * @return array
     * @author 麦当苗儿 <zuojiazi@vip.qq.com>         
     */
    public function getSameLevel($id, $field = true){
        $info = $this->info($id, 'pid');
        $map = array('pid' => $info['pid'], 'status' => 1, 'ismenu'=> 1);
        return $this->field($field)->where($map)->order('sort')->select();
    }

    public function getHot($id = 0, $field = true, $hot = 0){
        /* 获取当前分类信息 */
        if($id){
            $info = $this->info($id);
            $id   = $info['id'];
        }

        /* 获取所有分类 */
        $map  = array('status' => 1,'ismenu'=> 1,'ishot' => 1);
        $list = $this->field($field)->where($map)->limit(10)->select();

        //$list = list_to_tree($list, $pk = 'id', $pid = 'pid', $child = '_', $root = $id);
        
        /* 获取返回数据 */
        if(isset($info)){ //指定分类则返回当前分类极其子分类
            $info['_'] = $list;
        } else { //否则返回所有分类
            $info = $list;
        }

        return $info;
    }

    /**
     * 更新分类信息
     * @return boolean 更新状态
     * @author 麦当苗儿 <zuojiazi@vip.qq.com>
     */
    public function update(){
        $data = $this->create();
        if(!$data){ //数据对象创建错误
            return false;
        }

        /* 添加或更新数据 */
        return empty($data['id']) ? $this->add() : $this->save();
    }

    /**
     * 获取指定分类子分类ID
     * @param  string $cate 分类ID
     * @return string       id列表
     * @author 麦当苗儿 <zuojiazi@vip.qq.com>
     */
    /*public function getChildrenId($cate){
        $field = 'id,name,pid,title,link_id';
        $category = $this->getTree($cate, $field);
        $ids[]    = $cate;
        foreach ($category['_'] as $key => $value) {
            $ids[] = $value['id'];
        }
        return implode(',', $ids);
    }*/

     /**
     * 获取指定分类子分类ID
     * @param  string $cate 分类ID
     * @return string       id列表
     * @author gebitily7
     */
      public function getChildrenId($id){
        
       $field = 'id,name,pid,title,link_id';
       $category =$this->getTree( $id, $field );     
       $ids = array();
         $ids[]='in';array_push($ids,$id);
         foreach ($category['_'] as $key => $value) {
                $ids[] = $value['id'];       
              $id=$value['id'];   
              $list=$this->where("status='1'and ismenu='1' and  pid='$id' ")->select();
        
                foreach ($list as $key => $v){     
              array_push($ids,$v['id']);
               }
         }
         $ids[]=$id;
         
       return implode(',', $ids);
      }

      public function getJzhiChildrenId($id){
        
       $field = 'id,name,pid,title,link_id';
       $category =$this->getTree( $id, $field ,$ismenu = -1);     
       $ids = array();
         $ids[]='in';array_push($ids,$id);
         foreach ($category['_'] as $key => $value) {
                $ids[] = $value['id'];       
              $id=$value['id'];   
              $list=$this->where("status='1'and ismenu='-1' and  pid='$id' ")->select();
        
                foreach ($list as $key => $v){     
              array_push($ids,$v['id']);
               }
         }
         $ids[]=$id;
         
       return implode(',', $ids);
      }


    /**
     * 查询后解析扩展信息
     * @param  array $data 分类数据
     * @author 麦当苗儿 <zuojiazi@vip.qq.com>
     */
    protected function _after_find(&$data, $options){
        /* 分割模型 */
        if(!empty($data['model'])){
            $data['model'] = explode(',', $data['model']);
        }

        /* 分割文档类型 */
        if(!empty($data['type'])){
            $data['type'] = explode(',', $data['type']);
        }

        /* 分割模型 */
        if(!empty($data['reply_model'])){
            $data['reply_model'] = explode(',', $data['reply_model']);
        }

        /* 分割文档类型 */
        if(!empty($data['reply_type'])){
            $data['reply_type'] = explode(',', $data['reply_type']);
        }

        /* 还原扩展数据 */
        if(!empty($data['extend'])){
            $data['extend'] = json_decode($data['extend'], true);
        }
    }

}
