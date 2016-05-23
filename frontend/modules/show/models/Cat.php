<?php
namespace frontend\modules\show\models;
use Yii;

class Cat extends \yii\db\ActiveRecord{
    public $cats = null;
    public $lv;           //下面有用到自定义的lv,不加会出错
    public $data = [];

    public function  gets(){
        if(!$this->cats) {
            $cats = $this->find()->all();
            $this->cats = $cats;
        }
    }
    /**
     * 无限级分类
     * @param  $pd默认为0,从顶级开始找,$lv代表层级,顶级为0
     * @return 返回排好顺序二维数组,取值的话,foreach取,通过lv可以判断层级
     */
    public function shows($pid =0,$lv = 0){
        if(!empty($this->data)){
            return $this->data;
        }
        $data = [];
        if(!$this->cats){
            $this->gets();
        }
        //递归循环取出每一条
        foreach ($this->cats as $c) {
            //先找pid为0的顶级栏目
            //然后根据该栏目的
            if ($c['pid'] == $pid) {
                $c['lv']  = $lv;
                $data[] = $c;
                //array_merge() 将一个或多个数组的单元合并起来，一个数组中的值附加在前一个数组的后面。返回作为结果的数组
                $data = array_merge($data,$this->shows($c['cat_id'],$lv+1));

            }
        }
        //最后循环结束以后返回
        return $this->data = $data;
    }
    public function  zao($a){
        echo "早上好! {$a->data}<br/>";
    }
    public static function  zhong($a){
        echo "中午好! {$a->data}<br/>";
    }


}











?>