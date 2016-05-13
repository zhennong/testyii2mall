<?php
namespace frontend\controllers;

use Yii;
use common\models\UploadForm;


class PersonController extends FrontendController{

    public function actionIndex(){
        return $this->render('index');
    }

    //上传头像
    public function actionAvatar(){
        return $this->render('avatar');
    }
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

    public function actionCeshi(){
        $uid = Yii::$app->user->identity->id;
        if(Yii::$app->request->isAjax){
            $img =$_POST['base'];
            $s = base64_decode(str_replace('data:image/png;base64,', '', $img));
            if(file_put_contents("./images/icon/uid{$uid}.png", $s)){
                echo "ok";
            }else{
                echo "no";
            }
        }
    }

}

