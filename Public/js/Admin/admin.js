/**
 * Created by Administrator on 2017/5/5.
 */
var searchTime;
(function(global){
    reportImfInit(1);
    $(document).on('click','.seatState',seatState);
    $(document).on('click','.seatPass',reportConfirm);
    $(document).on('click','.seatClose',reportCancel);
    /*进行轮播查询是否有新数据更新*/
    setInterval(function () {
       reportImfInit(0);
    },3000);
})(window);

/*举报待确认页面更新*/
function reportImfInit(ifFirst) {
    var reportBox=$('.feedback_wrapper');
    var reportTpl=$('#reporterShow').html();

    $.ajax({
        type:"GET",
        datatype:"json",
        url:'/libraryso/index.php/home/admin/reportImf',
        data:{
          firstTime:ifFirst,
          searchTime:searchTime
        },
        success:function (data) {
            searchTime = formatDate(new Date(),'yyyy:MM:dd hh:mm:ss');
            if(data.length>0){
                var newReportData = _.each(data, function (item) {
                    item['classroom'] = item['seat_name'].slice(0, 2);
                    item['seatId'] = item['seat_name'].slice(2);
                    return item;
                });
                /*是否是第一次查询直接替换页面内容*/
                if(ifFirst) {
                    reportBox.html(_.template(reportTpl)(newReportData));
                }
                /*第二次查询获取更新后的数据：提示有新的举报，进行局部刷新页面*/
                else{
                    window.alert("有新举报！");
                    reportBox.prepend(_.template(reportTpl)(newReportData));
                }

            }
            else{
                if(!reportBox.html())
                    reportBox.html('<p>暂无举报信息！</p>');
            }
        },
        error:function (data) {
            alert("请求失败");
        }
    });
}

/*查看座位状态*/
function seatState(){
    var seatName=$(this).data('seatname');//获取座位号
    $.ajax({
        type:'POST',
        dataType:'json',
        url:'/libraryso/index.php/home/admin/getSeatState',
        data:{
            floor:seatName.slice(0,2),
            seat:seatName.slice(2)
        },
        success:function (data) {
            window.alert(data);
        }
    });
}

/*举报通过*/
function reportConfirm() {
    var seatName=$(this).data('seatname');//获取座位号
    var indexNum=$(this).data('indexnum');//获取举报记录索引
    var confirmflag=window.confirm('该违规举报情况属实，确认登记违规？');
    if(confirmflag){
        $.ajax({
            type:'POST',
            dataType:'json',
            url:'/libraryso/index.php/home/admin/reportConfirm',
            data:{
                seatName:seatName,
                indexNum:indexNum,
                confirmResult:'confirmedYes'
            },
            success:function (data) {
                if(data){
                    window.alert("举报通过");
                }
                else{
                    window.alert("数据库出错请核实")
                }
                reportImfInit(1);
            }
        });
    }
}
/*举报不通过*/
function reportCancel() {
    var seatName=$(this).data('seatname');//获取座位号
    var indexNum=$(this).data('indexnum');//获取举报记录索引
    var confirmflag=window.confirm('该违规举报情况不属实，删除违规记录？');
    if(confirmflag){
        $.ajax({
            type:'POST',
            dataType:'json',
            url:'/libraryso/index.php/home/admin/reportConfirm',
            data:{
                seatName:seatName,
                indexNum:indexNum,
                confirmResult:'confirmedNo'
            },
            success:function (data) {
                if(data){
                    window.alert("举报不通过");
                }
                else{
                    window.alert("数据库出错请核实")
                }
                reportImfInit(1);
            }
        });
    }
}