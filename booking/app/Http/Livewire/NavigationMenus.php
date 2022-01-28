<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\NavigationMenu;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class NavigationMenus extends Component
{

	public $modalFormVisible;
	public $modalConfirmDeleteVisible;

	public $modalId;
	public $label;
	public $slug;
	public $sequence = 1;
	public $type = 'SidebarNav';

	use WithPagination;


	/**
		reglas para la seccion de menus
	**/
	public function rules(){
		return[
			'label'=>'required',
			'slug'=>'required',
			'sequence'=>'required',
			'type'=>'required',
		];
	}

	/**
		funcion para cargar los datos del modal
	**/
	public function loadModal(){
		$data = NavigationMenu::find($this->modalId);
		$this->label = $data->label;
		$this->slug = $data->slug;
		$this->type = $data->type;
		$this->sequence = $data->sequence;
	}

	/**
		function para mapear todos los valores dentro de nuestro formulario
	**/

	public function modelData(){
		return [
			// 'modalId'=>$this->modalId,
			'label'=>$this->label,
			'slug'=>$this->slug,
			'sequence'=>$this->sequence,
			'type'=>$this->type,
		];
	}


	/**
		creamos la funcion para crear el menu
	**/
	public function create(){
		$this->validate();
		NavigationMenu::create($this->modelData());
		$this->modalFormVisible = false;
		$this->reset();
	}

	/**
		funcion de lectura con paginacion para mostrar los menus
	**/
	public function read(){
		return NavigationMenu::paginate(5);
	}

	/**
		creamos la funcion para actualizar el registro seleccionado
	**/
	public function update(){
		$this->validate();
		NavigationMenu::find($this->modalId)->update($this->modelData());
		$this->modalFormVisible = false;
	}

	/**
		funcion para eliminar el registro de la base de datos
	**/
	public function delete(){
		NavigationMenu::destroy($this->modalId);
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
        return view('livewire.navigation-menus',['data'=>$this->read()]);
    }
    
}
