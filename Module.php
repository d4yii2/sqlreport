<?php

namespace d4yii2\sqlreport;

use Yii;
use d3system\yii2\base\D3Module;

class Module extends D3Module
{
    public $controllerNamespace = 'd4yii2\sqlreport\controllers';

    public $leftMenu = 'd4yii2\sqlreport\LeftMenu';

    public function getLabel(): string
    {
        return Yii::t('sqlreport','SQL Reports');
    }
}
