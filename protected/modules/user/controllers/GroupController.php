<?php

/**
 * @author wangzilong
 * @date 20170203
 * @description 小组
 */

class GroupController extends WController
{
    public function actionIndex(){
        $uid = $this->uid;
        $groups = AdminGroup::getGroups();
        $this->renderPartial('index',array('groups'=>$groups));
    }
    
    /*
     * 小组详情页
     */
    public function actionItem(){
        $head = $this->head;
        $username = $this->username;
        $id = Yii::app()->request->getParam('id');
        $group = AdminGroup::model()->findByPk(array('id'=>$id));
        $headmanAndPendragon = self::_getHeadmanAndPendragon($group);
        $headman = $headmanAndPendragon['headman'];
        $pendragon = $headmanAndPendragon['pendragon'];
        $this->renderPartial('item',array(
            'url_personal_setHead'=>Urls::get('url_personal_setHead'),
            'head'=>$head,
            'username'=>$username,
            'group'=>$group,
            'headman'=>$headman,
            'pendragon'=>$pendragon,
            ));
    }
    
    /*
     * 获得组长，副组长
     */
    private static function _getHeadmanAndPendragon($group){
        $headman = isset($group['headman']) ? $group['headman'] : 0;
        $pendragon = isset($group['pendragon']) ? $group['pendragon'] : 0;
        $uids = $headman.','.$pendragon;
        $pendragon_arr = explode(',', $pendragon);
        $members = UserMember::getUsersByUids($uids);
        
        $headman_info = self::_toDoMember($members,$headman);
        $pendragon_info = [];
        foreach($pendragon_arr as $val){
            $pendragon_info[] = self::_toDoMember($members,$val);
        }
        return array('headman'=>$headman_info,'pendragon'=>$pendragon_info);
    }
    
    private static function _toDoMember($members,$id){
        $info = [];
        $info['id'] = isset($members[$id]) ? $members[$id]['id'] : '';
        $info['name'] = isset($members[$id]) ? $members[$id]['username'] : '';
        $info['head'] = isset($members[$id]) ? SITE_URL.$members[$id]['head'] : 'javascript:;';
        return $info;
    }
}