<?php
namespace frontend\modules\show\models;

class CartTool{
    protected static $news = null ;
    protected $data = [];
    /**
     * 单例模式,保证每次调用的都是同一个对象,并将数据放在session里
     */
    protected function __construct(){
        $cart = session('cart');
        if (!empty($cart)) {
            $this->data = session('cart');
        }
    }

    /**
     * 防止克隆
     */
    protected function __clone(){
    }

    /**
     * 对外部开放的唯一接口
     * @return  object;
     */
    public static function getIns(){
        if (self::$news === null) {
            self::$news = new self();
        }
        return self::$news;
    }


    /**
     * 向购物车中添加1个商品
     * @param $id int 商品id
     * @param $name String 商品名
     * @param $shop_price float 价格
     * @param $num 商品数量
     * @return boolean
     */
    public function add($id,$name,$shop_price,$num){
        //如果检测到id已存在,num+$num
        if (isset($this->data[$id])) {
            $this->data[$id]['num'] += $num;
        }else{
            $goods = ['name'=>$name,'shop_price'=>$shop_price,'num'=>$num];
            $this->data[$id] = $goods;
        }
        return true;
    }
    /**
     * 减少购物中1个商品的数量,如果减至0,则从购物车删除此商品
     * @param $id int 商品id
     * @param $num int 商品数量
     */
    public function decr($id,$num){
        if (isset($this->data[$id])) {
            $this->data[$id]['num'] -= $num;
        }
        if ($this->data[$id]['num']<=0) {
            $this->del($id);
        }
    }
    /**
     * 从购物车删除某商品
     * @param $id 商品id
     */
    public function del($id){
        unset($this->data[$id]);
    }
    /**
     * 列出购物车所有的商品
     * @return Array
     */
    public function data(){
        return $this->data;
    }
    /**
     * 返回购物车中有几种商品
     * @return int
     */
    public function calcType(){
        return count($this->data);
    }
    /**
     * 返回购物中商品的个数
     * @return int
     */
    public function calcCnt(){
        $cnt = 0;
        foreach ($this->data as $v) {
            $cnt += $v['num'];
        }
        return $cnt;
    }
    /**
     * 返回购物车中商品的总价格
     * @return float
     */
    public function calcMoney(){
        $money = 0;
        foreach ($this->data as $v) {
            $money += ($v['num'] * $v['shop_price']);
        }
        return $money;
    }
    /**
     * 清空购物车
     * @return void
     */
    public function clear(){
        $this->data = [];
    }

    /**
     * 析构函数,当页面代码执行完毕时触发,是为了session跨域传递
     */
    public function __destruct(){
        session('cart',$this->data);
    }


}









?>