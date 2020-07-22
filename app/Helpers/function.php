<?php
      function cate_info($cate_info,$pid){
         static $cate_id=[];
        foreach($cate_info as $k=>$v){
            if($v['parent_id']==$pid){
               $cate_id[]=$v['cate_id'];
                // print_R($pid);die;
                $sss= cate_info($res,$v['cate_id']);
                // dump($cate_id);die;
          }
      }
      return $cate_id;
  }

?>