<?php
// +----------------------------------------------------------------------
// | i友街 [ 新生代贵州网购社区 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2014 http://www.iyo9.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: i友街 <iyo9@iyo9.com> <http://www.iyo9.com>
// +----------------------------------------------------------------------
// 

/**
 * 中国省市区三级联动插件
 * @author i友街
 */

namespace Addons\ChinaCity\Controller;
use Home\Controller\AddonsController;

class ChinaCityController extends AddonsController{
	
	//获取中国省份信息
	public function getProvince(){
		if (IS_AJAX){
			$pid = I('pid');  //默认的省份id
			//var_dump($pid);

			if( empty($pid) ){
				$map['id'] = $pid;
			}
			$map['level'] = 1;
			$map['upid'] = 0;
			$list = D('Addons://ChinaCity/District')->_list($map);

			$data['content'] = "<option value ='-1'>-省份-</option>";
			foreach ($list as $k => $vo) {
				$data['content'] .= "<option ";
				if( $pid == $vo['id'] ){
					$data['content'] .= " selected ";
					$data['cityname']  =  $vo['name'];
				}
				$data['content'] .= " value ='" . $vo['id'] . "'>" . $vo['name'] . "</option>";
			}
			
			$this->ajaxReturn($data);
		}
	}

	//获取城市信息
	public function getCity(){
		if (IS_AJAX){
			$cid = I('cid');  //默认的城市id
			$pid = I('pid');  //传过来的省份id
			// if( empty($cid) ){
			// 	$map['id'] = $cid;
			// }
			$map['level'] = 2;
			$map['upid'] = $pid;

			$list = D('Addons://ChinaCity/District')->_list($map);

			$data['content'] = "<option value ='-1'>-城市-</option>";
			foreach ($list as $k => $vo) {
				$data['content'] .= "<option ";
				if( $cid == $vo['id'] ){
					$data['content'] .= " selected ";
					$data['cityname'] =  $vo['name'];
				}
				$data['content'] .= " value ='" . $vo['id'] . "'>" . $vo['name'] . "</option>";
			}
			$this->ajaxReturn($data);
		}
	}

	//获取区县市信息
	public function getDistrict(){
		if (IS_AJAX){
			$did = I('did');  //默认的城市id
			$cid = I('cid');  //传过来的城市id
			// if( !empty($did) ){
			// 	$map['id'] = $did;
			// }
			$map['level'] = 3;
			$map['upid'] = $cid;

			$list = D('Addons://ChinaCity/District')->_list($map);

			$data['content'] = "<option value ='-1'>-州县-</option>";
			foreach ($list as $k => $vo) {
				$data['content'] .= "<option ";
				if( $did == $vo['id'] ){
					$data['content'] .= " selected ";
					$data['cityname'] =  $vo['name'];
				}
				$data['content'] .= " value ='" . $vo['id'] . "'>" . $vo['name'] . "</option>";
			}
			$this->ajaxReturn($data);
		}
	}

	//获取乡镇信息
	public function getCommunity(){
		if (IS_AJAX){
			$coid = I('coid');  //默认的乡镇id
			$did = I('did');  //传过来的区县市id
			//$map['id'] = $coid;

			// if( !empty($coid) ){
			//  	$map['id'] = $coid;
			// }
			$map['level'] = 4;
			$map['upid'] = $did;

			$list = D('Addons://ChinaCity/District')->_list($map);

			$data['content'] = "<option value ='-1'>-乡镇-</option>";
			foreach ($list as $k => $vo) {
				$data['content'] .= "<option ";
				if( $coid == $vo['id'] ){
					$data['content'] .= " selected ";
					$data['cityname'] =  $vo['name'];
				}
				$data['content'] .= " value ='" . $vo['id'] . "'>" . $vo['name'] . "</option>";
			}
			$this->ajaxReturn($data);
		}
	}

	// 向上获取全部信息(上蔡-驻马店-河南)
	public function getAll(){
		$id = $_POST['id'];
		$map['id'] = $id;
		//$city = array();
		$District = D('Addons://ChinaCity/District');
		$list = $District->_find($map);
		
		$data = $this->unLimitGetCity($list);
		krsort($data);
		foreach ($data as $key => $val) {
			$city[] = $val;
		}

		$this->ajaxReturn($city);
	}
	protected function unLimitGetCity($list){
		static $arr = array();
		$arr[] = $list;
		if($list['upid'] != 0){
			$map['id'] = $list['upid'];
			$District = D('Addons://ChinaCity/District');
			$list1 = $District->_find($map);
			$this->unLimitGetCity($list1);
		}
		return $arr;
	}


}