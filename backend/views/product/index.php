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
            'category_id',
            'description:ntext',
            'status',
            'created_at:datetime',
             'updated_at:datetime',
            // 'created_by',
            // 'updated_by',
            // 'category_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
