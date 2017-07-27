<link href="<?php echo FILES_PATH.'fontAwesome/css/font-awesome.min.css'?>" rel="stylesheet" />
<div class="header">
    <div class="menuBox">
        <div style="position: relative; top: 0px;" class="menu">
            <div class="box">
                <div class="w">
                    <ul class="tabList oldWeb">
                        <li class="on">
                            <div class="menuCont">
                                <a href="<?php echo Urls::get('url_home');?>"><i class="common-icon home"></i></a>
                                <span class="pipe"></span>
                            </div>
                        </li>
                        <li class="noIndex">
                            <div class="menuCont">
                                <a href="javascript:;">
                                    <i class="common-icon communicate"></i>
                                    <span class="text">集市</span>
                                    <b class="downToggle"></b>
                                </a>
                                <span class="pipe"></span>
                                <div class="sec-menu">
                                    <ul class="menuList">
                                        <?php foreach(Fair::main() as $val){?>
                                            <li><a href="<?php echo isset($val['url']) ? $val['url'] : '';?>"><?php echo isset($val['name']) ? $val['name'] : '';?></a></li>
                                        <?php }?>
                                    </ul>
                                    <em class="arrow"></em>
                                    <em class="arrow arrowTop"></em>
                                </div>
                            </div>
                            <div class="secMenuBt"></div>
                        </li>
                        <li class="noIndex">
                            <div class="menuCont">
                                <a href="<?php echo Urls::get('url_user_diary');?>">
                                    <i class="common-icon communicate"></i>
                                    <span class="text">日记</span>
                                    <b class="downToggle"></b>
                                </a>
                                <span class="pipe"></span>
                                <div class="sec-menu">
                                    <ul class="menuList">
                                        <li><a href="">搞笑</a></li>
                                        <li><a href="">心得</a></li>
                                    </ul>
                                    <em class="arrow"></em>
                                    <em class="arrow arrowTop"></em>
                                </div>
                            </div>
                            <div class="secMenuBt"></div>
                        </li>
                        
                        <li class="noIndex">
                            <div class="menuCont">
                                <a href="<?php echo Urls::get('url_user_hot');?>">
                                    <i class="common-icon communicate"></i>
                                    <span class="text">热点</span>
                                    <b class="downToggle"></b>
                                </a>
                                <span class="pipe"></span>
                                <div class="sec-menu">
                                    <ul class="menuList">
                                        <li><a href="">热点1</a></li>
                                        <li><a href="">热点1</a></li>
                                        <li><a href="">热点1</a></li>
                                        <li><a href="">热点1</a></li>
                                        <li><a href="">热点1</a></li> 
                                        <li><a href="">热点1</a></li>
                                        <li><a href="">热点1</a></li>
                                        <li><a href="">热点1</a></li>
                                    </ul>
                                    <em class="arrow"></em>
                                    <em class="arrow arrowTop"></em>
                                </div>
                            </div>
                            <div class="secMenuBt"></div>
                        </li>
                        <li class="noIndex">
                            <div class="menuCont">
                                <a href="<?php echo Urls::get('url_user_group');?>">
                                    <i class="common-icon communicate"></i>
                                    <span class="text">小组</span>
                                    <b class="downToggle"></b>
                                </a>
                                <span class="pipe"></span>
                                <div class="sec-menu">
                                    <ul class="menuList">
                                        <li><a href="">小组</a></li>
                                        <li><a href="">小组</a></li>
                                        <li><a href="">小组</a></li>
                                        <li><a href="">小组</a></li>
                                        <li><a href="">小组</a></li>
                                        <li><a href="">小组</a></li>
                                        <li><a href="">小组</a></li>
                                        <li><a href="">小组</a></li> 
                                    </ul>
                                    <em class="arrow"></em>
                                    <em class="arrow arrowTop"></em>
                                </div>
                            </div>
                            <div class="secMenuBt"></div>
                        </li>
                        <li class="noIndex">
                            <div class="menuCont">
                                <a href="<?php echo Urls::get('url_user_baike');?>">
                                    <i class="common-icon communicate"></i>
                                    <span class="text">百科</span>
                                    <b class="downToggle"></b>
                                </a>
                                <span class="pipe"></span>
                                <div class="sec-menu">
                                    <ul class="menuList">
                                        <li><a href="">百科</a></li>
                                        <li><a href="">百科</a></li>
                                        <li><a href="">百科</a></li>
                                        <li><a href="">百科</a></li>
                                        <li><a href="">百科</a></li>
                                        <li><a href="">百科</a></li>
                                        <li><a href="">百科</a></li>
                                        <li><a href="">百科</a></li> 
                                    </ul>
                                    <em class="arrow"></em>
                                    <em class="arrow arrowTop"></em>
                                </div>
                            </div>
                            <div class="secMenuBt"></div>
                        </li>
                        
                    </ul>
                    
                        <div class="searchAppBox fr">
                            <div class="searchBox fl">
                                <div class="search fl">
                                    <input class="text" id="keyword" placeholder="请输入要搜索的关键词" type="text">
                                    <input class="btn icoF" value="" id="searchBtn" type="button">
                                </div>
                                <span class="pipe fl"></span>
                                <div class="loginBox fr">
                                    <div class="user">
                                        <?php if($this->uid>0){?>
                                        <em class="portrait"><img src="<?php echo isset($this->head) ? $this->head : '';?>" onclick="window.location.href='<?php echo Urls::get('url_personal');?>'" style="cursor: pointer;"></em>
                                        <em class="portrait" style="margin-left:10px;" onclick="window.location.href='<?php echo Urls::get('url_logout');?>'"><i class="icon-off" style="color:#fb7191;font-size:35px;cursor: pointer;"></i></em>
                                        <?php }else{?>
                                        <em class="portrait" style="margin-left:10px;border-radius:0" onclick="window.location.href='<?php echo Urls::get('url_login');?>'"><i class="icon-user" style="color:#22b4f6;font-size:35px;cursor: pointer;"></i></em>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>