<?php
namespace App\Domain\Entities\Traits;
use App\Domain\Entities\State;
use App\Domain\Entities\School;
use App\Domain\Entities\Room;
use App\Domain\Entities\Hall;
use App\Domain\Entities\BuildingAddress;
use App\Domain\Entities\Building;
use App\Domain\Entities\AddressType;
use App\Domain\Entities\Period;
use App\Domain\Entities\Student;
use App\Domain\Entities\SchoolAddress;
use App\Domain\Entities\City;
use App\Domain\Entities\Country;
use App\Domain\Entities\Address;
use App\Domain\Entities\User;
use App\Domain\Entities\Course;
use App\Domain\Entities\CourseStudent;
use App\Domain\Entities\CourseTeacher;
use App\Domain\Entities\Duty;
use App\Domain\Entities\Employee;
use App\Domain\Entities\ExamAttendance;
use App\Domain\Entities\ExamMark;
use App\Domain\Entities\Examination;
use App\Domain\Entities\ExaminationStudent;
use App\Domain\Entities\Expenditure;
use App\Domain\Entities\Facility;
use App\Domain\Entities\Family;
use App\Domain\Entities\Fee;
use App\Domain\Entities\FeeStudent;
use App\Domain\Entities\FeeType;
use App\Domain\Entities\Grade;
use App\Domain\Entities\Ground;
use App\Domain\Entities\Homework;
use App\Domain\Entities\HomeworkStudent;
use App\Domain\Entities\Income;
use App\Domain\Entities\Interest;
use App\Domain\Entities\Liability;
use App\Domain\Entities\MedicalIssue;
use App\Domain\Entities\NoticeBoard;
use App\Domain\Entities\Package;
use App\Domain\Entities\PaymentRecord;
use App\Domain\Entities\Permission;
use App\Domain\Entities\Post;
use App\Domain\Entities\Prospectus;
use App\Domain\Entities\Role;
use App\Domain\Entities\SchoolAdmin;
use App\Domain\Entities\Section;
use App\Domain\Entities\SectionStudent;
use App\Domain\Entities\SkoolumAccount;
use App\Domain\Entities\StudentSubject;
use App\Domain\Entities\Subject;
use App\Domain\Entities\SubjectName;
use App\Domain\Entities\Syllabus;
use App\Domain\Entities\SyllabusCompletion;
use App\Domain\Entities\SyllabusTarget;
use App\Domain\Entities\Teacher;
use App\Domain\Entities\UserContact;
use App\Domain\Entities\UserPackage;
use App\Domain\Entities\WorkHistory;

use Doctrine\ORM\Mapping as ORM;

trait Skoolum
{
    public function getUser()
    {
        return $this->user;
    }
    public function setUser(User $user)
    {
         $this->user = $user;
         return $this;
    }
    public function getUsers()
    {
        return $this->users;
    }
    public function setUsers(User $user)
    {
         $this->users = $user;
         return $this;
    }
     public function getSession()
    {
        return $this->session;
    }
   
     public function setSession($session)
    {
       $this->session = $session;
    }

    public function setSchool(School $school)
    {
        $this->school = $school;
        return $this;
    }

    public function getSchool()
    {
        return $this->school;
    }
    
    public function getCourseStudent()
    {
        return $this->coursestudents;
    }
    public function getCourseTeacher()
    {
        return $this->courseteachers;
    }
     public function getAddress()
    {
        return $this->address;
    } 
    public function setAddress($address)
    {
       $this->address = $address;
       return $this;
    }
    public function getRoom()
    {
        return $this->rooms;
    }
     public function setRoom(Room $room)
    {
       $this->room = $room;
       return $this;
    }
    public function getHall()
    {
        return $this->halls;
    }
     public function setHall(Hall $hall)
    {
       $this->hall = $hall;
       return $this;
    }
    public function getAddressType()
    {
        return $this->addresstype;
    }
   public function setAddressType(AddressType $addresstype)
    {
       $this->addresstype = $addresstype;
       return $this;
    }

    public function getCity()
    {
        return $this->city;
    }
    public function setCity(City $city)
    {
        $this->city = $city;
        return $this;
    }

     public function getState()
    {
        return $this->state;
    }
    public function setState(State $state)
    {
        $this->state = $state;
        return $this;
    }
     public function getType()
    {
        return $this->type;
    }
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }
     public function getStatus()
    {
        return $this->status;
    }
      public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }
     public function getStudent()
    {
        return $this->student;
    }
    public function getPeriod()
    {
        return $this->period;
    }
   
    public function setPeriod(Period $period)
    {
        $this->period = $period;
        return $this;
    }
     public function setStudent(Student $student)
    {
        $this->student = $student;
        return $this;
    }
     public function getBuildingAddresses()
    {
        return $this->buildingaddresses;
    }
      public function setBuildingAddress(BuildingAddress $buildingaddresses)
    {
       $this->buildingaddresses = $buildingaddresses;
       return $this;
    }
     public function getBuilding()
    {
        return $this->building;
    }
     public function setBuilding(Building $building)
    {
       $this->building = $building;
       return $this;
    }
     public function getSchoolAddress()
    {
        return $this->schooladdresses;
    }
     public function setSchoolAddress(SchoolAddress $schoodaddresses)
    {
       $this->schoodaddresses = $schoodaddresses;
       return $this;
    }
     public function getEmail()
    {
        return $this->email;
    }
    public function getPhone()
    {
        return $this->phone;
    }
    public function setPhone($phone)
    {
         $this->phone = $phone;
         return $this;
    }
   
     public function setEmail($email)
    {
       $this->email = $email;
       return $this;
    }
    public function getFax()
    {
        return $this->fax;
    }
    public function setFax($fax)
    {
         $this->fax = $fax;
         return $this;
    }
      public function getRollNo()
    {
        return $this->rollno;
    }
     public function setRollNo($rollno)
    {
         $this->rollno = $rollno;
         return $this;
    }
     public function getCourse()
    {
        return $this->course;
    }
     public function setCourse(Course $course)
    {
         $this->course = $course;
         return $this;
    }

    public function getTeacher()
    {
        return $this->teacher;
    }
     public function setTeacher(Teacher $teacher)
    {
         $this->teacher = $teacher;
         return $this;
    }
      public function getdescription()
    {
        return $this->description;
    }
    
     public function setdescription($description)
    {
       $this->description = $description;
    }
     public function getAssignedTo()
    {
        return $this->assignedto;
    }
     public function setAssignedTo(User $assigneto)
    {
         $this->assigneto = $assigneto;
         return $this;
    }

    
    public function getExamination()
    {
        return $this->examination;
    }
   
    public function getExamMarks()
    {
        return $this->exammarks;
    }
     public function setExamination(Examination $examination)
    {
         $this->examination = $examination;
         return $this;
    }
     public function setExamMarks(ExamMark $exammarks)
    {
         $this->exammarks = $exammarks;
         return $this;
    }
    public function getDate()
    {
        return $this->date;
    } 
    public function setDate($date)
    {
       $this->date = $date;
    }
    
     public function getSection()
    {
        return $this->section;
    }
     public function setSection(Section $section)
    {
         $this->section = $section;
         return $this;
    }
     public function getGrade()
    {
        return $this->grade;
    }
     public function setGrade(Grade $grade)
    {
         $this->grade = $grade;
         return $this;
    }
     public function getSubject()
    {
        return $this->subject;
    }
     public function setSubject(Subject $subject)
    {
         $this->subject = $subject;
         return $this;
    }
    
     public function getLocation()
    {
        return $this->location;
    }
    public function setLocation($location)
    {
       $this->location = $location;
    }
    
     public function getTotalMarks()
    {
        return $this->totalmarks;
    }
    public function setTotalMarks($totalmarks)
    {
       $this->totalmarks = $totalmarks;
    }
   
    public function getExamAttendance()
    {
        return $this->examattendances;
    }
     public function setExamAttendance(ExamAttendance $examattendance)
    {
         $this->examattendance = $examattendance;
         return $this;
    }
    public function getExaminationStudents()
    {
        return $this->examinationstudents;
    }
     public function setExaminationStudents(ExaminationStudent $examinationstudents)
    {
         $this->examinationstudents = $examinationstudents;
         return $this;
    }
}
