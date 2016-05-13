<?php
namespace frontend\controllers;

use Yii;
use common\models\UploadForm;


class PersonController extends FrontendController{

    public function actionIndex(){
        return $this->render('index');
    }

    //上传头像界面
    public function actionAvatar(){
        return $this->render('avatar');
    }

    /**
     * 文件上传, 暂搁置,后续用
     */
    public function actionUpload(){
        $up = new UploadForm();
        //设置属性(上传的位置,大小,类型, 名是否要随机生成)
        $up->set('path','./images/icon/');
        $up->set('maxsize',2000000);
        $up->set('allowtype',['gif','png','jpg','jpeg']);
        $up->set('israndname',true);

        if($up->upload('img')){
            echo '<pre>';
            var_dump($up->getFileName());
        }else{
            echo '<pre>';
            var_dump($up->getErrorMsg());
        }
    }

    /**
     * Ajax头像上传
     * 上传非图片类型不会触发ajax
     * return 暂返回状态,图片保存本地,路径没有存放数据库
     */
    public function actionToux(){
        $uid = Yii::$app->user->identity->id;
        if(Yii::$app->request->isAjax){
            $img =$_POST['base'];
            $src = base64_decode(str_replace('data:image/png;base64,', '', $img));
            if(file_put_contents("./images/icon/uid{$uid}.png", $src)){
                echo "ok";
            }else{
                echo "no";
            }
        }
    }

    /**
     * 用户资料修改界面
     */
    public function actionUinfo(){
        echo 'ok';
    }

}

