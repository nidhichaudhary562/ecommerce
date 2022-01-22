<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'product_category')->dropDownList($model->CategoryList(),["Prompt" => " "]) ?>

    <?= $form->field($model, 'title')->textInput(['value' => !empty($model->productDetail('title')) ? $model->productDetail('title') : '']) ?>
    
    <?= $form->field($model, 'price')->textInput(['value' => !empty($model->productDetail('price')) ? $model->productDetail('price') : ''])->label('Price (In $)') ?>
    
    <?= $form->field($model, 'description')->textarea(['value' => !empty($model->productDetail('description')) ? $model->productDetail('description'): '']) ?>
    
    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
