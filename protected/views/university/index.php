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


<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>