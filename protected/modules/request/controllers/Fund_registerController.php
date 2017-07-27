<?php

/* 
 * 基金开户请求
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Fund_registerController extends Controller
{
    public function actionIndex(){
        $chinapnr= Chinapnr::getInstance();
        $param['merCustId'] = '6000060000309223';
        $param['usrCustId'] = '6000060000600835';
        $param['pageType'] = 1;
        $param['retUrl'] = '';
        $param['bgRetUrl'] = 'http://www.hedawuxie.com/callback/fund_register';
        $param['merPriv'] = '';

        $_REQUEST['method'] = 'FundRegister';
        $_REQUEST['param'] = $param;
        try{
            $method= lcfirst ($_REQUEST['method']);
            $params= $_REQUEST['param'];

            $cmd= '$result= $chinapnr->'.$method.'(';
            foreach ($params as $k => $v){
                    $cmd.= '"'.$v.'",';
            }

            $cmd= substr($cmd, 0, strlen($cmd)-1);
            $cmd.=');';
            // $cmd likes follow contents:
            //$chinapnr->usrRegister("6000060000002526","111111111");
            //$chinapnr->querySubAccount("6000060000002526");
            //$chinapnr->queryAccountBalance("880001","BASEDT");
            print($cmd);
            eval($cmd);
            print_r($result);
        }catch (Exception $e){
            print "demo execute error!";
        }
    }
}


