<?php
// +----------------------------------------------------------------------
// | Gebitily7 [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://www.job.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: Gebitily7 <Gebitily@yeah.net> <http://www.job.com>
// +----------------------------------------------------------------------
namespace Home\Model;
use Think\Model;

/**
 * 分类模型
 */
class SlideModel extends Model{

	/**
	 * 获取幻灯片列表，支持多级导航
	 * @param  boolean $field 要列出的字段
	 * @return array          导航树
	 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
	 */
public	function get_slide(){
       $map = array('status' => 1);
		$list = $this->field($field)->where($map)->select();

		return $list;
   }
}
