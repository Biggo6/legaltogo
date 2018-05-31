<?php

namespace App\Http\Middleware;

use Closure;

class RoutesChecker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
		$currentRoute = \Route::currentRouteName();
		
		$check = \App\Rolepermission::where('role_id', auth()->user()->role)->count();
		
		if($check){
			//can access codes!
			$perms = \App\Rolepermission::where('role_id', auth()->user()->role)->get();
			$accessRoutes = [];
			foreach($perms as $p){
				$perm = \App\Permission::find($p->permission_id);			
				$db_route = $perm->routename;
				$accessRoutes[] = $db_route;
				// if($currentRoute != $db_route){
					// dd($db_route);
					// return redirect()->to('/')->with('error', 'Access Denied!');
				// }
			}
			
			if(in_array($currentRoute, $accessRoutes)){
			
				return $next($request);
				
			}else{
				
				$role = \App\Role::find(auth()->user()->role)->role_name;
				if($role == 'Developer' || $currentRoute == 'app.dashboard'){
					return $next($request);
				}else{
					return redirect()->to('/dashboard')->with('error', 'Access Denied!');
				}
			}
			
			
		}else{
			return redirect()->to('/')->with('error', 'Access Denied!');
		}
		
        
    }
}
