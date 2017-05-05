<?php
    namespace Home\Controller;
    use Think\Controller;
    use Think\Model;

    class SeatselectionController extends Controller{
        /*二楼自习室选座页面展示*/
        public function seatselection02()
        {
            $this -> display();
        }

        /*四楼自习室选座页面展示*/
        public function seatselection04()
        {
            $this -> display();
        }

        /*二楼自习室座位分布信息请求响应*/
        public function seatdistribution02()
        {
            /*二楼自习室座位分布数据库查询*/
            $User = M("seat_distribution");
            $condition['Classroom_num'] = 02;
            $x = $User->where($condition)->select();

            $seat_x      = array();
            $seat_y      = array();
            $seat_id     = array();
            $seat_status = array();
            $a = -1;

            foreach ($x as $user) {
                $a = $a + 1;
                $seat_x[$a]      = $user[seat_x];
                $seat_y[$a]      = $user[seat_y];
                $seat_id[$a]     = $user[seat_id];
                $seat_status[$a] = $user[seat_status];
            }

            /*定义数组将分布信息返回前端*/
            $result = array(
                'seat_x'      => $seat_x,
                'seat_y'      => $seat_y,
                'seat_id'     => $seat_id,
                'seat_status' => $seat_status
            );

            $this -> ajaxReturn($result);
        }

        /*四楼自习室座位分布信息请求响应*/
        public function seatdistribution04()
        {
            /*四楼自习室座位分布数据库查询*/
            $User = M("seat_distribution");
            $condition['Classroom_num'] = 04;
            $x = $User->where($condition)->select();

            $seat_x      = array();
            $seat_y      = array();
            $seat_id     = array();
            $seat_status = array();
            $a = -1;

            foreach ($x as $user) {
                $a = $a + 1;
                $seat_x[$a]      = $user[seat_x];
                $seat_y[$a]      = $user[seat_y];
                $seat_id[$a]     = $user[seat_id];
                $seat_status[$a] = $user[seat_status];
            }

            /*定义数组将分布信息返回前端*/
            $result = array(
                'seat_x'      => $seat_x,
                'seat_y'      => $seat_y,
                'seat_id'     => $seat_id,
                'seat_status' => $seat_status
            );

            $this -> ajaxReturn($result);
        }

        /*二楼选座功能响应*/
        public function seatselect02()
        {

            $seat_id = $_POST['choosed_seat_id'];   //获取选择的座位的id

            $User = M("seat_distribution");          //座位状态查询
            $condition['Classroom_num'] = 02;
            $condition['Seat_id']       = $seat_id;
            $x = $User->where($condition)->select();

            /*如果座位已经被人选了，则返回提示信息*/
            if($x[0]['seat_status'] != 0)
            {
                $result = 0;
                $this -> ajaxReturn($result);
            }

            $User = M("student_info");                 //查询学生的具体信息
            $condition2['Number'] = $_COOKIE['Number'];
            $info = $User->where($condition2)->select();
            /*该用户已有座位或者未登录*/
            if($info[0]['state_flag'] != USERSTATE_LOGIN){
                $result = 2;
                $this -> ajaxReturn($result);
            }
            if($info[0]['sex'] == 1){
                /*男生预约*/
                /*座位状态改变*/
                $User = M("seat_distribution");
                $data['Seat_status'] = 1;
                $condition3['Seat_id']       = $seat_id;
                $condition3['Classroom_num'] = 02;
                $User->where($condition3)->save($data);

                /*用户信息改变*/
                $User = M("student_info");
                $data2['Classroom_num']    = '02';
                $data2['Seat_id']          = $seat_id;
                $data2['State_flag']       = 2;
                $data2['Appointment_time'] = date('Y-m-d H:i:s');
                $condition4['Number'] = $_COOKIE['Number'];
                $User->where($condition4)->save($data2);

                /*返回提示信息*/
                $result = 1;
                $this -> ajaxReturn($result);
            }else{
                /*女生预约*/
                /*座位状态改变*/
                $User = M("seat_distribution");
                $data['Seat_status'] = 2;
                $condition3['Seat_id']       = $seat_id;
                $condition3['Classroom_num'] = 02;
                $User->where($condition3)->save($data);

                /*用户信息改变*/
                $User = M("student_info");
                $data2['Classroom_num']    = '02';
                $data2['Seat_id']          = $seat_id;
                $data2['State_flag']       = 2;
                $data2['Appointment_time'] = date('Y-m-d H:i:s');
                $condition4['Number'] = $_COOKIE['Number'];
                $User->where($condition4)->save($data2);

                /*返回提示信息*/
                $result = 1;
                $this -> ajaxReturn($result);
            }
        }
        /*四楼选座功能响应*/
        public function seatselect04()
        {
            $seat_id = $_POST['choos'];   //获取选择的座位的id

            $User = M("seat_distribution");      //座位状态查询
            $condition['Classroom_num'] = 04;
            $condition['Seat_id']       = $seat_id;
            $x = $User->where($condition)->select();

            /*如果座位已经被人选了，则返回提示信息*/
            if($x[0]['seat_status'] != 0)
            {
                $result = 0;
                $this -> ajaxReturn($result);
            }

            $User = M("student_info");                 //查询学生的具体信息
            $condition2['Number'] = $_COOKIE['Number'];
            $info = $User->where($condition2)->select();

            if($info[0]['state_flag'] != USERSTATE_LOGIN){
                $result = 2;
                $this -> ajaxReturn($result);
            }

            if($info[0]['sex'] == 1){
                /*男生预约*/
                /*座位状态改变*/
                $User = M("seat_distribution");
                $data['Seat_status'] = 1;
                $condition3['Seat_id']       = $seat_id;
                $condition3['Classroom_num'] = 04;
                $User->where($condition3)->save($data);

                /*用户信息改变*/
                $User = M("student_info");
                $data2['Classroom_num']    = '04';
                $data2['Seat_id']          = $seat_id;
                $data2['State_flag']       = 2;
                $data2['Appointment_time'] = date('Y-m-d H:i:s');
                $condition4['Number'] = $_COOKIE['Number'];
                $User->where($condition4)->save($data2);

                /*返回提示信息*/
                $result = 1;
                $this -> ajaxReturn($result);
            }else{
                /*女生预约*/

                /*座位状态改变*/
                $User = M("seat_distribution");
                $data['Seat_status'] = 2;
                $condition3['Seat_id']       = $seat_id;
                $condition3['Classroom_num'] = 04;
                $User->where($condition3)->save($data);

                /*用户信息改变*/
                $User = M("student_info");
                $data2['Classroom_num']    = '04';
                $data2['Seat_id']          = $seat_id;
                $data2['State_flag']       = 2;
                $data2['Appointment_time'] = date('Y-m-d H:i:s');
                $condition4['Number'] = $_COOKIE['Number'];
                $User->where($condition4)->save($data2);

                /*返回提示信息*/
                $result = 1;
                $this -> ajaxReturn($result);
            }
        }
    }
?>
