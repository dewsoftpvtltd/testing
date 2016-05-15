<?php

namespace DoctrineProxies\__CG__\App\Domain\Entities;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Teacher extends \App\Domain\Entities\Teacher implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = [];



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return ['__isInitialized__', 'id', 'designation', 'schoolrole', 'school', 'user', 'subjectsallotted', 'sectionsallotted', 'students', 'periods', 'examinations', 'courseteachers', 'createdAt', 'updatedAt', 'deletedAt'];
        }

        return ['__isInitialized__', 'id', 'designation', 'schoolrole', 'school', 'user', 'subjectsallotted', 'sectionsallotted', 'students', 'periods', 'examinations', 'courseteachers', 'createdAt', 'updatedAt', 'deletedAt'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Teacher $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', []);
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', []);
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', []);

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function getDesignation()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDesignation', []);

        return parent::getDesignation();
    }

    /**
     * {@inheritDoc}
     */
    public function getSchoolrole()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSchoolrole', []);

        return parent::getSchoolrole();
    }

    /**
     * {@inheritDoc}
     */
    public function setSchoolrole($schoolrole)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSchoolrole', [$schoolrole]);

        return parent::setSchoolrole($schoolrole);
    }

    /**
     * {@inheritDoc}
     */
    public function setSchool(\App\Domain\Entities\School $school)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSchool', [$school]);

        return parent::setSchool($school);
    }

    /**
     * {@inheritDoc}
     */
    public function getSchool()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSchool', []);

        return parent::getSchool();
    }

    /**
     * {@inheritDoc}
     */
    public function getStudents()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStudents', []);

        return parent::getStudents();
    }

    /**
     * {@inheritDoc}
     */
    public function getSubjectsAllotted()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSubjectsAllotted', []);

        return parent::getSubjectsAllotted();
    }

    /**
     * {@inheritDoc}
     */
    public function getSectionsAllotted()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSectionsAllotted', []);

        return parent::getSectionsAllotted();
    }

    /**
     * {@inheritDoc}
     */
    public function getExaminations()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getExaminations', []);

        return parent::getExaminations();
    }

    /**
     * {@inheritDoc}
     */
    public function setUser(\App\Domain\Entities\User $user)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUser', [$user]);

        return parent::setUser($user);
    }

    /**
     * {@inheritDoc}
     */
    public function getPeriods()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPeriods', []);

        return parent::getPeriods();
    }

    /**
     * {@inheritDoc}
     */
    public function getUser()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUser', []);

        return parent::getUser();
    }

    /**
     * {@inheritDoc}
     */
    public function getCreatedAt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCreatedAt', []);

        return parent::getCreatedAt();
    }

    /**
     * {@inheritDoc}
     */
    public function getCourseTeacher()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCourseTeacher', []);

        return parent::getCourseTeacher();
    }

    /**
     * {@inheritDoc}
     */
    public function getUpdatedAt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUpdatedAt', []);

        return parent::getUpdatedAt();
    }

    /**
     * {@inheritDoc}
     */
    public function setCreatedAt(\DateTime $createdAt)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCreatedAt', [$createdAt]);

        return parent::setCreatedAt($createdAt);
    }

    /**
     * {@inheritDoc}
     */
    public function setUpdatedAt(\DateTime $updatedAt)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUpdatedAt', [$updatedAt]);

        return parent::setUpdatedAt($updatedAt);
    }

    /**
     * {@inheritDoc}
     */
    public function getDeletedAt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDeletedAt', []);

        return parent::getDeletedAt();
    }

    /**
     * {@inheritDoc}
     */
    public function setDeletedAt(\DateTime $deletedAt = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDeletedAt', [$deletedAt]);

        return parent::setDeletedAt($deletedAt);
    }

    /**
     * {@inheritDoc}
     */
    public function restore()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'restore', []);

        return parent::restore();
    }

    /**
     * {@inheritDoc}
     */
    public function isDeleted()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'isDeleted', []);

        return parent::isDeleted();
    }

}
