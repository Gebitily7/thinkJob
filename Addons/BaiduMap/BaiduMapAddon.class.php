<?php

namespace Addons\BaiduMap;
use Common\Controller\Addon;

/**
 * 文件上传插件
 * @author lhb
 */

    class BaiduMapAddon extends Addon{

        public $info = array(
            'name'=>'BaiduMap',
            'title'=>'百度地图坐标定位',
            'description'=>'百度地图坐标定位',
            'status'=>1,
            'author'=>'Gebitily7',
            'version'=>'0.1'
        );

        public function install(){
            return true;
        }

        public function uninstall(){
            return true;
        }

        //实现的UploadFiles钩子方法
        public function BaiduMap($param){
//            if (empty($param['value'])) {
//                $param['value'] = json_encode(array());
//            }
            $this->assign('param', $param);
            $this->display('index');
        }

    }