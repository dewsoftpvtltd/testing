<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeFormFields extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:fields 
    {fieldName}
    {fieldlabel}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Makes form fields with input validation';

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

     if (! file_exists('resources/views/formfields')) {

         mkdir('resources/views/formfields', 0775, true);
        }else{
                $contractFileName = 'resources/views/formfields/' . $fieldName . '.blade.php';
                
            if(! file_exists($contractFileName)) {
                    $contractFileContent = "<div class=\"input-field col s12 m6 l8\">
<input type=\"text\" id=\"$fieldName\" class=\"validate\" name=\"$fieldName\" value=\"{{old('$fieldName')}}\">
<label data-error=\"Sorry!\" data-success=\"Good!\" for=\"$fieldName\">$fieldlabel</label>
@if (\$errors->has('$fieldName'))
<span class=\"red-text\">{{ \$errors->first('$fieldName')}}</span>
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
