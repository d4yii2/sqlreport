<?php

namespace d4yii2\sqlreport\models;

use d4yii2\sqlreport\models\base\Sqlreport as BaseSqlreport;
use HttpException;

/**
 * This is the model class for table "sqlreport".
 */
class Sqlreport extends BaseSqlreport
{
    public static function findForController(int $id, int $sysCompanyId): self
    {
        if (($model = self::findOne($id)) === null) {
            throw new HttpException(404, 'The requested page does not exist.');
        }
        if ($model->sys_company_id !== $sysCompanyId) {
            throw new HttpException(404, 'The requested page does not exist.');
        }
        return $model;
    }
}
