<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        /*根据学生的学号，查询学生的状态*/
        if(cookie('Number') != null) {
            $User = M("student_info");      //学生状态数据库查询
            $condition['Number'] = cookie('Number');
            $stu_flag = $User->where($condition)->field('State_flag')->select();

            $state_flag = $stu_flag[0]['state_flag'];
        }else{
            $state_flag = 0;
        }

        /*根据学生状态显示不同的页面*/
        if(cookie('Number') != null && $state_flag == USERSTATE_LOGIN)        //未操作状态，显示选楼层页面
            $this -> display('floorlist/floorlist');
        else if(cookie('Number') != null && $state_flag == USERSTATE_ORDER)   //预约状态，显示预约座位详细信息页面
            $this -> display('seatinfo/seatinfoyuyue');
        else if(cookie('Number') != null && $state_flag == USERSTATE_OCCUPY)   //占用状态，显示占用座位的详细信息页面
            $this -> display('seatinfo/seatinfozhanyong');
        else if(cookie('Number') != null && $state_flag == USERSTATE_TEM)   //暂离状态，显示座位暂离的详细信息页面
            $this -> display('seatinfo/seatinfozanli');
        else
            $this -> display('login/login');                    //未绑定或其他未知状态，返回登录页面进行重置
    }
}