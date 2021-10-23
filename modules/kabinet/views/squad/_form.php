<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\ActiveField;
use kartik\file\FileInput;
use meysampg\formbuilder\FormBuilder;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="squad-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?=
    $form->field($model, 'name', [
        'template' => "{label}\n{hint}\n{input}\n<font color ='red'> {error}</font>"
    ])->textInput(['maxlength' => true])
    ?>
    <?=
    $form->field($model, 'familia', [
        'template' => "{label}\n{hint}\n{input}\n<font color ='red'> {error}</font>"
    ])->textInput(['maxlength' => true])
    ?>
    <?=
    $form->field($model, 'otchestvo', [
        'template' => "{label}\n{hint}\n{input}\n<font color ='red'> {error}</font>"
    ])->textInput(['maxlength' => true])
    ?>
    <?=
            $form->field($model, 'pol', [
                'template' => "{label}\n{hint}\n{input}\n<font color ='red'> {error}</font>"
            ])
            ->dropDownList(
                    ['Мужской' => 'Мужской',
                        'Женский' => 'Женский',
                    ],
                    [
                        'prompt' => '--Выберете ПОЛ--',
                    ]
            )->label('Пол')
    ?>
    <?=
    $form->field($model, 'data_rozhdenia', [
        'template' => "{label}\n{hint}\n{input}\n<font color ='red'> {error}</font>"
    ])->textInput(['rows' => 6])
    ?>
    <?=
    $form->field($model, 'telefon', [
        'template' => "{label}\n{hint}\n{input}\n<font color ='red'> {error}</font>"
    ])->textInput()
    ?>

    <?=
    $form->field($model, 'email', [
        'template' => "{label}\n{hint}\n{input}\n<font color ='red'> {error}</font>"
    ])->textInput(['maxlength' => true])
    ?>
    <?=
    $form->field($model, 'seria_passporta', [
        'template' => "{label}\n{hint}\n{input}\n<font color ='red'> {error}</font>"
    ])->textInput(['maxlength' => true])
    ?>
    <?=
    $form->field($model, 'nomer_passporta', [
        'template' => "{label}\n{hint}\n{input}\n<font color ='red'> {error}</font>"
    ])->textInput(['maxlength' => true])
    ?>
    <?=
    $form->field($model, 'mesto_rozdenia', [
        'template' => "{label}\n{hint}\n{input}\n<font color ='red'> {error}</font>"
    ])->textInput(['maxlength' => true])
    ?>
    <?=
    $form->field($model, 'kem_vidan_passport', [
        'template' => "{label}\n{hint}\n{input}\n<font color ='red'> {error}</font>"
    ])->textInput(['maxlength' => true])
    ?>
    <?=
    $form->field($model, 'data_vidacha_passporta', [
        'template' => "{label}\n{hint}\n{input}\n<font color ='red'> {error}</font>"
    ])->textInput(['maxlength' => true])
    ?>
    <?=
    $form->field($model, 'kod_podrazdelenia', [
        'template' => "{label}\n{hint}\n{input}\n<font color ='red'> {error}</font>"
    ])->textInput(['maxlength' => true])
    ?>
    <?=
    $form->field($model, 'index_zitelstva', [
        'template' => "{label}\n{hint}\n{input}\n<font color ='red'> {error}</font>"
    ])->textInput(['maxlength' => true])
    ?>
    <?=
    $form->field($model, 'adress_postoyannogo_prozivania', [
        'template' => "{label}\n{hint}\n{input}\n<font color ='red'> {error}</font>"
    ])->textInput(['maxlength' => true])
    ?>
    <?=
    $form->field($model, 'fact_mesto_zitelstva', [
        'template' => "{label}\n{hint}\n{input}\n<font color ='red'> {error}</font>"
    ])->textInput(['maxlength' => true])
    ?>
    <?=
    $form->field($model, 'snils', [
        'template' => "{label}\n{hint}\n{input}\n<font color ='red'> {error}</font>"
    ])->textInput(['maxlength' => true])
    ?>
    <?=
    $form->field($model, 'inn', [
        'template' => "{label}\n{hint}\n{input}\n<font color ='red'> {error}</font>"
    ])->textInput(['maxlength' => true])
    ?>
    <?=
    $form->field($model, 'mesto_uchebi', [
        'template' => "{label}\n{hint}\n{input}\n<font color ='red'> {error}</font>"
    ])->textInput(['maxlength' => true])
    ?>
    <?=
            $form->field($model, 'forma_obuchenia', [
                'template' => "{label}\n{hint}\n{input}\n<font color ='red'> {error}</font>"
            ])
            ->dropDownList(
                    ['Бюджет' => 'Бюджет', 'Платное обучение' => 'Платное обучение'],
                    [
                        'prompt' => '--выберите--',
                    ]
            )->label('Форма обучения')
    ?>
    <?=
            $form->field($model, 'tip_uchebi', [
                'template' => "{label}\n{hint}\n{input}\n<font color ='red'> {error}</font>"
            ])
            ->dropDownList(
                    ['Очная' => 'Очная', 'Очно-заочная' => 'Очно-заочная', 'Заочная' => 'Заочная'],
                    [
                        'prompt' => '--выберите--',
                    ]
            )->label('Тип учебы')
    ?>
<?=
$form->field($model, 'fakultet', [
    'template' => "{label}\n{hint}\n{input}\n<font color ='red'> {error}</font>"
])->textInput(['maxlength' => true])
?>
<?=
$form->field($model, 'nomer_klass', [
    'template' => "{label}\n{hint}\n{input}\n<font color ='red'> {error}</font>"
])->textInput(['maxlength' => true])
?>
<?=
$form->field($model, 'mesto_raboti', [
    'template' => "{label}\n{hint}\n{input}\n<font color ='red'> {error}</font>"
])->textInput(['maxlength' => true])
?>
<?=
        $form->field($model, 'chelina', [
            'template' => "{label}\n{hint}\n{input}\n<font color ='red'> {error}</font>"
        ])
        ->dropDownList(
                ['Да' => 'Да', 'Нет' => 'Нет'],
                [
                    'prompt' => '--выберите--',
                ]
        )->label('Добавить человека в выездной список?(Целина)', [
    'template' => "{label}\n{hint}\n{input}\n<font color ='red'> {error}</font>"
])
?>
<?=
$form->field($model, 'docs', [
    'template' => "{label}\n{hint}\n{input}\n<font color ='red'> {error}</font>"
])->widget(FileInput::class, ['name' => 'input-ru[]',
    'language' => 'ru',]);
?>

    <div class="form-group">
<?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>

<?= Html::a(Yii::t('app', 'отменить'), ['/kabinet/squad/index'], ['class' => 'btn btn-danger']) ?>
    </div>

<?php ActiveForm::end(); ?>
</div>
