<?php



use yii\db\Migration;
use d4yii2\sqlreport\accessRights\SqlReportFullUserRole;

class m220531_130707_create_roleSqlReportFull  extends Migration {

    public function up() {

        $auth = Yii::$app->authManager;
        $role = $auth->createRole(SqlReportFullUserRole::NAME);
        $auth->add($role);

    }

    public function down() {
        $auth = Yii::$app->authManager;
        $role = $auth->createRole(SqlReportFullUserRole::NAME);
        $auth->remove($role);
    }
}
