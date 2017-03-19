<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\store\ProductDescription */

$this->title = 'Update Product Description: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Product Descriptions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="product-description-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
