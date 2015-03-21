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
<h1>Кабинет директора </h1>

<?php print_r($data)?>
<h2>Пара учителей с наибольшим совпадением одинаковых учеников</h2>
<div class="view">

	<b><?php echo CHtml::encode($teacher1->getAttributeLabel('teach_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($teacher1->teach_id), array('teacher/view', 'id'=>$teacher1->teach_id)); ?>
	<br />

	<b><?php echo CHtml::encode($teacher1->getAttributeLabel('teach_name')); ?>:</b>
	<?php echo CHtml::encode($teacher1->teach_name); ?>
        <span>(<?php echo CHtml::encode($teacher1->studentsCount); ?>)</span>
	<br />


</div>
<div class="view">

	<b><?php echo CHtml::encode($teacher2->getAttributeLabel('teach_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($teacher2->teach_id), array('teacher/view', 'id'=>$teacher2->teach_id)); ?>
	<br />

	<b><?php echo CHtml::encode($teacher2->getAttributeLabel('teach_name')); ?>:</b>
	<?php echo CHtml::encode($teacher2->teach_name); ?>
        <span>(<?php echo CHtml::encode($teacher2->studentsCount); ?>)</span>
	<br />


</div>