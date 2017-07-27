<link rel="stylesheet" href="<?php echo UP_PATH;?>css/zyUpload.css" type="text/css">
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">轮播图</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-9 htmleaf-container">
                <div id="demo" class="demo"></div>
            </div>
            <div class="col-lg-3">
                <button type="button" class="btn" onclick="window.location.href = '<?php echo UrlsAdmin::get('url_admin_banner');?>'">返回</button>    
            </div>
            </div>
        </div>
    </div>
</div>
<script>
    URL_AMDIN_BANNER_ADD = "<?php echo UrlsAdmin::get('url_admin_banner_add');?>";
</script>
<script src="<?php echo UP_PATH;?>js/zyFile.js"></script>
<script src="<?php echo UP_PATH;?>js/zyUpload.js"></script>
<script src="<?php echo UP_PATH;?>js/script.js"></script>