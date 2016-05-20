<?php
namespace frontend\modules\persons\controllers;

use Yii;
use yii\web\Controller;
use frontend\modules\persons\models\UserInformation;


class PersonController extends Controller{

    public function actionIndex(){
        return $this->render('index');
    }

    //上传头像界面
    public function actionAvatar(){
        return $this->render('avatar');
    }


    /**
     * Ajax头像上传
     * 上传非图片类型不会触发ajax
     * return 暂返回状态,图片保存本地,路径没有存放数据库
     */
    public function actionToux(){
        $uid = Yii::$app->user->id;
        if(Yii::$app->request->isAjax){
            $img =$_POST['base'];
            $src = base64_decode(str_replace('data:image/png;base64,', '', $img));
            if(file_put_contents("./images/icon/uid{$uid}.png", $src)){
                echo "ok";
            }else{
                echo "no";
            }
        }else{
            $user = UserInformation::findOne($uid);
            if(!$user){
                $user =  new UserInformation();
                $user -> user_id    = $uid;
                $user -> nickname   = Yii::$app->user->identity->username;
                $user -> avatar     = "/images/icon/uid{$uid}.png";
                $user -> created_at = time();
                $user -> updated_at = time();
                if($user->save()){
                    $this->redirect('index.html');
                }else{
                    echo '上传失败';
                }
            }else{
                $user->avatar = "/images/icon/uid{$uid}.png";
                if($user->save()){
                    $this->redirect('index.html');
                }else{
                    echo "上传失败";
                }
            }
        }
    }

    /**
     * 用户资料修改界面
     */
    public function actionUinfo(){
        return $this->render('uinfo.php');
    }


}

