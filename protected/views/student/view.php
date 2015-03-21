<?php
/* @var $this StudentController */
/* @var $model Student */

$this->breadcrumbs=array(
	'Students'=>array('index'),
	$model->stud_id,
);

$this->menu=array(
	array('label'=>'List Student', 'url'=>array('index')),
	array('label'=>'Create Student', 'url'=>array('create')),
	array('label'=>'Update Student', 'url'=>array('update', 'id'=>$model->stud_id)),
	array('label'=>'Delete Student', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->stud_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Student', 'url'=>array('admin')),
);
?>

<h1>View Student #<?php echo $model->stud_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'stud_id',
		'stud_name',
	),
)); ?>
<h1>Учителя</h1>
<?php foreach($model->teachers as $teacher1):?>
<div class="view">

	<b><?php echo CHtml::encode($teacher1->getAttributeLabel('teach_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($teacher1->teach_id), array('teacher/view', 'id'=>$teacher1->teach_id)); ?>
	<br />

	<b><?php echo CHtml::encode($teacher1->getAttributeLabel('teach_name')); ?>:</b>
	<?php echo CHtml::encode($teacher1->teach_name); ?>
        <span>(<?php echo CHtml::encode($teacher1->studentsCount); ?>)</span>
	<br />


</div>

<?php endforeach;?>