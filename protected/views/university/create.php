<?php
/* @var $this StudentController */
/* @var $model Student */

$this->breadcrumbs=array(
	'University'=>array('index'),
	'Addteacher',
);

$this->menu=array(
        array('label'=>'Approve Teacher', 'url'=>array('addStudent')),
	array('label'=>'Best Teacher', 'url'=>array('best')),
	array('label'=>'Search Teacher', 'url'=>array('search')),
);
?>

<h1>Назначить учителя </h1>

<?php $this->renderPartial('_form', array(
                'teacher'=>$teacher,
                'student'=>$student,
                'model'=>$model,
        )); ?>