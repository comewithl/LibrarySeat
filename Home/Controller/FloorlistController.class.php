<?php
    namespace Home\Controller;
    use Think\Controller;
    use Think\Model;

    class FloorlistController extends Controller{
        /*楼层选择页面展示*/
        public function floorlist()
        {
            $User = M("student_info");            //数据库查询咯详细信息
            $condition['Number'] = $_COOKIE['Number'];
            $result = $User->where($condition)->field('number','name')->limit(1)->select();
            $name=$result[0]['name'];
            $number=$result[0]['number'];
            $this->assign('name',$name);
            $this->assign('number',$number);
            $this -> display();
        }
    }
?>