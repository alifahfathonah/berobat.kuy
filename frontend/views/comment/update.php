<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Comment */

$this->title = 'Update Comment: ' . $model->commentID;
$this->params['breadcrumbs'][] = ['label' => 'Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->commentID, 'url' => ['view', 'id' => $model->commentID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="comment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
