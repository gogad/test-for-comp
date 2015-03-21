<?php

class UniversityController extends Controller
{
	
        public $layout='//layouts/column2';
        
        public function actionIndex()
	{
                $criteria=new CDbCriteria;
                $criteria->order = 'countSt DESC';
                $criteria->limit = 2;

                $dataProvider=new CActiveDataProvider('Teacher', array(
                        'criteria'=>$criteria,
                ));
		
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
        public function actionBest()
	{
                $data = Taxrelation::model()->relteachers();
		$this->render('best',array(
			'data'=>$data,
                        'teacher1'=>Teacher::model()->findByPk($data['teach1']),
                        'teacher2'=>Teacher::model()->findByPk($data['teach2']),
		));
	}
        public function actionAddStudent()
	{   
            $model=new Taxrelation;
            if(isset($_POST['Taxrelation']))
		{
			$model->attributes=$_POST['Taxrelation'];
			if($model->save())
				$this->redirect(array('index'));
		}
            
            $model1=new Teacher;
            $model2=new Student;
            
		$this->render('create',array(
			'teacher'=>$model1,
                        'student'=>$model2,
                        'model'=>$model,
                    
		));
	}
        
        public function actionSearchStudent()
        {   
            if(isset($_GET['term'])&&($keyword=trim($_GET['term']))!=='')
            {
                /*
                $name = 'тест';
                //$name = iconv("UTF-8", "UTF-8", $name);

                $first = mb_substr($name,0,1, 'UTF-8');//первая буква
                $last = mb_substr($name,1);//все кроме первой буквы
                $first = mb_strtoupper($first, 'UTF-8');
                $last = mb_strtolower($last, 'UTF-8');
                $name1 = $first.$last;

                echo "$name1";

                результат: Тест
                 * */
                 
                $criteria=new CDbCriteria();
                $criteria->addSearchCondition('stud_name',$keyword.'%',false);
                $criteria->limit=10;
                $models=Student::model()->findAll($criteria);
                $suggest=array();
                foreach($models as $model)
                {
                $suggest[] = array(
                'label'=>$model->stud_name, // label for dropdown list
                'value'=>$model->stud_name, // value for input field
                'id'=>$model->stud_id, // return values from autocomplete
                );
                }
                
                //print_r($suggest);
                echo CJSON::encode($suggest);
            }
        }
        
        public function actionSearchTeacher()
        {   
            if(isset($_GET['term'])&&($keyword=trim($_GET['term']))!=='')
            {
                /*
                $name = 'тест';
                //$name = iconv("UTF-8", "UTF-8", $name);

                $first = mb_substr($name,0,1, 'UTF-8');//первая буква
                $last = mb_substr($name,1);//все кроме первой буквы
                $first = mb_strtoupper($first, 'UTF-8');
                $last = mb_strtolower($last, 'UTF-8');
                $name1 = $first.$last;

                echo "$name1";

                результат: Тест
                 * */
                 
                $criteria=new CDbCriteria();
                $criteria->addSearchCondition('teach_name',$keyword.'%',false);
                $criteria->limit=10;
                $models=Teacher::model()->findAll($criteria);
                $suggest=array();
                foreach($models as $model)
                {
                $suggest[] = array(
                'label'=>$model->teach_name, // label for dropdown list
                'value'=>$model->teach_name, // value for input field
                'id'=>$model->teach_id, // return values from autocomplete
                );
                }
                
                //print_r($suggest);
                echo CJSON::encode($suggest);
            }
        }
        public function actionSearch()
        {   
            if(isset($_GET['Student']['stud_name'])&&(!empty($students = $_GET['Student']['stud_name'])))
            {
                //print_r($students); die; 
                $teachers = $user = Yii::app()->db->createCommand()
                                    ->selectDistinct('teach')
                                    ->from('taxrelation')
                                    ->where(array('in', 'stud', $students))
                                    ->queryColumn() ;//queryAll();
                //print_r($teachers);die;
                $criteria=new CDbCriteria();
                
                $criteria->addInCondition("teach_id",  $teachers);
                
                //$criteria->limit=10;
                
                $dataProvider=new CActiveDataProvider('Teacher', array(
                        'criteria'=>$criteria,
                ));
            }else{
                
                $dataProvider=new CActiveDataProvider('Teacher');
            }
            
            $this->render('search',array(
                    'dataProvider'=>$dataProvider,
            ));
            
        }
        

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}