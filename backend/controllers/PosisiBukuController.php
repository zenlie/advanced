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
        $dafBuku = DafBuku::find()->all();
        $dafBuku = ArrayHelper::map($dafBuku,'buku_id','judul');

        $rakBuku = RakBuku::find()->all();
        $rakBuku = ArrayHelper::map($rakBuku,'rak_id','no_rak');
        
        $search = Yii::$app->request->queryParams; //Membuat Filtering Model dengan Dropdownlist & TextInput pada Gridview 6

        $query = DafBuku::find()->joinWith('buku'); //Membuat Filtering Model dengan Dropdownlist & TextInput pada Gridview 7 joint mencari nama katbuku
        $query = RakBuku::find()->joinWith('posisiBukus'); //Membuat Filtering Model dengan Dropdownlist & TextInput pada Gridview 7 joint mencari nama katbuku

        if(!empty($search['buku_id'])){ //Membuat Filtering Model dengan Dropdownlist & TextInput pada Gridview 9
            $query->andFilterWhere(['Like','daf_buku.judul',$search['buku_id']]); //Membuat Filtering Model dengan Dropdownlist & TextInput pada Gridview 8
        }
        
        if(!empty($search['rak_id'])){ //Membuat Filtering Model dengan Dropdownlist & TextInput pada Gridview 9
            $query->andFilterWhere(['Like','rak_buku.no_rak',$search['rak_id']]); //Membuat Filtering Model dengan Dropdownlist & TextInput pada Gridview 8
        }


        $dataProvider = new ActiveDataProvider([
            'query' => $query, //Membuat Filtering Model dengan Dropdownlist & TextInput pada Gridview 5
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'dafBuku' => $dafBuku,
            'rakBuku' => $rakBuku
        ]);

        // $dataProvider = new ActiveDataProvider([
        //     'query' => PosisiBuku::find(),
        // ]);

        // return $this->render('index', [
        //     'dataProvider' => $dataProvider,
        // ]);
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
        $dafBuku = DafBuku::find()->all(); //dropdown list 2
        $rakBuku = RakBuku::find()->all(); //dropdown list 2
        $dafBuku = ArrayHelper::map($dafBuku,'buku_id','judul'); //dropdown list 4  parameter object 1 dari katbuku , parameter 2 (key), parameter 3 value
        $rakBuku = ArrayHelper::map($rakBuku,'id','no_rak'); //dropdown list 4  parameter object 1 dari katbuku , parameter 2 (key), parameter 3 value

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->buku_id]);
            return $this->redirect(['view', 'id' => $model->rak_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'dafBuku' => $dafBuku, //dropdown list 5 kirim array dari katbuku ke form yg dropdownlist
                'rakBuku' => $rakBuku //dropdown list 5 kirim array dari katbuku ke form yg dropdownlist
            ]);
        }

        // $model = new PosisiBuku();

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->id]);
        // }

        // return $this->render('create', [
        //     'model' => $model,
        // ]);
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
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
