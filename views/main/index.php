<?php

use d3system\yii2\web\D3SystemView;
use d4yii2\sqlreport\accessRights\SqlReportFullUserRole;
use eaBlankonThema\widget\ThGridView;
use eaBlankonThema\widget\ThAlertList;
use eaBlankonThema\widget\ThButton;
use eaBlankonThema\assetbundles\CoreAsset;
use yii\widgets\Pjax;


CoreAsset::register($this);

/**
 * @var D3SystemView $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var d4yii2\sqlreport\models\SqlreportSearch $searchModel
 */

$isFullRole = Yii::$app->user->can(SqlReportFullUserRole::NAME);

$this->title = Yii::t('sqlreport', 'SQL Reports');
$this->setPageHeader($this->title);
$this->setPageIcon('');
if ($isFullRole) {
    $this->addPageButtons(ThButton::widget([
        'label' => Yii::t('crud', 'New'),
        'icon' => ThButton::ICON_PLUS,
        'type' => ThButton::TYPE_SUCCESS,
        'link' => ['create']
    ]));
}
if ($isFullRole) {
    $actionColumnTemplate = '{view} {update}';
} else {
    $actionColumnTemplate = '{view}';
}
?>

<div class="row">
    <?= ThAlertList::widget() ?>
    <div class="col-md-12">
        <?php Pjax::begin(['id' => 'pjax-main', 'enablePushState' => false,]);
        echo ThGridView::widget([
            'id' => 'pjax-main',
            'dataProvider' => $dataProvider,
            'actionColumnTemplate' => $actionColumnTemplate,
            //'filterModel' => $searchModel,
            'columns' => [
                'name',
                'notes:ntext',
            ],
        ]);
        Pjax::end();
        ?>
    </div>
</div>
