<?php
    namespace Home\Controller;
    use Think\Controller;

    class FeedbackController extends Controller{
        /*监督举报页面显示*/
        public function report()
        {
            $this -> display();
        }

        /*监督查询响应*/
        public function check()
        {
            $floor = $_POST['floor'];
            $seat  = $_POST['seat'];

            $User = M("seat_distribution");        //数据库查询座位状态
            $condition['Classroom_num'] = $floor;
            $condition['Seat_id']       = $seat;
            $seat_info = $User->where($condition)->field('Seat_status')->select();

            $User = M("student_info");          //数据库查询学生信息
            $stu_info = $User->where($condition)->field('State_flag')->select();

            if(($seat_info[0]['seat_status'] == 3 || $seat_info[0]['seat_status'] == 4) && $stu_info[0]['state_flag'] == 3){
                $this->ajaxReturn(0);           //可以举报
            }else{
                $this -> ajaxReturn(1);         //不可以举报
            }
        }

        /*举报请求响应*/
        public function sreport()
        {
            $floor = $_POST['floor'];
            $seat  = $_POST['seat'];

            $User = M("student_info");      //学生信息变更
            $condition['Classroom_num'] = $floor;
            $condition['Seat_id']       = $seat;
            $data['Classroom_num']  = null;
            $data['Seat_id']        = null;
            $data['State_flag']     = 1;
            $data['Occupancy_time'] = null;
            $User->where($condition)->setInc('Default_num',1);  //记录违规次数
            $User->where($condition)->save($data);

            $User = M("seat_distribution");     //座位信息变更
            $data2['Seat_status'] = 0;
            $User->where($condition)->save($data2);

            $this -> ajaxReturn(0);
        }
    }
?>