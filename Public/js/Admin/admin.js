/**
 * Created by Administrator on 2017/5/5.
 */
(function(global){
    reportImfInit();
    $(document).on('click','.seatState',seatState);
    $(document).on('click','.seatPass',reportConfirm);
    $(document).on('click','.seatClose',reportCancel);

})(window);

/*举报待确认页面初始化*/
function reportImfInit() {
    var reportBox=$('.feedback_wrapper');
    var reportTpl=$('#reporterShow').html();
    $.ajax({
        type:"GET",
        datatype:"json",
        url:'/libraryso/index.php/home/admin/reportImf',
        success:function (data) {
            if(data.length>0){
                var newReportData=_.each(data,function (item) {
                    item['classroom']=item['seat_name'].slice(0,2);
                    item['seatId']=item['seat_name'].slice(2);
                    return item;
                });
                console.log(newReportData);
                reportBox.html(_.template(reportTpl)(newReportData));
            }
            else{
                reportBox.html('<p>暂无举报信息！</p>');
            }
        },
        error:function (data) {
            alert(data);
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
                reportImfInit();
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
                reportImfInit();
            }
        });
    }
}