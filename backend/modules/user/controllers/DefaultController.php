<?php

namespace backend\modules\user\controllers;

use backend\controllers\BackendController;
use backend\modules\user\UserSearch;

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
        $dataProvider = new \yii\data\ActiveDataProvider([
            'query'=>\common\models\User::find(),
            'pagination' => [
                'pagesize' => 2,
            ],
            'sort' => [
                'defaultOrder' => [
                    'created_at' => SORT_DESC,
                ]
            ],
        ]);
        $searchModel = new UserSearch();
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
                'dropdown' => true,
                'vAlign'=>'middle',
                'urlCreator' => function($action, $model, $key, $index) { return '#'; },
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
}
