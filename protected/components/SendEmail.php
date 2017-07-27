<?php

/**
 * @author wangzilong
 * @description 邮件类
 * @date 20160630
 */

class SendEmail
{
    public static function _send($email,$url){
        $message = '<p>欢迎注册糖糖闹闹网！点击下面链接（或复制访问），激活账户</p>';
        $message .= "<p><a href='$url'>$url</a></p>";
        $message .= '<p>若非本人操作请忽略！</p>';
        $mailer = Yii::createComponent('application.extensions.mailer.EMailer');
        $mailer->Host = 'smtp.163.com';
        $mailer->IsSMTP();
        $mailer->SMTPAuth = true;
        $mailer->From = 'xiaohelong22@163.com';
        $mailer->AddReplyTo('xiaohelong22@163.com');
        $mailer->AddAddress($email);
        $mailer->FromName = '糖糖闹闹网';
        $mailer->Username = 'xiaohelong22@163.com';    //这里输入发件地址的用户名
        $mailer->Password = 'wzl319wzh1216wy';    //这里输入发件地址的密码
        $mailer->SMTPDebug = false;   //设置SMTPDebug为true，就可以打开Debug功能，根据提示去修改配置
        $mailer->CharSet = 'UTF-8';
        $mailer->ContentType = 'text/html';
        $mailer->Subject = '糖糖闹闹网';
        $mailer->Body = $message;
        $x = $mailer->Send();
        return $x;
    }
}

