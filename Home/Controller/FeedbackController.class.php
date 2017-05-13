<?php
    namespace Home\Controller;
    use Org\Util\Date;
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

            if(($seat_info[0]['seat_status'] == 2 || $seat_info[0]['seat_status'] == 3) && $stu_info[0]['state_flag'] == 3){
                $this->ajaxReturn(false);           //可以举报
            }else{
                $this -> ajaxReturn(true);         //不可以举报
            }
        }

        /*举报请求响应*/
        public function sreport()
        {
            $floor = $_POST['floor'];
            $seat  = $_POST['seat'];
            $User = M("student_info");        //数据库查询座位状态
            $condition['Classroom_num'] = $floor;
            $condition['Seat_id']       = $seat;
            $stu_info = $User->where($condition)->field('Number')->select();
            $report=M("seat_report");
            $data['reporter_number']=$_COOKIE['Number'];
            $data['Seat_name']=$floor.$seat;
            $data['imformater_number']=$stu_info[0]['number'];
            $check=$report->where($data)->select();
            if(count($check)>0){
                $this -> ajaxReturn(array(
                    'sucessflag' =>false,
                    'imf'=>'已经有人举报过该座位!'
                ));
            }
            else{
                $data['reporte_time']=date('Y-m-d H:i:s');
                $report->add($data);
                $this -> ajaxReturn(array(
                    'sucessflag' =>true,
                    'imf'=>'举报成功'
                ));
            }

        }
    }
?>