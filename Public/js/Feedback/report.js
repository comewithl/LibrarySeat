/**
 * Created by Administrator on 2017/4/23.
 */

(function(global){
    var floor;
    var seat;
    $(".more").mouseover(function(){
        $(this).css("opacity","0.6")
    })
    $(".more").mouseleave(function(){
        $(this).css("opacity","1")
    })
    $(".more").click(function(){
        $(".more-ul").toggle()
    })

    /*查询座位使用状态*/
    $("#submit").click(function(){

        floor=$("#floor-input").val();
        seat=$("#seat-input").val();
        $.ajax({
            type:"POST",
            url:"/libraryso/index.php/home/feedback/check",
            data:{"floor":floor,"seat":seat},
            success:function(data){
                if(!data){
                    $(".illegal").show();
                }else{
                    $(".leave").show();
                }
            },
            error:function(XMLHTTPRequest,status,errorThrown){
                alert(XMLHTTPRequest.statusText+status);
            }
        });
    })

    $(".cancel").click(function(){
        $(this).parent().hide();
    });
    $(".report").click(function(){

        $.ajax({
            type:"POST",
            url:"/libraryso/index.php/home/feedback/sreport",
            data:{"floor":floor,"seat":seat},
            success:function($data){
                if($data.sucessflag) {
                    alert($data.imf);
                    window.location.href = "/libraryso/index.php/home/floorlist/floorlist";
                }else{
                    alert($data.imf);
                    // window.location.href = "/libraryso/index.php/home/feedback/report";
                }
            },
            error:function(XMLHTTPRequest,status,errorThrown){
                alert(XMLHTTPRequest.statusText+status);
            }
        });
    })

})(window);

function flootCheck(){
    var floorArray=["02","04"];
    if(floorArray.toString().indexOf(String($("#floor-input").val()))<0){
        alert("请输入02或04");
    }
}