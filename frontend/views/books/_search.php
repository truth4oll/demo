<?php

use common\models\Authors;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\BooksSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="books-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'author_id')->dropDownList(ArrayHelper::map(Authors::find()->all(), 'id', 'fullname'), ['prompt' => 'Выберите автора']); ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'name') ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            Дата выхода книги:
        </div>
        <div class="col-md-2">
            <?  echo \yii\jui\DatePicker::widget([
                'model' => $model,
                'attribute' => 'date_from',
                'language' => 'ru',
                'dateFormat' => 'dd/MM/yyyy',
            ]);
            ?>
        </div>
        <div class="col-md-1 text-right">
            До:
        </div>
        <div class="col-md-2">
            <?  echo \yii\jui\DatePicker::widget([
                'model' => $model,
                'attribute' => 'date_to',
                'language' => 'ru',
                'dateFormat' => 'dd/MM/yyyy',
            ]);
            ?>
        </div>
        <div class="col-md-4">

        </div>
        <div class="col-md-1">
            <?= Html::submitButton('Искать', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
