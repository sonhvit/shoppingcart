<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\store\ProductCategory */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="product-category-form">

    <?php $form = ActiveForm::begin([
    'layout' => 'horizontal',
    ]); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'status')->checkbox() ?>

    <?php echo $form->field($model, 'created_by')->textInput() ?>

    <?php echo $form->field($model, 'updated_by')->textInput() ?>


    <div class="form-group">
        <div class="col-sm-3 col-xs-2"></div>
        <div class="col-sm-3 col-xs-4">
            <?php 
            echo \yii\helpers\Html::a('<span class="glyphicon glyphicon-arrow-left"></span>'. Yii::t('backend', 'Back'), ['index'],['class'=>'btn btn-default btn200']);
            ?>
        </div>
        <div class="col-sm-3 col-xs-4">
            <?php echo  Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success btn200' : 'btn btn-primary btn200']) ?>
        </div>
        <div class="col-sm-3 col-xs-2">
            <?php 
            if (!$model->isNewRecord) {
                echo Html::a(Yii::t('backend', 'Delete'), ['delete', 'id' => $model->id],
                    [
                        'class' => 'btn btn-warning btn200 bold',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete?',
                            'method' => 'post',
                        ]
                    ]);
            }
            ?>
        </div>
    </div>


    <?php ActiveForm::end(); ?>

</div>
