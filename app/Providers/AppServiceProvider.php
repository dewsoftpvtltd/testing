<?php

namespace App\Providers;

use App\Domain\Entities\School;
use App\Domain\Entities\User;
use App\Domain\Repositories\UserRepository;
use App\Infrastructure\Repositories\DoctrineUserRepository;
use App\Domain\Entities\Role;
use App\Domain\Entities\Building;
use App\Domain\Entities\Permission;
use App\Domain\Entities\Address;
use App\Domain\Entities\SchoolAddress;
use App\Domain\Repositories\SchoolAddressRepository;
use App\Infrastructure\Repositories\DoctrineSchoolAddressRepository;
use App\Domain\Entities\BuildingAddress;
use App\Domain\Repositories\BuildingAddressRepository;
use App\Infrastructure\Repositories\DoctrineBuildingAddressRepository;
use App\Domain\Entities\Package;
use App\Domain\Repositories\PackageRepository;
use App\Infrastructure\Repositories\DoctrinePackageRepository;
use App\Domain\Entities\PaymentRecord;
use App\Domain\Repositories\PaymentRecordRepository;
use App\Infrastructure\Repositories\DoctrinePaymentRecordRepository;
use App\Domain\Entities\SkoolumAccount;
use App\Domain\Repositories\SkoolumAccountRepository;
use App\Infrastructure\Repositories\DoctrineSkoolumAccountRepository;
use App\Domain\Entities\Account;
use App\Domain\Repositories\AccountRepository;
use App\Infrastructure\Repositories\DoctrineAccountRepository;
use App\Domain\Entities\UserPackage;
use App\Domain\Repositories\UserPackageRepository;
use App\Infrastructure\Repositories\DoctrineUserPackageRepository;
use App\Domain\Entities\State;
use App\Domain\Repositories\StateRepository;
use App\Infrastructure\Repositories\DoctrineStateRepository;
use App\Domain\Entities\FeeType;
use App\Domain\Repositories\FeeTypeRepository;
use App\Infrastructure\Repositories\DoctrineFeeTypeRepository;
use App\Domain\Entities\Homework;
use App\Domain\Repositories\HomeworkRepository;
use App\Infrastructure\Repositories\DoctrineHomeworkRepository;
use App\Domain\Entities\HomeworkStudent;
use App\Domain\Repositories\HomeworkStudentRepository;
use App\Infrastructure\Repositories\DoctrineHomeworkStudentRepository;
use App\Domain\Entities\Interest;
use App\Domain\Repositories\InterestRepository;
use App\Infrastructure\Repositories\DoctrineInterestRepository;
use App\Domain\Entities\MedicalIssue;
use App\Domain\Repositories\MedicalIssueRepository;
use App\Infrastructure\Repositories\DoctrineMedicalIssueRepository;
use App\Domain\Entities\NoticeBoard;
use App\Domain\Repositories\NoticeBoardRepository;
use App\Infrastructure\Repositories\DoctrineNoticeBoardRepository;
use App\Domain\Entities\Period;
use App\Domain\Repositories\PeriodRepository;
use App\Infrastructure\Repositories\DoctrinePeriodRepository;
use App\Domain\Entities\Prospectus;
use App\Domain\Repositories\ProspectusRepository;
use App\Infrastructure\Repositories\DoctrineProspectusRepository;
use App\Domain\Entities\SchoolAdmin;
use App\Domain\Repositories\SchoolAdminRepository;
use App\Infrastructure\Repositories\DoctrineSchoolAdminRepository;
use App\Domain\Entities\Se;
use App\Domain\Repositories\SeRepository;
use App\Infrastructure\Repositories\DoctrineSeRepository;
use App\Domain\Entities\SectionStudent;
use App\Domain\Repositories\SectionStudentRepository;
use App\Infrastructure\Repositories\DoctrineSectionStudentRepository;
use App\Domain\Entities\Syllabus;
use App\Domain\Repositories\SyllabusRepository;
use App\Infrastructure\Repositories\DoctrineSyllabusRepository;
use App\Domain\Entities\StudentSubject;
use App\Domain\Repositories\StudentSubjectRepository;
use App\Infrastructure\Repositories\DoctrineStudentSubjectRepository;
use App\Domain\Entities\SyllabusCompletion;
use App\Domain\Repositories\SyllabusCompletionRepository;
use App\Infrastructure\Repositories\DoctrineSyllabusCompletionRepository;
use App\Domain\Entities\UserContact;
use App\Domain\Repositories\UserContactRepository;
use App\Infrastructure\Repositories\DoctrineUserContactRepository;
use App\Domain\Repositories\AddressRepository;
use App\Infrastructure\Repositories\DoctrineAddressRepository;
use App\Domain\Entities\AddressType;
use App\Domain\Repositories\AddressTypeRepository;
use App\Infrastructure\Repositories\DoctrineAddressTypeRepository;
use App\Domain\Entities\Attendance;
use App\Domain\Repositories\AttendanceRepository;
use App\Infrastructure\Repositories\DoctrineAttendanceRepository;
use App\Domain\Entities\City;
use App\Domain\Repositories\CityRepository;
use App\Infrastructure\Repositories\DoctrineCityRepository;
use App\Domain\Entities\Country;
use App\Domain\Repositories\CountryRepository;
use App\Infrastructure\Repositories\DoctrineCountryRepository;
use App\Domain\Entities\Course;
use App\Domain\Repositories\CourseRepository;
use App\Infrastructure\Repositories\DoctrineCourseRepository;
use App\Domain\Entities\CourseStudent;
use App\Domain\Repositories\CourseStudentRepository;
use App\Infrastructure\Repositories\DoctrineCourseStudentRepository;
use App\Domain\Entities\CourseTeacher;
use App\Domain\Repositories\CourseTeacherRepository;
use App\Infrastructure\Repositories\DoctrineCourseTeacherRepository;
use App\Domain\Entities\Duty;
use App\Domain\Repositories\DutyRepository;
use App\Infrastructure\Repositories\DoctrineDutyRepository;
use App\Domain\Entities\ExamAttendance;
use App\Domain\Repositories\ExamAttendanceRepository;
use App\Infrastructure\Repositories\DoctrineExamAttendanceRepository;
use App\Domain\Entities\Examination;
use App\Domain\Repositories\ExaminationRepository;
use App\Infrastructure\Repositories\DoctrineExaminationRepository;
use App\Domain\Entities\ExaminationStudent;
use App\Domain\Repositories\ExaminationStudentRepository;
use App\Infrastructure\Repositories\DoctrineExaminationStudentRepository;
use App\Domain\Entities\ExamMark;
use App\Domain\Repositories\ExamMarkRepository;
use App\Infrastructure\Repositories\DoctrineExamMarkRepository;
use App\Domain\Entities\Family;
use App\Domain\Repositories\FamilyRepository;
use App\Infrastructure\Repositories\DoctrineFamilyRepository;
use App\Domain\Entities\Fee;
use App\Domain\Repositories\FeeRepository;
use App\Infrastructure\Repositories\DoctrineFeeRepository;
use App\Domain\Entities\FeeStudent;
use App\Domain\Repositories\FeeStudentRepository;
use App\Infrastructure\Repositories\DoctrineFeeStudentRepository;
use App\Domain\Entities\Post;
use App\Domain\Repositories\PostRepository;
use App\Infrastructure\Repositories\DoctrinePostRepository;
use App\Domain\Entities\WorkHistory;
use App\Domain\Repositories\WorkHistoryRepository;
use App\Infrastructure\Repositories\DoctrineWorkHistoryRepository;
use App\Domain\Entities\SubjectName;
use App\Domain\Repositories\SubjectNameRepository;
use App\Infrastructure\Repositories\DoctrineSubjectNameRepository;
use App\Domain\Entities\Subject;
use App\Domain\Repositories\SubjectRepository;
use App\Infrastructure\Repositories\DoctrineSubjectRepository;
use App\Domain\Entities\Section;
use App\Domain\Repositories\SectionRepository;
use App\Infrastructure\Repositories\DoctrineSectionRepository;
use App\Domain\Repositories\SchoolRepository;
use App\Infrastructure\Repositories\DoctrineSchoolRepository;
use App\Domain\Entities\Room;
use App\Domain\Repositories\RoomRepository;
use App\Infrastructure\Repositories\DoctrineRoomRepository;
use App\Domain\Entities\Hall;
use App\Domain\Repositories\HallRepository;
use App\Infrastructure\Repositories\DoctrineHallRepository;
use App\Domain\Entities\Ground;
use App\Domain\Repositories\GroundRepository;
use App\Domain\Repositories\OrganisationRepository;
use App\Infrastructure\Repositories\DoctrineOrganisationRepository;
use App\Domain\Entities\Grade;
use App\Domain\Repositories\GradeRepository;
use App\Infrastructure\Repositories\DoctrineGradeRepository;
use App\Domain\Entities\Facility;
use App\Domain\Repositories\FacilityRepository;
use App\Infrastructure\Repositories\DoctrineFacilityRepository;
use App\Domain\Entities\Contact;
use App\Domain\Repositories\ContactRepository;
use App\Infrastructure\Repositories\DoctrineContactRepository;
use App\Domain\Repositories\BuildingRepository;
use App\Infrastructure\Repositories\DoctrineBuildingRepository;
use App\Domain\Repositories\StudentRepository;
use App\Infrastructure\Repositories\DoctrineStudentRepository;
use App\Domain\Repositories\PermissionRepository;
use App\Infrastructure\Repositories\DoctrinePermissionRepository;
use App\Domain\Repositories\RoleRepository;
use App\Infrastructure\Repositories\DoctrineRoleRepository;
use Doctrine\ORM\Mapping\ClassMetadata;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AddressRepository::class, function (Application $app) {
            return new DoctrineAddressRepository(
                $app->make('em'),
                new ClassMetadata(Address::class)
            );
        });

        $this->app->bind(AddressTypeRepository::class, function (Application $app) {
            return new DoctrineAddressTypeRepository(
                $app->make('em'),
                new ClassMetadata(AddressType::class)
            );
        });
        $this->app->bind(AttendanceRepository::class, function (Application $app) {
            return new DoctrineAttendanceRepository(
                $app->make('em'),
                new ClassMetadata(Attendance::class)
            );
        });
          $this->app->bind(BuildingRepository::class, function (Application $app) {
            return new DoctrineBuildingRepository(
                $app->make('em'),
                new ClassMetadata(Building::class)
            );
        });
        $this->app->bind(CityRepository::class, function (Application $app) {
            return new DoctrineCityRepository(
                $app->make('em'),
                new ClassMetadata(City::class)
            );
        });
        $this->app->bind(ContactRepository::class, function (Application $app) {
            return new DoctrineContactRepository(
                $app->make('em'),
                new ClassMetadata(Contact::class)
            );
        });
        $this->app->bind(CountryRepository::class, function (Application $app) {
            return new DoctrineCountryRepository(
                $app->make('em'),
                new ClassMetadata(Country::class)
            );
        });
        $this->app->bind(CourseRepository::class, function (Application $app) {
            return new DoctrineCourseRepository(
                $app->make('em'),
                new ClassMetadata(Course::class)
            );
        });
        $this->app->bind(CourseStudentRepository::class, function (Application $app) {
            return new DoctrineCourseStudentRepository(
                $app->make('em'),
                new ClassMetadata(CourseStudent::class)
            );
        });
        $this->app->bind(DutyRepository::class, function (Application $app) {
            return new DoctrineDutyRepository(
                $app->make('em'),
                new ClassMetadata(Duty::class)
            );
        });
        $this->app->bind(ExamAttendanceRepository::class, function (Application $app) {
            return new DoctrineExamAttendanceRepository(
                $app->make('em'),
                new ClassMetadata(ExamAttendance::class)
            );
        });
        $this->app->bind(ExaminationRepository::class, function (Application $app) {
            return new DoctrineExaminationRepository(
                $app->make('em'),
                new ClassMetadata(Examination::class)
            );
        });
        $this->app->bind(ExaminationStudentRepository::class, function (Application $app) {
            return new DoctrineExaminationStudentRepository(
                $app->make('em'),
                new ClassMetadata(ExaminationStudent::class)
            );
        });
        $this->app->bind(ExamMarkRepository::class, function (Application $app) {
            return new DoctrineExamMarkRepository(
                $app->make('em'),
                new ClassMetadata(ExamMark::class)
            );
        });
        $this->app->bind(FacilityRepository::class, function (Application $app) {
            return new DoctrineFacilityRepository(
                $app->make('em'),
                new ClassMetadata(Facility::class)
            );
        });
        $this->app->bind(FamilyRepository::class, function (Application $app) {
            return new DoctrineFamilyRepository(
                $app->make('em'),
                new ClassMetadata(Family::class)
            );
        });
        $this->app->bind(FeeRepository::class, function (Application $app) {
            return new DoctrineFeeRepository(
                $app->make('em'),
                new ClassMetadata(Fee::class)
            );
        });
        $this->app->bind(FeeStudentRepository::class, function (Application $app) {
            return new DoctrineFeeStudentRepository(
                $app->make('em'),
                new ClassMetadata(FeeStudent::class)
            );
        });
        $this->app->bind(FeeTypeRepository::class, function (Application $app) {
            return new DoctrineFeeTypeRepository(
                $app->make('em'),
                new ClassMetadata(FeeType::class)
            );
        });
               $this->app->bind(GradeRepository::class, function (Application $app) {
            return new DoctrineGradeRepository(
                $app->make('em'),
                new ClassMetadata(Grade::class)
            );
        });
        $this->app->bind(GroundRepository::class, function (Application $app) {
            return new DoctrineGroundRepository(
                $app->make('em'),
                new ClassMetadata(Ground::class)
            );
        });
        $this->app->bind(HallRepository::class, function (Application $app) {
            return new DoctrineHallRepository(
                $app->make('em'),
                new ClassMetadata(Hall::class)
            );
        });
        $this->app->bind(HomeworkRepository::class, function (Application $app) {
            return new DoctrineHomeworkRepository(
                $app->make('em'),
                new ClassMetadata(Homework::class)
            );
        });
        $this->app->bind(HomeworkStudentRepository::class, function (Application $app) {
            return new DoctrineHomeworkStudentRepository(
                $app->make('em'),
                new ClassMetadata(HomeworkStudent::class)
            );
        });
        $this->app->bind(InterestRepository::class, function (Application $app) {
            return new DoctrineInterestRepository(
                $app->make('em'),
                new ClassMetadata(Interest::class)
            );
        });
        $this->app->bind(MedicalIssueRepository::class, function (Application $app) {
            return new DoctrineMedicalIssueRepository(
                $app->make('em'),
                new ClassMetadata(MedicalIssue::class)
            );
        });
        $this->app->bind(NoticeBoardRepository::class, function (Application $app) {
            return new DoctrineNoticeBoardRepository(
                $app->make('em'),
                new ClassMetadata(NoticeBoard::class)
            );
        });
        $this->app->bind(PeriodRepository::class, function (Application $app) {
            return new DoctrinePeriodRepository(
                $app->make('em'),
                new ClassMetadata(Period::class)
            );
        });
            $this->app->bind(PermissionRepository::class, function (Application $app) {
            return new DoctrinePermissionRepository(
                $app->make('em'),
                new ClassMetadata(Permission::class)
            );
        });

        $this->app->bind(PostRepository::class, function (Application $app) {
            return new DoctrinePostRepository(
                $app->make('em'),
                //new ClassMetadata(Post::class)
                new ClassMetadata(Post::class)
            );
        });
        $this->app->bind(ProspectusRepository::class, function (Application $app) {
            return new DoctrineProspectusRepository(
                $app->make('em'),
                new ClassMetadata(Prospectus::class)
            );
        });
        $this->app->bind(RoomRepository::class, function (Application $app) {
            return new DoctrineRoomRepository(
                $app->make('em'),
                new ClassMetadata(Room::class)
            );
        });
        $this->app->bind(RoleRepository::class, function (Application $app) {
            return new DoctrineRoleRepository(
                $app->make('em'),
                new ClassMetadata(Role::class)
            );
        });

        $this->app->bind(SchoolAdminRepository::class, function (Application $app) {
            return new DoctrineSchoolAdminRepository(
                $app->make('em'),
                new ClassMetadata(SchoolAdmin::class)
            );
        });
         $this->app->bind(SectionRepository::class, function (Application $app) {
            return new DoctrineSectionRepository(
                $app->make('em'),
                new ClassMetadata(Section::class)
            );
        });
          $this->app->bind(SectionStudentRepository::class, function (Application $app) {
            return new DoctrineSectionStudentRepository(
                $app->make('em'),
                new ClassMetadata(SectionStudent::class)
            );
        });
           $this->app->bind(StudentRepository::class, function (Application $app) {
            return new DoctrineStudentRepository(
                $app->make('em'),
                new ClassMetadata(Student::class)
            );
        });
            $this->app->bind(StudentSubjectRepository::class, function (Application $app) {
            return new DoctrineStudentSubjectRepository(
                $app->make('em'),
                new ClassMetadata(StudentSubject::class)
            );
        });
             $this->app->bind(SubjectRepository::class, function (Application $app) {
            return new DoctrineSubjectRepository(
                $app->make('em'),
                new ClassMetadata(Subject::class)
            );
        });
              $this->app->bind(SubjectNameRepository::class, function (Application $app) {
            return new DoctrineSubjectNameRepository(
                $app->make('em'),
                new ClassMetadata(SubjectName::class)
            );
        });
               $this->app->bind(SyllabusRepository::class, function (Application $app) {
            return new DoctrineSyllabusRepository(
                $app->make('em'),
                new ClassMetadata(Syllabus::class)
            );
        });
                $this->app->bind(SyllabusCompletionRepository::class, function (Application $app) {
            return new DoctrineSyllabusCompletionRepository(
                $app->make('em'),
                new ClassMetadata(SyllabusCompletion::class)
            );
        });
                 $this->app->bind(SyllabusTargetRepository::class, function (Application $app) {
            return new DoctrineSyllabusTargetRepository(
                $app->make('em'),
                new ClassMetadata(SyllabusTarget::class)
            );
        });
            $this->app->bind(TeacherRepository::class, function (Application $app) {
            return new DoctrineTeacherRepository(
                $app->make('em'),
                new ClassMetadata(Teacher::class)
            );
        }); 
            $this->app->bind(WorkHistoryRepository::class, function (Application $app) {
            return new DoctrineWorkHistoryRepository(
                $app->make('em'),
                new ClassMetadata(WorkHistory::class)
            );
        });
      
        $this->app->bind(StudentRepository::class, function (Application $app) {
            return new DoctrineStudentRepository(
                $app->make('em'),
                new ClassMetadata(User::class)
            );
        });
         
          $this->app->bind(RoleRepository::class, function (Application $app) {
            return new DoctrineRoleRepository(
                $app->make('em'),
                new ClassMetadata(Role::class)
            );
        });
         
            $this->app->bind(UserRepository::class, function (Application $app) {
            return new DoctrineUserRepository(
                $app->make('em'),
                new ClassMetadata(User::class)
            );
        });
              $this->app->bind(BuildingRepository::class, function (Application $app) {
            return new DoctrineBuildingRepository(
                $app->make('em'),
                new ClassMetadata(Building::class)
            );
        });
            $this->app->bind(FacilityRepository::class, function (Application $app) {
            return new DoctrineFacilityRepository(
                $app->make('em'),
                new ClassMetadata(Facility::class)
            );
        });
          
        $this->app->bind(OrganisationRepository::class, function (Application $app) {
            return new DoctrineOrganisationRepository(
                $app->make('em'),
                new ClassMetadata(School::class)
            );
        });
            
              $this->app->bind(SchoolRepository::class, function (Application $app) {
            return new DoctrineSchoolRepository(
                $app->make('em'),
                new ClassMetadata(School::class)
            );
        });
               $this->app->bind(SectionRepository::class, function (Application $app) {
            return new DoctrineSectionRepository(
                $app->make('em'),
                new ClassMetadata(Section::class)
            );
        });
                $this->app->bind(SubjectRepository::class, function (Application $app) {
            return new DoctrineSubjectRepository(
                $app->make('em'),
                new ClassMetadata(Subject::class)
            );
        });
                 $this->app->bind(TeacherRepository::class, function (Application $app) {
            return new DoctrineTeacherRepository(
                $app->make('em'),
                new ClassMetadata(Teacher::class)
            );
        });
                  $this->app->bind(SubjectNameRepository::class, function (Application $app) {
            return new DoctrineSubjectNameRepository(
                $app->make('em'),
                new ClassMetadata(SubjectName::class)
            );
        });
                            $this->app->bind(UserContactRepository::class, function (Application $app) {
            return new DoctrineUserContactRepository(
                $app->make('em'),
                new ClassMetadata(UserContact::class)
            );
        });
            $this->app->bind(SchoolAddressRepository::class, function (Application $app) {
            return new DoctrineSchoolAddressRepository(
                $app->make('em'),
                new ClassMetadata(SchoolAddress::class)
            );
        });
            $this->app->bind(BuildingAddressRepository::class, function (Application $app) {
            return new DoctrineBuildingAddressRepository(
                $app->make('em'),
                new ClassMetadata(BuildingAddress::class)
            );
        });
            $this->app->bind(StateRepository::class, function (Application $app) {
            return new DoctrineStateRepository(
                $app->make('em'),
                new ClassMetadata(State::class)
            );
        });
             $this->app->bind(PackageRepository::class, function (Application $app) {
            return new DoctrinePackageRepository(
                $app->make('em'),
                new ClassMetadata(Package::class)
            );
        });
              $this->app->bind(UserPackageRepository::class, function (Application $app) {
            return new DoctrineUserPackageRepository(
                $app->make('em'),
                new ClassMetadata(UserPackage::class)
            );
        });
             $this->app->bind(SkoolumAccountRepository::class, function (Application $app) {
            return new DoctrineSkoolumAccountRepository(
                $app->make('em'),
                new ClassMetadata(SkoolumAccount::class)
            );
        });
             $this->app->bind(AccountRepository::class, function (Application $app) {
            return new DoctrineAccountRepository(
                $app->make('em'),
                new ClassMetadata(Account::class)
            );
        });
                $this->app->bind(PaymentRecordRepository::class, function (Application $app) {
            return new DoctrinePaymentRecordRepository(
                $app->make('em'),
                new ClassMetadata(PaymentRecord::class)
            );
        });
    }
}
