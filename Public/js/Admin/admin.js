/**
 * Created by Administrator on 2017/5/5.
 */
(function(global){
    reportImfInit()
})(window);
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

            }
        },
        error:function (data) {
            alert(data);
        }
    });
}