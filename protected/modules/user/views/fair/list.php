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
        <div class="album-header" style="margin-bottom:20px;text-align:center">
            <img class="album-header-bg ohmyblured" src="<?php echo SITE_URL.'assets/books/img/books.jpg'?>" height="280">
        </div>
        <div id="woo-holder">
            <div class="woo-swb">
                <div id= "masonry" class="woo-pcont stpics clr woo-masned" data-wootemp="4" data-totalunits="3542" style="position: relative; width: 1200px; height: 1772px; visibility: visible;">
                    <?php if(isset($data)&&!empty($data)){?>
                    <?php foreach($data as $val){?>
                    <div class="woo">
                        <div class="j">
                            <div class="mbpho">
                                <a target="_blank" class="a" href="/blog/?id=676768879">
                                <img alt="<?php echo $val['name'];?>" data-iid="" src="<?php echo SITE_URL.$val['src'];?>" />
                                </a>
                            </div>
                            <div class="wooscr">
                                <div class="g" ><?php echo $val['name'];?></div>
                                <div class="d">
                                    <span class="d1">84</span> 
                                    <span class="d2">4</span> 
                                    <span class="d3">0</span> 
<!--                                    <a class="bl" href="/redirect/?to=http%3A%2F%2Fwww.duitang.com%2Fredirect%2F%3Fto%3Dhttps%253A%252F%252Fdetail.tmall.com%252Fitem.htm%253Fid%253D540327345232%2526spm%253Da219t.7900221%252F10.1998910419.d30ccd691.QfdVbt%2526spm_d%26app_code%3D&amp;mk=_p_670954701" target="_blank">
                                        <u class="_tb" title="去购买"><b>￥138</b></u>
                                    </a>-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                    <?php }?>
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
    page = 2;
    appendButton.addEventListener( 'click', function() {
        var elems = [];
        var fragment = document.createDocumentFragment();
        var classify = "<?php echo $classify;?>";
        var siteUrl = '<?php echo SITE_URL;?>';
        $.post("<?php echo $ajaxUrl;?>",{page:page,classify:classify},function(result){
        result = eval(result);
        length = JSONLength(result);
        for ( var i = 0; i < length; i++ ) {
                var elem = getItemElement(result[i].name,siteUrl+result[i].url,result[i].src);
                fragment.appendChild( elem );
                elems.push( elem );
            }
            grid.appendChild( fragment );
            msnry.appended( elems );
            page +=1;
        });
    });
    function JSONLength(obj) {
        var size = 0, key;
        for (key in obj) {
        if (obj.hasOwnProperty(key)) size++;
        }
        return size;
    };

    function getItemElement(name,url,src) {
        var elem = document.createElement('div');
        elem.className = 'woo ';
        elem.innerHTML = '\
<div class="j">\n\
<div class="mbpho">\n\
<a target="_blank" class="a" href="'+url+'">\n\
<img alt="'+name+'" data-iid="" src="'+src+'"> \n\
</a>\n\
</div>\n\
<div class="wooscr">\n\
<div class="g">'+name+'</div>\n\
<div class="d">\n\
<span class="d1">84</span> \n\
<span class="d2">4</span> \n\
<span class="d3">0</span> \n\
</div>\n\
</div>\n\
</div>';
        return elem;
    }
</script>
</html>