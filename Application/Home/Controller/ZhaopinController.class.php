<?php
// +----------------------------------------------------------------------
// | Gebitily7 [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://www.gebitily7.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: Gebitily7 <Gebitily@yeah.net> 值得你发现的好音乐「小语种」
// +----------------------------------------------------------------------

namespace Home\Controller;

/**
 * 文档模型控制器
 * 文档模型列表和详情
 */
class ZhaopinController extends HomeController {

    /* 文档模型频道页 */
	public function index(){

		$pid=I('get.pid',0,'intval');
		if(!is_numeric($pid)){
		    $this->error('分类ID错误！');
		}
		$category1 = D('Category')->info($pid);

		/* 分类信息 */
		$category1 = $this->category();
		$cate_id = D('Category')->getChildrenId($pid);
		$map['category_id']=array("in",$cate_id);
		
		//频道页只显示模板，默认不读取任何内容
		//内容可以通过模板标签自行定制
		//栏目
		$category = $this->getHead(0,true,1);
		$this->assign('category',$category);//栏目
		
		//获取父级
		$pcate = $this->getCate($pid,$category['pid']);
		$this->assign('pcate',$pcate);
		$this->assign('pid',$pcate[0][0]['id']);
		
		// 获取指定分类及其子分类
		$childCate = $this->getHead($pcate[0][0]['id'],$field = true, $ismenu = 1);
		$this->assign('childCate',$childCate['_']);

		// 收缩
		if(isset($_GET['cid'])){
			$oCate = $this->getHead($_GET['cid'],$field = true, $ismenu = 1);
			$cate_id = D('Category')->getChildrenId($_GET['cid']);
			$map['category_id']=array("in",$cate_id);
			$this->assign('cid',$_GET['cid']);
			$this->assign('oCate',$oCate['_']);
		}
		if(isset($_GET['oid'])){
			$cate_id = D('Category')->getChildrenId($_GET['oid']);
			$map['category_id']=array("in",$cate_id);
			$this->assign('oid',$_GET['oid']);
		}
		if(isset($_GET['pty'])){
			$map['pty'] = $_GET['pty'];
			$this->assign('pty',$_GET['pty']);
		}
		if(isset($_GET['sa'])){
			$map['salary_a'] = $_GET['sa'];
			$this->assign('sa',$_GET['sa']);
		}
		if(isset($_GET['step'])){
			$map['step'] = $_GET['step'];
			$this->assign('step',$_GET['step']);
		}
		if(isset($_GET['wep'])){
			$map['wep'] = $_GET['wep'];
			$this->assign('wep',$_GET['wep']);
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
		
		// echo getIpLoc_Sina("115.63.203.22",1);
		// 导航条
        $nav = D('Channel')->lists();
        if($pid == 45){
        	setCookie('dataId',$nav[1]['id']);
        }elseif($pid == 265 || $pid == 49){
        	setCookie('dataId',$nav[3]['id']);
        }else{
        	setCookie('dataId',$nav[1]['id']);
        }
        $this->assign('nav',$nav);
        //echo $cid;exit;
        
        $user = $this->userDetail();
        $this->assign('user',$user);

        $map['status'] = 1;
        $map['iscate'] = 1;
        /* 数据分页*/
        $document = D("Document");
		$list=$document->getLists($map,$category1['list_row'],$listsort);
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
		$page=D("Document")->getPage($map,$category1['list_row'],$listsort);
		$this->assign('page',$page);//
		$this->assign('pageNum',$pageNum);
		$pageCount = ceil($pageNum/$category1['list_row']);
		$this->assign('pageCount',$pageCount);
		//获取分类的id
		$name=$category1['name'];
		$child=M('Category')->where("pid='$pid'")->select();
		$this->assign('num', $count);
		$this->assign('childlist', $child);
		
		/*栏目页统计代码实现，tag=2*/
		if(1==C('IP_TONGJI')){
		$record=IpLookup("",2,$name);
		}
		/* 模板赋值并渲染模板 */
		//$this->assign('cate', $category);
	
		$this->display($category1['template_index']);
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
		$category = $this->getHead();
		$this->assign('category',$category);//栏目

		/* 分类信息 */
		$category = $this->category($info['category_id']);

		/* 获取模板 */
		if(!empty($info['template'])){//已定制模板
			$tmpl = $info['template'];
		} elseif (!empty($category['template_detail'])){ //分类已定制模板
			$tmpl = $category['template_detail'];
		} else { //使用默认模板
			$tmpl = 'Zhaopin/'. get_document_model($info['model_id'],'name') .'/detail';
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

	/*  */

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
