<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeDropDowns extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:dropdown 
    {fieldName}
    {fieldlabel}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Makes form dropdown lists by fetching data from database';

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
        $fieldName = $this->argument('fieldName');
        $fieldlabel = $this->argument('fieldlabel');
     if ($fieldName === '' || is_null($fieldName) || empty($fieldName)) {
         $this->error('Field Name Invalid..!');
     }

     if (! file_exists('resources/views/dropdowns')) {

         mkdir('resources/views/dropdowns', 0775, true);
        }else{
                $contractFileName = 'resources/views/dropdowns/' . $fieldName . '.blade.php';
                
            if(! file_exists($contractFileName)) {
                    $contractFileContent = " <div class=\"input-field col s12 m6 l6\">
    <select name=\"".$fieldName."_id\" id=\"".$fieldName."_id\" value=\"{{old('".$fieldName."_id')}}\">
      <option value=\"\" disabled selected>Choose your $fieldlabel</option>
      @foreach(\$".str_plural($fieldName)." as \$$fieldName)
      <option value=\"{{\$".$fieldName."->getId()}}\">{{\$".$fieldName."->getName()}}</option>
      @endforeach
    </select>
    <label for=\"".$fieldName."_id\">$fieldlabel</label>
    @if (\$errors->has('".$fieldName."_id'))
      <span class=\"red-text\">{{ \$errors->first('".$fieldName."_id')}}</span>
    @endif
  </div>";

                    file_put_contents($contractFileName, $contractFileContent);

                    

                    $this->info('Field File Created Successfully.');

         } else {
             $this->error('Field File Already Exists.');
         }
     }
      
 }
}
