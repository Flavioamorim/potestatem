@if(Session::has('message-error'))
	<div class="alert alert-block alert-error">
		<button type="button" class="close" data-dismiss="alert">
			<i class="ace-icon fa fa-times"></i>
		</button>
		{{Session::get('message-error')}}
	</div>
@endif

@if(Session::has('message-ok'))
	<div class="alert alert-block alert-success">
		<button type="button" class="close" data-dismiss="alert">
			<i class="ace-icon fa fa-times"></i>
		</button>
		<i class="ace-icon fa fa-check green"></i>
		{{Session::get('message-ok')}}
	</div>
@endif

@if(Session::has('message'))
	<div class="alert alert-warning">
		{{Session::get('message')}}
	</div>
@endif
