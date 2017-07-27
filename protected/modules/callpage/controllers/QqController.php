<?php

/* 
 * QQ页面回调应答
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class QqController extends Controller
{
    public function actionIndex(){
        $qc = new QC();
        $qc->qq_callback();
        $qc->get_openid();

        $arr = $qc->get_user_info();
        
        var_dump($arr);
    }
}


