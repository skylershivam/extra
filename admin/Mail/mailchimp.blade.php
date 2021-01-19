@extends('admin.layout.master2')
@section('title', 'Mail')

@section('content')

<h2 class="text-center">Send MailChimp</h2>

<div class="container">


@if (Session::has('message'))
		<center><div class="alert alert-info msg">{{ Session::get('message') }}</div></center>
	@endif


@if ($message = Session::get('error'))

<div class="alert alert-danger alert-block">

	<button type="button" class="close" data-dismiss="alert">×</button>	

        <strong>{{ $message }}</strong>

</div>

@endif


	<div class="row">

		<div class="col-md-5">

			<div class="well">

	             

	              <div>
                <form action="{{url('admin/manageMailChimp')}}" class="subscriber" enctype="multipart/form-data" method="post">

	              	<h3 class="text-center">Subscribe Your Email</h3>
                  
                   @csrf
                    <input type="email"  name="email"  class="form-control" >
	                  <br/>

	                 <div class="text-center">

	                 	<button class="btn btn-info btn-lg" type="submit">Subscribe</button>
                    </form>
	                 </div>

	              </div>
                


                
								
											
											
							         
								
	             

	    	 </div>

		</div>

		<div class="col-md-7">

			<div class="well well-sm">


          <fieldset>

            <legend class="text-center">Send Campaign</legend>


    

            <!-- Name input-->

            <div class="form-group">

              <label class="col-md-3 control-label" for="name">Subject</label>

              <div class="col-md-9">

                <input id="name" name="subject" type="text" placeholder="Your Subject" class="form-control">

              </div>

            </div>


    

            <!-- Email input-->

            <div class="form-group">

              <label class="col-md-3 control-label" for="email">To</label>

              <div class="col-md-9">

                <input id="email" name="to_email" type="text" placeholder="To " class="form-control">

              </div>

            </div>


            <!-- From Email input-->

            <div class="form-group">

              <label class="col-md-3 control-label" for="email">From</label>

              <div class="col-md-9">

                <input id="email" name="from_email" type="text" placeholder="From " class="form-control">

              </div>

            </div>


    

            <!-- Message body -->

            <div class="form-group">

              <label class="col-md-3 control-label" for="message">Your message</label>

              <div class="col-md-9">

                <textarea class="form-control" id="message" name="message" placeholder="Please enter your message here..." rows="5"></textarea>

              </div>

            </div>


    

            <!-- Form actions -->

            <div class="form-group">

              <div class="col-md-12 text-right">

                <button type="submit" class="btn btn-primary btn-lg">Send Campaign</button>

              </div>

            </div>

          </fieldset>


        </div>

		</div>

	</div>

</div>

@endsection