<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeRepos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:doctrepos {entitylName}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make Repositories for doctrine entities as well as interfaces';

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
         $this->error('Model Name Invalid..!');
     }

     if (! file_exists('app/Domain/Repositories') && ! file_exists('app/Infrastructure/Repositories')) {

         mkdir('app/Domain/Repositories', 0775, true);
         mkdir('app/Infrastructure/Repositories', 0775, true);
        }else{
                $contractFileName = 'app/Domain/Repositories/' . $entitylName . 'Repository.php';
                $eloquentFileName = 'app/Infrastructure/Repositories/Doctrine' . $entitylName . 'Repository.php';
                
            if(! file_exists($contractFileName) && ! file_exists($eloquentFileName)) {
                    $contractFileContent = "<?php

namespace App\\Domain\\Repositories;

interface " . $entitylName . "Repository
{
    /**
     * Get all " . $entitylName . "s
     *
     * @param string \$orderField
     * @param string \$order
     *
     * @return \App\Domain\Entities\[]
     */
    public function all(\$orderField = 'id', \$order = 'ASC');

    /**
     * Finds an entity by its primary key / identifier.
     *
     * @param mixed    \$id          The identifier.
     * @param int|null \$lockMode    One of the \Doctrine\DBAL\LockMode::* constants
     *                              or NULL if no specific lock mode should be used
     *                              during the search.
     * @param int|null \$lockVersion The lock version.
     *
     * @return \App\Domain\Entities\
     */
    public function find(\$id, \$lockMode = null, \$lockVersion = null);
}";

                    file_put_contents($contractFileName, $contractFileContent);

                    $eloquentFileContent = "<?php

namespace App\\Infrastructure\\Repositories;

use App\\Domain\\Repositories\\".$entitylName."Repository;
use Doctrine\\ORM\\EntityRepository;
                   
class Doctrine" . $entitylName . "Repository extends EntityRepository implements " . $entitylName . "Repository
{
 /**
     * Get all " . $entitylName . "s
     *
     * @param string \$orderField
     * @param string \$order
     *
     * @return \App\Domain\Entities\[]
     */
    public function all(\$orderField = 'id', \$order = 'ASC')
    {
        return \$this->findBy([], [\$orderField => \$order]);
    }

    public function userAll(\$user)
    {
        return \$this->findBy(['school'=>\$user]);
    }                   
}";

                    file_put_contents($eloquentFileName, $eloquentFileContent);

                    $this->info('Repository Files Created Successfully.');

         } else {
             $this->error('Repository Files Already Exist.');
         }
     }
      
 }
}
