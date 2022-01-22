<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'product_category',
                'format' => 'raw',
                'value' => function ($model) {
                return $model->desc;
                }
                ],
            [
                'attribute' => 'Title',
                'format' => 'raw',
                'value' => function ($model) {
                return $model->productDetail('title');
                }
                ],
                [
                    'attribute' => 'Price',
                    'format' => 'raw',
                    'value' => function ($model) {
                    return '$'.' '.$model->productDetail('price');
                    }
                    ],
                    [
                        'attribute' => 'description',
                        'format' => 'raw',
                        'value' => function ($model) {
                        return $model->productDetail('description');
                        }
                        ],
        ],
    ]) ?>

</div>
