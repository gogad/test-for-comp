<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * вызов с параметрами  0 - добавить количество учителей
 *                      1 - добавить количество студентов
 *                      2 - назначить рандомно связи между учителями и учениками
 */

class NewCommand extends CConsoleCommand
{   
    
    public $teachers = 0;
    public $students = 0;
    public $approveST = 0;
    public $names=array();
    
    public function run($args) {
        //print_r($args);
        
        if(!empty($args['0']))$this->teachers = $args['0'];
        if(!empty($args['1']))$this->students = $args['1'];
        if(!empty($args['2']))$this->approveST = $args['2'];
        $this->setNames();
        $this->addStudent();
        $this->addTeacher();
        $this->addApprove();
        echo 'New command is run'."\n";
    }
    
    private function addStudent(){
        $i=0;
        while ($i <= $this->students):
            $stud = new Student;
            $stud->stud_name = array_pop($this->names);
            $stud->save();
            $i++;
            echo "addSt"."\n";
        endwhile;
        
    }
    private function addTeacher(){
        $i=0;
        while ($i <= $this->teachers):
            $teach = new Teacher;
            $teach->teach_name = array_pop($this->names);
            $teach->save();
            $i++;
            echo "addTh"."\n";
        endwhile;
         
    }
    private function addApprove(){
        $i=0;
        while ($i <= $this->approveST):
            
            $student = Student::model()->findAllBySql("SELECT * FROM student ORDER BY RAND() LIMIT 1");
            $student = $student[0]; 
            $teacher = Teacher::model()->findAllBySql("SELECT * FROM teacher ORDER BY RAND() LIMIT 1");
            $teacher = $teacher[0];  
            
            
            if($model = Taxrelation::model()->findByPk(array("teach"=>$teacher->teach_id,"stud"=>$student->stud_id))){
                echo "approve is allready. student: $model->stud teacher:$model->teach \n";  
            }else{
                $model=new Taxrelation;
                $model->stud = $student->stud_id;
                $model->teach = $teacher->teach_id;
                $model->save();
                $i++;
                echo "addAp"."\n"; 
            }
            
           
        endwhile;
        
    }
    private function setNames(){
        $names = array("Андрей","Петр","Семен",
              "Степан","Алексей","Василий",
              "Михаил","Харитон","Денис",
              "Илья","Вахтанг","Всеволод",
              "Владимир","Мирослав","Дмитрий",
              "Артем","Иштван","Максим",
            );
        $family = array("Иванов","Петров","Семенов",
              "Степанов","Алексеев","Сидоров",
              "Михайлов","Харитонов","Денисов",
              "Ильин","Сидоров","Пушкин",
              "Владимиров","Мирный","Донской",
              "Артеменко","Иоффе","Максимов",
            );
        $otchestvo = array("Андреевич","Петрович","Семенович",
              "Степанович","Алексеевич","Васильевич",
              "Михаилович","Харитонович","Денисович",
              "Ильич","Вахтангович","Всеволодович",
              "Владимирович","Мирославович","Дмитриевич",
              "Артемович","Иштванович","Максимович",
            );
        $i=1;
        while ($i <= ($this->teachers+$this->students)):
            
            $fam = $family[array_rand($family)];
            $nam = $names[array_rand($names)];
            $otch = $otchestvo[array_rand($otchestvo)];
            $this->names[]=$fam." ".$nam." ".$otch;
            
            $i++;
             
        endwhile;
        echo "setNames".count($this->names)."\n"; 
        
    }
}