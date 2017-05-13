<?php
    namespace Home\Controller;
    use Think\Controller;
    use Think\Model;

    class AdminController extends Controller{
        public  $search_time;
        /*登录页面展示*/
        public function adminLogin()
        {
            $this -> display();
        }
        public function admin()
        {
            $this -> display();
        }
        /*获取当天举报信息*/
        public function reportImf(){
            $ifFirstTime=$_GET['firstTime'];
            $searchTime=$_GET['searchTime'];
            $Report = M('seat_report');
            $condition['confirm_result'] = 'noConfirm';

            if($ifFirstTime) {
                $cur_date = date('Y-m-d');
                $report_info = $Report->where($condition)->where("reporte_time >= '$cur_date'")->order('seat_name asc')->select();
            }
            else{
                $report_info = $Report->where($condition)->where("reporte_time >= '$searchTime'")->order('seat_name asc')->select();
            }
            $this->ajaxReturn($report_info);
        }
        /*获取座位状态*/
        public function  getSeatState(){
            $floor = $_POST['floor'];
            $seat  = $_POST['seat'];

            $SeatInfo = M("seat_distribution");        //数据库查询座位状态
            $condition['classroom_num'] = $floor;
            $condition['seat_id']       = $seat;
            $seat_info = $SeatInfo->where($condition)->field('seat_status')->select();
            switch ($seat_info[0]['seat_status']){
                case SEATSTATE_EMPTY:
                    $this->ajaxReturn('该座位为空');
                    break;
                case SEATSTATE_ORDER:
                    $this->ajaxReturn('该座位被预约');
                    break;
                case SEATSTATE_OCCUPY:
                    $this->ajaxReturn('该座位有人使用');
                    break;
                case SEATSTATE_TEM:
                    $this->ajaxReturn('该座位有人暂离');
                    break;
            }
        }

        /*举报通过/取消*/
        public function  reportConfirm(){
            $seat  = $_POST['seatName'];
            $index = $_POST['indexNum'];
            $confirmResult=$_POST['confirmResult'];

            $Report = M("seat_report");
            $condition['index_num']= $index;

            $data['confirm_result']=$confirmResult;
            $updateFlag = $Report->where(   $condition)->save($data);

            $reportImf=$Report->where($condition)->field('imformater_number')->select();
            if($confirmResult == 'confirmedYes' && $updateFlag){
                $User = M("student_info");      //学生信息变更
                $userCondition['number']=$reportImf[0]['imformater_number'];
                $data['classroom_num']  = null;
                $data['seat_id']        = null;
                $data['state_flag']     = 1;
                $data['occupancy_time'] = null;
                $User->where($userCondition)->setInc('default_num',1);  //记录违规次数
                $User->where($userCondition)->save($data);

                $SeatInfo = M("seat_distribution");     //座位信息变更
                $seatCondition['seat_name']=$seat;
                $data2['seat_status'] = 0;
                $SeatInfo->where($seatCondition)->save($data2);
            }
            $this->ajaxReturn($updateFlag);
        }
        /*登录信息校对*/
        public function check()
        {
            if($_POST['userId'] == null){
                $this -> ajaxReturn(0);   //若帐号为空，返回提示信息
            }else if($_POST['userKey'] == null){
                $this -> ajaxReturn(1);   //若密码为空，返回提示信息
            }else{
                $number_inp   = $_POST['userId'];   //获取输入的学生帐号
                $password_inp = $_POST['userKey'];  //获取学生输入的密码

                /*数据库查询密码操作*/
                $User = M("admin_info");
                $condition['admin_name'] = $number_inp;
                $stu = $User->where($condition)->field('admin_password')->select();

                $password = $stu[0]['admin_password'];

                /*密码校验*/
                if($password_inp != $password) {
                    $this->ajaxReturn(2);        //帐号或密码错误，返回提示信息
                }else{
                    $date['state_flag'] = 1;            //用户绑定成功，改变用户的状态
                    $User->where($condition)->save($date);

                    cookie('Number',$number_inp,3600*24*365*4);     //用户的信息存入cookies

                    $this -> ajaxReturn(3);     //绑定成功
                }
            }
        }
    }
?>
