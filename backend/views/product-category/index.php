<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\store\ProductCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Product Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-category-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('Create Product Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'slug',
            [
                'attribute' => 'status',
                'format' => 'raw',
                'filter' => [1 =>  Yii::t('backend', 'Published'), 0 => Yii::t('backend', 'Not Published')],
                'value'=>function ($model) {
                    $options = [
                        'class' => ($model->status ==1)? 'glyphicon glyphicon-ok text-success' :'glyphicon glyphicon-remove text-danger',
                    ];
                    return Html::tag('p',Html::tag('span','',$options),['class'=>'text-center']);
                },
                'contentOptions' => ['style' => 'width:10%;text-align:center'],
            ],
            'created_at:datetime',
            'updated_at:datetime',
            [
                'attribute' => 'created_by',
                'format' => 'raw',
                'value' => function ($model){
                    return isset($model->created) ? $model->created->username : '';
                },
            ],
            [
                'attribute' => 'updated_by',
                'format' => 'raw',
                'value' => function ($model){
                    return isset($model->updated) ? $model->updated->username : '';
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
