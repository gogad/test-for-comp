<?php
/* @var $this TeacherController */
/* @var $data Teacher */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('teach_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->teach_id), array('view', 'id'=>$data->teach_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('teach_name')); ?>:</b>
	<?php echo CHtml::encode($data->teach_name); ?>
        <span>(<?php echo CHtml::encode($data->studentsCount); ?>)</span>
	<br />


</div>