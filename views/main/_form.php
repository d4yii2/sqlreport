<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\datecontrol\DateControl;
use eaBlankonThema\widget\ThButton;

/**
 * @var yii\web\View $this
 * @var d4yii2\sqlreport\models\Sqlreport $model
 * @var yii\widgets\ActiveForm $form
 */
?>
<div class="form-body">
    <?php
    $form = ActiveForm::begin([
        'id' => 'Sqlreport',
        'layout' => 'horizontal',
        'enableClientValidation' => true,
        'errorSummaryCssClass' => 'error-summary alert alert-error',
    ]);
    ?>


    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'sql')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'notes')->textarea(['rows' => 6]) ?>

    <div class="form-footer">
        <div class="pull-right">
            <?= ThButton::widget([
                'label' => ($model->isNewRecord ? Yii::t('crud', 'Create') : Yii::t('crud', 'Save')),
                'id' => 'save-' . $model->formName(),
                'icon' => ThButton::ICON_CHECK,
                'type' => ThButton::TYPE_SUCCESS,
                'submit' => true,
                'htmlOptions' => [
                    'name' => 'action',
                    'value' => 'save',
                ],
            ]) ?>
        </div>
        <div class="clearfix"></div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
