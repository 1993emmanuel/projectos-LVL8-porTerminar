<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\UserPermission;

class EnsureUserRoleIsAllowedToAccess
{

    //dashboard, page, navigation


    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        //es mejor usar un try y catch para evitar futuros errores en el codigo
        try{
            // echo "the middleware for access role is running like normaly work a http request is made <br>";
            $userRole = auth()->user()->role;
            $currentRouteName = Route::currentRouteName();
            // echo "the role is  : ".$userRole."<br>";
            // echo "the currentRouteName is :".$currentRouteName;

            if( UserPermission::isRoleHasRightToAccess($userRole, $currentRouteName)
                || in_array($currentRouteName, $this->defaultUserAccessRole()[$userRole])){
                return $next($request);
            }else{
                abort(403, 'Unauthorized Action.... please call to support!!!!');
            }
        }catch(\Throwable $th){
            abort(403, 'you are not allowed in this page...');
        }

    }

    /**
        private function
        lista de todos los posibles recursos para acceder para cada usurio
        almacenaremos esto en DB luego
        este es el rol principal para el usuario admin por si algo malo pasa.
    **/
    private function defaultUserAccessRole(){
        return [
            'admin'=>[
                'dashboard',
                'user-permisions',
            ],
        ];
    }

}
