<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;

?>

<?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?> 
<?= Html::a("Назад", ['/kabinet/blog-site/'], ['class' => 'btn btn-primary']);?><br>
<br>

<?= $form->field($item, 'info')->widget(CKEditor::className(),[
        'editorOptions' => [
            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
                            'label' => 'Информация о сайте',
        ],

    ]);
    ?>
<?php ActiveForm::end() ?>


