<?php

namespace d4yii2\sqlreport\controllers;

use d4yii2\sqlreport\accessRights\SqlReportFullUserRole;
use d4yii2\sqlreport\accessRights\SqlReportViewUserRole;
use d4yii2\sqlreport\models\Sqlreport;
use d4yii2\sqlreport\models\SqlreportSearch;
use eaBlankonThema\yii2\web\LayoutController;
use HttpException;
use Throwable;
use Yii;
use Exception;
use d3system\helpers\FlashHelper;
use yii\filters\AccessControl;
use d4yii2\sqlreport\Module;
use yii\web\Response;

/**
 * MainController implements the CRUD actions for Sqlreport model.
 * @property Module $module
 */
class MainController extends LayoutController
{
    /**
     * @var boolean whether to enable CSRF validation for the actions in this controller.
     * CSRF validation is enabled only when both this property and [[Request::enableCsrfValidation]] are true.
     */
    public $enableCsrfValidation = false;

    /**
     * specify route for identifying active menu item
     */
    public $menuRoute = 'sqlreport/main/index';


    /**
     * @inheritdoc
     */
    public function behaviors(): array
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => [
                            'index',
                            'view',
                        ],
                        'roles' => [
                            SqlReportViewUserRole::NAME
                        ],
                    ],
                    [
                        'allow' => true,
                        'actions' => [
                            'index',
                            'create',
                            'update',
                            'delete',
                            'view',
                        ],
                        'roles' => [
                            SqlReportFullUserRole::NAME,
                            SqlReportViewUserRole::NAME
                        ],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Sqlreport models.
     * @return string
     * @throws \yii\db\Exception
     */
    public function actionIndex(): string
    {
        $searchModel = new SqlreportSearch;
        $searchModel->sys_company_id = Yii::$app->SysCmp->getActiveCompanyId();
        $dataProvider = $searchModel->search(Yii::$app->request->get());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Creates a new Sqlreport model.
     * If creation is successful, the browser will be redirected
     *  to the 'view' page or back, if parameter $goBack is true.
     * @return string|\yii\console\Response|Response
     * @throws \yii\db\Exception
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;

        $model = new Sqlreport;
        $model->sys_company_id = Yii::$app->SysCmp->getActiveCompanyId();

        try {

            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } catch (Exception $e) {
            FlashHelper::processException($e);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Sqlreport model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return string|Response
     * @throws \yii\db\Exception
     * @throws HttpException
     */
    public function actionUpdate(int $id)
    {

        $request = Yii::$app->request;
        $model = $this->findModel($id);
        if ($model->load($request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);

    }

    /**
     * @throws HttpException
     * @throws \yii\db\Exception
     */
    public function actionView(int $id): string
    {

        $model = $this->findModel($id);
        return $this->render('view', [
            'model' => $model,
        ]);

    }

    /**
     * Deletes an existing Sqlreport model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return Response
     * @throws Throwable
     */
    public function actionDelete(int $id)
    {
        if (!$transaction = Yii::$app->getDb()->beginTransaction()) {
            throw new \yii\db\Exception('Cn not initiate transaction');
        }
        try {
            $this->findModel($id)->delete();
            $transaction->commit();
        } catch (Exception $e) {
            $transaction->rollback();
            FlashHelper::processException($e);
            return $this->redirect(['view', 'id' => $id]);
        }
        return $this->redirect(['index']);

    }


    /**
     * Finds the Sqlreport model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Sqlreport the loaded model
     * @throws \yii\db\Exception if the model cannot be found
     * @throws HttpException
     */
    protected function findModel(int $id): Sqlreport
    {
        return Sqlreport::findForController($id, Yii::$app->SysCmp->getActiveCompanyId());
    }
}
