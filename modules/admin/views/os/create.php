<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Os */

$this->title = 'Create Os';
$this->params['breadcrumbs'][] = ['label' => 'Os', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
if ( Yii::$app->user->isGuest )
    return Yii::$app->getResponse()->redirect((Url::to(['login'],302)));
?>
<div class="os-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
