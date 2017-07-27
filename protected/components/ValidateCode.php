<?php

/**
 * @editor wangzilong
 * @description 验证码生成类
 * @date 20160628
 */

class ValidateCode {
    //随机因子
    private $charset = 'abcdefghkmnprstuvwxyzABCDEFGHKMNPRSTUVWXYZ23456789';
    
    //验证码
    private $code;
    
    //验证码长度
    private $codelen = 4;
    
    //宽度
    private $width = 175;
            
    //高度
    private $height =35;
    
    //图形资源句柄
    private $img;
    
    //指定的字体
    private $font;
    
    //指定字体大小
    private $fontsize = 18;
    
    //指定字体颜色
    private $fontcolor;
    
    //构造方法初始化
    public function __construct() {
        //注意字体路径要写对，否则显示不了图片（绝对路径）
        $this->font = dirname(Yii::app()->basePath).'/assets/font/elephant.ttf';
    }
    //生成随机码
    private function createCode() {
        $_len = strlen($this->charset)-1;
        for ($i=0;$i<$this->codelen;$i++) {
            $this->code .= $this->charset[mt_rand(0,$_len)];
        }
    }
    //生成背景
    private function createBg() {
        $this->img = imagecreatetruecolor($this->width, $this->height);
        $color = imagecolorallocate($this->img, mt_rand(157,255), mt_rand(157,255), mt_rand(157,255));
        imagefilledrectangle($this->img,0,$this->height,$this->width,0,$color);
    }
    //生成文字
    private function createFont() {
    $_x = $this->width / $this->codelen;
        for ($i=0;$i<$this->codelen;$i++) {
            $this->fontcolor = imagecolorallocate($this->img,mt_rand(0,156),mt_rand(0,156),mt_rand(0,156));
            imagettftext($this->img,$this->fontsize,mt_rand(-30,30),$_x*$i+mt_rand(1,5),$this->height / 1.4,$this->fontcolor,$this->font,$this->code[$i]);
        }
    }
    //生成线条、雪花
    private function createLine() {
        //线条
        for ($i=0;$i<6;$i++) {
            $color = imagecolorallocate($this->img,mt_rand(0,156),mt_rand(0,156),mt_rand(0,156));
            imageline($this->img,mt_rand(0,$this->width),mt_rand(0,$this->height),mt_rand(0,$this->width),mt_rand(0,$this->height),$color);
        }
        //雪花
        for ($i=0;$i<100;$i++) {
            $color = imagecolorallocate($this->img,mt_rand(200,255),mt_rand(200,255),mt_rand(200,255));
            imagestring($this->img,mt_rand(1,5),mt_rand(0,$this->width),mt_rand(0,$this->height),'*',$color);
       }
    }
    //输出
    private function outPut() {
       header('Content-type:image/png');
       imagepng($this->img);
       imagedestroy($this->img);
    }
    //对外生成
    public function doimg() {
        $this->createBg();
        //$this->createCode();
        $this->getOperation();
        //$this->createLine();
        $this->createFont();
        $this->outPut();
    }
    //获取验证码
    public function getCode() {
        return strtolower($this->code);
    }
    
    //获得四则运算表达式
    public function getOperation(){
        $first = rand(50,100);
        $second = rand(0, 49);
        
        $operators = array('+','-');
        $operator_key = array_rand($operators,1);
        $operator_val = $operators[$operator_key];
        $last = $first.$operator_val.$second.'=';
        
        if('+'==$operator_val){
            $result = $first+$second;
        }else{
            $result = $first-$second;
        }
        
        $this->codelen = strlen($last);
        $this->code = $last;
        GlobalF::setSession('register_code',$result);
    }
}