<?php

namespace backend\controllers;

use Yii;
use backend\models\HargaBuku;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use backend\models\DafBuku; 
use yii\helpers\ArrayHelper; 

class HargaBukuController extends Controller
{
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
    
    public function actionIndex()
    {
        $dafBuku = DafBuku::find()->all();
        $dafBuku = ArrayHelper::map($dafBuku,'id','judul');

        $search = Yii::$app->request->queryParams; 

        $query = HargaBuku::find()->joinWith('buku'); 

        if(!empty($search['buku_id'])){ 
            $query->andFilterWhere(['Like','daf_buku.judul',$search['buku_id']]); 
        }

        if(!empty($search['harga'])){ 
            $query->andFilterWhere(['Like','harga',$search['harga']]); 
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query, 
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'dafBuku' => $dafBuku
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new HargaBuku();
        $dafBuku = DafBuku::find()->all(); 
        //dropdown list 4  parameter object 1 dari katbuku , parameter 2 (key), parameter 3 value
        $dafBuku = ArrayHelper::map($dafBuku,'buku_id','judul'); 
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                //dropdown list 5 kirim array dari katbuku ke form yg dropdownlist
                'dafBuku' => $dafBuku 
            ]);
        }
    }

    /**
     * Updates an existing HargaBuku model.
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
     * Deletes an existing HargaBuku model.
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
     * Finds the HargaBuku model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return HargaBuku the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = HargaBuku::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
