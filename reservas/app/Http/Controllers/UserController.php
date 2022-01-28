<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserEditRequest;

class UserController extends Controller
{	

	//index que mostrara la lista de usuarios paginados en nuestro sistema
	public function index(){
		// $users = User::paginate(2);
		$idUser = Auth()->user()->id;
		$users = User::where('creadoPor','=',$idUser)->paginate(5);
		return view('users.index',compact('users'));
	}

    //cargamos la vista que vera el usuario
	public function create(){
		return view('users.create');
	}


	//cargamos la funcion para guardar los datos
	public function store(UserCreateRequest $request){
		// User::create($request->all()); solo para datos simples que no ocupen nada en especial
		// $request->validate([
		// 	'name'=>'required|min:3|max:5',
		// 	'username'=>'required|min:5|unique:users',
		// 	'email'=>'required|email|unique:users',
		// 	'password'=>'required'
		// ]);
		$idUser = Auth()->user()->id;
		$user = User::create($request->only('name','username','email')
					+[
						'password'=>bcrypt($request->input('password')),
						'creadoPor'=>$idUser,
				]);
		// return redirect()->back(); cambiamos para que redigira a la route principal
		return redirect()->route('users.show',$user->id)->with('success','El registro se guardo correctamente');
	}

	//funcion de show metodo con User class para simplificar
	public function show(User $user){
		//usamos findorFail para mandar error si no lo encuentra
		// $user = User::findOrFail($id);
		return view('users.show',compact('user'));
	}

	//mostramos la vista con los datos para editar el usuario
	public function edit(User $user){
		return view('users.edit',compact('user'));
	}

	//funcion para guardar los datos ya editados por el usuario
	public function update(UserEditRequest $request, User $user){
        // $user=User::findOrFail($id);
        $data = $request->only('name', 'username', 'email');
        $password=$request->input('password');
        if($password)
            $data['password'] = bcrypt($password);
        // if(trim($request->password)=='')
        // {
        //     $data=$request->except('password');
        // }
        // else{
        //     $data=$request->all();
        //     $data['password']=bcrypt($request->password);
        // }

        $user->update($data);
        return redirect()->route('users.show', $user->id)->with('success', 'Usuario actualizado correctamente');
	}

	//funcion para eliminar los datos de base de datos
	public function destroy(User $user){
		$user->delete();
		return back()->with('success','Usuario eliminado correctamente');
	}

}
