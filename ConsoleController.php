<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */
namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use yii\helpers\Console;
//use yii\base\Model;
//use yii\model\Consoledb;
//use yii\i18n\Formatter;
use app\models\Images;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class ConsoleController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     * @return int Exit code
     */
    public function actionIndex($message = 'hello world') {
        echo $message . "\n";

        return ExitCode::OK;
    }

     public function actionDrumina($message = 'test') {
     // данный контроллер будет запускаться  раз в день
     //получаем из бд записи , сортируем по дате
         //проверяем по очереди не меньше ли дата текущей 
                    //если да - ищем id папки и удаляем ее 
         
           //подключаемся к бд    
           $query = new Images;
        //var_dump($this);
       // ($query->getDb());
        $result=$query->find()
            ->where(['id'=>1])
             ->all();
        
        print_r($result[0]);
        echo '<br>';
       
         //недоделано
         
     }

}
