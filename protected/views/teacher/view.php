<?php
/* @var $this TeacherController */
/* @var $model Teacher */

$this->breadcrumbs=array(
	'Teachers'=>array('index'),
	$model->teach_id,
);

$this->menu=array(
	array('label'=>'List Teacher', 'url'=>array('index')),
	array('label'=>'Create Teacher', 'url'=>array('create')),
	array('label'=>'Update Teacher', 'url'=>array('update', 'id'=>$model->teach_id)),
	array('label'=>'Delete Teacher', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->teach_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Teacher', 'url'=>array('admin')),
);
?>

<h1>View Teacher #<?php echo $model->teach_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'teach_id',
		'teach_name',
	),
)); ?>

<h1>Ученики</h1>
<?php foreach($model->students as $student):?>
<div class="view">

	<b><?php echo CHtml::encode($student->getAttributeLabel('stud_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($student->stud_id), array('student/view', 'id'=>$student->stud_id)); ?>
	<br />

	<b><?php echo CHtml::encode($student->getAttributeLabel('stud_name')); ?>:</b>
	<?php echo CHtml::encode($student->stud_name); ?>
        <span>(<?php echo CHtml::encode($student->teachersCount); ?>)</span>
	<br />


</div>

<?php endforeach;?>