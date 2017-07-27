<?php

/**
 * @author wangzilong
 * @date 20160612
 * @description 网站首页
 */

class IndexController extends WController
{
    public function actionIndex(){
        $uid = $this->uid;
        $classify = AdminClassify::model()->getAllClassify();
        //这里在获取缓存的时候发现个问题，尚未解决
//        $classify = GlobalF::getCache('classify');
//        if(!$classify){
//            $classify = AdminClassify::model()->getAllClassify();
//        }
        $banners = self::_getBanners();
        $head = $this->head;
        $this->renderPartial('index',array(
            'classify'=>$classify,
            'banners'=>$banners,
            'head'=>$head,
            ));
    }
    
    /*
     * 获得首页轮播图图片和标题
     */
    private static function _getBanners(){
        return AdminBanner::model()->getBannersInfo();
    }
    
}