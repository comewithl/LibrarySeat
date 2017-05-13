/**
 * Created by Administrator on 2017/4/24.
 */

(function(global){
    var info;
    var state = $('body').data("userstate");
    var time;
    var userState={
        "ORDER" : 2,
        "OCCUPY" : 3,
        "TEMP" :4
    };
    var userStateURL={
        'ORDER' : '/libraryso/index.php/home/seatinfo/yuyueinfo',
        'OCCUPY' : '/libraryso/index.php/home/seatinfo/zhanyonginfo',
        'TEMP' : '/libraryso/index.php/home/seatinfo/zanliinfo',
    };
    $.ajax({
        type:"GET",
        url:userStateURL[state],
        datatype:"json",
        success:function(data){
            info=data;
            reFresh(data);
            if(data.end_time && state == 'OCCUPY'){
                time=data.end_time;
                setInterval(function () {
                        time=setTime(time);
                        $('.end_time').html(time);
                    },1000);
            }
        },
        error:function(XMLHTTPRequest,status,errorThrown){
            alert(XMLHTTPRequest.statusText+status);
        }
    });
    $(".more").mouseover(function(){
        $(this).css("opacity","0.6")
    })
    $(".more").mouseleave(function(){
        $(this).css("opacity","1")
    })
    $(".more").click(function(){
        $(".more-ul").toggle()
    })
    $("#seatTemp").click(seatTemp);
    $("#seatConfirm").click(seatConfirm);
    $("#seatReturn").click(function(){
        $.ajax({
            type:"POST",
            url:"/libraryso/index.php/home/seatinfo/seatReturn",
            success:function(data){
                alert(data);
                window.location.href="/libraryso/index.php/home/floorlist/floorlist?userId="+info["number"];
            },
            error:function(XMLHTTPRequest,statusText,errorThrown){
                alert(XMLHTTPRequest.statusText+status);
            }
        })
    })
})(window);

function  reFresh(data){
    for(var key in data){
        $('.'+key).html(data[key]);
    };
}
/*暂离座位*/
function seatTemp() {
    showLoadding(true);
    $.ajax({
        type:"POST",
        url:"/libraryso/index.php/home/seatinfo/seatTemp",
        success:function(data){
            showLoadding(false);
            alert(data.imf);
            if(data.successflag){
                window.location.href='/libraryso/index.php/home/seatinfo/seatinfozanli';
            }
        },
        error:function(XMLHTTPRequest,statusText,errorThrown){
            alert(XMLHTTPRequest.statusText+status);
        }
    })
}
/*确认就座*/
function seatConfirm() {
    var geolocation = new BMap.Geolocation();
    var userPositon;
    showLoadding(true);
    geolocation.getCurrentPosition(function(r){
        if(this.getStatus() == BMAP_STATUS_SUCCESS){
            $.ajax({
                type:"POST",
                url:"/libraryso/index.php/home/seatinfo/seatConfirm",
                data:{
                    userPosition:r.point
                    // userPosition:{lat:120.21937542,lng:30.25924446}
                },
                async:false,
                success:function(data){
                    showLoadding(false);
                    if(data.successflag){
                        window.location.href='/libraryso/index.php/home/seatinfo/seatinfozhanyong';
                    }
                    else{
                        alert(data.imf);
                    }
                },
                error:function(XMLHTTPRequest,statusText,errorThrown){
                    alert(XMLHTTPRequest.statusText+status);
                }
            })
        }
        else {
            alert('failed'+this.getStatus());
        }
    },{enableHighAccuracy: true})

}
/*loadding效果实现*/
function showLoadding(show) {
    var loaddingBox=$('.loading');
    var parentBox=$('.box')
    var isShow = loaddingBox.css('display') == 'none' ? false :true;
    if(show && !isShow){
        loaddingBox.show()
        parentBox.css('opacity',0.5);
        return true;
    }
    if(!show && isShow){
        loaddingBox.hide();
        parentBox.css('opacity',1);
        return false;
    }

}

/*时间刷新*/
function setTime(t) {

    var timeArray=t.split(":");
    var hh= parseInt(timeArray[0]);
    var mm= parseInt(timeArray[1]);
    var ss= parseInt(timeArray[2]);

    if(ss < 59){
        ss++;
    }else{
        ss=0;
        if(mm < 59){
            mm++;
        }else{
            mm=0;
            hh++;
        }
    }
    t=hh < 9? '0'+hh : ''+hh;
    t+= mm <9?':0'+mm: ':'+mm;
    t+= ss <9?':0'+ss: ':'+ss;

    return t;

}
