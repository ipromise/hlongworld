<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">分类</h1>
            </div>
        </div>        
        <div class="row">
            <div class="col-lg-9">
                <div class="panel panel-primary">
                    <div class="panel-heading"><h3 class="panel-title"><?php echo $name;?></h3></div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>名称</th>
                                    <th>链接地址</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody id='tbody'>
                                <?php if(!empty($detail)){?>
                                <?php foreach($detail as $key=>$val){?>
                                <tr id="<?php echo 'tr'.$key;?>">
                                    <th scope="row"><?php echo $key;?></th>
                                    <td><input type="text" class="form-control" id="<?php echo 'name'.$key;?>" placeholder="子栏目名称" value='<?php echo $val['name'];?>'></td>
                                    <td><input type="email" class="form-control" id="<?php echo 'url'.$key;?>" placeholder="子栏目链接" value='<?php echo $val['url'];?>'></td>
                                    <td>
                                        <button type="submit" class="btn btn-default" onclick="saveClassify(<?php echo $key;?>)">保存</button>
                                        <span class="glyphicon glyphicon-remove" aria-hidden="true" style="cursor: pointer" onclick="deleteClassify(<?php echo $key;?>)"></span>
                                    </td>
                                </tr>
                                <?php }?>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <p><button type="button" class="btn" onclick="window.location.href = '<?php echo UrlsAdmin::get('url_admin_classify');?>'">返回</button></p>
                <p><button type="button" class="btn btn-primary" onclick='addClassify()'>添加</button></p>
            </div>
        </div>
    </div>
</div>
<script>
    function saveClassify(id){
        var request_url = '<?php echo UrlsAdmin::get("url_admin_classify_save");?>';
        var name =  $('#name'+id).val();
        var url =  $('#url'+id).val();
        var data = {id:id,name:name,url:url};
        var result  = checkURL(url);
        if(result){
            toChange(request_url,data);
        }else{
            swal('URL格式不正确', "Your imaginary file is safe :)", "error");
        }
    }
    
    function addClassify(){
        var parent = '<?php echo $id;?>';
        $.ajax({
            url:'<?php echo UrlsAdmin::get("url_admin_classify_add");?>',
            data:{parent:parent},
            type:'post',
            cache:false,
            dataType:'json',  
            success:function(data) {
                if(data.status == '000' ){
                    var html ='<tr><th scope="row">'+data.id+'</th><td><input type="text" class="form-control" id="name'+data.id+'" placeholder="子栏目名称" ></td><td><input type="email" class="form-control" id="url'+data.id+'" placeholder="子栏目链接" ></td><td><button type="submit" class="btn btn-default" onclick="saveClassify('+data.id+')">保存</button> <span class="glyphicon glyphicon-remove" aria-hidden="true" style="cursor: pointer" onclick="deleteClassify('+data.id+')"></span></td></tr>';
                    $('#tbody').prepend(html);
                }
             },  
        });
    }
    
    function deleteClassify(id){
        $.ajax({
            url:'<?php echo UrlsAdmin::get('url_admin_classify_delete');?>',
            data:{id:id},
            type:'post',
            cache:false,
            dataType:'json',  
            success:function(data) {
                if(data.status == '000' ){
                    $('#tr'+id).remove();
                }
             },  
        });
    }
    
    function toChange(request_url,data){
        $.ajax({
            url:request_url,
            data:data,
            type:'post',  
            cache:false,  
            dataType:'json',  
            success:function(data) {
                if(data.status == '000' ){
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
    
    function checkURL(URL){
        var str=URL;
        var Expression=/http(s)?:\/\/([\w-]+\.)+[\w-]+(\/[\w- .\/?%&=]*)?/;
        var objExp=new RegExp(Expression);
        if(objExp.test(str)==true){
            return true;
        }else{
            return false;
        }
    }
</script>