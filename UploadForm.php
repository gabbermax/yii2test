
<?php
namespace app\models;
 
use yii\base\Model;
use yii\web\UploadedFile;
use Yii;
use app\models\Images;
use yii\base\ErrorException;


class UploadForm extends Model
{
    /**
     * @var UploadedFile[]
     */
    public $imageFiles;
    public $identity;
    public $imageCount;
    public function rules()
    {
        return [
            
            [['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 5,'checkExtensionByMimeType'=>false],
        ];
    }
     
    public function upload(){
        if ($this->validate()) {
            //идентификация, нужна для папки и бд
            $identity=Yii::$app->getSecurity()->generateRandomString(15);
            
            #echo $identity."<br>" ;
            foreach ($this->imageFiles as $file) {
                 //нужно как-то идентифицировать пользователя и создавать папку с его именем
                try { mkdir("/home/c/cb95233/yii/public_html/web/upload/". $identity); }
                catch(ErrorException $e){    Yii::warning("папка уже есть ."); }               
                $file->saveAs('upload/' . $identity.'/'.$identity . '.' . $file->extension);
                 }
                $imageCount=count($this->imageFiles);
               $query= new Images; 
              $query->id='';
              $query->identity= $identity;
              $query->num_images = (count($this->imageFiles));
              if(($imageCount)>1){ $query->del_date=date('Y-'."3+m".'-d');  }
              else { $query->del_date=date('Y-'."1+m".'-d');}
             $query->test='test';
             $query->save();
            # echo $identity;
             return true;
        }
        
        
        else {  return false; }
    }
   

}

