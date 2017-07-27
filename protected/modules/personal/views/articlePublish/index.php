<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>糖糖闹闹网之我要发帖</title>
<meta name="keywords" content="">
<meta name="description" content="">
<link href="<?php echo CSS_PATH.'indexHeader.css'?>" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo FILES_PATH;?>article/css/layout.css">
<link href="<?php echo FILES_PATH;?>article/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo FILES_PATH.'fontAwesome/css/font-awesome.min.css'?>" rel="stylesheet" />
<link type="text/css" href="<?php echo CSS_PATH.'jq22.css'?>" rel="stylesheet" />

<script src="<?php echo JS_PATH.'jquery-1.11.2.min.js'?>"></script>
<script src="<?php echo JS_PATH.'index2.js'?>" ></script>
<script type="text/javascript" src="<?php echo JS_PATH.'js.js'?>"></script>

<!-- 编辑器样式开始 -->
<!-- Include Font Awesome. -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

  <!-- Include Editor style. -->
  <link href="<?php echo FILES_PATH;?>froala/css/froala_editor.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo FILES_PATH;?>froala/css/froala_style.min.css" rel="stylesheet" type="text/css" />

  <!-- Include Code Mirror style -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">

  <!-- Include Editor Plugins style. -->
  <link rel="stylesheet" href="<?php echo FILES_PATH;?>froala/css/plugins/char_counter.css">
  <link rel="stylesheet" href="<?php echo FILES_PATH;?>froala/css/plugins/code_view.css">
  <link rel="stylesheet" href="<?php echo FILES_PATH;?>froala/css/plugins/colors.css">
  <link rel="stylesheet" href="<?php echo FILES_PATH;?>froala/css/plugins/emoticons.css">
  <link rel="stylesheet" href="<?php echo FILES_PATH;?>froala/css/plugins/file.css">
  <link rel="stylesheet" href="<?php echo FILES_PATH;?>froala/css/plugins/fullscreen.css">
  <link rel="stylesheet" href="<?php echo FILES_PATH;?>froala/css/plugins/image.css">
  <link rel="stylesheet" href="<?php echo FILES_PATH;?>froala/css/plugins/image_manager.css">
  <link rel="stylesheet" href="<?php echo FILES_PATH;?>froala/css/plugins/line_breaker.css">
  <link rel="stylesheet" href="<?php echo FILES_PATH;?>froala/css/plugins/quick_insert.css">
  <link rel="stylesheet" href="<?php echo FILES_PATH;?>froala/css/plugins/table.css">
  <link rel="stylesheet" href="<?php echo FILES_PATH;?>froala/css/plugins/video.css">
<!-- 编辑器样式结束 -->
<body>
    <?php $this->renderPartial('//layouts/indexHeader',array('classify'=>$classify));?>
    
    <div class="article-content" id="main">
        <section id="editor">
        <form action="save" method="POST" id="articleForm">
            <textarea name = "title" class="art-tit" style="height:42px;" placeholder="在此输入标题" max="30"></textarea>
            <textarea name ="content" id="myEditor"></textarea>
            <input name ="articleId" type='hidden' value=0 id='articleId'>
        </form>
        </section>
    </div>
    <div id="tbox" style="margin-bottom:100px;">
        <button class="a-btn ng-binding ng-scope" id="saveButton">
            <i class="icon-save"></i>保存
        </button>
        <a class="a-btn qcode-p" id="previewButton">
            <i class="icon-eye-open"></i>预览
        </a>
        <div class="a-btn save ng-binding" id="publishButton">发布</div>
    </div>
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
<!-- 编辑器js开始 -->
<!-- Include jQuery. -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<!-- Include JS files. -->
<script type="text/javascript" src="<?php echo FILES_PATH;?>froala/js/froala_editor.min.js"></script>

<!-- Include Code Mirror. -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script>

<!-- Include Plugins. -->
<script type="text/javascript" src="<?php echo FILES_PATH;?>froala/js/plugins/align.min.js"></script>
<script type="text/javascript" src="<?php echo FILES_PATH;?>froala/js/plugins/char_counter.min.js"></script>
<script type="text/javascript" src="<?php echo FILES_PATH;?>froala/js/plugins/code_beautifier.min.js"></script>
<script type="text/javascript" src="<?php echo FILES_PATH;?>froala/js/plugins/code_view.min.js"></script>
<script type="text/javascript" src="<?php echo FILES_PATH;?>froala/js/plugins/colors.min.js"></script>
<script type="text/javascript" src="<?php echo FILES_PATH;?>froala/js/plugins/emoticons.min.js"></script>
<script type="text/javascript" src="<?php echo FILES_PATH;?>froala/js/plugins/entities.min.js"></script>
<script type="text/javascript" src="<?php echo FILES_PATH;?>froala/js/plugins/file.min.js"></script>
<script type="text/javascript" src="<?php echo FILES_PATH;?>froala/js/plugins/font_family.min.js"></script>
<script type="text/javascript" src="<?php echo FILES_PATH;?>froala/js/plugins/font_size.min.js"></script>
<script type="text/javascript" src="<?php echo FILES_PATH;?>froala/js/plugins/fullscreen.min.js"></script>
<script type="text/javascript" src="<?php echo FILES_PATH;?>froala/js/plugins/image.min.js"></script>
<script type="text/javascript" src="<?php echo FILES_PATH;?>froala/js/plugins/image_manager.min.js"></script>
<script type="text/javascript" src="<?php echo FILES_PATH;?>froala/js/plugins/inline_style.min.js"></script>
<script type="text/javascript" src="<?php echo FILES_PATH;?>froala/js/plugins/line_breaker.min.js"></script>
<script type="text/javascript" src="<?php echo FILES_PATH;?>froala/js/plugins/link.min.js"></script>
<script type="text/javascript" src="<?php echo FILES_PATH;?>froala/js/plugins/lists.min.js"></script>
<script type="text/javascript" src="<?php echo FILES_PATH;?>froala/js/plugins/paragraph_format.min.js"></script>
<script type="text/javascript" src="<?php echo FILES_PATH;?>froala/js/plugins/paragraph_style.min.js"></script>
<script type="text/javascript" src="<?php echo FILES_PATH;?>froala/js/plugins/quick_insert.min.js"></script>
<script type="text/javascript" src="<?php echo FILES_PATH;?>froala/js/plugins/quote.min.js"></script>
<script type="text/javascript" src="<?php echo FILES_PATH;?>froala/js/plugins/table.min.js"></script>
<script type="text/javascript" src="<?php echo FILES_PATH;?>froala/js/plugins/save.min.js"></script>
<script type="text/javascript" src="<?php echo FILES_PATH;?>froala/js/plugins/url.min.js"></script>
<script type="text/javascript" src="<?php echo FILES_PATH;?>froala/js/plugins/video.min.js"></script>

<!-- Include Language file if we want to use it. -->
<script type="text/javascript" src="<?php echo FILES_PATH;?>froala/js/languages/zh_cn.js"></script>

<!-- Initialize the editor. -->
<script>
  $(function() {
    $('#myEditor')
      .froalaEditor({
          toolbarInline: false,
          language: 'zh_cn',
          height:'350px',
      })
  });

    $('#saveButton').click (function () {
        url = "<?php echo SITE_URL?>personal/articleAdd";
        $.ajax({
            type: "POST",
            data: $('#articleForm').serialize(),
            url:url,
            dataType:'json',
            success: function (msg) {
                $('#articleId').val(msg.articleId);
            }
        });
    })
</script>
<!-- 编辑器js结束 -->
</body>
</html>
