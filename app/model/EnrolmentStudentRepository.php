<?php

namespace App\Model;

use Nette;

class EnrolmentStudentRepository extends Repository 
{
	
	  /** @var Nette\Database\Connection */
	protected $database;
        
	public function __construct(Nette\Database\Context $database)
	{
		$this->database = $database;
	}
        
          public function createEnrolmentStudent(EnrolmentStudent $enrolmentStudent)
	{
		return $this->getTable()->insert(array(
                    'id_course' => $enrolmentStudent->getIdCourse(),
			'id_student' => $enrolmentStudent->getIdStudent(),
                    'semester' => $enrolmentStudent->getSemester()
                  
		));
	}
        
          public function deleteEnrolmentStudent($idCourse)
	{
		$this->findBy($idCourse)->delete();
	}       
     
  

}



