<style>

.brighttheme-notice{
	background-color: {{lapp()->header_color}};
	color: #fff;
	cursor: pointer;
	title : 'Click To Dismiss this Alert!'
}

h4{
	color: {{lapp()->header_color != '#fff' ? '#000' : '#fff'}}
}

</style>

<script src="{{url('assets/js/jquery.min.js')}}"></script>
<script src="{{url('js/pnotify.custom.min.js')}}"></script>

<script>




</script>

<script src="{{URL('BACKEND/select2/dist/js/select2.min.js')}}"></script>
<script src="{{URL('BACKEND/editableSelect/editableSelect.js')}}"></script>

<script type="text/javascript">
  $(function(){

  });
</script>

<script src="{{url('assets/plugins/moment/moment.js')}}"></script>
<script src="{{url('assets/plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
<script src="{{url('assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{url('assets/plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

<script>
$(function(){
	$('#datePurchase').datepicker({
		autoclose: true,
		todayHighlight: true
	});
	$('#fromTime, #uptoTime').timepicker({
		minuteStep : 15
	});
});
</script>

<script type="text/javascript" src="{{url('BACKEND/sweetalert/dist/sweetalert.min.js')}}"></script>

<script src="{{url('assets/plugins/switchery/switchery.min.js')}}"></script>

			<!-- Datatables -->
<script src="{{url('BACKEND/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{url('BACKEND/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{url('BACKEND/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{url('BACKEND/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
<script src="https://cdn.datatables.net/buttons/1.0.3/js/buttons.colVis.js"></script>
<script src="{{url('BACKEND/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
<script src="{{url('BACKEND/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{url('BACKEND/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{url('BACKEND/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
<script src="{{url('BACKEND/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
<script src="{{url('BACKEND/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{url('BACKEND/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
<script src="{{url('BACKEND/vendors/datatables.net-scroller/js/datatables.scroller.min.js')}}"></script>


<script>
$(function(){

	@if(lapp()->data_tools == 'enable')

	$('#datatable').dataTable({
		responsive: true,
		dom: 'Bfrtip',
        buttons: [
            'print', 'colvis', 'pdf', 'excel'

        ]
	});


	@else
		$('#datatable').dataTable({
			responsive: true
		});
	@endif
});
</script>


<script src="{{url('BACKEND/bf/src/bootstrap-filestyle.js')}}"></script>
<script src="{{url('assets/js/bootstrap.min.js')}}"></script>
<script src="{{url('assets/js/detect.js')}}"></script>
<script src="{{url('assets/js/fastclick.js')}}"></script>
<script src="{{url('assets/js/jquery.blockUI.js')}}"></script>
<script src="{{url('assets/js/waves.js')}}"></script>
<script src="{{url('assets/js/wow.min.js')}}"></script>
<script src="{{url('assets/js/jquery.nicescroll.js')}}"></script>
<script src="{{url('assets/js/jquery.scrollTo.min.js')}}"></script>




<!-- Custom main Js -->
<script src="{{url('assets/js/jquery.core.js')}}"></script>
<script src="{{url('assets/js/jquery.app.js')}}"></script>
