<?php

/**
 * This is the model class for table "taxrelation".
 *
 * The followings are the available columns in table 'taxrelation':
 * @property integer $stud
 * @property integer $teach
 */
class Taxrelation extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'taxrelation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('stud, teach', 'required'),
			array('stud, teach', 'numerical', 'integerOnly'=>true),
                        array('stud+teach', 'application.extensions.uniqueMultiColumnValidator',"message"=>"такая пара уже существует"),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('stud, teach', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'stud' => 'Stud',
			'teach' => 'Teach',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('stud',$this->stud);
		$criteria->compare('teach',$this->teach);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        public function relteachers()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$data = Yii::app()->db->createCommand('SELECT  * 
                                    FROM 
                                           (SELECT st0.teach as teach1, st1.teach as teach2, count(st0.stud) as scount 
                                            FROM `taxrelation` as st0,`taxrelation` as st1 
                                            WHERE st0.stud = st1.stud AND st0.teach<>st1.teach
                                            GROUP BY teach1,teach2) as st2

                                    WHERE 1 ORDER BY st2.scount DESC
                                    LIMIT 1')
                                    ->queryRow() ;//queryAll();

		return $data;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Taxrelation the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        protected function beforeSave()
        {
            if(parent::beforeSave())
            {
                $teacher = Teacher::model()->findByPk($this->teach);
                $teacher->countSt=$teacher->countSt+1;
                $teacher->save();
                $student = Student::model()->findByPk($this->stud);
                $student->countTh=$student->countTh+1;
                $student->save();
                return true;
            }
            else
                return false;
        }
        
}
