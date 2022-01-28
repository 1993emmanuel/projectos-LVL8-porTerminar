<?php

	namespace App\Http\Livewire;

	use App\Models\UserPermission;
	use Livewire\Component;
	use Livewire\WithPagination;

class UserPermissions extends Component
{
	
	use WithPagination;
	
	public $modalFormVisible;
	public $modalConfirmDeleteVisible;
	public $modalId;


	/**
		pon tus propiedades personalizadas aqui
	**/
	public $role;
	public $routeName;


	/**
		la seccion de reglas para la plantilla
	**/
	public function rules(){
		return[
			'role'=>'required',
			'routeName'=>'required'
		];
	}

	/**
		Seccion para cargar los modals
	**/
	public function loadModal(){
		$data = UserPermission::find($this->modalId);
		//Asignar las variables aqui
		$this->role = $data->role;
		$this->routeName = $data->route_name;
	}

	/**
		function para mapear todos los valores dentro de nuestro formulario
	**/

	public function modelData(){
		//primer valor de base de datos....
		return [
			'role' => $this->role,
			'route_name' => $this->routeName,
		];
	}

	/**
		creamos la funcion para crear el menu
	**/
	public function create(){
		$this->validate();
		UserPermission::create($this->modelData());
		$this->modalFormVisible = false;
		$this->reset();
	}

	/**
		funcion de lectura con paginacion para mostrar los menus
	**/
	public function read(){
		return UserPermission::paginate(5);
	}

	/**
		creamos la funcion para actualizar el registro seleccionado
	**/
	public function update(){
		$this->validate();
		UserPermission::find($this->modalId)->update($this->modelData());
		$this->modalFormVisible = false;
	}

	/**
		funcion para eliminar el registro de la base de datos
	**/
	public function delete(){
		UserPermission::destroy($this->modalId);
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
        return view('livewire.user-permissions',['data'=>$this->read()]);
    }


}