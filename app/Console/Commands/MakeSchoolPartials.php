<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeSchoolPartials extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:schoolpartials 
    {viewName}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Makes empty school partials';

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
        $viewName = $this->argument('viewName');
        
     if ($viewName === '' || is_null($viewName) || empty($viewName)) {
         $this->error('Field Name Invalid..!');
     }

     if (! file_exists('resources/views/schoolpartials')) {

         mkdir('resources/views/schoolpartials', 0775, true);
        }else{
                $contractFileName = 'resources/views/schoolpartials/' . $viewName . '.blade.php';
                
            if(! file_exists($contractFileName)) {
                    $contractFileContent = " ";

                    file_put_contents($contractFileName, $contractFileContent);

                    

                    $this->info('View File Created Successfully.');

         } else {
             $this->error('View File Already Exists.');
         }
     }
      
 }
}
