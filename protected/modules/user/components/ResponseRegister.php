<?php

/* 
 * 注册时返回的提示信息
 */
class ResponseRegister
{
    public static function descString($status){
        switch ($status) {
            case '100':
                $info = '请求参数非法';
                break;
            case '101':
                $info = '请求方式错误';
                break;
                
            case '001':
                $info = '邮箱已认证';
                break;
            
            case '002':
                $info = '认证邮件已发送';
                break;
            
            case '004':
                $info = '邮箱格式不正确';
                break;
            
            case '005':
                $info ='你算错了哦！';
                break;
            
            case '006':
                $info ='密码不一致';
                break;
            
            case '007':
                $info ='密码长度不符合规范';
                break;
            
            case '000':
                $info = '成功';
                break;
            
            default:
                $info = 'error';
                break;
        }
        return $info;
    } 
    
    public static function descJson($status,$arr=[]){
        $desc = self::descString($status);
        $response = array('status'=>(string)$status,'desc'=>$desc);
        if(!empty($arr)){
            foreach($arr as $key=>$val){
                $response[$key] =(!isset($response[$key])) ?  $val : 'error'; 
            }
            $url = isset($arr['url']) ? $arr['url'] : 'javascript:;';
            $desc = ('002'==$status)&&isset($arr['url']) ? $desc.'<a href="'.$url.'" target="_blank"> 去认证</a>' : '';
            $response['desc'] = $desc;
        }
        return json_encode($response);
    }
}
