<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Page;
use Illuminate\Support\Facades\DB;

class Frontpage extends Component
{


	public $title;
	public $content;

	/**
		mount function
	**/
	public function mount($urlslug = null){
		$this->retrieveContent($urlslug);
	}

	/**
		retrieveContent nos muestra por medio de el modelo Page la informacion de
		la pagina web.
	**/
	public function retrieveContent($urlslug){

		//get the home page when slug is empty
		if(empty($urlslug)){
			$data = Page::where('is_default_home',true)->first();
		}else{
			//obtenemos la informacion del slug que nos mando
			$data = Page::where('slug',$urlslug)->first();

			//en caso de no tener nada tenemos que mostrar el default 404 not found page
			if(!$data){
				$data = Page::where('is_default_not_found',true)->first();
			}
		}

		$this->title = $data->title;
		$this->content = $data->content;
	}

	/**
		esta funcion nos muestra el menu del sidebar ordenados por sequencia y fecha de creacion
		hecha con DB:table
	**/
	private function sideBarLinks(){
		return DB::table('navigation_menus')
					->where('type','=','SidebarNav')
					->orderBy('sequence','asc')
					->orderBy('created_at','asc')
					->get();
	}

	/**
		esta funcion nos muestra el menu de la parte frontal
	**/
	private function topNavigationLinks(){
		return DB::table('navigation_menus')
					->where('type','=','TopNav')
					->orderBy('sequence','asc')
					->orderBy('created_at','asc')
					->get();
	}

    public function render()
    {
        return view('livewire.frontpage',
        	[
        		'sidebarLink'=>$this->sideBarLinks(),
        		'topnav'=>$this->topNavigationLinks()
        	]
        )->layout('layouts.frontpage');
    }
}
