<?php
    namespace Home\Controller;
    use Think\Controller;

    class SeatinfoController extends Controller{
        /*座位预约页面显示*/
        public function seatinfoyuyue()
        {
            $this -> display();
        }

        /*座位占用页面显示*/
        public function seatinfozhanyong()
        {
            $this -> display();
        }

        /*座位暂离页面显示*/
        public function seatinfozanli()
        {
            $this -> display();
        }

        /*预约座位详细信息请求响应*/
        public function yuyueinfo()
        {
            $User = M("student_info");            //数据库查询详细信息
            $condition['Number'] = $_COOKIE['Number'];
            $info = $User->where($condition)->select();

            $classroom_num = $info[0]['classroom_num'];
            $seat_id       = $info[0]['seat_id'];
            $start_time    = $info[0]['appointment_time'];
            if($start_time == null){
                $end_time = null;
            }else{
                $end_time = date('Y-m-d H:i:s', strtotime($start_time) + 1800);   //预约截止时间
            }
            $number = $_COOKIE['Number'];
            $name   = $info[0]['name'];

            /*将详细信息压入数组返回前端*/
            $result = array(
                'classroom_num' => $classroom_num,
                'seat_id'       => $seat_id,
                'start_time'    => $start_time,
                'end_time'      => $end_time,
                'number'        => $number,
                'name'          => $name
            );
            $this -> ajaxReturn($result);
        }

        /*占用座位详细信息请求响应*/
        public function zhanyonginfo()
        {
            $User = M("student_info");      //数据库查询详细信息
            $condition['Number'] = $_COOKIE['Number'];
            $info = $User->where($condition)->select();

            $classroom_num = $info[0]['classroom_num'];
            $seat_id       = $info[0]['seat_id'];
            $start_time    = $info[0]['occupancy_time'];
            if($start_time == null){
                $end_time = null;
            }else{
                /*座位占用时间计算*/
                $end_time_t = time()-strtotime($start_time);
                $end_time_h = (int)($end_time_t/3600);
                $end_time_m = (int)($end_time_t%3600/60);
                $end_time_s = $end_time_t%60;
                $end_time   = $end_time_h.':'.$end_time_m.':'.$end_time_s;
            }
            $number = $_COOKIE['Number'];
            $name   = $info[0]['name'];

            /*将详细信息压入数组返回前端*/
            $result = array(
                'classroom_num' => $classroom_num,
                'seat_id'       => $seat_id,
                'start_time'    => $start_time,
                'end_time'      => $end_time,
                'number'        => $number,
                'name'          => $name
            );
            $this -> ajaxReturn($result);
        }

        /*暂离座位详细信息请求响应*/
        public function zanliinfo()
        {
            $User = M("student_info");        //数据库查询详细信息
            $condition['Number'] = $_COOKIE['Number'];
            $info = $User->where($condition)->select();

            $classroom_num = $info[0]['classroom_num'];
            $seat_id       = $info[0]['seat_id'];
            $start_time    = $info[0]['departure_time'];
            if($start_time == null){
                $end_time = null;
            }else{
                $end_time = date('Y-m-d H:i:s', strtotime($start_time) + 7200);  //暂离截止时间
            }
            $number = $_COOKIE['Number'];
            $name   = $info[0]['name'];

            /*将暂离的详细信息压入数组返回前端*/
            $result = array(
                'classroom_num' => $classroom_num,
                'seat_id'       => $seat_id,
                'start_time'    => $start_time,
                'end_time'      => $end_time,
                'number'        => $number,
                'name'          => $name
            );
            $this -> ajaxReturn($result);
        }

        /*预约退座请求响应*/
        public function yuyuetuizuo()
        {
            /*用户信息改变*/
            $User = M("student_info");
            $data['Classroom_num']    = null;
            $data['Seat_id']          = null;
            $data['State_flag']       = 1;
            $data['Appointment_time'] = null;
            $condition['Number'] = $_COOKIE['Number'];
            $seat_info = $User->where($condition)->select();
            if($seat_info[0]['state_flag'] != 2)
                $this -> ajaxReturn('抱歉，您没有预约座位可以退选！');
            $User->where($condition)->save($data);

            $classroom_num = $seat_info[0]['classroom_num'];
            $seat_id       = $seat_info[0]['seat_id'];

            /*座位状态改变*/
            $User = M("seat_distribution");
            $data2['Seat_status'] = 0;
            $condition2['Seat_id']       = $seat_id;
            $condition2['Classroom_num'] = $classroom_num;
            $User->where($condition2)->save($data2);

            $this -> ajaxReturn('预约退座成功！');
        }

        /*暂离退座请求响应*/
        public function zanlituizuo()
        {
            /*用户信息改变*/
            $User = M("student_info");
            $data['Classroom_num']  = null;
            $data['Seat_id']        = null;
            $data['State_flag']     = 1;
            $data['Departure_time'] = null;
            $condition['Number'] = $_COOKIE['Number'];
            $seat_info = $User->where($condition)->select();
            if($seat_info[0]['state_flag'] != 4)
                $this -> ajaxReturn('抱歉，您没有暂离座位可以退选！');
            $User->where($condition)->save($data);

            $classroom_num = $seat_info[0]['classroom_num'];
            $seat_id       = $seat_info[0]['seat_id'];

            /*座位状态改变*/
            $User = M("seat_distribution");
            $data2['Seat_status'] = 0;
            $condition2['Seat_id']       = $seat_id;
            $condition2['Classroom_num'] = $classroom_num;
            $User->where($condition2)->save($data2);

            $this -> ajaxReturn('暂离退座成功！');
        }
    }
?>