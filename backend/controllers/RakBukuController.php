<?php

namespace backend\controllers;

use Yii;
use backend\models\RakBuku;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RakBukuController implements the CRUD actions for RakBuku model.
 */
class RakBukuController extends Controller
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
     * Lists all RakBuku models.
     * @return mixed
     */
    public function actionIndex()
    {
        $search = Yii::$app->request->queryParams; //Membuat Filtering Model dengan Dropdownlist & TextInput pada Gridview 6

        $query = RakBuku::find('id'); //Membuat Filtering Model dengan Dropdownlist & TextInput pada Gridview 7 joint mencari nama katbuku
        
        if(!empty($search['id'])){ //Membuat Filtering Model dengan Dropdownlist & TextInput pada Gridview 9
            $query->andFilterWhere(['Like','no_rak',$search['id']]); //Membuat Filtering Model dengan Dropdownlist & TextInput pada Gridview 8
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query, //Membuat Filtering Model dengan Dropdownlist & TextInput pada Gridview 5
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);

        // $dataProvider = new ActiveDataProvider([
        //     'query' => RakBuku::find(),
        // ]);

        // return $this->render('index', [
        //     'dataProvider' => $dataProvider,
        // ]);
    }

    /**
     * Displays a single RakBuku model.
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
     * Creates a new RakBuku model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new RakBuku();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing RakBuku model.
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
     * Deletes an existing RakBuku model.
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
     * Finds the RakBuku model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return RakBuku the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RakBuku::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
