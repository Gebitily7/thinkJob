<?php
// +----------------------------------------------------------------------
// | Gebitily7 [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://www.gebitily7.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: Gebitily7 <Gebitily@yeah.net> 
// +----------------------------------------------------------------------

namespace Home\Controller;

/**
 * 文档模型控制器
 * 文档模型列表和详情
 */
class JianzhiController extends HomeController {

    /* 文档模型频道页 */
	public function index(){

		$pid=I('get.pid',0,'intval');
		if(!is_numeric($pid)){
		    $this->error('分类ID错误！');
		}
		
		$category1 = D('Category')->info($pid);

		/* 分类信息 */
		$category1 = $this->category();
		$cate_id = D('Category')->getJzhiChildrenId($pid);
		$map['category_id']=array("in",$cate_id);
		
		$this->assign('pid',$pid);

		if(isset($_GET['cid'])){
			$cate_id = D('Category')->getChildrenId($_GET['cid']);
			$map['category_id']=array("in",$cate_id);
			$this->assign('cid',$_GET['cid']);
		}
		if(isset($_GET['acm'])){
			$map['acm'] = $_GET['acm'];
			$this->assign('acm',$_GET['acm']);
		}

		if(isset($_GET['time'])){
			$day  = 86400;
			$time = time();
			switch($_GET['time']){
				case 0:
					$map['update_time'] = array('gt',$time-$day);
					break;
				case 1:
					$map['update_time'] = array('gt',$time-$day*3);
					break;
				case 2:
					$map['update_time'] = array('gt',$time-$day*7);
					break;
				case 3:
					$map['update_time'] = array('gt',$time-$day*14);
					break;
				case 4:
					$map['update_time'] = array('gt',$time-$day*30);
					break;
				default:
					$map['update_time'] = array();
					break;			
			}
			$this->assign('time',$_GET['time']);
		}
		//栏目
		$category = $this->getHead($id = 0, $field = true, $ismenu = -1);	
		$this->assign('category',$category[0]['_']);//栏目
		
		// echo getIpLoc_Sina("115.63.203.22",1);
		
		// 导航条
        $nav = D('Channel')->lists();
        $this->assign('nav',$nav);
        setCookie('dataId',$nav[2]['id']);
        
        $user = $this->userDetail();
        $this->assign('user',$user);

      	$map['iscate'] = 2;
        /* 数据分页*/
        $document = D('Document');
		$list=$document->getLists($map,2,$listsort);
		$this->assign('list',$list);// 赋值数据集    
		$pageNum = $document->listNum($map);
		$job = array();
		foreach($list as $k => $v){
			$data = $this->userDetail($v['uid'],2);
			$like = is_like($v['id'],$user['uid']);
			$send  = is_send($v['id'],$user['uid']);
			$job[] = array_merge($data,$v,$like,$send);
		}
		$this->assign('job',$job);  
		$page=D("Document")->getPage($map,2,$listsort); //$category1['list_row']
		$this->assign('page',$page);//
		$this->assign('pageNum',$pageNum);
		$pageCount = ceil($pageNum/2);
		$this->assign('pageCount',$pageCount);

		
	
		/* 模板赋值并渲染模板 */
		$this->assign('cate', $category);
		$this->display($category['template_index']);
	}

	/* 文档模型列表页 */
	public function lists($p = 1){
		/* 分类信息 */
		$category = $this->category();

		/* 获取当前分类列表 */
		$Document = D('Document');
		$list = $Document->page($p, $category['list_row'])->lists($category['id']);
		if(false === $list){
			$this->error('获取列表数据失败！');
		}

		/* 模板赋值并渲染模板 */
		$this->assign('cate', $category);
		$this->assign('list', $list);
		$this->display($category['template_lists']);
	}

	/* 文档模型详情页 */
	public function detail($id = 0, $p = 1){
		/* 标识正确性检测 */
		if(!($id && is_numeric($id))){
			$this->error('文档ID错误！');
		}

		/* 页码检测 */
		$p = intval($p);
		$p = empty($p) ? 1 : $p;

		/* 获取详细信息 */
		$Document = D('Document');
		$info = $Document->detail($id);
		if(!$info){
			$this->error($Document->getError());
		}

		// 导航条
        $nav = D('Channel')->lists();
        $this->assign('nav',$nav);

        //栏目
		$this->getHead();

		/* 分类信息 */
		$category = $this->category($info['category_id']);

		/* 获取模板 */
		if(!empty($info['template'])){//已定制模板
			$tmpl = $info['template'];
		} elseif (!empty($category['template_detail'])){ //分类已定制模板
			$tmpl = $category['template_detail'];
		} else { //使用默认模板
			$tmpl = 'Jianzhi/'. get_document_model($info['model_id'],'name') .'/detail';
		}

		/* 更新浏览数 */
		$map = array('id' => $id);
		$Document->where($map)->setInc('view');

		/* 更多职位 */
		$map1['uid'] = $info['uid'];
		$map1['status'] = 1;
		$map1['rocover'] = 1;
		$jobcount = $Document->getListNum($map1);
		$this->assign('jobCount',$jobcount);

		/* 企业用户信息 */
		$userInfo = $this->userDetail($info['uid'],2);
		$this->assign('userInfo', $userInfo);

		/* 模板赋值并渲染模板 */
		$this->assign('cate', $category);
		$this->assign('info', $info);
		$this->assign('page', $p); //页码
		$this->display($tmpl);
	}

	/* 文档分类检测 */
	private function category($id = 0){
		/* 标识正确性检测 */
		$id = $id ? $id : I('get.pid', 0);
		if(empty($id)){
			$this->error('没有指定文档分类！');
		}

		/* 获取分类信息 */
		$category = D('Category')->info($id);
		if($category && 1 == $category['status']){
			switch ($category['display']) {
				case 0:
					$this->error('该分类禁止显示！');
					break;
				//TODO: 更多分类显示状态判断
				default:
					return $category;
			}
		} else {
			$this->error('分类不存在或被禁用！');
		}
	}


}
