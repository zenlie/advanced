<?php

namespace backend\controllers;

use Yii;
use backend\models\HargaBuku;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

//dropdown list 1
use backend\models\DafBuku; 

//dropdown list 3
use yii\helpers\ArrayHelper; 

/**
 * HargaBukuController implements the CRUD actions for HargaBuku model.
 */
class HargaBukuController extends Controller
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
     * Lists all HargaBuku models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dafBuku = DafBuku::find()->all();
        $dafBuku = ArrayHelper::map($dafBuku,'id','judul');

        //Membuat Filtering Model dengan Dropdownlist & TextInput pada Gridview 6
        $search = Yii::$app->request->queryParams; 
        
        //Membuat Filtering Model dengan Dropdownlist & TextInput pada Gridview 7 joint mencari nama katbuku
        $query = HargaBuku::find()->joinWith('buku'); 
        
        //Membuat Filtering Model dengan Dropdownlist & TextInput pada Gridview 9
        if(!empty($search['buku_id'])){ 
            //Membuat Filtering Model dengan Dropdownlist & TextInput pada Gridview 8
            $query->andFilterWhere(['Like','daf_buku.judul',$search['buku_id']]); 
        }

        //Membuat Filtering Model dengan Dropdownlist & TextInput pada Gridview part 2 step 3
        if(!empty($search['harga'])){ 
            //Membuat Filtering Model dengan Dropdownlist & TextInput pada Gridview part 2 step 4
            $query->andFilterWhere(['Like','harga',$search['harga']]); 
        }

        $dataProvider = new ActiveDataProvider([
            //Membuat Filtering Model dengan Dropdownlist & TextInput pada Gridview 5
            'query' => $query, 
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'dafBuku' => $dafBuku
        ]);
    }

    /**
     * Displays a single HargaBuku model.
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
     * Creates a new HargaBuku model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new HargaBuku();
        //dropdown list 2
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
