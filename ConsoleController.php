<?php

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use yii\helpers\Console;
use app\models\Images;

class ConsoleController extends Controller
{
   
    public function actionIndex($message = 'hello world') {
        echo $message . "\n";

        return ExitCode::OK;
    }

     public function actionDrumina($message = 'Drum') {
     // данный контроллер будет запускаться  раз в день
     //получаем из бд записи , сортируем по дате
         //проверяем по очереди не меньше ли дата текущей 
                    //если да - ищем id папки и удаляем ее 
         
           //подключаемся к бд    
        $query = new Images;
        
        $current_date=date("Y-m-d");
        $result=$query->find()
            ->where(['<',"del_date",$current_date])
             ->all();
        
        //удаляем старые записи 
        $need_to_delete =$query->find()->where(['<', "del_date", $current_date])->all();
                
        foreach ($need_to_delete as $model) {
            $model->delete();
        }

        print_r($result[0]);
        echo '<br>';
        
         
         
     }

}
