<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="Description" content="">
        <meta name="Keywords" content="">
        <link href="<?php echo FILES_PATH;?>personal/css/common.css" rel="stylesheet" type="text/css">
        <link href="<?php echo FILES_PATH;?>personal/css/user.css" rel="stylesheet" type="text/css">
        <link href="<?php echo FILES_PATH;?>personal/css/main.css" rel="stylesheet" type="text/css">
	<script src="<?php echo FILES_PATH;?>personal/js/jquery.js" type="text/javascript"></script>
	<script src="<?php echo FILES_PATH;?>personal/js/main.js" type="text/javascript"></script>
        
        <!-- 我的日记开始 -->
        <link rel="stylesheet" type="text/css" href="<?php echo FILES_PATH;?>diary/css/history.css">
        <script type="text/javascript" src="<?php echo FILES_PATH;?>diary/js/jquery.js"></script>
        <!--<script type="text/javascript" src="<?php echo FILES_PATH;?>diary/js/jquery.mousewheel.js"></script>-->
        <script type="text/javascript" src="<?php echo FILES_PATH;?>diary/js/jquery.easing.js"></script>
        <script type="text/javascript" src="<?php echo FILES_PATH;?>diary/js/history.js"></script>
        <!-- 我的日记结束 -->
    </head>
<body>
<?php $this->renderPartial('//layouts/header');?>
<div class="main">
    <div class="spaceTop pr" style="background:url(http://img5.lamaqun.com/M00/5D/94/eQ519FJfhVmAeD3jAAYmmSLSjYc019.png) no-repeat">
        <a class="changbg" title="更换背景图片" href="http://www.lamabang.com/user-setting/custombg"></a>    	
        <div class="pa" style="cursor: pointer;" onclick="window.location.href='<?php echo $url_personal_setHead;?>'"><img src="<?php echo $head;?>" ></div>
    	<div class="setName">
            <div>
                <span class="spaceName"><?php echo $username;?></span>
                <span class="spaceLV">LV1</span>
                <p class="setButton"></p>
            </div>
            <div class="mt10"></div>
        </div>
        <div class="spaceTF">
        	<ul class="fl">
            	<li style="border:none;">
                    <p>好友</p>
                    <p>58</p>
                </li> 
            	<li>
                    <p><a href="">小组</a></p>
                    <p>12</p>
                </li>
            	<li>
                    <p><a href="">日记</a></p>
                    <p>10</p>
                </li>
            	<li>
                    <p><a href="">收藏</a></p>
                    <p>10</p>
                </li>
                <div class="cb"></div>
            </ul>
            <div class="cb"></div>
        </div>
    </div>
    <div class="center">
        <div class="cRight">
        <div class="listBox">
	<p class="topT">
            <span>热门小组</span>
            <span class="f12"></span>
            <a href="http://www.lamabang.com/user-more/u--tab-2.html"></a>
	</p>
	<ul class="ml5">
            <li>
                <a href="http://www.lamabang.com/user-space/u-6A4D4C17686344136A5D6A1A.html">
                    <img src="<?php echo FILES_PATH;?>personal/css/100.jpg">
                </a>
                <p>
                    <a href="http://www.lamabang.com/user-space/u-6A4D4C17686344136A5D6A1A.html">半夏微凉，不成殇°</a>
                </p>
            </li>
        </ul>
    </div>     
    <div class="hotTheme">
	<p class="topT">
            <span>热门话题</span>
	</p>
	<ul>
            <li>
                <a class="text9" href="http://www.lamabang.com/topic/id-4739440.html">普吉岛-曼谷我的圆梦之旅</a>
                <span>454</span>
            </li>
				<li>
			<a class="text9" href="http://www.lamabang.com/topic/id-4737715.html">奶粉罐巧变小沙发制作过程</a>
			<span>151</span>
		</li>
				<li>
			<a class="text9" href="http://www.lamabang.com/topic/id-4735991.html">梦寐哈尔滨</a>
			<span>219</span>
		</li>
				<li>
			<a class="text9" href="http://www.lamabang.com/topic/id-4728544.html">子虞家的肉松-宝宝专享</a>
			<span>107</span>
		</li>
				<li>
			<a class="text9" href="http://www.lamabang.com/topic/id-4721033.html">大家都来绣绣宝宝笑的有多贼！</a>
			<span>1623</span>
		</li>
				<li>
			<a class="text9" href="http://www.lamabang.com/topic/id-4716343.html">胖天营养泥牛油果香蕉奶昔</a>
			<span>218</span>
		</li>
				<li>
			<a class="text9" href="http://www.lamabang.com/topic/id-4710977.html">女人懂相守，男人懂感恩，才是一辈子转载！</a>
			<span>667</span>
		</li>
				<li>
			<a class="text9" href="http://www.lamabang.com/topic/id-4703530.html">电饭煲蛋糕，要方法的来</a>
			<span>2558</span>
		</li>
				<li>
			<a class="text9" href="http://www.lamabang.com/topic/id-4698787.html">凉拌茄子</a>
			<span>969</span>
		</li>
				<li>
			<a class="text9" href="http://www.lamabang.com/topic/id-1406.html">欢迎加入深圳宝安华胜实验学校辣妈帮</a>
			<span>0</span>
		</li>
		 	</ul>
    </div>             
    <div class="listBox">
	<p class="topT">
            <span>最新访客</span><span class="f12"></span>
            <a href="http://www.lamabang.com/user-more/u--tab-4.html"></a>
	</p>
        <div class="noData">
            <a>还没有访客哦，去别处逛逛吧。</a>
	</div>
    </div>
    <div class="listBox">
	<p class="topT">
            <span>我的关注</span><span class="f12">(1)</span>
            <a href="http://www.lamabang.com/user-more/u--tab-1.html" title="更多"></a>
	</p>
        <ul class="ml5">
            <li>
                <a href="http://www.lamabang.com/user-space/u-6A73445F.html">
                    <img src="<?php echo FILES_PATH;?>personal/css/201206271108198474.jpg">
                </a>
                <p>
                    <a href="http://www.lamabang.com/user-space/u-6A73445F.html">小小辣妈</a>
                </p>
            </li> 
	</ul>
    </div>
        <div class="listBox">
            <p class="topT">
		<span>我的粉丝</span><span class="f12">(0)</span>
		<a href="http://www.lamabang.com/user-more/u--tab-3.html" title="更多"></a>
            </p>
            <div class="noData">
		<a>还没有粉丝哦，去别处逛逛吧。</a>
            </div>
	</div>
    </div>
    <div class="cLeft">
            <div class="myTrends">
            	<div class="h40">
                    <ul class="fl">
                    	<li class="selectFaction"><a href="http://www.lamabang.com/user-space/u-6A4D4C17686344136973761A-t-topic.html">我的话题</a></li>
                        <li class=""><a href="http://www.lamabang.com/user-space/u-6A4D4C17686344136973761A-t-comment.html">我的回复</a></li>
                        <li class=""><a href="http://www.lamabang.com/user-space/u-6A4D4C17686344136973761A-t-favorite.html">我的收藏</a></li>
                    	<li class=""><a href="http://www.lamabang.com/user-space/u-6A4D4C17686344136973761A-t-diary.html">我的日记</a></li>
                        <div class="fb"></div>
                    </ul>
                    <div class="fb"></div>
                </div>
                <?php if(isset($mydiarys)&&!empty($mydiarys)){?>
                <div id="history">
                    <div class="title">
                            <div id="circle">

                                    <div class="cmsk"></div>

                                    <div class="circlecontent">

                                            <div thisyear="2010" class="timeblock">

                                                    <span class="numf" style="width:75px;text-align:center;color:#22B4F6">2010</span>

                                                    <div class="clear"></div>

                                            </div>

                                            <div class="timeyear">年</div>

                                    </div>

                                    <a href="#" class="clock"></a>

                            </div>
                            <div id="arrow">

                                    <ul>

                                            <li class="arrowup"></li>

                                            <li class="arrowdown"></li>

                                    </ul>

                            </div>
                    </div>
                    <div id="content">
                        <ul class="list">
                            <?php foreach($mydiarys as $key=>$val){?>
                            <li>
                                <div class="liwrap">
                                    <div class="lileft">
                                        <div class="date">
                                            <span class="year"><?php echo $val['year'];?></span>
                                            <span class="md"><?php echo $val['md'];?></span>
                                        </div>
                                    </div>
                                    <div class="point"><b></b></div>
                                    <div class="liright">
                                        <div class="histt"><a href="#"><?php echo $val['title'];?></a></div>
                                        <div class="hisct">修正了上一版本中的错误，欢迎大家测试，如果发现问题请联系我们,谢谢。</div>
                                    </div>
                                </div>
                            </li>
                            <?php }?>
                        </ul>
                    </div>
                </div>
                <?php }else{?>
                <ul class="dayTT">
                    <div class="noDataList">
                        <div></div>
                        <p>空空如也……</p>
                    </div>
                </ul>
                <?php }?>
            </div>
        </div>
    <div class="clear"></div>
    </div>
<?php $this->renderPartial('//layouts/footer');?>
<link href="<?php echo FILES_PATH;?>personal/css/right.css" rel="stylesheet" type="text/css">
</div>
</body>
</html>