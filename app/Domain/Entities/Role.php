<?php

namespace App\Domain\Entities;
use App\Domain\Entities\User;
use Doctrine\ORM\Mapping as ORM;
use LaravelDoctrine\ACL\Mappings as ACL;
use LaravelDoctrine\ACL\Contracts\HasPermissions as HasPermissionContract;
use LaravelDoctrine\ACL\Contracts\Role as RoleContract;
use LaravelDoctrine\ACL\Permissions\PermissionManager;
use LaravelDoctrine\ACL\Permissions\HasPermissions;


/**
 * @ORM\Entity()
 * @ORM\Table(name="roles")
 */
class Role implements RoleContract
{
    use HasPermissions;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @ACL\HasPermissions
     */
     public $permissions;
      
    /**
    * @ORM\ManyToMany(targetEntity="User", inversedBy="roles")
    */
    protected $user;
    /**
     * @return int
     */
    
    public function __construct(){
        $this->user[]=new ArrayCollection;
    }
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
     public function getUser()
    {
        return $this->user;
    }
    public function setName($role)
    {
         $this->name =$role;
    }
     public function setUser(User $user)
    {
         $this->user[] =$user;
         
    }
  
    /**
     * Correct these two methods
     */

    //  public function hasPermissionTo($permission)
    // {
    //     return $permission;
    // }

     public function getPermissions()
    {
        return $this->permissions;
    }
}