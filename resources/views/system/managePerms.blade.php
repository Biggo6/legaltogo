@extends('layout')

@section('title', 'Manage Permissions')

@section('main')


<div class="modal fade" id="modal-help">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title"><i class="fa fa-edit"></i> Naming Help On <span id="helpHint"></span> </h3>
      </div>
      <div class="modal-body" style="">
        <center>
          <img class="loader" style="display:none" src="{{url('BACKEND/images/loader.gif')}}" />
        </center>
        <div id="help_area"></div>
      </div>
    </div>
  </div>
</div>


	<div class="row">

		<div class="col-sm-12">
			<div class="">
				<div class="row">
					<div class="col-md-3 card-box">
						<h2 class="m-t-0 header-title "><b><i class="fa fa-plus"></i> Add New Permission</b></h2>
						<hr/>

						<form role="form" id="registerForm_Permission">

							{!!csrf_field()!!}

							<div class="form-group">
								<span style="display: flex; justify-content: space-between; margin-bottom: 10px">
									<label for="permissionName">Permission Name:</label> <a class="helpHint" helpHint="Permission Name" data-toggle="modal" href='#modal-help'><i class="fa fa-question-circle fa-2x"></i></a>
								</span>
								<input type="text" required class="form-control validate[required]" data-errormessage-value-missing="Permission name is required!" value="" data-prompt-position="bottomRight" id="permissionName" name="permissionName" placeholder="Enter Permission Name">
							</div>

							<div class="form-group">
								<span style="display: flex; justify-content: space-between; margin-bottom: 10px">
									<label for="permissionDetail">Permission Description: </label> <a class="helpHint" helpHint="Permission Description" data-toggle="modal" href='#modal-help'><i class="fa fa-question-circle fa-2x"></i></a>
								</span>
								<textarea required class="form-control validate[required]" data-errormessage-value-missing="Permission Description is required!" value="" data-prompt-position="bottomRight" id="permissionDetail" name="permissionDetail" placeholder="Enter Permission Name"></textarea>
							</div>


							<div class="form-group">
								<span style="display: flex; justify-content: space-between; margin-bottom: 10px">
									<label for="permissionType">Permission Type: </label> <a class="helpHint" helpHint="Permission Type" data-toggle="modal" href='#modal-help'><i class="fa fa-question-circle fa-2x"></i></a>
								</span>
								<select class="form-control validate[required]" data-errormessage-value-missing="Permission Type is required!" id="permissionType" name="permissionType" data-prompt-position="bottomRight">
									<option value="">--Select Permission Type Here--</option>
									<option value="1">Parent</option>
									<option value="0">Child</option>
								</select>
							</div>

							<div id="permissionParent">

							</div>

							<div class="form-group">
								<span style="display: flex; justify-content: space-between; margin-bottom: 10px">
									<label for="routeName">Route: </label> <a helpHint="Route" class="helpHint" data-toggle="modal" href='#modal-help'><i class="fa fa-question-circle fa-2x"></i></a>
								</span>
								<?php
										$routeCollection = Route::getRoutes();
									?>
								<select class="form-control select validate[required]" data-errormessage-value-missing="Route is required!" id="routeName" name="routeName" data-prompt-position="bottomRight">

									@foreach ($routeCollection as $value)
											@if(getUnsignedRoutes($value->getName()))
											<option value="{{$value->getName()}}">{{$value->getName()}}</option>
											@endif
									@endforeach


								</select>
							</div>

							<div class="form-group">
								<span style="display: flex; justify-content: space-between; margin-bottom: 10px">
									<label for="faIcon">fa-Icon: </label> <a helpHint="fa-Icon" class="helpHint" data-toggle="modal" href='#modal-help'><i class="fa fa-question-circle fa-2x"></i></a>
								</span>
								<input type="text" required class="form-control validate[required]" data-errormessage-value-missing="faIcon is required!" value="" data-prompt-position="bottomRight" id="faIcon" name="faIcon" placeholder="Enter faIcon">
							</div>

							<div class="form-group">
								<span style="display: flex; justify-content: space-between; margin-bottom: 10px">
								<label for="isnavMenu">Show as Navigation Menu: </label> <a class="helpHint" helpHint="Show as Navigation Menu" data-toggle="modal" href='#modal-help'><i class="fa fa-question-circle fa-2x"></i></a>
								</span>
								<select class="form-control validate[required]" data-errormessage-value-missing="Navigation Men is required!" id="isnavMenu" name="isnavMenu" data-prompt-position="bottomRight">
									<option value="">--Select  Here--</option>
									<option value="1">Yes</option>
									<option value="0">No</option>
								</select>
							</div>

							<div class="form-group">
								<span style="display: flex; justify-content: space-between; margin-bottom: 10px">
								<label for="status">Status: </label> <a helpHint="Status" class="helpHint" data-toggle="modal" href='#modal-help'><i class="fa fa-question-circle fa-2x"></i></a>
								</span>
								<select class="form-control validate[required]" data-errormessage-value-missing="Status is required!" id="status" name="status" data-prompt-position="bottomRight">
									<option value="">--Select Status Here--</option>
									<option value="1">Activated</option>
									<option value="0">Blocked</option>
								</select>
							</div>

							<hr/>

							@include('partials._buttonSave', ['btnId'=>'savePerm', 'title'=>'Add New Permission'])





						</form>
					</div>
					<div class="col-md-9 card-box">

						<?php

							$data = \App\Permission::orderBy('created_at', 'DESC')->get();


							$dxX = [];

							foreach($data as $d){
								$dx = [];
								$dx['id']        = $d->id;
								$dx['permission'] = $d->perm_name;
								$dx['detail'] = $d->detail;
								$dx['ptype'] = $d->isparent == 1 ? 'Parent' : 'Child';
								$dx['routeName'] = '<i><b>' . $d->routename . '</b></i>';
								$dx['faicon'] = '<i class="fa '. $d->faicon .'"></i>' ;
								$dx['navMenu'] = $d->isnav == 1 ? 'Yes' : 'No';
								$dx['pperm'] = $d->permParent == 0 ? $d->perm_name : App\Permission::find($d->permParent)->perm_name;
								$dx['status']    = $d->status;


								$dxX[] = (object)$dx;
							}

						?>

						@include('partials._success')
						@include('partials._datatables', ["columns"=>["Permission", "Detail", "Type", "Parent Permission", "Route", "Icon", "Navigation Menu", "Status",  "Actions"],
						"mapEls"=>["permission", "detail", "ptype", "pperm","routeName", "faicon", "navMenu", "status"],
						"data"=>$dxX, "modal"=>"normal", "url_edit"=>"permissions/edit", "url_delete" =>"permissions/delete", "refreshWix"=>"permissions.refreshWith", "isTaggedHtml"=>true, "perms"=>["perm_name"=>"Permissions"] ])

					</div>

				</div>
			</div>
		</div>

	</div>


@stop


@section('custom-scripts')

<script>
$(function(){
	$('body').on('change', '#permissionType', function(){
		var ptype = $(this).val();
		if(ptype == 0 && permissionName != ""){
			$.get('{{route('permissions.getAllParents')}}', function(res){
				$('#permissionParent').html(res);
			});
		}else{
			$('#permissionParent').html('');
		}
	});
	$('body').on('change', '#permissionTypeEdit', function(){
		var ptype = $(this).val();
		if(ptype == 0 && permissionName != ""){
			$.get('{{route('permissions.getAllParents')}}', function(res){
				$('#permissionParentEdit').html(res);
			});
		}else{
			$('#permissionParentEdit').html('');
		}
	});

	$('body').on('click', '.helpHint', function() {
			var helpHint = $(this).attr('helpHint');
			$('#helpHint').text(helpHint);
			$('.loader').show();
			$.post('{{route('permissions.help')}}', {helpHint:helpHint, '_token' : '{{csrf_token()}}'},function(res) {
					$('.loader').hide();
					$('#help_area').html(res);
			});
	});

});
</script>

@include('partials._saveFunc', ['btnID'=>'savePerm', 'formID'=>'registerForm_Permission', 'route'=>'permissions.store', 'routeWith'=>'permissions.refreshWith'])

@stop
