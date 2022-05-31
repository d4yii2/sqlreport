<?php

namespace d4yii2\sqlreport\accessRights;

use CompanyRights\components\UserRoleInterface;
use d3modules\admin\accessRights\SystemAdminUserRole;
use Yii;

class SqlReportFullUserRole implements UserRoleInterface
{

    public const NAME = 'SqlReportFull';

    /**
     * @inheritdoc
     */
    public function getType(): string
    {
        return self::TYPE_COMPANY;
    }

    /**
     * @inheritdoc
     */
    public function getLabel(): string
    {
        return Yii::t('sqlreport', 'Full');

    }

    /**
     * @inheritdoc
     */
    public function getName(): string
    {
        return self::NAME;
    }

    /**
     * @inheritdoc
     */
    public function getAssigments(): array
    {
        return [];
    }

    private function can(): bool
    {
        return Yii::$app->user->can(SystemAdminUserRole::NAME);
    }

    /**
     * @inheritdoc
     */
    public function canAssign(): bool
    {
        return $this->can();
    }

    /**
     * @inheritdoc
     */
    public function canView(): bool
    {
        return $this->can();
    }

    /**
     * @inheritdoc
     */
    public function canRevoke(): bool
    {
        return $this->can();
    }

}

