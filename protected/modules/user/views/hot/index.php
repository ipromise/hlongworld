<!doctype html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
        <title>I love you ,My little dear!</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <link href="<?php echo FILES_PATH;?>article/css/articleMain.css" rel="stylesheet" type="text/css">
        <link href="<?php echo FILES_PATH;?>article/css/specialList.css" rel="stylesheet" type="text/css">
        <link href="<?php echo FILES_PATH;?>personal/css/main.css" rel="stylesheet" type="text/css">
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
        <!-- 瀑布流开始 -->
        <link rel="stylesheet" type="text/css" href="<?php echo FILES_PATH;?>waterfall/css/lib.css">
        <link href="<?php echo FILES_PATH;?>waterfall/css/category.css" rel="stylesheet" />
        <!-- 瀑布流结束 -->
    </head>
<body>
    <?php $this->renderPartial('//layouts/header');?>
    <div id="content">
        <div id="woo-holder">
            <div class="woo-swb">
                <div id= "masonry" class="woo-pcont stpics clr woo-masned" data-wootemp="4" data-totalunits="3542" style="position: relative; width: 1200px; height: 1772px; visibility: visible;">
                    <div class="woo">
                        <div class="j">
                            <div class="mbpho" style="height:316px;">
                                <a target="_blank" class="a" href="/blog/?id=676768879">
                                <img data-rootid="676768879" alt="王者荣耀 露娜 花木兰" data-iid="" src="<?php echo FILES_PATH;?>waterfall/img/20161205081948_nxqjk.thumb.224_0.jpeg" height="316"/>
                                <u style="margin-top:-316px;height:314px;"></u>
                                </a>
                            </div>
                            <div class="wooscr">
                                <div class="g" >王者荣耀 露娜 花木兰</div>
                                    <div class="d">
                                        <span class="d1 ">12</span>
                                        <span class="d2 ">2</span>
                                        <span class="d3">0</span>
                                    </div>
                                <ul>
                                    <li class="f">
                                        <a target="_blank" href="/people/?user_id=11904334">
                                            <img width="24" height="24" src="<?php echo FILES_PATH;?>waterfall/img/20161122184637_fvvkp.thumb.24_24.png" />
                                        </a>
                                        <p>
                                            <a class="p" target="_blank" href="/people/?user_id=11904334">沁雅血沫</a>
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <a href="javascript:;" class="dt-pg-btn" id="moreHot">浏览更多</a>
    </div>
    <?php $this->renderPartial('//layouts/footer');?>
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
<script src="http://masonry.desandro.com/masonry.pkgd.js"></script>
<script>
    var grid = document.querySelector('#masonry');
    var msnry = new Masonry( grid, {
      columnWidth: 0,
      itemSelector: '.woo',
      isFitWidth: true,
    });

    var appendButton = document.querySelector('#moreHot');
    appendButton.addEventListener( 'click', function() {
        var elems = [];
        var fragment = document.createDocumentFragment();
        for ( var i = 0; i < 4; i++ ) {
            var elem = getItemElement();
            fragment.appendChild( elem );
            elems.push( elem );
        }
        grid.appendChild( fragment );
        msnry.appended( elems );
    });

    function getItemElement() {
        var elem = document.createElement('div');
        elem.className = 'woo ';
        elem.innerHTML = '<div class="j"><div class="mbpho" style="height:224px"><a target="_blank" class="a" href="/blog/?id=670954701"><img data-rootid="670954701" alt="减压萌宠可爱小玩意生日礼物女生闺蜜同学朋友创意实用新奇特礼品" data-iid="" src="/assets/waterfall/img/20161121152058_vyut8.thumb.224_0.jpeg" height="224"> <u style="margin-top:-224px;height:222px"></u></a></div><div class="wooscr"><div class="g">减压萌宠可爱小玩意生日礼物女生闺蜜同学朋友创意实用新奇特礼品</div><div class="d"><span class="d1">84</span> <span class="d2">4</span> <span class="d3">0</span> <a class="bl" href="/redirect/?to=http%3A%2F%2Fwww.duitang.com%2Fredirect%2F%3Fto%3Dhttps%253A%252F%252Fdetail.tmall.com%252Fitem.htm%253Fid%253D540327345232%2526spm%253Da219t.7900221%252F10.1998910419.d30ccd691.QfdVbt%2526spm_d%26app_code%3D&amp;mk=_p_670954701" target="_blank"><u class="_tb" title="去购买"><b>￥138</b></u></a></div><ul><li class="f"><a target="_blank" href="/people/?user_id=815655"><img width="24" height="24" src="/assets/waterfall/img/20120814141337_uk53x.thumb.24_24.jpeg"></a><p><a class="p" target="_blank" href="/people/?user_id=815655">郑南音</a></p></li></ul></div></div>';
        return elem;
    }
</script>
</html>