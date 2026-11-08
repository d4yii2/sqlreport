<?php

namespace d4yii2\sqlreport\models;

use d4yii2\sqlreport\models\base\Sqlreport as BaseSqlreport;
use Yii;
use yii\db\Exception;
use yii\web\HttpException;

/**
 * This is the model class for table "sqlreport".
 */
class Sqlreport extends BaseSqlreport
{
    public function rules(): array
    {
        return array_merge(parent::rules(), [
            [['sql'], 'validateSql'],
        ]);
    }

    /**
     * Checks SELECT / WITH statements with EXPLAIN, so syntax errors are
     * reported on save instead of failing when the report is opened.
     */
    public function validateSql(string $attribute): void
    {
        $sql = rtrim(trim((string)$this->$attribute), ';');
        if ($sql === '' || !preg_match('/^\(?\s*(SELECT|WITH)\b/i', $sql)) {
            return;
        }
        try {
            Yii::$app->db->createCommand('EXPLAIN ' . $sql)->queryAll();
        } catch (Exception $e) {
            $this->addError(
                $attribute,
                Yii::t('sqlreport', 'Report SQL error: {error}', [
                    'error' => $e->errorInfo[2] ?? $e->getMessage(),
                ])
            );
        }
    }

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
