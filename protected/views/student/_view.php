<?php
/* @var $this StudentController */
/* @var $data Student */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('stud_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->stud_id), array('view', 'id'=>$data->stud_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('stud_name')); ?>:</b>
	<?php echo CHtml::encode($data->stud_name); ?>
        <span>(<?php echo CHtml::encode($data->teachersCount); ?>)</span>
	<br />


</div>