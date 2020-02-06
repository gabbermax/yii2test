<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
#use app\models\EntryForm;
use yii\web\upload;
#use app\models\MyForm;
use app\models\UploadForm;
use yii\web\UploadedFile;





class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    
    
    
    
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
  
    
     
    
    
    public function actionUpload()
    {
        $model = new UploadForm();
 
        if (Yii::$app->request->isPost) {
            $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
            if ($model->upload()) {
                // file is uploaded successfully
                return;
            }
        }
 
        return $this->render('upload', ['model' => $model]);
    }
    
    
    
    public function actionForm(){
        $form= new MyForm();
        return $this->render('form',['form'=>$form]);
    }
  public function actionImage(){
       return $this->render('image');
    }
}

