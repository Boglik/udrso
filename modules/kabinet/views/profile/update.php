<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use mihaildev\ckeditor\CKEditor;


/* @var $this yii\web\View */
/* @var $model app\modules\user\models\User */

$this->title = Yii::t('app', 'Редактировать');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Информация об отряде'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-profile-update">
    <div class="user-form">

        <?php $form = ActiveForm::begin(['id' => 'blog-form', 'options' => ['enctype' => 'multipart/form-data']]);
        ?>
        <?= $form->field($model, 'info')->widget(CKEditor::className(),[
        'editorOptions' => [
            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
        ],
    ]); ?>
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'сохранить'), ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'отменить'), ['/kabinet/blog-site'], ['class' => 'btn btn-danger']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>