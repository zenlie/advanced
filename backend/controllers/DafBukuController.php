<?php

namespace backend\controllers;

use Yii;
use backend\models\search\DafBukuSearch;
use backend\models\DafBuku;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

//dropdown list 1
use backend\models\DafKategoriBuku;

//dropdown list 3 
use yii\helpers\ArrayHelper; 
/**
 * DafBukuController implements the CRUD actions for DafBuku model.
 */
class DafBukuController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all DafBuku models.
     * @return mixed
      */
    public function actionIndex()
    {
        $searchModel = new DafBukuSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new DafBuku model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DafBuku();

        //dropdown list 2
        $dafKategori = DafKategoriBuku::find()->all(); 

        //dropdown list 4  parameter object 1 dari katbuku , parameter 2 (key), parameter 3 value
        $dafKategori = ArrayHelper::map($dafKategori,'id','nama'); 

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->buku_id]);
        } else {
            return $this->render('create', [
                'model' => $model,

                //dropdown list 5 kirim array dari katbuku ke form yg dropdownlist
                'dafKategori' => $dafKategori 
            ]);
        }
    }

    /**
     * Updates an existing DafBuku model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $dafKategori = DafKategoriBuku::find()->all(); 
        $dafKategori = ArrayHelper::map($dafKategori,'id','nama'); 

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->buku_id]);
        }

        return $this->render('update', [
            'model' => $model,
            'dafKategori' => $dafKategori 
        ]);
    }

    /**
     * Deletes an existing DafBuku model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the DafBuku model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DafBuku the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DafBuku::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
