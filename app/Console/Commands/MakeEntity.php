<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeEntity extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:entity {entitylName}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make Entities for doctrine';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        
      $entitylName = $this->argument('entitylName');

     if ($entitylName === '' || is_null($entitylName) || empty($entitylName)) {
         $this->error('Entity Name Invalid..!');
     }

     if (! file_exists('app/Domain/Entities')) {

         mkdir('app/Domain/Entities', 0775, true);
        }else{
                $contractFileName = 'app/Domain/Entities/' . $entitylName . '.php';
                
            if(! file_exists($contractFileName)) {
                    $contractFileContent = "<?php
namespace App\Domain\Entities;
use Doctrine\ORM\Mapping AS ORM;
use App\Domain\Entities\School;
use LaravelDoctrine\Extensions\Timestamps\Timestamps;
use LaravelDoctrine\Extensions\SoftDeletes\SoftDeletes;
use Doctrine\Common\Collections\ArrayCollection;
use Carbon\Carbon;
/**
 * @ORM\Entity
 * @ORM\Table(name=\"".strtolower(str_plural($entitylName))."\")
 * @ORM\HasLifecycleCallbacks
 */
class " . $entitylName." 
{ 
    use Timestamps, SoftDeletes;
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type=\"integer\")
     */
    protected \$id;

    /**
     * @ORM\Column(type=\"string\")
     */
    protected \$name;
    /**
     * @ORM\Column(type=\"string\")
     */
    protected \$address;

    /**

    /**
    * @ORM\ManyToOne(targetEntity=\"School\", inversedBy=\"buildings\", cascade={\"persist\"})
    */
    protected \$school;
    /**
    * @ORM\OneToMany(targetEntity=\"Room\", mappedBy=\"building\", cascade={\"persist\"})
    * @var ArrayCollection|Room[]
    */
    
   
    /**
    * @param \$title
    */
    public function __construct(\$name,\$address,School \$school)
    {
        \$this->name = \$name;
        \$this->address = \$address;
        \$this->school = \$school;
        \$this->rooms = new ArrayCollection;
        \$this->halls = new ArrayCollection;
    }

    public function getId()
    {
        return \$this->id;
    }

    public function getName()
    {
        return \$this->name;
    }
     public function getAddress()
    {
        return \$this->address;
    }
    public function getRoom()
    {
        return \$this->rooms;
    }
    public function getHall()
    {
        return \$this->halls;
    }
     public function setAddress(\$address)
    {
       \$this->address = \$address;
    }

    public function setSchool(School \$school)
    {
        \$this->school = \$school;
    }

    public function getSchool()
    {
        return \$this->school;
    }
     public function getCreatedAt()
    {
        return Carbon::parse(\$this->createdAt->format('d-m-Y'))->diffForHumans();
    }
}";

                    file_put_contents($contractFileName, $contractFileContent);

                    

                    $this->info('Entity File Created Successfully.');

         } else {
             $this->error('Entity File Already Exists.');
         }
     }
      
 }
}
