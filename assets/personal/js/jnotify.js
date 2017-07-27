$(function(){
	$(".success").click(function(){
		//jNotify提供三种调用方式，分别是jSuccess()，jNotify()，jError()，使用方法都一样
		msg = $(this).html();
		jSuccess(msg,{
			// autoHide : true,       // 是否自动隐藏提示条 
			clickOverlay : false,  // 是否单击遮罩层才关闭提示条 
			MinWidth : 200,        // 最小宽度 
			TimeShown : 1500,      // 显示时间：毫秒 
			ShowTimeEffect : 200,  // 显示到页面上所需时间：毫秒 
			HideTimeEffect : 200,  // 从页面上消失所需时间：毫秒 
			LongTrip : 15,         // 当提示条显示和隐藏时的位移 
			HorizontalPosition : "center",// 水平位置:left, center, right 
			VerticalPosition : "top",// 垂直位置：top, center, bottom 
			ShowOverlay : false,     // 是否显示遮罩层 
			ColorOverlay : "#000",  // 设置遮罩层的颜色 
			OpacityOverlay : 0.3,   // 设置遮罩层的透明度 
		});
	});

	$('.error').click(function(){
		msg = $(this).html();
		jError(msg,{
			HorizontalPosition : "center",
			VerticalPosition : "center",
		});
	});

	$('.notice').click(function(){
		msg = $(this).html();
		jNotify(msg,{
			HorizontalPosition : "center",
			VerticalPosition : "center",
		});
	});

	$('.three').click(function(){
		jSuccess("操作成功，2秒后显示下一个提示框!",{
			TimeShown : 2000,
			//2秒后触发以下方法
			onClosed:function(){
				jNotify("注意：点击这里显示下一个提示框",{
					VerticalPosition : 'top',
					autoHide : false,
				});
			},

			//同时触发消息框
			// onCompleted:function(){
			// 	jNotify("测试",{
			// 		VerticalPosition : 'top',
			// 		autoHide : false,
			// 	});
			// }
		});
	});
});
function jnotifySuccess(msg,url){
    jSuccess(msg,{
        // autoHide : true,       // 是否自动隐藏提示条 
        clickOverlay : true,  // 是否单击遮罩层才关闭提示条 
        MinWidth : 150,        // 最小宽度 
        TimeShown : 1500,      // 显示时间：毫秒 
        ShowTimeEffect : 200,  // 显示到页面上所需时间：毫秒 
        HideTimeEffect : 200,  // 从页面上消失所需时间：毫秒 
        LongTrip : 15,         // 当提示条显示和隐藏时的位移 
        HorizontalPosition : "center",// 水平位置:left, center, right 
        VerticalPosition : "top",// 垂直位置：top, center, bottom 
        ShowOverlay : true,     // 是否显示遮罩层 
        ColorOverlay : "#000",  // 设置遮罩层的颜色 
        OpacityOverlay : 0.3,   // 设置遮罩层的透明度 
        Url:url,
    });
}