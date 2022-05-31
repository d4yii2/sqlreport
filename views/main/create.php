<?php

use d3system\yii2\web\D3SystemView;

use eaBlankonThema\widget\ThAlertList;
use eaBlankonThema\widget\ThReturnButton;
use eaBlankonThema\assetbundles\layout\LayoutAsset;

LayoutAsset::register($this);

/**
 * @var D3SystemView $this
 * @var d4yii2\sqlreport\models\Sqlreport $model
 */

$this->title = Yii::t('sqlreport', 'Create SQL Report');
$this->setPageHeader($this->title);
$this->setPageIcon('');
$this->addPageButtons(ThReturnButton::widget([
    'backUrl' => ['index'],
]));

?>
<div class="row">
    <?= ThAlertList::widget() ?>
    <div class="col-md-9">
        <div class="panel  rounded shadow">
            <div class="panel-body rounded-bottom">
                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>
            </div>
        </div>
    </div>
</div>
