@extends('admin.layout.master2')
@section('title', 'View-Report')
@section('content')
<?php // echo $report;die(); ?>
<div class="content-wrapper">
	<!-- Page header -->
	<div class="page-header page-header-default">
		<div class="breadcrumb-line">
			<ul class="breadcrumb">
				<li><a href="{{url('admin/dashboard')}}"><i class="icon-home2 position-left"></i> Home</a></li>
				
				<li class="active">View Report</li>
			</ul>
		</div>
	</div>
	<!-- /page header -->
	<!-- Content area -->
	<div class="content">
		<!-- Horizontal form options -->
		<div class="panel panel-flat form-horizontal">
			<div class="col-lg-12">
				<div class="col-lg-6">
					<h1>Reported By</h1>

					<div class="panel-body">
						<div class="form-group">
							<label class="col-lg-3 control-label">Image:</label>
							
							<div class="col-lg-9">
								<img src="{{url('public/'.$report->reportBy->image)}}" name="image" class="file-styled" height="100px" width="100px">
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-3 control-label">Name:</label>
							<div class="col-lg-9">
								<input type="text"  name="name" value="{{$report->reportBy->name}}" class="form-control" readonly>
								
							</div>
						</div>
						
						@csrf
						<div class="form-group">
							<label class="col-lg-3 control-label">Email:</label>
							<div class="col-lg-9">
								<input type="text" name="email" value="{{$report->reportBy->email}}" class="form-control" readonly>
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-3 control-label">Gender:</label>
							<div class="col-lg-3	">
								<input type="text" name="gender" value="@if($report->reportBy->gender == 'm') {{'Male'}} @elseif($report->reportBy->gender == 'f') {{'Female'}} @else {{'Not available'}} @endif" class="form-control"  readonly>
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-3 control-label">Interests:</label>
							<div class="col-lg-3">
								<input type="text" name="Interests" value="{{$report->reportBy->interests}}" class="form-control"  readonly>
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-3 control-label">Phone:</label>
							<div class="col-lg-3">
								<input type="text" name="phone_number" value="{{$report->reportBy->phone_number}}" class="form-control"  readonly>
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-3 control-label">D.O.B:</label>
							<div class="col-lg-3">
								<input type="text"  name="dob"  class="form-control daterange-single"  value="@if(!empty($report->reportBy->dob)) {{date('m-d-Y', strtotime($report->reportBy->dob))}} @endif" readonly>
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-3 control-label">About:</label>
							<div class="col-lg-8">
								<textarea name="about" class="form-control" rows="5"  readonly>{{$report->reportBy->about}}</textarea>
							</div>
						</div>
						
					</div>
				</div>
				
				<div class="col-lg-6">
					<h1>Reported Against</h1>
					@if($report->post_type == 1)
					<div class="panel-body">
						
						<div class="form-group">
							<label class="col-lg-3 control-label">Created By:</label>
							<div class="col-lg-9">
								<input type="text"   value="{{$event->user->name}}" class="form-control" readonly>
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('name') }}</strong>
								</span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-3 control-label">Event Name:</label>
							<div class="col-lg-9">
								<input type="text"   value="{{$event->name}}" class="form-control" readonly>
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('name') }}</strong>
								</span>
							</div>
						</div>
						
						@csrf
						<div class="form-group">
							<label class="col-lg-3 control-label">Event Type:</label>
							<div class="col-lg-9">
								<input type="text"  value="@if($event->is_paid ==1) {{'Free'}} @else {{'Paid'}} @endif" class="form-control" readonly>
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-3 control-label">Category:</label>
							<div class="col-lg-3">
								<input type="text"  value="{{$event->interest}}" class="form-control"  readonly>
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-3 control-label">Start Date:</label>
							<div class="col-lg-3">
								<input type="text" value="{{$event->start_date_time}}" class="form-control"  readonly>
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-3 control-label">End Date:</label>
							<div class="col-lg-3">
								<input type="text"  value="{{$event->end_date_time}}" class="form-control"  readonly>
							</div>
						</div>
						@if($event->is_paid == 2)
						<div class="form-group">
							<label class="col-lg-3 control-label">Total Tickets:</label>
							<div class="col-lg-3">
								<input type="text"  value="{{$event->total_tickets}}" class="form-control"  readonly>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-lg-3 control-label">Sold Tickets:</label>
							<div class="col-lg-3">
								<input type="text"  value="{{$event->sold_ticket_count}}" class="form-control"  readonly>
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-3 control-label">Sold Tickets Price:</label>
							<div class="col-lg-3">
								<input type="text"  value="{{$event->toal_sold_ticket_price}}" class="form-control"  readonly>
							</div>
						</div>
						@endif
						
						<div class="form-group">
							<label class="col-lg-3 control-label">Address:</label>
							<div class="col-lg-9">
								<input type="text"  class="form-control daterange-single"  value="{{$event->address}}" readonly>
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-3 control-label">Description:</label>
							<div class="col-lg-8">
								<textarea  class="form-control" rows="8"  readonly>{{$event->description}}</textarea>
							</div>
						</div>
						
						@if($event->is_edited == 2)
						<!-- <span class="label label-default">  -->
						<div class="form-group">
							<label class="col-lg-3">Edit Request:</label>
							<div class="col-lg-3">
								<a href="{{url('admin/block-unblock'.'/'.$event->id)}}">
									<button type="button" class="btn btn-primary">
									@if($event->edit_request ==1) {{'Approve'}}  @else {{'Approved'}} @endif
									</button>
								</a>
							</div>
						</div>
						@endif
						@if($event->is_cancel == 2)
						<div class="form-group">
							<label class="col-lg-3">Cancel Request:</label>
							<div class="col-lg-3">
								<a href="{{url('admin/block-unblock'.'/'.$event->id)}}">
									<button type="button" class="btn btn-primary">
									@if($event->cancel_request ==1) {{'Approve'}}  @else {{'Approved'}} @endif
									</button>
								</a>
							</div>
						</div>
						@endif
					</div>
					
					@else		
					<div class="panel-body">
						
						<div class="form-group">
							<label class="col-lg-3 control-label">Created By:</label>
							<div class="col-lg-9">
								<input type="text"   value="{{$event->user->name}}" class="form-control" readonly>
							</div>
						</div>
						@if($event->type == 2)
						<div class="form-group">
							<label class="col-lg-3 control-label">Description:</label>
							<div class="col-lg-8">
								<textarea  class="form-control" rows="8"  readonly>{{$event->description}}</textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-3 control-label">Image:</label>
							<div class="col-lg-9">
								<img src="@if($event->image) {{url('public/'.$event->image)}} @else {{url('public/images/dummy-pic.png')}} @endif" name="image" class="file-styled" height="100px" width="100px">
								
							</div>
						</div>
						@else
						<div class="form-group">
							<label class="col-lg-3 control-label">Link:</label>
							<div class="col-lg-8">
								<input type="text"   value="{{$event->user->link}}" class="form-control" readonly>
							</div>
						</div>
						@endif
						<div class="form-group">
							<label class="col-lg-3 control-label">Created At:</label>
							<div class="col-lg-3">
								<input type="text" value="{{$event->created_at}}" class="form-control"  readonly>
							</div>
						</div>
					</div>
					@endif
					
				</div>
				
				
				
			</div>
		</div>
		
		<!-- <div class="panel-body">
			<h1>Reason</h1>
			<div class="form-group">
				<label class="col-lg-3 control-label">Reason Descriptions:</label>
				<div class="col-lg-5">
					<textarea class="form-control"  disabled="" rows="5" cols="0">{{$report->message}}</textarea>
					
				</div>
			</div>
		</div> -->
	</div>
	
	
	
	<!-- Footer -->
	@include('admin.layout.footer')
	<!-- /footer -->
</div>
<!-- /content area -->
</div>
<!-- Theme JS files -->
<script type="text/javascript" src="{{asset('public/admin/assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/admin/assets/js/plugins/forms/selects/select2.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/admin/assets/js/core/app.js')}}"></script>
<script type="text/javascript" src="{{asset('public/admin/assets/js/pages/datatables_basic.js')}}"></script>
<!-- /theme JS files -->
@endsection