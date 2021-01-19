@extends('admin.layout.master2')
@section('title', 'Buying')
@section('content')
<!-- Main content -->
<!-- Theme JS files -->
	<script type="text/javascript" src="{{asset('public/admin/assets/js/plugins/editors/summernote/summernote.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('public/admin/assets/js/plugins/forms/styling/uniform.min.js')}}"></script>

	<script type="text/javascript" src="{{asset('public/admin/assets/js/core/app.js')}}"></script>
	<script type="text/javascript" src="{{asset('public/admin/assets/js/pages/editor_summernote.js')}}"></script>
	<div class="content">
	<!-- Summernote click to edit -->
		<div class="panel panel-flat">
			<div class="panel-heading">
							<h5 class="panel-title">Buying</h5>
							
			 </div>
			  @if (Session::has('message'))
		<center><div class="alert alert-info msg">{{ Session::get('message') }}</div></center>
	@endif
			<div class="panel-body">
				<div class="form-group">
					<!-- <button type="button" id="edit" class="btn btn-primary"><i class="icon-pencil3 position-left"></i> Edit</button> -->
					<button type="button" id="save" class="btn btn-success"><i class="icon-checkmark3 position-left"></i> Save</button>
				</div>

				<form id="form" action="{{url('admin/buying')}}" method="post">	
				<textarea name="buying" class="click2edit" rows="10" cols="80">
							{{$buying->buying}}
					</textarea>
						@csrf
				</form>
			</div>
		</div>
		</div>
	<!-- /summernote click to edit -->

<script>
$("#save").click(function() {
  $( "#form" ).submit();
})

</script>

<script>
 CKEDITOR.replace('edit');
 </script>
@endsection			