<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Illuminate\Filesystem\Filesystem;

class LiveWireCustomCrudCommand extends Command
{
    /**
     * The name and signature of the console command.
     this need 2 parametros name of class name of model
     *
     * @var string
     */
    protected $signature = 'make:livewire:crud
        {nameOfTheClass?  : the name of the class } ,
        {nameOfTheModelClass?  : the name of the modelClass } ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a custom livewire command for the crud';

    /**
        our new custom propities is here
    **/
    protected $nameOfTheClass;
    protected $nameOfTheModelClass;
    protected $file;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        //generamos en el constructor el archivo con filesystem
        $this->file = new Filesystem();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // return 0;
        // $this->info('this is the new command to i create custom livewire generate crud');
        //get all the parameters
        $this->gatherParameters();
        //generate the livewire class file
        $this->generateLiveWireCrudClassFile();
        //generate the livewire view file 
        $this->generateLivewireCrudViewFile();
    }


    //obtener todos los parametros necesarios
    protected function gatherParameters(){
        $this->nameOfTheClass = $this->argument('nameOfTheClass');
        $this->nameOfTheModelClass = $this->argument('nameOfTheModelClass');

        /**
            si no pasas el nombre de la clase pasa esto preguntaremos
            con ask para que nos proporcione el nombre de la clase
        **/
        if(!$this->nameOfTheClass){
            $this->nameOfTheClass = $this->ask('Enter the class name');
        }

        /**
            haremos lo mismo para el nombre del modelo
        **/
        if(!$this->nameOfTheModelClass){
            $this->nameOfTheModelClass = $this->ask('Enter the name of the model class');
        }

        /**
            usaremos STR para la cadena studly
            esto nos permite que cada espacio cualquier cadena ya se con espacio o guion quede con mayusculas si 
            es mas de una oracion
        **/
        $this->nameOfTheClass = Str::studly($this->nameOfTheClass);
        $this->nameOfTheModelClass = Str::studly($this->nameOfTheModelClass);
    }

    /**
        funcion protegida para generar el archivo livewire
    **/
    protected function generateLiveWireCrudClassFile(){
        //poner el origen y el destino del archivo livewire
        $fileOrigin = base_path('/stubs/custom.livewire.crud.stub');
        $fileDestination = base_path('/app/Http/Livewire/'. $this->nameOfTheClass . '.php');

        //validamos si existe el archivo
        if($this->file->exists($fileDestination)){
            $this->info('Be carrefull please!!!!!!!!!');
            $this->info('this file exist : '.$this->nameOfTheClass. '.php');
            $this->info('aborting class file creation....');
            return false;
        }

        //obtener el nombre original del archivo
        $fileOriginalString = $this->file->get($fileOrigin);

        //remplazar de nuestro stub con los valores que pasemos para tener mayor facilidad de creacion
        $replaceFileOriginalString = Str::replaceArray('{{}}',[
                $this->nameOfTheModelClass, //nombre de model class extiende del modelo
                $this->nameOfTheClass,  //nombre del modelo clase que extiende de componente
                $this->nameOfTheModelClass, //nombre de model class carga del modal funcion loadmodal
                $this->nameOfTheModelClass, //nombre de model class funcion create for the crud
                $this->nameOfTheModelClass, //nombre de model class funcion read for the crud
                $this->nameOfTheModelClass, //nombre de model class funcion update for the crud
                $this->nameOfTheModelClass, //nombre de model class funcion delete for the crud
                Str::kebab($this->nameOfTheClass), //para el foobar del foobar va en el render y es para la vista
            ],
            $fileOriginalString
        );
        // $this->info($fileOriginalString);

        //poner el contenido en el directorio de destino
        $this->file->put($fileDestination, $replaceFileOriginalString);
        $this->info('Livewire class file created: '.$fileDestination);
    }

    //funcion para crear el archivo con la vista de livewirefile
    protected function generateLivewireCrudViewFile(){
        $fileOrigin = base_path('/stubs/custom.livewire.crud.view.stub');
        $fileDestination = base_path('/resources/views/livewire/'. Str::kebab($this->nameOfTheClass) . '.blade.php');

       //validamos si existe el archivo
        if($this->file->exists($fileDestination)){
            $this->info('Be carrefull please!!!!!!!!!');
            $this->info('this view exist : '.Str::kebab($this->nameOfTheClass). '.php');
            $this->info('aborting view file creation....');
            return false;
        }

        //copiar el archivo al destino
        $this->file->copy($fileOrigin, $fileDestination);
        $this->info('Livewire class file created: '.$fileDestination);
    }

}
