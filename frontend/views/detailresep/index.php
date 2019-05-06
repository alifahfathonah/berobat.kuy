<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\DetailresepSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Detailreseps';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detailresep-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Detailresep', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'detailResepID',
            'obatID',
            'detailResepDosis',
            'resepID',
            'detailResepQuantity',
            //'detailResepSubtotal',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>