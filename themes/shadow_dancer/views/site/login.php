<?php
    $baseUrl = Yii::app()->theme->baseUrl;
    $cs = Yii::app()->getClientScript();
    $cs->registerCSSFile($baseUrl . '/css/login.css');
?>
<meta charset="utf-8">
<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';

?>

<section class="container">
    <div class="login">
      <h1>Login Aseos Cabina</h1>
      <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	//'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
    )); ?>
        <p><?php echo $form->textField($model,'BP',array('placeholder'=>"BP Usuario"));
		 echo $form->error($model,'BP'); ?></p>
        <p><?php echo $form->passwordField($model,'PASSWORD',array('placeholder'=>"Contraseña")); ?>
		<?php echo $form->error($model,'PASSWORD'); ?></p>
        <p class="remember_me">
          <?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
        </p>
        <p class="submit"><?php echo CHtml::submitButton('Login'); ?></p>
      <?php $this->endWidget(); ?>
    </div>

  </section>