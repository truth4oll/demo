<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\BooksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Books';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="books-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    <br>

    <?= GridView::widget(['dataProvider' => $dataProvider,
        'layout' => '{items}',
        'columns' => [['class' => 'yii\grid\SerialColumn'],
            'name',
            [
                'attribute' => 'preview',
                'format' => 'raw',
                'value' => function ($data) {
                    $image = Html::img($data->preview, [
                        'width' => '70px',

                    ]);
                    $link = Html::a($image, ['view', 'id' => $data->id, 'class' => 'showModal'], [
                        'data' => [
                            'target' => '#imageModal',
                            'toggle' => 'modal',
                            'backdrop' => 'static',
                            'image' => $data->preview,
                        ]
                    ]);
                    return $link;
                },
            ],
            [
                'attribute' => 'author_id',
                'value' => function ($data) {
                    return $data->author->fullName;
                },
            ],
            [
                'attribute' => 'date',
                'value' => function ($data) {
                    return date('d F Y', strtotime($data->date));
                },
            ],
            [
                'attribute' => 'date_create',
                'value' => function ($data) {
                    return (new \yii\i18n\Formatter)->asRelativeTime($data->date_create);
                },
            ],


            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'view' => function ($url, $model) {
                        $options = [
                            'title' => Yii::t('yii', 'View'),
                            'aria-label' => Yii::t('yii', 'View'),
                            'data-pjax' => '0',
                            'data' => [
                                'target' => '#viewModal',
                                'toggle' => 'modal',
                                'backdrop' => 'static',
                            ]
                        ];
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, $options);
                    }],
                'visibleButtons' => [
                    'update' => !\Yii::$app->user->isGuest,
                    'view' => !\Yii::$app->user->isGuest,
                    'delete' => !\Yii::$app->user->isGuest
                ],
                'template' => '{update} {view} {delete}'
            ],

        ]]); ?>

</div>

<?
yii\bootstrap\Modal::begin([
    'headerOptions' => ['id' => 'modalHeader'],
    'id' => 'imageModal',
    'size' => 'modal-lg',
    //keeps from closing modal with esc key or by clicking out of the modal.
    // user must click cancel or X to close
    'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]
]);
echo "<div class='modalContent' style='text-align: center'></div>";
yii\bootstrap\Modal::end();
?>



<?
yii\bootstrap\Modal::begin([
    'headerOptions' => ['id' => 'modalHeader'],
    'id' => 'viewModal',
    'size' => 'modal-lg',
    //keeps from closing modal with esc key or by clicking out of the modal.
    // user must click cancel or X to close
    'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]
]);
echo "<div class='modalContent' ></div>";
yii\bootstrap\Modal::end();


?>
