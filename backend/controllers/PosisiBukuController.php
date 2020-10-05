<?php

namespace backend\controllers;

use Yii;
use backend\models\PosisiBuku;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\DafBuku;
use backend\models\RakBuku;
use yii\helpers\ArrayHelper;

/**
 * PosisiBukuController implements the CRUD actions for PosisiBuku model.
 */
class PosisiBukuController extends Controller
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
     * Lists all PosisiBuku models.
     * @return mixed
     */
    public function actionIndex()
    {

        //Membuat Filtering Model dengan Dropdownlist & TextInput pada Gridview 7 joint mencari nama katbuku
        $query = PosisiBuku::find(); 

        $dataProvider = new ActiveDataProvider([
            //Membuat Filtering Model dengan Dropdownlist & TextInput pada Gridview 5
            'query' => $query, 
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,

        ]);
    }

    /**
     * Displays a single PosisiBuku model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new PosisiBuku model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PosisiBuku();
        //dropdown list 2
        $dafBuku = DafBuku::find()->all(); 
        //dropdown list 2
        $rakBuku = RakBuku::find()->all(); 
        //dropdown list 4  parameter object 1 dari katbuku , parameter 2 (key), parameter 3 value
        $dafBuku = ArrayHelper::map($dafBuku,'buku_id','judul');
        //dropdown list 4  parameter object 1 dari katbuku , parameter 2 (key), parameter 3 value 
        $rakBuku = ArrayHelper::map($rakBuku,'id','no_rak'); 

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                //dropdown list 5 kirim array dari katbuku ke form yg dropdownlist
                'dafBuku' => $dafBuku,
                //dropdown list 5 kirim array dari katbuku ke form yg dropdownlist 
                'rakBuku' => $rakBuku 
            ]);
        }
    }

    /**
     * Updates an existing PosisiBuku model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {

        $model = $this->findModel($id);
        //dropdown list 9
        $dafBuku = DafBuku::find()->all(); 
        //dropdown list 9
        $rakBuku = RakBuku::find()->all(); 
        //dropdown list 10  parameter object 1 dari katbuku , parameter 2 (key), parameter 3 value
        $dafBuku = ArrayHelper::map($dafBuku,'buku_id','judul'); 
        //dropdown list 10  parameter object 1 dari katbuku , parameter 2 (key), parameter 3 value
        $rakBuku = ArrayHelper::map($rakBuku,'id','no_rak'); 

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->posisi_buku_id]);
        }

        return $this->render('update', [
            'model' => $model,

            //dropdown list 11 kirim array dari katbuku ke form yg dropdownlist
            'dafBuku' => $dafBuku, 
            'rakBuku' => $rakBuku 
        ]);

        // $model = $this->findModel($id);

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->id]);
        // }

        // return $this->render('update', [
        //     'model' => $model,
        // ]);
    }

    /**
     * Deletes an existing PosisiBuku model.
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
     * Finds the PosisiBuku model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PosisiBuku the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PosisiBuku::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
