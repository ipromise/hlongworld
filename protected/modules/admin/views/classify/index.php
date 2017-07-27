<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">导航</h1>
            </div>
        </div>
        <div class="row">
            <?php if(!empty($parents)){?>
            <?php foreach($parents as $key=>$val){?>
            <div class="col-xs-6 col-md-3" id="<?php echo 'parent'.$key;?>">
                <span class="glyphicon glyphicon-remove" aria-hidden="true" style="cursor: pointer;position:absolute;margin-left:210px;margin-top:10px" onclick="deleteClassify(<?php echo $key;?>)"></span>
                <a href="<?php echo UrlsAdmin::get('url_admin_classify_detail').'&id='.$key;?>" class="thumbnail">
                    <img title ='<?php echo $val['name'];?>'alt="100%x180" data-src="holder.js/100%x180" style="height: 180px; width: 100%; display: block;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTcxIiBoZWlnaHQ9IjE4MCIgdmlld0JveD0iMCAwIDE3MSAxODAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzEwMCV4MTgwCkNyZWF0ZWQgd2l0aCBIb2xkZXIuanMgMi42LjAuCkxlYXJuIG1vcmUgYXQgaHR0cDovL2hvbGRlcmpzLmNvbQooYykgMjAxMi0yMDE1IEl2YW4gTWFsb3BpbnNreSAtIGh0dHA6Ly9pbXNreS5jbwotLT48ZGVmcz48c3R5bGUgdHlwZT0idGV4dC9jc3MiPjwhW0NEQVRBWyNob2xkZXJfMTU1NzIxZWYxOGMgdGV4dCB7IGZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMHB0IH0gXV0+PC9zdHlsZT48L2RlZnM+PGcgaWQ9ImhvbGRlcl8xNTU3MjFlZjE4YyI+PHJlY3Qgd2lkdGg9IjE3MSIgaGVpZ2h0PSIxODAiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSI1OSIgeT0iOTQuOCI+MTcxeDE4MDwvdGV4dD48L2c+PC9nPjwvc3ZnPg==" data-holder-rendered="true">
                </a>
            </div>
            <?php }?>
            <?php }?>
        </div>
    </div>
</div>
<script>
    function deleteClassify(id){
        $.ajax({
            url:'<?php echo UrlsAdmin::get('url_admin_classify_delete');?>',
            data:{id:id},
            type:'post',
            cache:false,
            dataType:'json',  
            success:function(data) {
                if(data.status == '000' ){
                    $('#parent'+id).remove();
                }
             },  
        });
    }
</script>