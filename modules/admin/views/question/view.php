<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Question */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Сдача устава №', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

?>

<div class="question-view">

<?= Html::a('Обработать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>&nbsp;
<a type="btn btn-danger" onclick="javascript:history.back(); return false;"><div class = 'btn btn-danger'>Отменить</div></a>
</div>
<br>

    <?=

    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'question',
            'question_1',
            'question_2',
            'question_3',
            'question_4',
            'question_5',
            'question_6',
            'question_7',
            'question_8',
            'question_9',
            'question_10',
            'question_11',
            'question_12',
            'question_13',
            'question_14',
            'question_15',
        ],
    ]) ?>
