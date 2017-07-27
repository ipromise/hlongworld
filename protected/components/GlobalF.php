<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class GlobalF
{
    /**
     * 生成随机字符串
     * @param int $lenth
     * @return string
     */
    public static function create_randomstr($lenth = 6) {
       return self::random($lenth, '123456789abcdefghijklmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ');
   }
   
   /**
    * 英文随机数
    * @param int $i
    * @return string
    */
    public static function randStr($i){
        $str = "abcdefghijklmnopqrstuvwxyz";
        $finalStr = "";
        for($j=0;$j<$i;$j++){
            $finalStr .= substr($str,rand(0,25),1);
        }
        return $finalStr;
    }
   
   /**
    * 产生随机字符串
    * @param int $length  输出长度
    * @param string $chars可选的 ，默认为 0123456789
    * @return string 字符串
    */
    private static function random($length, $chars = '0123456789') {
        $hash = '';
        $max = strlen($chars) - 1;
        for($i = 0; $i < $length; $i++) {
            $hash .= $chars[mt_rand(0, $max)];
        }
        return $hash;
    }
   
   /**
    * 字符串加密
    * @param string $password
    * @param string $salt
    * @return string
    */
   public static function password($password, $salt=false) {
        if(empty($password))return array();
        $salt =  $salt ? $salt : self::create_randomstr();
        $password = md5(md5(trim($password)).$salt);
        return $password;
    }
    
    /**
     * 后台子栏目返回主栏目路径
     */
    public static function gohome($arr){
        if(empty($arr))return SITE_URL;
        //$glue = DIRECTORY_SEPARATOR;
        return SITE_URL.implode('/', $arr);
    }
    
    /*
     * 判断是否为正确的URL地址
     */
    
   public static function isUrl($url){
        if (preg_match('/http:\/\/[\w.]+[\w\/]*[\w.]*\??[\w=&\+\%]*/is',$url)){
            return true;
        }
        return false;
   }
   
   /**
        * 返回经htmlspecialchars处理过的字符串或数组
        * @param $obj 需要处理的字符串或数组
        * @return mixed
        */
    public static function new_html_special_chars($string) {
        $encoding = 'utf-8';
        if(strtolower(CHARSET)=='gbk') $encoding = 'ISO-8859-15';
        if(!is_array($string)) return htmlspecialchars($string,ENT_QUOTES,$encoding);
        foreach($string as $key => $val) $string[$key] = new_html_special_chars($val);
        return $string;
    }
    
    /**
    * 安全过滤函数
    * @param $string
    * @return string
    */
    public static function safe_replace($string) {
	$string = str_replace('%20','',$string);
	$string = str_replace('%27','',$string);
	$string = str_replace('%2527','',$string);
	$string = str_replace('*','',$string);
	$string = str_replace('"','&quot;',$string);
	$string = str_replace("'",'',$string);
	$string = str_replace('"','',$string);
	$string = str_replace(';','',$string);
	$string = str_replace('<','&lt;',$string);
	$string = str_replace('>','&gt;',$string);
	$string = str_replace("{",'',$string);
	$string = str_replace('}','',$string);
	$string = str_replace('\\','',$string);
	return $string;
    }

    /**
     * xss过滤函数
     * @param $string
     * @return string
     */
    public static function remove_xss($string) { 
    $string = preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]+/S', '', $string);
    $parm1 = Array('javascript', 'vbscript', 'expression', 'applet', 'meta', 'xml', 'blink', 'script', 'embed', 'object', 'iframe', 'frame', 'frameset', 'ilayer', 'layer', 'bgsound', 'title', 'base');
    $parm2 = Array('onabort', 'onactivate', 'onafterprint', 'onafterupdate', 'onbeforeactivate', 'onbeforecopy', 'onbeforecut', 'onbeforedeactivate', 'onbeforeeditfocus', 'onbeforepaste', 'onbeforeprint', 'onbeforeunload', 'onbeforeupdate', 'onblur', 'onbounce', 'oncellchange', 'onchange', 'onclick', 'oncontextmenu', 'oncontrolselect', 'oncopy', 'oncut', 'ondataavailable', 'ondatasetchanged', 'ondatasetcomplete', 'ondblclick', 'ondeactivate', 'ondrag', 'ondragend', 'ondragenter', 'ondragleave', 'ondragover', 'ondragstart', 'ondrop', 'onerror', 'onerrorupdate', 'onfilterchange', 'onfinish', 'onfocus', 'onfocusin', 'onfocusout', 'onhelp', 'onkeydown', 'onkeypress', 'onkeyup', 'onlayoutcomplete', 'onload', 'onlosecapture', 'onmousedown', 'onmouseenter', 'onmouseleave', 'onmousemove', 'onmouseout', 'onmouseover', 'onmouseup', 'onmousewheel', 'onmove', 'onmoveend', 'onmovestart', 'onpaste', 'onpropertychange', 'onreadystatechange', 'onreset', 'onresize', 'onresizeend', 'onresizestart', 'onrowenter', 'onrowexit', 'onrowsdelete', 'onrowsinserted', 'onscroll', 'onselect', 'onselectionchange', 'onselectstart', 'onstart', 'onstop', 'onsubmit', 'onunload');
    $parm = array_merge($parm1, $parm2); 
	for ($i = 0; $i < sizeof($parm); $i++) { 
		$pattern = '/'; 
		for ($j = 0; $j < strlen($parm[$i]); $j++) { 
			if ($j > 0) { 
				$pattern .= '('; 
				$pattern .= '(&#[x|X]0([9][a][b]);?)?'; 
				$pattern .= '|(&#0([9][10][13]);?)?'; 
				$pattern .= ')?'; 
			}
			$pattern .= $parm[$i][$j]; 
		}
		$pattern .= '/i';
		$string = preg_replace($pattern, ' ', $string); 
	}
	return $string;
    }
    
    /**
     * 将数组按照某一列分组
     * @param type $data
     * @param type $field
     * @return type
     */
    public static function toGroup($data, $field) {
        $rs = array();
        foreach ($data AS $key => $value) {
            $rs[$value[$field]][] = $value;
        }
        return $rs;
    }
    
    /**
     * 设置缓存
     * @param string $id
     * @param array $data
     */
    public static function setCache($id,$data){
        Yii::app()->cache->set($id,$data);
    }
    
    /**
     * 获得缓存
     * @param string $id
     * @return array
     */
    public static function getCache($id){
        return Yii::app()->cache->get($id);
    }
    
    /**
     * 设置session
     * @param string $id
     * @param string $value
     */
    public static function setSession($id,$value){
        Yii::app()->session[$id] = (string)$value;
    }
    
    /**
     * 获得session
     * @param string $id
     * @return string
     */
     public static function getSession($id){
        return Yii::app()->session[$id];
    }
    
    /**
     * 清除某个session
     * @param string $id
     */
     public static function destroySession($id){
        unset(Yii::app()->session[$id]);
    }
    
    /**
     * 验证邮箱
     * @param string $email
     * @return bool
     */
    public static function checkEmail($email){
        $result = filter_var($email, FILTER_VALIDATE_EMAIL);
        if($result){
            return true;
        }else{
            return false;
        }
    }
    
    /**
     * 验证URL
     * @param string $url
     * @return bool
     */
    public static function checkUrl($url){
        $result = filter_var($url, FILTER_VALIDATE_URL);
        if($result){
            return true;
        }else{
            return false;
        }
    }
    
    
    /**
     * 验证IP
     * @param string $ip
     * @return bool
     */
    public static function checkIp($ip){
        $result = filter_var($ip, FILTER_VALIDATE_IP);
        if($result){
            return true;
        }else{
            return false;
        }
    }
    
    /**
     * 获得邮箱登陆地址
     * @param string $email
     * @return string
     */
    public static function getEmailLogin($email){
        return 'http://mail.'.substr($email,strpos($email,'@')+1);
    }
    
    /**
    * 字符串加密、解密函数
    * @param	string	$txt		字符串
    * @param	string	$operation	ENCODE为加密，DECODE为解密，可选参数，默认为ENCODE，
    * @param	string	$key		密钥：数字、字母、下划线
    * @param	string	$expiry		过期时间
    * @return	string
    */
   public static function sys_auth($string, $operation = 'ENCODE', $key = '', $expiry = 0) {
        $key_length = 4;
        $key = md5($key != '' ? $key : Yii::app()->params['auth_key']);
        $fixedkey = md5($key);
        $egiskeys = md5(substr($fixedkey, 16, 16));
        $runtokey = $key_length ? ($operation == 'ENCODE' ? substr(md5(microtime(true)), -$key_length) : substr($string, 0, $key_length)) : '';
        $keys = md5(substr($runtokey, 0, 16) . substr($fixedkey, 0, 16) . substr($runtokey, 16) . substr($fixedkey, 16));
        $string = $operation == 'ENCODE' ? sprintf('%010d', $expiry ? $expiry + time() : 0).substr(md5($string.$egiskeys), 0, 16) . $string : base64_decode(substr($string, $key_length));

        $i = 0; $result = '';
        $string_length = strlen($string);
        for ($i = 0; $i < $string_length; $i++){
            $result .= chr(ord($string{$i}) ^ ord($keys{$i % 32}));
        }
        if($operation == 'ENCODE') {
            return $runtokey . str_replace('=', '', base64_encode($result));
        } else {
            if((substr($result, 0, 10) == 0 || substr($result, 0, 10) - time() > 0) && substr($result, 10, 16) == substr(md5(substr($result, 26).$egiskeys), 0, 16)) {
                return substr($result, 26);
            } else {
                return '';
            }
        }
    }
    
    /**
    * 设置 cookie
    * @param string $var     变量名
    * @param string $value   变量值
    * @param int $time    过期时间
    */
    public static function set_cookie($var, $value = '', $time = 0, $httponly=false) {
        $time = $time > 0 ? $time : ($value == '' ? time() - 3600 : 0);
        $s = $_SERVER['SERVER_PORT'] == '443' ? 1 : 0;
        $var = Yii::app()->params['cookie_pre'].$var;
        $_COOKIE[$var] = $value;
        if (is_array($value)) {
                foreach($value as $k=>$v) {
                        setcookie($var.'['.$k.']', self::sys_auth($v, 'ENCODE'), $time, Yii::app()->params['cookie_path'], Yii::app()->params['cookie_domain'], $s, $httponly);
                }
        } else {
                setcookie($var, self::sys_auth($value, 'ENCODE'), $time, Yii::app()->params['cookie_path'], Yii::app()->params['cookie_domain'], $s, $httponly);
        }
    }
    
    /**
    * 获取通过 set_cookie 设置的 cookie 变量 
    * @param string $var 变量名
    * @param string $default 默认值 
    * @return mixed 成功则返回cookie值，否则返回 false
    */
    public static function get_cookie($var) {
        $cookie = Yii::app()->request->getCookies();
        return isset($cookie[$var]) ? GlobalF::sys_auth($cookie[$var], 'DECODE') : false;
    }
    
    /*
     * 处理'\' => '/’
     */
    public static function separator_r2l($path){
        if(empty($path)){
            return "javascript:;";
        }else{
            $path = str_replace("\\", '/', $path);
            return $path;
        }
    }
}
