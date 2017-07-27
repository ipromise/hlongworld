        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">轮播图</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-9" role="main">
                        <div data-example-id="carousel-with-captions" class="bs-example">
                            <div data-ride="carousel" class="carousel slide" id="carousel-example-captions">
                              <div role="listbox" class="carousel-inner">
                                <?php if(!empty($banners)){?>
                                <?php $num = 1;?>
                                <?php foreach($banners as $key=>$val){?>
                                    <div class="item <?php echo $num==1 ? 'active': '';?>">
                                        <a href="<?php echo UrlsAdmin::get('url_admin_banner_edit').'&id='.$key;?>"><img alt="900x500" data-src="holder.js/900x500/auto/#777:#777" src="<?php echo !empty($val['src']) ? SITE_URL.$val['src'] : 'javascript:;';?>" data-holder-rendered="true">
                                    </div>
                                <?php $num++;?>
                                <?php }?>
                                <?php }?>
                              </div>
                              <a data-slide="prev" role="button" href="#carousel-example-captions" class="left carousel-control">
                                <span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span>
                                <span class="sr-only">Previous</span>
                              </a>
                              <a data-slide="next" role="button" href="#carousel-example-captions" class="right carousel-control">
                                <span aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span>
                                <span class="sr-only">Next</span>
                              </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <p><button type="button" class="btn btn-primary" onclick="window.location.href = '<?php echo UrlsAdmin::get('url_admin_banner_add');?>'">添加</button></p>    
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"></h1>
                    </div>
                </div>
            </div>
        </div>