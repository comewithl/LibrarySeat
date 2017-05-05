<?php
    namespace Home\Controller;
    use Think\Controller;

    class SeatinfoController extends Controller{

        /*我的座位页面显示(任何状态下的判断并跳转页面)*/
        public function seatinfo(){
            $User = M("student_info");            //数据库查询详细信息
            $condition['Number'] = $_COOKIE['Number'];
            $stu_flag = $User->where($condition)->field('State_flag')->select();
            switch ($stu_flag[0]['state_flag']){
                case USERSTATE_ORDER:
                    $this->display('seatinfo/seatinfoyuyue');
                    break;
                case USERSTATE_OCCUPY:
                    $this->display('seatinfo/seatinfozhanyong');
                    break;
                case USERSTATE_TEM:
                    $this->display('seatinfo/seatinfozanli');
                    break;
                default:
                    $this->error('你还未选择座位');
                    break;
            }
        }
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
                $end_time = get_timediff(strtotime($start_time),time());

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

        /*就座确认:坐标判断*/
        public function seatConfirm()
        {
            $libraryPositionlng = 120.21937542; //经度
            $libraryPositionlat = 30.25924446; //纬度
            $userPosition = $_POST['userPosition'];
            $distance = $this->getDistance($libraryPositionlat,$libraryPositionlng,$userPosition['lat'],$userPosition['lng']);
            /*如果用户离目标 50 米以内进行确认就座*/
            if($distance<= 50){
                /*用户信息改变*/
                $User = M("student_info");
                $data['State_flag']       = USERSTATE_OCCUPY;  //用户占用中
                $data['Appointment_time'] = null;
                $data['Occupancy_time']   = date('Y-m-d H:i:s');
                $data['Departure_time']   = null;
                $condition['Number'] = $_COOKIE['Number']; //学号

                $seat_info = $User->where($condition)->select();
                if($seat_info[0]['state_flag'] == USERSTATE_LOGIN)
                    $this -> ajaxReturn('抱歉，您还没有任何座位！');
                $User->where($condition)->save($data);

                $classroom_num = $seat_info[0]['classroom_num'];
                $seat_id       = $seat_info[0]['seat_id'];
                /*座位状态改变*/
                $User = M("seat_distribution");
                $seatData['Seat_status'] = SEATSTATE_OCCUPY;
                $seatCondition['Seat_id']       = $seat_id;
                $seatCondition['Classroom_num'] = $classroom_num;
                $User->where($seatCondition)->save($seatData);

                $result=array(
                    'successflag' => true,
                    'imf' => '就座成功'
                );
                $this->ajaxReturn($result);

            }
            else{
                $result=array(
                    'distance' => $distance,
                    'successflag' =>false ,
                    'imf' => '请确认是否已经到达图书馆在就座或者联系管理员'
                );
                $this->ajaxReturn($result);
            }

        }

        /*暂离*/
        public function seatTemp()
        {
            /*用户信息改变*/
            $User = M("student_info");
            $data['State_flag']       = USERSTATE_TEM;  //用户暂离
            $data['Appointment_time'] = null;
            $data['Occupancy_time']   = null;
            $data['Departure_time']   = date('Y-m-d H:i:s');
            $condition['Number'] = $_COOKIE['Number']; //学号

            $seat_info = $User->where($condition)->select();
            if($seat_info[0]['state_flag'] != USERSTATE_OCCUPY){
                $result=array(
                    'successflag' => false,
                    'imf' => '抱歉，您没有座位！'
                );
                $this -> ajaxReturn($result);
            }

            $User->where($condition)->save($data);

            $classroom_num = $seat_info[0]['classroom_num'];
            $seat_id       = $seat_info[0]['seat_id'];
            /*座位状态改变*/
            $User = M("seat_distribution");
            $seatData['Seat_status'] = SEATSTATE_TEM;

            $seatCondition['Seat_id']       = $seat_id;
            $seatCondition['Classroom_num'] = $classroom_num;
            $User->where($seatCondition)->save($seatData);

            $result=array(
                'successflag' => true,
                'imf' => '暂离成功'
            );
            $this->ajaxReturn($result);

        }
        /*退坐*/
        public function seatReturn()
        {
            /*用户信息改变*/
            $User = M("student_info");
            $data['Classroom_num']    = null;
            $data['Seat_id']          = null;
            $data['State_flag']       = USERSTATE_LOGIN;
            $data['Appointment_time'] = null;
            $data['Occupancy_time'] = null;
            $condition['Number'] = $_COOKIE['Number'];
            $seat_info = $User->where($condition)->select();
            $User->where($condition)->save($data);

            $classroom_num = $seat_info[0]['classroom_num'];
            $seat_id       = $seat_info[0]['seat_id'];

            /*座位状态改变*/
            $User = M("seat_distribution");
            $data2['Seat_status'] = SEATSTATE_EMPTY;
            $condition2['Seat_id']       = $seat_id;
            $condition2['Classroom_num'] = $classroom_num;
            $User->where($condition2)->save($data2);

            $this -> ajaxReturn('退座成功！');
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
            $data['Occupancy_time'] = null;
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

        /*计算两个地理位置间的距离*/
        public function getDistance($lat1, $lng1, $lat2, $lng2)
        {
            $earthRadius = 6367000;
            $lat1 = ($lat1 * pi() ) / 180;
            $lng1 = ($lng1 * pi() ) / 180;
            $lat2 = ($lat2 * pi() ) / 180;
            $lng2 = ($lng2 * pi() ) / 180;
            $calcLongitude = $lng2 - $lng1;
            $calcLatitude = $lat2 - $lat1;
            $stepOne = pow(sin($calcLatitude / 2), 2) + cos($lat1) * cos($lat2) * pow(sin($calcLongitude / 2), 2);
            $stepTwo = 2 * asin(min(1, sqrt($stepOne)));
            $calculatedDistance = $earthRadius * $stepTwo;
            return round($calculatedDistance);
        }

    }
    /*秒换算成00:00:00格式*/
    function get_timediff($begin_time,$end_time)
    {
        if($begin_time < $end_time){
            $starttime = $begin_time;
            $endtime = $end_time;
        }else{
            $starttime = $end_time;
            $endtime = $begin_time;
        }
        $timediff = $endtime-$starttime; //秒
        //计算小时数
        $remain = $timediff;
        $hours = intval($remain/3600);
        $hours = $hours <9 ? "0".$hours:$hours;
        //计算分钟数
        $remain = $remain%3600;
        $mins = intval($remain/60);
        $mins =$mins <9 ? "0".$mins:$mins;
        //计算秒数
        $secs = $remain%60;
        $secs =$secs <9 ? "0".$secs:$secs;
        return "{$hours}:{$mins}:{$secs}";
    }
?>