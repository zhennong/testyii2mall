<?php

namespace backend\modules\user\controllers;

use Yii;
use backend\controllers\BackendController;
use backend\modules\user\models\UserSearch;
use yii\web\NotFoundHttpException;
use common\models\User;
// use backend\modules\user\models\User;

/**
 * Default controller for the `user` module
 */
class DefaultController extends BackendController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionUserList()
    {
        // $dataProvider = new \yii\data\ActiveDataProvider([
        //     'query'=>\common\models\User::find(),
        //     'pagination' => [
        //         'pagesize' => 10,
        //     ],
        //     'sort' => [
        //         'defaultOrder' => [
        //             'created_at' => SORT_DESC,
        //         ]
        //     ],
        // ]);
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $gridColumns = [
            ['class' => 'kartik\grid\SerialColumn'],
            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'username',
                'pageSummary' => 'Page Total',
                'vAlign'=>'middle',
                'headerOptions'=>['class'=>'kv-sticky-column'],
                'contentOptions'=>['class'=>'kv-sticky-column'],
                'editableOptions'=>['header'=>'Name', 'size'=>'md']
            ],
            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'auth_key',
            ],
            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'email',
            ],
            /*[
                'attribute'=>'color',
                'value'=>function ($model, $key, $index, $widget) {
                    return "<span class='badge' style='background-color: {$model->color}'> </span>  <code>" .
                    $model->color . '</code>';
                },
                'filterType'=>GridView::FILTER_COLOR,
                'vAlign'=>'middle',
                'format'=>'raw',
                'width'=>'150px',
                'noWrap'=>true
            ],*/
            [
                'class'=>'kartik\grid\BooleanColumn',
                'attribute'=>'status',
                'vAlign'=>'middle',
            ],
            [
                'class' => 'kartik\grid\ActionColumn',
                'dropdown' => false,
                'vAlign'=>'middle',
//                'urlCreator' => function($action, $model, $key, $index) { return '#'; },
                'viewOptions'=>['title'=>'$viewMsg', 'data-toggle'=>'tooltip'],
                'updateOptions'=>['title'=>'$updateMsg', 'data-toggle'=>'tooltip'],
                'deleteOptions'=>['title'=>'$deleteMsg', 'data-toggle'=>'tooltip'],
            ],
            ['class' => 'kartik\grid\CheckboxColumn']
        ];
        return $this->render('user-list', [
            'dataProvider' => $dataProvider,
            'gridColumns' => $gridColumns,
            'searchModel' => $searchModel,
        ]);
    }
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    // public function actionCreate()
    // {
    //     $model = new User();

    //     if ($model->load(Yii::$app->request->post()) && $model->save()) {
    //         return $this->redirect(['view', 'id' => $model->id]);
    //     } else {
    //         return $this->render('create', [
    //             'model' => $model,
    //         ]);
    //     }
    // }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['update', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['user-list']);
    }

    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

