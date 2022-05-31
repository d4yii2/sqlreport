<?php

use d3system\yii2\web\D3SystemView;
use eaBlankonThema\components\FlashHelper;
use eaBlankonThema\widget\ThGridView;
use eaBlankonThema\widget\ThAlertList;
use eaBlankonThema\assetbundles\CoreAsset;
use eaBlankonThema\widget\ThReturnButton;
use yii\data\ArrayDataProvider;

CoreAsset::register($this);

/**
 * @var D3SystemView $this
 * @var d4yii2\sqlreport\models\Sqlreport $model
 */

$this->title = Yii::t(
    'sqlreport',
    'SQL Report "{name}"',
    ['name' => $model->name]
);
$this->setPageHeader($this->title);
$this->setPageIcon('');
if (!$data = Yii::$app->db->createCommand($model->sql)->queryAll()) {
    FlashHelper::addInfo(Yii::t('sqlreport', 'No data found!'));
}
$this->addPageButtons(ThReturnButton::widget([
    'backUrl' => ['index'],
]));
?>

<div class="row">
    <?= ThAlertList::widget() ?>
    <div class="col-md-12">
        <?php
        if ($data) {
            $columns = array_keys(reset($data));
            echo ThGridView::widget([
                'id' => 'pjax-main',
                'dataProvider' => new ArrayDataProvider([
                    'allModels' => $data,
                    'pagination' => false
                ]),
                'actionColumnTemplate' => '',
                //'filterModel' => $searchModel,
                'columns' => $columns,
            ]);
        }
        ?>
    </div>
</div>
