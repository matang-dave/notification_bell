<?php
$this->pageTitle=Yii::app()->name . ' - SignUp';
// $this->breadcrumbs=array(
// 	'SignUp',
// );
?>

<h1>Sign Up</h1>

<p>Please fill out the following form with your credentials:</p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'signup-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'confirmPassword'); ?>
		<?php echo $form->passwordField($model,'confirmPassword'); ?>
		<?php echo $form->error($model,'confirmPassword'); ?>
	</div>

	<div class="row submit">
		<?php echo
				 CHtml::submitButton('Sign Up',
					array('submit' => 'signUp',)
				);
		 ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
