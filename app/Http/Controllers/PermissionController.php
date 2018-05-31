<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;

class PermissionController extends Controller
{
    //
	public function edit($id){
		$permission = Permission::find($id);
		$perms    = Permission::where('permParent', $id)->get();
		return view('permissions.edit', compact('permission', 'perms'));
	}

	public function destroy($id){
		Permission::find($id)->delete();
		\App\Rolepermission::where('permission_id', $id)->where('role_id', auth()->user()->role)->delete();
	}

	public function helpNaming(){
		return request('helpHint');
	}

	public function update($id){



	  $all = (request()->all());



	  $permissionName = $all['permissionName'];
	  $permissionDetail = $all['permissionDetail'];
	  $permissionType = $all['permissionTypeEdit'];
	  $routeName = $all['routeName'];
	  $faIcon = $all['faIcon'];
	  $isnavMenu = $all['isnavMenu'];
	  $status = $all['status'];

	  $check = Permission::where('perm_name', $permissionName)->where('isparent', $permissionType)->where('routename', $routeName)->where('id', $all['perm_id'])->count();


	  if($check){
		//update
		$p = Permission::find($all['perm_id']);



		$p->perm_name = $permissionName;
		$p->detail = $permissionDetail;
		$p->isparent = $permissionType;
		$p->routename = $routeName;
		$p->faicon = $faIcon;
		$p->isnav = $isnavMenu;
		$p->status = $status;
		$p->permParent = request('permParent') == true ? request('permParent')  : 0 ;
		$p->save();

		return response()->json(['error'=>false, 'msg'=>'']);

	  }else{

		$check_ = Permission::where('perm_name', $permissionName)->where('isparent', $permissionType)->where('routename', $routeName)->where('id','!=', $all['perm_id'])->count();

		if($check_){
			return response()->json(['error'=>true, 'msg'=>'Permission already registred']);
		}else{
			//update
			$p = Permission::find($all['perm_id']);

			$p->perm_name = $permissionName;
			$p->detail = $permissionDetail;
			$p->isparent = $permissionType;
			$p->routename = $routeName;
			$p->faicon = $faIcon;
			$p->isnav = $isnavMenu;
			$p->status = $status;
			$p->permParent = request('permParent') == true ? request('permParent')  : 0 ;

			$p->save();

			return response()->json(['error'=>false, 'msg'=>'']);
		}


	  }
	}

	public function store(){
		  $all = (request()->all());



		  $permissionName = $all['permissionName'];
		  $permissionDetail = $all['permissionDetail'];
		  $permissionType = $all['permissionType'];
		  $routeName = $all['routeName'];
		  $faIcon = $all['faIcon'];
		  $isnavMenu = $all['isnavMenu'];
		  $status = $all['status'];

		  $check = Permission::where('perm_name', $permissionName)->where('isparent', $permissionType)->where('routename', $routeName)->count();

		  if($check){
			return response()->json(['error'=>true, 'msg'=>'Permission already registred']);
		  }else{

			$p = new Permission;

			$p->perm_name = $permissionName;
			$p->detail = $permissionDetail;
			$p->isparent = $permissionType;
			$p->routename = $routeName;
			$p->faicon = $faIcon;
			$p->isnav = $isnavMenu;
			$p->status = $status;
			if(request('permParent') != null){
			  $p->permParent = request('permParent');
			}else{
			  $p->permParent = 0;
			}
			$p->save();

			return response()->json(['error'=>false, 'msg'=>'']);
		  }
	}

	public function refreshWith(){
		return redirect()->back()->with('success', 'Successfully Added!');
	}

	public function getAllParents(){
		$perms = \App\Permission::where('isparent', 1)->get();
		return view('permissions.parents', compact('perms'));
	}

}
