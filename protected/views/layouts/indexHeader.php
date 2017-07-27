<div id="header">
        <div id="header-wrap">
            <div id="dt-header">
                <div class="dt-wrap">
                    <a id="dt-logo" href="<?php echo Urls::get('url_home');?>">糖糖和闹闹</a>
                    <div id="dt-nav">
                        <div id="dt-nav-btn-cover"></div>
                        <div id="dt-nav-btn">分类 <i></i></div>
                        <div id="dt-nav-content-cover"></div>
                        <div id="dt-nav-content" class="clr">
                            <div id="dt-nav-left">
                                <div class="dt-nav-group">
                                    <p><a href="<?php echo Urls::get('url_home');?>">首页</a></p>
                                    <?php if(isset($classify[0])&&!empty($classify[0])){?>
                                    <?php foreach($classify[0] as $val){?>
                                    <?php $id = isset($val['id']) ? $val['id'] : '';?>
                                    <p><a id="<?php echo 'parent'.$id;?>" href="<?php echo $val['url'];?>" onmousemove="changeClassify(<?php echo $id;?>)"><?php echo $val['name'];?></a></p>
                                    <?php }?>
                                    <?php }?>
                                </div>
                            </div>
                            <?php foreach($classify as $key=>$val){?>
                            <?php if($key!=0){?>
                            <div class="dt-nav-right" id="<?php echo 'right'.$key;?>" style="display:none;">
                                <div class="dt-nav-right-inner">
                                    <div class="dt-nav-group">
                                    <?php foreach($val as $k=>$v){?>
                                        <a href="<?php echo $v['url'];?>"><?php echo $v['name'];?></a>
                                        <?php if($k!=count($val)-1){?>
                                        <div class="dt-nav-vline"></div>
                                        <?php }?>
                                    <?php }?>
                                    </div>
                                </div>
                            </div>
                            <?php }?>
                            <?php }?>
                        </div>
                    <div id="dt-nav-neck"></div>
                </div>
                <div id="dt-search">
                    <form action="/search/">
                        <input name="keyword" type="text" class="ipt" autocomplete="off" placeholder="search">
                        <button type="submit">搜索</button>
                    </form>
                </div>
                <div id="dt-header-right">
                    <?php if($this->uid>0){?>
                    <div id="dt-header-right">
                        <div class="dt-has-menu dt-head-cat" id="dt-notification">
                            <a href="<?php echo Urls::get('url_logout');?>" class="dt-notification-btn">退出</a>
                        </div>
                        <div class="dt-vline"></div>
                        <div class="dt-has-menu dt-head-cat" id="dt-notification">
                            <a href="" class="dt-notification-btn">消息</a>
                        </div>
                        <div class="dt-vline"></div>
                        <div class="dt-has-menu dt-head-cat" id="dt-account">
                            <a href="<?php echo Urls::get('url_personal');?>" class="dt-account-btn">
                                <img src="<?php echo isset($this->head) ? $this->head : '';?>" class="dt-avatar">
                            </a>
                        </div>
                    </div>
                    <?php }else{?>
                    <div id="dt-ologin" class="dt-has-menu">
                        <div class="dt-ologin-icons">
                            <a class="weibo" rel="nofollow" href="/connect/sina/?action=login&next=%2F">新浪微博</a>
                            <a class="qq" rel="nofollow" href="javascript:;" onclick='toQzoneLogin()'>腾讯 QQ</a>
                            <a class="douban" rel="nofollow" href="javascript:;">豆瓣</a>
                            <a class="taobao" rel="nofollow" href="javascript:;">淘宝</a>
                        </div>
                    </div>
                        <a id="dt-login" class="dt-head-cat" href="<?php echo Urls::get('url_login');?>">登录</a>
                    <div class="dt-vline"></div>
                    <a id="dt-register.html" class="dt-btn dt-head-cat" href="<?php echo Urls::get('url_register');?>">注册</a>
                    <?php }?>
                </div>
            </div>
            </div>
        <div id="dt-header-btm"></div>
    </div>
</div>