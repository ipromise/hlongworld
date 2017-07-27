<div id="hiddenCode">
    <div id="code"></div>
    <div id="code_img"></div>
    <a id="gotop" href="javascript:void(0)"><img src="<?php echo FILES_PATH;?>sideBar/images/fhjt.png" alt=""/></a>
    <div class="clear"></div>
</div>
<script type="text/javascript">
    function b(){
        h = $(window).height();
        t = $(document).scrollTop();
        if(t > 0){
            $('#gotop').fadeIn(200);
        }else{
            $('#gotop').fadeOut(200);
        }
    }
    $(document).ready(function(e) {
        b();
        $('#gotop').click(function(){
            $("body,html").animate({scrollTop:0},300);
        });

        $('#code').hover(function(){
            $(this).attr('id','code_hover');
            $('#code_img').show();
            $('#code_img').addClass('a-fadeinL');
        },function(){
            $(this).attr('id','code');
        })
        $('#code_img').mouseout(function(){
            $('#code_img').hide();
        });
    });

    $(window).scroll(function(e){
        b();
    });
</script>
