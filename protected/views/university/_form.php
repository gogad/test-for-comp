<?php
/* @var $this StudentController */
/* @var $model Student */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'relation-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Выберите пару учитель-ученик</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
	<?php   $this->widget('zii.widgets.jui.CJuiAutoComplete',
                array(
                    'model'=>$teacher,
                    'attribute'=>'teach_name',
                    'source' =>Yii::app()->createUrl('university/searchTeacher'),
                    'options'=>array(
                        'minLength'=>'1',
                        'select' => 'js: function(event, ui) {
                        // значение поля при выборе
                        this.value = ui.item.value;
                        $("#Taxrelation_teach").val(ui.item.id); 
                        }',
                    ),
                )
            );
        ?>
	</div>
        <div class="row">
	<?php   $this->widget('zii.widgets.jui.CJuiAutoComplete',
                array(
                    'model'=>$student,
                    'attribute'=>'stud_name',
                    'source' =>Yii::app()->createUrl('university/searchStudent'),
                    'options'=>array(
                        'minLength'=>'1',
                        'select' => 'js: function(event, ui) {
                        // значение поля при выборе
                        this.value = ui.item.value;
                        $("#Taxrelation_stud").val(ui.item.id);  
                        }',
                    ),
                )
            );
        ?>
	</div>
        
	<div class="row buttons">
                <?php echo $form->hiddenField($model, 'teach'); ?>
                <?php echo $form->hiddenField($model, 'stud'); ?>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->