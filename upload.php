<?php
use yii\widgets\ActiveForm;
#use yii\web\UploadedFile;

#echo exec('id');
#exit();
?>
 
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
    
    <?= $form->field($model, 'imageFiles[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>
 
    <button>Submit</button>
 
<?php ActiveForm::end() ?>