<?php

use d3system\yii2\web\D3SystemView;
use eaBlankonThema\assetbundles\layout\LayoutAsset;
use eaBlankonThema\widget\ThReturnButton;

LayoutAsset::register($this);

/**
 * @var D3SystemView $this
 * @var d4yii2\sqlreport\models\Sqlreport $model
 */

$this->title = Yii::t('sqlreport', 'Update SQL Report');

$this->setPageHeader($this->title);
$this->setPageHeaderDescription('');
$this->setPageIcon('');
$this->addPageButtons(ThReturnButton::widget([
    'backUrl' => ['index'],
]));
?>
<div class="row">
    <div class="col-md-9">
        <div class="panel  rounded shadow">
            <div class="panel-body rounded-bottom">
                <?php echo $this->render('_form', [
                    'model' => $model,
                ]) ?>
            </div>
        </div>
    </div>
</div>
