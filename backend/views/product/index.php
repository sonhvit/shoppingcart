<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\store\ProductDescriptionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Product Descriptions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-description-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('Create Product Description', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'attribute' => 'category_id',
                'format' => 'raw',
                'value' => function ($model){
                    return isset($model->categoryid) ? $model->categoryid->name : '';
                },
            ],
            'description:ntext',
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
            // 'created_by',
            // 'updated_by',
            // 'category_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
