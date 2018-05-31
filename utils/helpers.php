<?php

use App\Systemsetting;
use App\HelperX;
use App\Rolepermission;

function lapp(){
	$system = Systemsetting::find(1);
    return $system;
}



function activeRoute($route)
{

    if (Route::currentRouteName() == $route) {
        return "active";
    } else {
        return "";
    }
}

function disableBtn($permName, $slug){
	if(canAccess($permName, $slug)){
		return "";
	}else{
		return "disabled";
	}

}

function getOrderStatus($status){
	if($status == '1'){
		return "<label class='label label-danger'>PENDING</label>";
	}else if($status == '2'){
		return "<label class='label label-warning'>RECEIVED</label>";
	}else if($status == '3'){
		return "<label class='label label-primary'>INPROGRESS</label>";
	}else if($status == '4'){
		return "<label class='label label-success'>COMPLETED</label>";
	}else if($status == '5'){
		return "<label class='label label-success'>PAID</label>";
	}
}

function checkedIt($os=null){
	if($os == null){
		if(lapp()->data_tools == "enable"){
			return "checked";
		}else{
			return "";
		}
	}else{
		if(os()->$os == "enable"){
			return "checked";
		}else{
			return "";
		}
	}


}





function canUserAccess($pid){
	$check = App\Rolepermission::where('permission_id', $pid)->where('role_id', auth()->user()->role)->count();
	if($check){
		return true;
	}else{
		return false;
	}
}

function canAccess($permName, $slug){
	$permName = $slug . " " . $permName;
	$perm_id  = App\Permission::where('perm_name', $permName)->count();
	if($perm_id){
		$pid   = App\Permission::where('perm_name', $permName)->first()->id;
		$check = App\Rolepermission::where('permission_id', $pid)->where('role_id', auth()->user()->role)->count();
		if($check){
			return true;
		}else{
			return false;
		}

	}else{
		return false;
	}
}

function activeChildRoute($routes){

	for ($i=0; $i < count($routes); $i++) {
		$currentRouteName = $routes[$i];
		if (Route::currentRouteName() == $currentRouteName) {
	        return "active";
	    }
	}
}

function putCheckedOnIT($perm_id, $roleId){
	$check = Rolepermission::where('role_id', $roleId)->where('permission_id', $perm_id)->count();
	if($check){
		return 'checked';
	}else{
		return '';
	}
}

function dr(){
	echo dd(request()->all());
}

function labelIT($s, $text){
	 if ($s == 1) {
		return "<label class='label label-success'>".$text[$s]."</label>";
	} else {
		return "<label class='label label-danger'>".$text[$s]."</label>";
	}
}

function getStatus($status){
	return HelperX::getStatus($status);
}

function getUnsignedRoutes($route){
	$perms = \App\Permission::all();
	$routes = [];
	foreach($perms as $p){
		$routes[] = $p->routename;
	}
	if(!in_array($route, $routes)){
		return true;
	}else{
		return false;
	}

}


function getRole($role){

	switch($role){
		case 1:
			return "Admin";
			break;
		case 2:
			return "Supervisor";
			break;
		case 3:
			return "Manager";
			break;
		case 4:
			return "Cashier";
			break;
		case 5:
			return "Chef";
			break;
		case 6:
			return "Store Keeper";
			break;
		case 7:
			return "Director";
			break;
		default:
			break;
	}


}
