<?php

namespace backend\controllers;

use Yii;
use backend\models\DafBuku;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\DafKategoriBuku; //dropdown list 1
use yii\helpers\ArrayHelper; //dropdown list 3
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
        $dafKategori = DafKategoriBuku::find()->all();
        $dafKategori = ArrayHelper::map($dafKategori,'id','nama');

        $search = Yii::$app->request->queryParams; //Membuat Filtering Model dengan Dropdownlist & TextInput pada Gridview 6

        $query = DafBuku::find()->joinWith('kategori'); //Membuat Filtering Model dengan Dropdownlist & TextInput pada Gridview 7 joint mencari nama katbuku

        if(!empty($search['kategori_id'])){ //Membuat Filtering Model dengan Dropdownlist & TextInput pada Gridview 9
            $query->andFilterWhere(['Like','daf_kategori_buku.nama',$search['kategori_id']]); //Membuat Filtering Model dengan Dropdownlist & TextInput pada Gridview 8
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query, //Membuat Filtering Model dengan Dropdownlist & TextInput pada Gridview 5
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'dafKategori' => $dafKategori
        ]);
    }

    /**
     * Displays a single DafBuku model.
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
     * Creates a new DafBuku model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DafBuku();
        $dafKategori = DafKategoriBuku::find()->all(); //dropdown list 2
        $dafKategori = ArrayHelper::map($dafKategori,'id','nama'); //dropdown list 4  parameter object 1 dari katbuku , parameter 2 (key), parameter 3 value

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->buku_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'dafKategori' => $dafKategori //dropdown list 5 kirim array dari katbuku ke form yg dropdownlist
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
        $dafKategori = DafKategoriBuku::find()->all(); //dropdown list 9
        $dafKategori = ArrayHelper::map($dafKategori,'id','nama'); //dropdown list 10  parameter object 1 dari katbuku , parameter 2 (key), parameter 3 value

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->buku_id]);
        }

        return $this->render('update', [
            'model' => $model,
            'dafKategori' => $dafKategori //dropdown list 11 kirim array dari katbuku ke form yg dropdownlist
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
