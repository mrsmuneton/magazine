<?php
$this->pageTitle=Yii::app()->name;
$this->breadcrumbs=array(
	'Submissions',
);
?>    
<h1>Around the World Recipes</h1>

<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php else: ?>

<p>
Please Submit your pictures and recipes here.
</p>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contact-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'subject'); ?>
		<?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'subject'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Recipe'); ?>
		<?php echo $form->textArea($model,'recipe',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'recipe'); ?>
	</div>
	
  <?php 
    $this->widget('MUploadify',array(
      'name'=>'theimages',
      //'buttonText'=>Yii::t('application','Upload a picture'),
      //'script'=>array('myController/upload','id'=>$model->id),
      //'checkScript'=>array('myController/checkUpload','id'=>$model->id),
      //fileExt=>'*.jpg;*.png;',
      //fileDesc=>Yii::t('application','Image files'),
      //'uploadButton'=>true,
      //'uploadButtonText'=>'Upload new',
      //'uploadButtonTagname'=>'button',
      //'uploadButtonOptions'=>array('class'=>'myButton'),
      //'onAllComplete'=>'js:function(){alert("Pictures uploaded!";);}',
    ));
  ?>	

	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>