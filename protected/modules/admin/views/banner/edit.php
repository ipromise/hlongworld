<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">轮播图</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-9">
                <div class="thumbnail">
                  <img src="<?php echo SITE_URL.$banner['src']?>" alt="">
                  <div class="caption">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="请输入该图片的链接地址" val="<?php echo $banner['url'];?>" id="linkUrl">
                                    <span class="input-group-btn">
                                      <button class="btn btn-default" type="button" id="change">Change!</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <p>
                        <?php if($banner['is_show']==1){?>
                        <div class="row" id="is_show">
                            <div class="col-lg-3">
                                <select class="form-control" id="reorder">
                                    <?php for($i=1;$i<=$count;$i++){?>
                                    <option <?php if($i==$reorder){echo 'selected';}?> value="<?php echo $i;?>"><?php echo '第'.$i.'帧';?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <?php }?>
                  </div>
                </div>
            </div>
            <div class="col-lg-3">
                <p><button type="button" class="btn" onclick="window.location.href = '<?php echo UrlsAdmin::get('url_admin_banner');?>'">返回</button></p>
                <?php if(isset($banner['is_show'])&&$banner['is_show']==1){?>
                <p><button type="button" class="btn btn-warning" id ="hideOrShow" data-toggle="tooltip" data-placement="right" title="目标状态">隐藏</button></p>
                <?php }else{?>
                <p><button type="button" class="btn btn-warning" id ="hideOrShow" data-toggle="tooltip" data-placement="right" title="目标状态">显示</button></p>
                <?php }?>
            </div>
        </div> 
        </div>
    </div>
</div>
<script src="<?php echo UP_PATH;?>js/zyFile.js"></script>
<script src="<?php echo UP_PATH;?>js/zyUpload.js"></script>
<script src="<?php echo UP_PATH;?>js/script.js"></script>
<script>
    document.querySelector('button.btn-warning').onclick = function(){
	swal({
            title: "Are you sure?",
            //text: "You will not be able to recover this imaginary file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#DD6B55',
            confirmButtonText: 'Yes, just do it!',
            closeOnConfirm: false,
            //closeOnCancel: false
	},
	function(){
            var url = '<?php echo UrlsAdmin::get('url_admin_banner_show');?>';
            var id = '<?php echo $banner['id']?>';
            var data = {id:id};
            toChange(url,data);
	});
    };
    
    $('#change').click(function(){
        var url = '<?php echo UrlsAdmin::get("url_admin_banner_change");?>';
        var id = '<?php echo $banner['id']?>';
        var linkUrl = $('#linkUrl').val();
        var data = {id:id,linkUrl:linkUrl};
        toChange(url,data);
    });
    
    $("#reorder").change(function(){
        var reorder = $(this).children('option:selected').val();
        var url = '<?php echo UrlsAdmin::get("url_admin_banner_order");?>';
        var id = '<?php echo $banner['id']?>';
        var data = {id:id,reorder:reorder};
        toChange(url,data);
    });
    
    function toChange(url,data){
        $.ajax({
            url:url,
            data:data,
            type:'post',  
            cache:false,  
            dataType:'json',  
            success:function(data) {
                if(data.status == '000' ){
                    if(data.canChangeName){
                        $('#hideOrShow').html(data.canChangeName);
                        if(data.canChangeName=='显示'){
                           $('#is_show').css('display','none');
                        }else{
                            $('#is_show').css('display','block');
                        }
                    }
                    swal("success!", "This info has been changed!", "success");
                }else{
                    swal(data.info, "Your imaginary file is safe :)", "error");
                }
             },  
            error : function() {
                swal("异常！", "Your imaginary file is safe :)", "error");
            }
        });
    }
</script>