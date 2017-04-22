<?php
    namespace Home\Controller;
    use Think\Controller;
    use Think\Model;

    class FloorlistController extends Controller{
        /*楼层选择页面展示*/
        public function floorlist()
        {
            $this -> display();
        }
    }
?>