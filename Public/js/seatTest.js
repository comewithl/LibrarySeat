


var choosed_seat;//用户选取的座位对象，一个用户只能选一个座位。
/*
chooseSeat&chooseSeatReverse 点击空闲作为响应函数
*/
function chooseSeat () {
	if (choosed_seat){ //用户已经选择了一个座位

		if($(choosed_seat).attr("class")=="choosed_seat"){//判断之前选择的座位有无反转
			$(choosed_seat).attr({class:"seat"});		
		}
		else{
			$(choosed_seat).attr({class:"seat_reverse"});
		}
		$(this).attr({class:"choosed_seat"});
		
	}
	else              
	{
		$(this).attr({class:"choosed_seat"});
	}
	choosed_seat=this; //这命名有点别扭
	if ($("#seat_confirm").attr("disabled")=="disabled")
		$("#seat_confirm").attr("disabled",false);
}


function chooseSeatReverse(){
	if (choosed_seat){ //用户已经选择了一个座位

		if($(choosed_seat).attr("class")=="choosed_seat"){//判断之前选择的座位有无反转
			$(choosed_seat).attr({class:"seat"});		
		}
		else{
			$(choosed_seat).attr({class:"seat_reverse"});
		}
		$(this).attr({class:"choosed_seat_reverse"});
	}
	else              
	{
		$(this).attr({class:"choosed_seat_reverse"});
	}
	choosed_seat=this; //这命名有点别扭
	if ($("#seat_confirm").attr("disabled")=="disabled")
		$("#seat_confirm").attr("disabled",false);
}
 	
/*
	chooseConfirm：座位选择确认函数，同步ajax后台数据更新
*/
 function chooseConfirm () {

	 
   /* $.ajax({
			
    	/!*async:false,
        type:"POST",
        url:"http://127.0.0.1:8180/libraryP/test_json_encode.php",
        data:{
        	// user:,
            choosed_seat_id:$(choosed_seat).attr("id")
        },
        dataType:"json",
        success:function(data){
        	alert(data.msg);
        },
        error:function(jqXHR){     
            alert("发生错误：" + jqXHR.status); 
            return;
        },  *!/
    });
    // 重新刷新页面
	refreshSeatShow();*/
	 /*偷鸡方法（下面）*/
	 var choosed_id=$(choosed_seat).attr("id");
	 $('#chooseId')[0].value=choosed_id;
	 $('#chooseSeatForm')[0].submit();//触发表单提交
	 refreshSeatShow();
}
/*
	reverseSeat：根据行坐标值判断是否该位置需要反转。
	参数： row:行坐标
*/
function reverseSeat(row){
	if (row % 3 == 1)
		return false;
	else if(row % 3 == 2)
		return true;
}

/*
	refreshSeatShow:请求后台数据，更新座位分布图函数。
*/
// var s=[1,2];
// console.log(s instanceof Array);
function refreshSeatShow(){
	var seat_y,seat_x,seat_status,sid;
	choosed_seat=null;
	$("#seat_confirm").attr("disabled",true);
	
    $.ajax({
    	async:false,
        type:"GET",
        url:"http://127.0.0.1:8180/libraryP/test_json_encode.php",
        dataType:"json",
        success:function(data){
            seat_y=data.seat_y; 
            seat_x=data.seat_x;
            sid=data.seat_id;
            // 靠 status 返回的是string 这是一个系统全局变量，晕菜。
            seat_status=data.seat_status;

            
        },
        error:function(jqXHR){
               alert("发生错误：" + jqXHR.status);              
               return;
        },        
    });
	
	for(var i=0;i<seat_y.length;i++){
	switch(eval(seat_status[i])){
		//seat
		case 0:
			// alert();
			reverseSeat(seat_y[i])?$(".clear").eq(seat_y[i]).children().eq(seat_x[i]).children().eq(0).attr({class:"seat_reverse",id:sid[i]}):$(".clear").eq(seat_y[i]).children().eq(seat_x[i]).children().eq(0).attr({class:"seat",id:sid[i]});
			break;
		//order 预约
		case 1:
				//下一行测试用的可删。
				reverseSeat(seat_y[i])?$(".clear").eq(seat_y[i]).children().eq(seat_x[i]).children().eq(0).attr({class:"order_male_reverse",id:sid[i]}):$(".clear").eq(seat_y[i]).children().eq(seat_x[i]).children().eq(0).attr({class:"order_male",id:sid[i]});
			//性别判断			
			// if(sexy[i])
			// 	//male
			// 	reverseSeat(seat_y[i])?$(".clear").eq(seat_y[i]).children().eq(seat_x[i]).children().eq(0).attr({class:"order_male_reverse",id:sid[i]}):$(".clear").eq(seat_y[i]).children().eq(seat_x[i]).children().eq(0).attr({class:"order_male",id:sid[i]});
			// else
			// 	//female
			// 	reverseSeat(seat_y[i])?$(".clear").eq(seat_y[i]).children().eq(seat_x[i]).children().eq(0).attr({class:"order_female_reverse",id:sid[i]}):$(".clear").eq(seat_y[i]).children().eq(seat_x[i]).children().eq(0).attr({class:"order_female",id:sid[i]});
			break;
		//seated
		case 2:
			if(sexy[i])
				//male
				reverseSeat(row[i])?$(".clear").eq(row[i]).children().eq(seat_x[i]).children().eq(0).attr({class:"seated_male_reverse",id:sid[i]}):$(".clear").eq(row[i]).children().eq(seat_x[i]).children().eq(0).attr({class:"seated_male",id:sid[i]});
			else
				//female
				reverseSeat(row[i])?$(".clear").eq(row[i]).children().eq(seat_x[i]).children().eq(0).attr({class:"seated_female_reverse",id:sid[i]}):$(".clear").eq(row[i]).children().eq(seat_x[i]).children().eq(0).attr({class:"seated_female",id:sid[i]});
			break;
		//temporary 暂离，无。
		default:
			alert("请求的座位状态信息有误其错误id为: "+sid[i]+".");
			break;
	}
}
}
$(document).ready(function(){
	refreshSeatShow();
	//用户选中座位事件绑定
	$(".seat").click(chooseSeat);
	$(".seat_reverse").click(chooseSeatReverse);
	$("#seat_confirm").click(chooseConfirm);


})
