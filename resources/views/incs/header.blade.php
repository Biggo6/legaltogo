
<link href="{{URL('css/pnotify.custom.min.css')}}" rel="stylesheet">


<link href="{{url('BACKEND/ve/css/validationEngine.jquery.css')}}" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="{{url('BACKEND/sweetalert/dist/sweetalert.css')}}">

<link href="{{url('assets/plugins/jquery-circliful/css/jquery.circliful.css')}}" rel="stylesheet" type="text/css" />

<link href="{{url('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{url('assets/css/core.css')}}" rel="stylesheet" type="text/css" />
<link href="{{url('assets/css/components.css')}}" rel="stylesheet" type="text/css" />
<link href="{{url('assets/css/icons.css')}}" rel="stylesheet" type="text/css" />
<link href="{{url('assets/css/pages.css')}}" rel="stylesheet" type="text/css" />
<link href="{{url('assets/css/menu.css')}}" rel="stylesheet" type="text/css" />
<link href="{{url('assets/css/responsive.css')}}" rel="stylesheet" type="text/css" />
<link href="{{url('assets/plugins/timepicker/bootstrap-timepicker.min.css')}}" rel="stylesheet">
<link href="{{url('assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}" rel="stylesheet">
<link href="{{url('assets/plugins/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
<link href="{{url('assets/plugins/switchery/switchery.min.css')}}" rel="stylesheet" />
<link href="{{url('assets/plugins/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}" rel="stylesheet">


<!-- Datatables -->
<link href="{{URL('BACKEND/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{URL('BACKEND/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{URL('BACKEND/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{URL('BACKEND/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{URL('BACKEND/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">

<!-- Select2 -->
<link href="{{URL('BACKEND/select2/dist/css/select2.min.css')}}" rel="stylesheet">
<link href="{{URL('BACKEND/editableSelect/editableSelect.css')}}" rel="stylesheet">






 <style type="text/css">
	#topnav .topbar-main {
		background-color: {{lapp()->header_color}}; //#0c6d40;
	}
	.day {
		cursor: pointer;
		padding: 2px;
		background-color:#0c6d40;
		color: white;
	}

	[v-cloak] { 
		display:none;
		
	}
	


	.myinput.large{
		height:22px;
		width: 22px;
	}

	.myinput.large[type="checkbox"]:before{
		width: 20px;
		height: 20px;
	}
	.myinput.large[type="checkbox"]:after{
		top: -20px;
		width: 16px;
		height: 16px;
	}


	@media ( max-width: 585px ) {
		.input-group span.input-group-btn,.input-group input,.input-group button{
			display: block;
			width: 100%;
			border-radius: 0;
			margin: 0;
		}
		.input-group {
			position: relative;   
		}
		.input-group span.data-up{
			position: absolute;
			top: 0;
		}
		.input-group span.data-dwn{
			position: absolute;
			bottom: 0;
		}
		.form-control.text-center {
			margin: 34px 0;
		}
		.input-group-btn:last-child>.btn, .input-group-btn:last-child>.btn-group{
			margin-left:0;
		}

	}


</style>

