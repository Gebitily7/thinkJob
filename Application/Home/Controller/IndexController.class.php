<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Home\Controller;
use OT\DataDictionary;


/**
 * 前台首页控制器
 * 主要获取首页聚合数据
 */
class IndexController extends HomeController {

	//系统首页
    public function index(){

        $category = D('Category')->getTree();
        $this->assign('category',$category);//栏目
        
        $lists    = D('Document')->lists(null);
        $this->assign('lists',$lists);//列表

        $hot      = D('Category')->getHot();
        $this->assign( 'hot',$hot );
        /** 幻灯片* */
		$slide    = D( 'slide' )->get_slide( );
		$this->assign( 'slide',$slide );

        /* 获取导航条 */
        $nav = D('Channel')->lists();
        $this->assign('nav',$nav);

        /* 公告 */
        $notice = D('document')->lists(1,'`update_time` DESC');
        $this->assign('notice',$notice);


        $this->assign('page',D('Document')->page);//分页

        $user = $this->userDetail();
        $this->assign('user',$user);

        /* ishot热门公司 */
        $hot1 = $this->getHot(5,7);
        $this->assign('hot1',$hot1);

        $very = $this->getHot(7,7);
        $this->assign('very',$very);

        $this->getCompany();
        
        $this->display();
    }


    private function getCompany(){
        $data = M('member')->where('hot = 1')->field('uid')->select();

        $detail = array();

        foreach($data as $v){
            $detail[] = $this->userDetail($v['uid'],2);
        }
        $this->assign('companyList',$detail);
    }

    private function getHot($position,$num){
        $data = D('document')->where('position = '.$position)->limit($num)->select();
        return $data;
    }


    public function search(){


        if(isset($_GET['cate_id'])){
            $map['iscate'] = $_GET['cate_id'];
            $this->assign('iscate1',$_GET['cate_id']);
        }else{
            $map['iscate'] = array('in','1,2');
            $this->assign('iscate1',1);
        }
        if(isset($_GET['search_input'])){
            $map['title|description']  = array('like','%'.$_GET['search_input'].'%');
            $this->assign('inputTitle',$_GET['search_input']);
        }

        $map['status'] = 1;

        $user = $this->userDetail();
        $this->assign('user',$user);
        /* 数据分页*/
        $document = D("Document");
        $list=$document->getLists($map,10,$listsort);
        $this->assign('list',$list);// 赋值数据集    
        $pageNum = $document->listNum($map);
        $job = array();
        foreach($list as $k => $v){
            $data = $this->userDetail($v['uid'],2);
            $like = is_like($v['id'],$user['uid']);
            $job[] = array_merge($data,$v,$like);
        }
    
        $this->assign('job',$job);  
        $page=D("Document")->getPage($map,10,$listsort);
        $this->assign('page',$page);//
        $this->assign('pageNum',$pageNum);
        $pageCount = ceil($pageNum/10);
        $this->assign('pageCount',$pageCount);

        //var_dump($user);exit;

        $this->display();
    }

    public function getJobByCateId(){
        $id = I('post.id',0);
        if($id == 0){
            return false;
        }
        $category1 = D('Category')->info($id);

        /* 分类信息 */
        //$category1 = $this->category();
        $cate_id = D('Category')->getChildrenId($id);
        $map['category_id']=array("in",$cate_id);
        $map['status'] = 1;
        $map['iscate'] = 1;
        /* 数据分页*/
        $document = D("Document");
        $list=$document->getLists($map,$category1['list_row'],$listsort);
        // $this->assign('list',$list);// 赋值数据集    
        $pageNum = $document->listNum($map);
        $job = array();
        foreach($list as $k => $v){
            $data = $this->userDetail($v['uid'],2);
            $like = is_like($v['id'],$user['uid']);
            $send  = is_send($v['id'],$user['uid']);
            $job[] = array_merge($data,$v,$like,$send);
        }

        $li = '';
        foreach($job as $v){
            $li = '<li>
            <a href="'.U("home/zhaopin/detail/id/".$v["id"]).'" title="点击进入详情页">
            <div class="gsH clearfix"><div class="gsTx fl"><img src="'.get_cover($v["u_tx"],"path").'" alt=""/></div>
            <div class="zwxx fl"><p><i class="fa fa-credit-card"></i>&ensp;<strong>'.$v["title"].'</strong></p><p><i class="fa fa-th-large"></i>&ensp;<span>全职</span></p>
            <p><i class="fa fa-rmb"></i>&ensp;<span>'.get_salary_range($v["salary_range"]).'</span></p></div><div class="job-mask"><div class="job-mask-content">
            <p><i class="fa fa-building-o"></i>&emsp;<span>'.$v["c_name"].'</span></p>
            <p><i class="fa fa-shirtsinbulk"></i>&emsp;&ensp;<span>'.get_category_title($v["industry"]).'&ensp;|&ensp;'.get_step_list($v["step"]).'&ensp;|&ensp;'.$v["c_range"].'人</span></p>
            <p>招聘人数 :&emsp;<span>'.$v["recruit_people_num"].'人</span></p><div><span><p>职位</p><p>8</p></span><span><p>简历</p><p>100</p></span><span><p>招聘</p><p>1092</p></span></div></div></div></div>
            <div class="zwDel clearfix"><p>发布时间：<time>'.date("Y/m/d",$v["put_time"]).'</time></p>
            <p>工作地点：<span>'.get_place($v["work_place"]).'</span></p>
            <div class="zw-label">'.format_gs_label($v["c_label"]).'</div></div></a></li>';

        }

        $return = $li;
        $this->ajaxReturn($return);
    }   
}