<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model
{
    use HasFactory;
    protected $fillable = ['role','route_name'];


    //lista de las rutas que estan registradas

    public static function routeNameList(){
    	return [
    		'pages',
    		'navigation-menus',
    		'dashboard',
    		'users',
    		'user-permissions',
    	];
    }

    /**
        checamos que el usuario tenga el rol correcto y la ruta tambien
    **/
    public static function isRoleHasRightToAccess($userRole, $routeName){
        try{
            $model = static::where('role',$userRole)
                            ->where('route_name', $routeName)
                            ->first();
            return $model ? true : false;
        }catch(\Throwable $th){
            return false;
        }

    }

}
