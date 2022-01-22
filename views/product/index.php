<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'product_category',
                'format' => 'raw',
                'value' => function ($model) {
                return $model->desc;
                }
                ],[
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
            ['class' => 'yii\grid\ActionColumn'],
                
            
        ],
    ]); ?>


</div>
