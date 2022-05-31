<?php



use yii\db\Migration;
use d4yii2\sqlreport\accessRights\SqlReportViewUserRole;

class m220531_130707_create_roleSqlReportView  extends Migration {

    public function up() {

        $auth = Yii::$app->authManager;
        $role = $auth->createRole(SqlReportViewUserRole::NAME);
        $auth->add($role);

    }

    public function down() {
        $auth = Yii::$app->authManager;
        $role = $auth->createRole(SqlReportViewUserRole::NAME);
        $auth->remove($role);
    }
}
