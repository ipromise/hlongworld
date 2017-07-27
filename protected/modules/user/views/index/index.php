<!doctype html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
        <title>I love you ,My little dear!</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <link href="<?php echo CSS_PATH.'index1.css'?>" rel="stylesheet" />
        <link href="<?php echo CSS_PATH.'index2.css'?>" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo FILES_PATH;?>sideBar/css/animation.css">
        <link rel="stylesheet" href="<?php echo FILES_PATH;?>sideBar/css/sideBar.css">
        <link rel="stylesheet" href="<?php echo FILES_PATH;?>figure/css/style.css" type="text/css"/>
        <script src="<?php echo JS_PATH.'jquery-1.11.2.min.js'?>"></script>
        <script src="<?php echo JS_PATH.'index2.js'?>" ></script>
        <script type="text/javascript">
            var childWindow;
            function toQzoneLogin()
            {
                childWindow = window.location.href= "<?php echo SITE_URL;?>user/login/qq";
            } 
            
            function closeChildWindow()
            {
                childWindow.close();
            }
        </script>
        <script type="text/javascript" src="<?php echo FILES_PATH;?>figure/js/jq.slide.js"></script>
        <script type="text/javascript">
            $(function(){	
                $("#temp4").Slide({
                    effect : "scroolLoop",
                    autoPlay:false,
                    speed : "normal",
                    timer : 3000,
                    steps:2
                });	
            });
        </script>
    </head>
<body>
    <?php $this->renderPartial('//layouts/indexHeader',array('classify'=>$classify));?>
    <div id="content">
        <div class="dt-wrap">
            <div id="dt-top" class="clr">
                <div id="dt-top-inner">
                    <div class="l pg-fscleft">
                        <div id="slide-box">
                            <b class="corner"></b>
                                <div class="slide-content" id="temp4">
                                    <div class="wrap">
                                        <ul class="JQ-slide-content">
                                            <?php if(isset($banners)){?>
                                            <?php foreach($banners as $key=>$val){?>
                                            <li><a href="<?php echo $val['url'];?>" target="_blank"><IMG alt="jq22" src="<?php echo $val['src'];?>" width="330" height="450" /></a></li>
                                            <?php }?>
                                            <?php }?>
                                        </ul>
                                    </div>
                                    <div class="JQ-slide-nav">
                                        <a class="prev" href="#"><b class="corner"></b><span>&#8249;</span><B class="corner"></B></a>
                                        <a class="next" href="#"><b class="corner"></b><span>&#8250;</span><B class="corner"></B></a>
                                    </div>
                                </div>
                            <b class="corner"></b>
                        </div>
                    </div>
                    <div class="r pg-fscright">
                        <div id="dt-hot">
                            <h3><a target="_blank" class="dt-label event" href="<?php echo Urls::get('url_user_hot');?>">热点</a></h3>
                            <div class="dt-span dt-tags oh">
                                <div class="dt-span-sline clr">
                                    <div class="dt-tag"><a target="_blank" href="/blogs/tag/2016/?from=hot">2016</a></div>
                                    <div class="dt-tag"><a target="_blank" href="/blogs/item/%E9%99%90%E9%87%8F%E7%89%88/?from=hot">看看也好限量版</a></div>
                                    <div class="dt-tag"><a target="_blank" href="/blogs/tag/%E5%A4%AA%E5%AD%90%E5%A6%83%E5%8D%87%E8%81%8C%E8%AE%B0/?from=hot">太子妃升职记</a></div>
                                    <div class="dt-tag"><a target="_blank" href="/shopping/6/%E6%96%87%E5%85%B7/?from=hot">卖萌文具</a></div>
                                    <div class="dt-tag"><a target="_blank" href="/blogs/tag/%E6%8F%92%E7%94%BB/?from=hot">插画</a></div>
                                    <div class="dt-tag"><a target="_blank" href="/blogs/tag/%E5%8E%9F%E5%88%9B/?from=hot">原创</a></div>
                                    <div class="dt-tag"><a target="_blank" href="http://i.youku.com/u/UMTc2NzIzMzA2MA==?qq-pf-to=pcqq.group">深夜秘语</a></div>
                                    <div class="dt-tag"><a target="_blank" href="http://www.duitang.com/people/?user_id=1703771547#!original">你看起来很好吃</a></div>
                                </div>
                            </div>
                            <h3><a target="_blank" class="dt-label choice" href="<?php echo Urls::get('url_user_group');?>">小组</a></h3>
                            <div class="dt-span dt-tags oh">
                                <div class="dt-span-sline clr">
                                    <div class="dt-tag"><a target="_blank" href="/blogs/tag/2016/?from=hot">2016</a></div>
                                    <div class="dt-tag"><a target="_blank" href="/blogs/item/%E9%99%90%E9%87%8F%E7%89%88/?from=hot">看看也好限量版</a></div>
                                    <div class="dt-tag"><a target="_blank" href="/blogs/tag/%E5%A4%AA%E5%AD%90%E5%A6%83%E5%8D%87%E8%81%8C%E8%AE%B0/?from=hot">太子妃升职记</a></div>
                                    <div class="dt-tag"><a target="_blank" href="/shopping/6/%E6%96%87%E5%85%B7/?from=hot">卖萌文具</a></div>
                                    <div class="dt-tag"><a target="_blank" href="/blogs/tag/%E6%8F%92%E7%94%BB/?from=hot">插画</a></div>
                                    <div class="dt-tag"><a target="_blank" href="/blogs/tag/%E5%8E%9F%E5%88%9B/?from=hot">原创</a></div>
                                    <div class="dt-tag"><a target="_blank" href="http://i.youku.com/u/UMTc2NzIzMzA2MA==?qq-pf-to=pcqq.group">深夜秘语</a></div>
                                    <div class="dt-tag"><a target="_blank" href="http://www.duitang.com/people/?user_id=1703771547#!original">你看起来很好吃</a></div>
                                </div>
                            </div>
                            <h3><a target="_blank" class="dt-label baike" href="<?php echo Urls::get('url_user_baike');?>">百科</a></h3>
                            <div class="dt-span dt-tags oh">
                                <div class="dt-span-sline clr">
                                    <div class="dt-tag"><a target="_blank" href="/blogs/tag/2016/?from=hot">2016</a></div>
                                    <div class="dt-tag"><a target="_blank" href="/blogs/item/%E9%99%90%E9%87%8F%E7%89%88/?from=hot">看看也好限量版</a></div>
                                    <div class="dt-tag"><a target="_blank" href="/blogs/tag/%E5%A4%AA%E5%AD%90%E5%A6%83%E5%8D%87%E8%81%8C%E8%AE%B0/?from=hot">太子妃升职记</a></div>
                                    <div class="dt-tag"><a target="_blank" href="/shopping/6/%E6%96%87%E5%85%B7/?from=hot">卖萌文具</a></div>
                                    <div class="dt-tag"><a target="_blank" href="/blogs/tag/%E6%8F%92%E7%94%BB/?from=hot">插画</a></div>
                                    <div class="dt-tag"><a target="_blank" href="/blogs/tag/%E5%8E%9F%E5%88%9B/?from=hot">原创</a></div>
                                    <div class="dt-tag"><a target="_blank" href="http://i.youku.com/u/UMTc2NzIzMzA2MA==?qq-pf-to=pcqq.group">深夜秘语</a></div>
                                    <div class="dt-tag"><a target="_blank" href="http://www.duitang.com/people/?user_id=1703771547#!original">你看起来很好吃</a></div>
                                </div>
                            </div>
                            <div id="pg-appdload"><a href="/app/duitang/" target="_blank">app下载</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="dt-center" class="clr">
                <div class="dt-block">
                    <div class="pg-ttentry r">
                        <a target="_blank" class="pg-blue-btn" href="/people/?user_id=1726490718#!favalbum">往期回顾 &gt;</a>
                    </div>
                    <h2>备孕精选</h2>
                    <div class="dt-album oh">
                        <div class="section" data-id="52158190">
                            <div class="section-img">
                                <img src="<?php echo IMG_PATH;?>20160110154532_ycpzh.thumb.224_224_c.jpeg">
                                <a target="_blank" class="dt-img-cover" href="/album/52158190/"></a>
                            </div>
                            <div class="section-desc">
                                <a target="_blank" class="section-title" href="/album/52158190/">随拍是件好玩儿的事</a>
                                <div class="section-attr">
                                    <p>468个收集 <b>·</b> 249人喜欢</p>
                                    <p>by <a target="_blank" class="dt-username" href="/people/?user_id=529269">小柠</a></p>
                                </div>
                                <div class="section-bottom-a"></div>
                                <div class="section-bottom-b"></div>
                            </div>
                        </div>
                        <div class="section" data-id="74896154">
                            <div class="section-img">
                                <img src="<?php echo IMG_PATH;?>20160109224410_mwwkd.thumb.224_224_c.jpeg">
                                <a target="_blank" class="dt-img-cover" href="/album/74896154/"></a>
                            </div>
                            <div class="section-desc">
                                <a target="_blank" class="section-title" href="/album/74896154/">把感触画成痴</a>
                                <div class="section-attr">
                                    <p>42个收集 <b>·</b> 725人喜欢</p>
                                    <p>by <a target="_blank" class="dt-username" href="/people/?user_id=5267560">凉岛Ellis</a></p>
                                </div>
                                <div class="section-bottom-a"></div>
                                <div class="section-bottom-b"></div>
                            </div>
                        </div>
                        <div class="section" data-id="60285695">
                            <div class="section-img">
                                <img src="<?php echo IMG_PATH;?>20160109224524_wsikf.thumb.224_224_c.jpeg">
                                <a target="_blank" class="dt-img-cover" href="/album/60285695/"></a>
                            </div>
                            <div class="section-desc">
                                <a target="_blank" class="section-title" href="/album/60285695/">小桥流水 烟笼人家</a>
                                <div class="section-attr">
                                    <p>226个收集 <b>·</b> 1140人喜欢</p><p>by <a target="_blank" class="dt-username" href="/people/?user_id=21711">长九</a></p>
                                </div>
                                <div class="section-bottom-a"></div>
                                <div class="section-bottom-b"></div>
                            </div>
                        </div>
                        <div class="section" data-id="70710805">
                            <div class="section-img">
                                <img src="<?php echo IMG_PATH;?>20160108224332_nwfwe.thumb.224_224_c.jpeg">
                                <a target="_blank" class="dt-img-cover" href="/album/70710805/"></a>
                            </div>
                            <div class="section-desc">
                                <a target="_blank" class="section-title" href="/album/70710805/">敏感肌的不敏感安利</a>
                                <div class="section-attr">
                                    <p>56个收集 <b>·</b> 568人喜欢</p>
                                    <p>by <a target="_blank" class="dt-username" href="/people/?user_id=3085644">insane-leo</a></p>
                                </div>
                                <div class="section-bottom-a"></div>
                                <div class="section-bottom-b"></div>
                            </div>
                        </div>
                        <div class="section" data-id="57037334">
                            <div class="section-img">
                                <img src="<?php echo IMG_PATH;?>20160108204445_k3wzm.thumb.224_224_c.jpeg">
                                <a target="_blank" class="dt-img-cover" href="/album/57037334/"></a>
                            </div>
                            <div class="section-desc">
                                <a target="_blank" class="section-title" href="/album/57037334/">若说花事了 幸福知多少</a>
                                <div class="section-attr">
                                    <p>281个收集 <b>·</b> 601人喜欢</p>
                                    <p>by <a target="_blank" class="dt-username" href="/people/?user_id=1741172">贤良动物</a></p>
                                </div>
                                <div class="section-bottom-a"></div>
                                <div class="section-bottom-b"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dt-block">
                    <div class="pg-tmentry r pg-gray-link">
                        <span>良品购：</span><a href="/shopping/?from=home" target="_blank">全部</a><a href="/shopping/1/?from=home" target="_blank">上衣</a><a href="/shopping/2/?from=home" target="_blank">裙裤</a><a href="/shopping/3/?from=home" target="_blank">配饰</a><a href="/shopping/4/?from=home" target="_blank">鞋子</a><a href="/shopping/5/?from=home" target="_blank">包袋</a><a href="/shopping/6/?from=home" target="_blank">日杂</a>
                    </div>
                    <h2>孕期推荐<a href="/badge/category/user/?tag=全部" target="_blank" class="dt-sblnk" ></a></h2>
                    <div class="dt-woo-list oh">
                        <div class="dt-woo-list-inner">
                            <div class="dt-woo dt-woo-0">
                                <a target="_blank" class="dt-woo-img">
                                    <img src="<?php echo IMG_PATH;?>20160107183916_wasnz.thumb.224_224_c.jpeg">
                                </a>
                                <a target="_blank" class="dt-img-cover" href="http://www.duitang.com/shopping/1/%E6%89%93%E5%BA%95%E8%A1%AB/?from_blog=509647661"></a>
                                <div class="dt-woo-desc">
                                    <p class="dt-woo-title">
                                        <a target="_blank" href="http://www.duitang.com/shopping/1/%E6%89%93%E5%BA%95%E8%A1%AB/?from_blog=509647661">打底衫</a>
                                    </p>
                                    <p class="dt-woo-attr">19204人在逛</p>
                                    <a target="_blank" href="/shopping/?from=home" class="dt-woo-cat">良品购</a>
                                </div>
                            </div>
                            <div class="dt-woo dt-woo-1">
                                <a target="_blank" class="dt-woo-img">
                                    <img src="<?php echo IMG_PATH;?>20160106063718_bsmzs.thumb.224_224_c.jpeg">
                                </a>
                                <a target="_blank" class="dt-img-cover" href="http://www.duitang.com/shopping/2/%E4%BC%91%E9%97%B2%E8%A3%A4/?from_blog=509022212"></a>
                                <div class="dt-woo-desc">
                                    <p class="dt-woo-title">
                                        <a target="_blank" href="http://www.duitang.com/shopping/2/%E4%BC%91%E9%97%B2%E8%A3%A4/?from_blog=509022212">休闲裤</a>
                                    </p>
                                    <p class="dt-woo-attr">19308人在逛</p>
                                    <a target="_blank" href="/shopping/?from=home" class="dt-woo-cat">良品购</a>
                                </div>
                            </div>
                            <div class="dt-woo dt-woo-2">
                                <a target="_blank" class="dt-woo-img">
                                    <img src="<?php echo IMG_PATH;?>20160108041108_ifk4f.thumb.224_224_c.jpeg">
                                </a>
                                <a target="_blank" class="dt-img-cover" href="http://www.duitang.com/shopping/3/%E5%9B%B4%E5%B7%BE/?from_blog=509841310"></a>
                                <div class="dt-woo-desc">
                                    <p class="dt-woo-title">
                                        <a target="_blank" href="http://www.duitang.com/shopping/3/%E5%9B%B4%E5%B7%BE/?from_blog=509841310">围巾</a>
                                    </p>
                                    <p class="dt-woo-attr">18269人在逛</p>
                                    <a target="_blank" href="/shopping/?from=home" class="dt-woo-cat">良品购</a>
                                </div>
                            </div>
                            <div class="dt-woo dt-woo-3">
                                <a target="_blank" class="dt-woo-img">
                                    <img src="<?php echo IMG_PATH;?>20160107102210_nrzx3.thumb.224_224_c.jpeg">
                                </a>
                                <a target="_blank" class="dt-img-cover" href="http://www.duitang.com/shopping/4/%E6%87%92%E4%BA%BA%E9%9E%8B/?from_blog=509478203"></a>
                                <div class="dt-woo-desc">
                                    <p class="dt-woo-title"><a target="_blank" href="http://www.duitang.com/shopping/4/%E6%87%92%E4%BA%BA%E9%9E%8B/?from_blog=509478203">懒人鞋</a></p>
                                    <p class="dt-woo-attr">18309人在逛</p>
                                    <a target="_blank" href="/shopping/?from=home" class="dt-woo-cat">良品购</a>
                                </div>
                            </div>
                            <div class="dt-woo dt-woo-4">
                            <a target="_blank" class="dt-woo-img">
                                <img src="<?php echo IMG_PATH;?>20160107193140_akvlp.thumb.224_224_c.jpeg">
                            </a>
                            <a target="_blank" class="dt-img-cover" href="http://www.duitang.com/shopping/6/%E5%8E%A8%E6%88%BF%E5%99%A8%E5%85%B7/?from_blog=509671399"></a>
                            <div class="dt-woo-desc">
                                <p class="dt-woo-title">
                                    <a target="_blank" href="http://www.duitang.com/shopping/6/%E5%8E%A8%E6%88%BF%E5%99%A8%E5%85%B7/?from_blog=509671399">厨房器具</a>
                                </p>
                                <p class="dt-woo-attr">18505人在逛</p>
                                <a target="_blank" href="/shopping/?from=home" class="dt-woo-cat">良品购</a>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="dt-block dt-daren">
                    <div class="pg-ttentry r">
                        <a target="_blank" class="pg-blue-btn" href="/badge/category/user/?tag=%E5%85%A8%E9%83%A8">更多达人 &gt;</a>
                    </div>
                    <h2>分娩故事<a href="/badge/category/user/?tag=全部" target="_blank" class="dt-sblnk" ></a></h2>
                    <div class="dt-album dt-albumrv oh">

                        <div data-id="沉睡的Two耳" class="section">
                            <div class="daren-img">
                                <img class="daren-bkg" src="http://img4.duitang.com/uploads/files/201401/20/20140120184014_HP8wv.thumb.224_112_c.jpeg">
                                <a href="/people/?user_id=7057143" class="daren-img-cover" target="_blank"></a>
                                <a href="/people/?user_id=7057143" target="_blank">
                                    <img src="http://img4.duitang.com/uploads/people/201506/21/20150621113945_KNu2c.thumb.80_80_c.jpeg" class="daren-avatar">
                                </a>
                            </div>
                            <a href="/people/?user_id=7057143" target="_blank"></a>
                            <div class="daren-desc">
                                <a href="/people/?user_id=7057143" target="_blank"></a>
                                <a href="/people/?user_id=7057143" class="daren-title" target="_blank">沉睡的Two耳</a>
                                <p class="daren-collect-count">
                                    <span class="daren-star"> </span>
                                    <span class="daren-count-total">724</span>
                                </p>
                                <p class="daren-expertise">擅长领域: <b>园艺</b></p>
                            </div>
                        </div>
                        
                        <div data-id="沉睡的Two耳" class="section">
                            <div class="daren-img">
                                <img class="daren-bkg" src="http://img4.duitang.com/uploads/files/201401/20/20140120184014_HP8wv.thumb.224_112_c.jpeg">
                                <a href="/people/?user_id=7057143" class="daren-img-cover" target="_blank"></a>
                                <a href="/people/?user_id=7057143" target="_blank">
                                    <img src="http://img4.duitang.com/uploads/people/201506/21/20150621113945_KNu2c.thumb.80_80_c.jpeg" class="daren-avatar">
                                </a>
                            </div>
                            <a href="/people/?user_id=7057143" target="_blank"></a>
                            <div class="daren-desc">
                                <a href="/people/?user_id=7057143" target="_blank"></a>
                                <a href="/people/?user_id=7057143" class="daren-title" target="_blank">沉睡的Two耳</a>
                                <p class="daren-collect-count">
                                    <span class="daren-star"> </span>
                                    <span class="daren-count-total">724</span>
                                </p>
                                <p class="daren-expertise">擅长领域: <b>园艺</b></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dt-block">
                    <h2>大家正在逛</h2>
                </div>
            </div>
        </div>
        <div id="fordymarea">
            <a name="woo-anchor" class="woo-swa"></a>
            <div class="woo-swb">
                <div class="woo-pcont stpics clr " data-subpagenum="1" data-totalunits="24" ></div>
                <div class="woo-pager"></div>
                <script>
                    $('#fordymarea').attr('id','woo-holder').find('div.woo-pcont').addClass('woo-masned')
                </script>
            </div>
        </div>
        <div id="dt-woomore">
            <a class="dt-pg-btn" href="/topics/">浏览更多 ></a>
        </div>
    </div>
    <?php $this->renderPartial('/layouts/footer')?>
    <?php $this->renderPartial('/layouts/sideBar');?>
</body>
<script>
    $('#dt-nav').mouseover(function(){
        $(this).addClass('show');
    });
    $('#dt-nav').mouseout(function(){
        $(this).removeClass('show');
    });
    $('#dt-login').click(function(){
        $('#login').css('display','block');
        $('#loginbg').css('display','block');
    });
</script>
<script>
    function changeClassify(id){
        $('.dt-nav-right').css('display','none');
        $('#right'+id).css('display','block');
    }
</script>
</html>