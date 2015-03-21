<?php
/* @var $this UniversityController */

$this->breadcrumbs=array(
	'University',
);

$this->menu=array(
        array('label'=>'Approve Teacher', 'url'=>array('addStudent')),
	array('label'=>'Best Teacher', 'url'=>array('best')),
	array('label'=>'Search Teacher', 'url'=>array('search')),
);

?>
<h1>поиск учителей</h1>

<div class="wide form">
    
<?php $model= new Student; ?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	

	<div class="row">
		<?php echo $form->label($model,'stud_name'); ?>
		
            <?php 
                echo $form->dropDownList($model, 'stud_name',$model->getList(),
                        array('prompt'=> 'Выберите', 'multiple' => 'multiple')
                        );
            ?>

	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>