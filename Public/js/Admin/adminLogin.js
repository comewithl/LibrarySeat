/**
 * Created by Administrator on 2017/4/23.
 */
(function(global){
    // $(".userId").blur(function(){
    //     var reg=/^\d{8}$/;
    //     if(this.value.match(reg)==null){
    //         $(".resultP").html("管理员应为8位数字");
    //     }else{
    //         $(".resultP").html("");
    //     }
    // });
})(window);
function infoSubmit(){

    $.ajax({
        type:"POST",
        url:"/libraryso/index.php/home/login/check",
        data:{"userId":$(".userId").val(),"userKey":$(".userKey").val()},
        success:function(data){
            if(data==0){
                alert("帐号不能为空！");
            }else if(data==1){
                alert("密码不能为空！");
            }else if(data==2){
                alert("帐号或密码错误！");
            }
            else if(data==3){
                alert("恭喜你！登录成功！");
                window.location.href="/libraryso/index.php/home/admin/admin";
            }
        },
        error:function(XMLHTTPRequest,statusText,errorThrown){
            alert(XMLHTTPRequest.statusText+status);
        }
    })
}