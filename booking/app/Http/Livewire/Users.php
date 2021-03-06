<?php

	namespace App\Http\Livewire;

	use App\Models\User;
	use Livewire\Component;
	use Livewire\WithPagination;

class Users extends Component
{
	
	use WithPagination;
	
	public $modalFormVisible = false;
	public $modalConfirmDeleteVisible = false;
	public $modalId;


	/**
		pon tus propiedades personalizadas aqui
	**/



	/**
		la seccion de reglas para la plantilla
	**/
	public function rules(){
		return[
		];
	}

	/**
		Seccion para cargar los modals
	**/
	public function loadModal(){
		$data = User::find($this->modalId);
		//Asignar las variables aqui
	}

	/**
		function para mapear todos los valores dentro de nuestro formulario
	**/

	public function modelData(){
		return [
		];
	}

	/**
		creamos la funcion para crear el menu
	**/
	public function create(){
		$this->validate();
		User::create($this->modelData());
		$this->modalFormVisible = false;
		$this->reset();
	}

	/**
		funcion de lectura con paginacion para mostrar los menus
	**/
	public function read(){
		return User::paginate(5);
	}

	/**
		creamos la funcion para actualizar el registro seleccionado
	**/
	public function update(){
		$this->validate();
		User::find($this->modalId)->update($this->modelData());
		$this->modalFormVisible = false;
	}

	/**
		funcion para eliminar el registro de la base de datos
	**/
	public function delete(){
		User::destroy($this->modalId);
		$this->modalConfirmDeleteVisible = false;
		$this->resetPage();
	}

	public function createShowModal(){
		$this->resetValidation();
		$this->reset();
		$this->modalFormVisible = true;
	}

	/**
		funcion para mostrar el modal de editar
	**/
	public function updateShowModal($id){
		$this->resetValidation();
		$this->reset();
		$this->modalFormVisible = true;
		$this->modalId = $id;
		$this->loadModal();
	}

	/**
		funcion para mostrar el modal de permiso para borrar un registro
	**/
	public function deleteShowModal($id){
		$this->modalId = $id;
		$this->modalConfirmDeleteVisible = true;
	}

    public function render()
    {
        return view('livewire.users',['data'=>$this->read()]);
    }


}