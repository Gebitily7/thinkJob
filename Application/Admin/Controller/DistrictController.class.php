<?php

namespace Admin\Controller;

class DistrictController extends ThinkController {
// /注意是继承ThinkController而不是AdminController/

private $model_name = 'District';/* /在OneThink模型管理中查看自己模型标识（不是名称）修改此处/*/

public function index(){
	// $map = array('status'=>array('gt',-1));
 //    $list = $this->lists('Model',$map);
 //    int_to_string($list);
 //    // 记录当前列表页的cookie
 //    Cookie('__forward__',$_SERVER['REQUEST_URI']);

 //    $this->assign('_list', $list);
 //    $this->meta_title = '城市管理';

	$this->lists(); //系统会调用View/Team/index.html来显示/
	//$this->display();

}

public function lists( $model = null,$cate_id = null, $model_id = null, $position = null,$group_id=null ){
	$map = array('level'=>array('elt',2));

	parent::lists( $this->model_name, $map); //系统会调用View/Team/list.html来显示/

}

public function add( $model = null ){

$model = M('Model')->getByName( $this->model_name ); //通过Model名称获取Model完整信息/

parent::add( $model['id'] ); //系统会调用View/Team/add.html来显示/

}

public function edit( $model = null, $id = 0 ){

$id || $this->error('请选择要编辑的用户！');

$model = M('Model')->getByName( $this->model_name ); //通过Model名称获取Model完整信息/

parent::edit( $model['id'], $id ); //系统会调用View/Team/edit.html来显示/

}

public function del( $model = null, $ids=null ){

$model = M('Model')->getByName( $this->model_name ); //通过Model名称获取Model完整信息/

parent::del( $model['id'], $ids); //没有页面，只有Ajax提示返回，不需要View/Team/del.html/

}

/**/
public function setstatus($model='District'){
	return Parent::setstatus($model='District');
}





}