<?php

namespace App\Http\Livewire;

use App\Models\Page;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

use Illuminate\Support\Str;

class Pages extends Component
{
	use WithPagination;
	/** ponemos como false modal para que no aparezca amenos que de click a crear **/
	public $modalFormVisible = false;
	public $modalConfirmDeleteVisible = false;
	public $modalId;
	public $title;
	public $slug;
	public $content;
	public $isSetToDefaultHomePage;
	public $isSetToDefaultNotFoundPage;

	/**
		esto nos permite crear las reglas para validar la informacion
		con la siguiente funcion
	**/
	public function rules(){
		return[
			'title'=>'required',
			'slug'=>['required', Rule::unique('pages','slug')->ignore($this->modalId)],
			'content'=>'required'
		];
	}

	public function mount(){
		//reiniciar la paginacion despues de cargar la pagina
		$this->resetPage();
	}

	//con esta function generamos el slug ya que el updated es un ciclo de livewire
	public function updatedTitle($value){
		// $this->generateSlug($value);
		// Str::slug($value);
		$this->slug = Str::slug($value);
	}

	//usaremos el mismo ciclo de vida para validar el defaulthome
	public function updatedIsSetToDefaultHomePage(){
		$this->isSetToDefaultNotFoundPage = null;
	}
	public function updatedIsSetToDefaultNotFoundPage(){
		$this->isSetToDefaultHomePage = null;
	}


	/**
		show the modal in the page.blade.php
		es necesario usar resetvars ya que como usamos el mismo formulario
		contiene este el id y con eso evitamos problemas futuros
	**/
	public function createShowModal(){
		$this->resetValidation();
		$this->resetVars();
		$this->modalFormVisible = true;
	}

	/**
		show the modal in the page.blade.php that edit
		esto permite editarlo en un futuro
	**/
	public function updateShowModal($id){
		$this->resetValidation();
		$this->resetVars();
		$this->modalId = $id;
		$this->modalFormVisible = true;
		$this->loadModel();
	}

	/**
		Delete show modal
	**/
	public function deleteShowModal($id){
		$this->modalId = $id;
		$this->modalConfirmDeleteVisible = true;
	}

	/**
		show the modal with the information
		con la funcion find pasando el valod the modalId
	**/
	public function loadModel(){
		$data = Page::find($this->modalId);
		$this->title = $data->title;
		$this->slug = $data->slug;
		$this->content = $data->content;
		$this->isSetToDefaultHomePage = !$data->is_default_home ? null : true;
		$this->isSetToDefaultNotFoundPage  = !$data->is_default_not_found ? null : true;
	}

	/**
		creamos la funcion create para guardar la page
	**/

	public function create(){
		$this->validate();
		$this->unaasignDefaultHomePage();
		$this->unaasignDefaultNotFoundPage();
		Page::create($this->modelData());
		$this->modalFormVisible = false;
		$this->resetVars();
	}

	/**
		funcion para leer los datos desde la base de tabla pages
		vamos a paginar los datos con paginate pasando el parametro de 5 a la vez
	**/
	public function read(){
		return Page::paginate(5);
	}

	/**
		funcion para guardar los datos editados
	**/
	public function update(){
		// dd("updating.....");
		$this->validate();
		$this->unaasignDefaultHomePage();
		$this->unaasignDefaultNotFoundPage();
		Page::find($this->modalId)->update($this->modelData());
		$this->modalFormVisible = false;
	}

	/**
		funcion para eliminar los datos
	**/
	public function delete(){
		// dd('deletting....');
		Page::destroy($this->modalId);
		$this->modalConfirmDeleteVisible = false;
		$this->resetPage();
	}

	/**
		la informacion mapeada del modal data
	**/
	public function modelData(){
		return [
			'title'=>$this->title,
			'slug'=>$this->slug,
			'content'=>$this->content,
			'is_default_home'=>$this->isSetToDefaultHomePage,
			'is_default_not_found'=>$this->isSetToDefaultNotFoundPage,
		];
	}

	/**
		esta funcion limpia todas las variables a null
	**/
	public function resetVars(){
		$this->modalId = null;
		$this->title = null;
		$this->slug = null;
		$this->content = null;
		$this->isSetToDefaultHomePage = null;
		$this->isSetToDefaultNotFoundPage = null;
	}

	/**
		funcion privada para generar el slug de las categorias
		se ingresa el valor que convertira en slug
	**/
	// private function generateSlug($value){
	// 	$process1 = str_replace(' ','-',$value);
	// 	$process2 = strtolower($process1);
	// 	$this->slug = $process2;
	// }

	/**
		funcion para solo tener una pagina home y un 404
	**/
	private function unaasignDefaultHomePage(){
		if($this->isSetToDefaultHomePage != null){
			Page::where('is_default_home', true)->update([
				'is_default_home'	=>	false
			]);
		}
	}
	private function unaasignDefaultNotFoundPage(){
		if($this->isSetToDefaultNotFoundPage != null){
			Page::where('is_default_not_found', true)->update([
				'is_default_not_found'	=>	false
			]);
		}
	}

	/*
		funcion que permite mostrar o cargar la pagina de page.blade.php
		pasamos data que contiene nuestra funcion de read que esta tiene los registros 
		de la base de datos
	**/

    public function render()
    {
        return view('livewire.pages',['data'=>$this->read()]);
    }
}
