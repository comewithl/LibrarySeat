<?php
    namespace Home\Controller;
    use Think\Controller;
    use Think\Model;

    class LoginController extends Controller{
        /*登录页面展示*/
        public function login()
        {
            $this -> display();
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
                $User = M("student_info");
                $condition['Number'] = $number_inp;
                $stu = $User->where($condition)->field('Password')->select();

                $password = $stu[0]['password'];

                /*密码校验*/
                if($password_inp != $password) {
                    $this->ajaxReturn(2);        //帐号或密码错误，返回提示信息
                }else{
                    $date['State_flag'] = 1;            //用户绑定成功，改变用户的状态
                    $User->where($condition)->save($date);

                    cookie('Number',$number_inp,3600*24*365*4);     //用户的信息存入cookies

                    $this -> ajaxReturn(3);     //绑定成功
                }
            }
        }
    }
?>
