
@extends('layouts.rentadmin')


@section('title','Admin Panel')

@section('styles')
<style>
	/* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 550px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
        
    /* On small screens, set height to 'auto' for the grid */
    @media screen and (max-width: 767px) {
      .row.content {height: auto;} 
    }
    </style>    
@endsection

@section('content')
<!-- for small screens  -->
<nav class="navbar navbar-default visible-xs">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Admin Panel</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav nav-tabs nav-stacked">
        <li class="active"><a href="#Overview" data-toggle="tab">Admin Panel</a></li>
        <li><a href="#addpayment" data-toggle="tab">Add a new Payment</a></li>
        <li><a href="#">Gender</a></li>
        <li><a href="#">Geo</a></li>
      </ul>
    </div>
  </div>
</nav>



<!-- side bar only for tablets and above size screen  3 of 12 grids taken for side bar-->
<div class="container-fluid">
  <div class="row content">
      <div class="col-sm-3 sidenav hidden-xs">
          <h2>Admin Panel</h2>
          <h5>Admin : {{Auth::user()->name}}</h5>
         <ul class="nav nav-tabs nav-stacked">
         <li class="active"><a href="#Overview" data-toggle="tab">OverView</a></li>
         <li><a href="#addpayment" data-toggle="tab">Add a new Payment</a></li>
         <li><a href="#section3">History</a></li>
         <li><a href="#section3">Electricity</a></li>
         </ul><br>
       </div>
    	<br>
    	<!-- end of side bar -->

		
    	<div class="col-sm-9">
			<!-- all other items will be present inside this grid -->
    			@if(session()->has('message'))
    				<div class="alert alert-success">
        				{{ Session::get('message') }}
	  	    		</div>
				@endif
    		<div class="well">
    			<h4>Admin Panel</h4>
    			<p>Helloo {{Auth::user()->name}}. Here U can add payments see the details of all users and more.</p>
    		</div>


			<div class="tab-content">
			<!--Contents of tab  -->

			<div id="Overview" class="tab-pane fade in active">
    		<div class="row">
			@if($usrs>0)	
    			<div class="table-responsive">
    				<h3 class="text-center">Latest Payments By all Users</h3><hr>
					<table class="table table-striped table-hover">
						<thead>
							<tr>
							<th>RoomNo</th>
							<th>Payment Month</th>
							<th>Rent</th>
							<th>Unit Now</th>
							<th>Difference</th>
							<th>Electricity cost</th>
							<th>Total Amount</th>
							<th>Advance</th>
							<th>Dues</th>
							<th>Final amount</th>
							<th>Paid to</th>
							<th>Paid at</th>
							</tr>
						</thead>
						<tbody>
						@for($i=1;$i<=$usrs;$i++)
							<tr>
							<td>{{$payment[$i]->RoomNo}}</td>							
							<td>{{$payment[$i]->rent_paid_upto}}</td>
							<td>{{$payment[$i]->rent}}</td>
							<td>{{$payment[$i]->eunit_now}}</td>
							<td>{{$payment[$i]->eunit_now - $payment[$i]->eunit_before}}</td>
							<td>{{$elec=($payment[$i]->eunit_now - $payment[$i]->eunit_before)*15}}</td>
							<td>{{$payment[$i]->rent + $elec}}</td>
							<td>{{$payment[$i]->advance}}</td>
							<td>{{$payment[$i]->due}}</td>
							<td>{{$payment[$i]->rent}}</td>
							<td>{{$payment[$i]->paid_to}}</td>
							<td>{{$payment[$i]->payment_done_at}}</td>			
							</tr>
						@endfor
						@else
							<div class="bg bg-info container-fluid ">
								<h2>There is no Payment done Yet!!!</h2>
								<p class="text text-danger">You can add payment from side bar on desktop or top menu on mobile</p>
							</div>
						@endif
						</tbody>
					</table>
				</div>
				<hr>
    		</div>
    		<div class="row">
    			<div class="col-sm-6">
    				<div class="table-responsive">
    					<h3>Current Room owners </h3>
    					<hr>
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th>Room1</th>
									<th>Room2</th>
									<th>Room3</th>
									<th>Room4</th>
								</tr>
							</thead>
							<tbody>								
								<tr>
									<td>{{$assign->Room1}}</td>
									<td>{{$assign->Room2}}</td>
									<td>{{$assign->Room3}}</td>
									<td>{{$assign->Room4}}</td>									
								</tr>
							</tbody>
						</table>
					</div>
    			</div>
    			<div class="col-sm-6">
    				<div class="table-responsive">
    					<h3>Current Rates</h3>
    					<hr>
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th>Room1</th>
									<th>Room2</th>
									<th>Room3</th>
									<th>Room4</th>
									<th>Electricity</th>
								</tr>
							</thead>
							<tbody>								
								<tr>
									<td>Nrs. {{$rates->Room1}}</td>
									<td>Nrs. {{$rates->Room2}}</td>
									<td>Nrs. {{$rates->Room3}}</td>
									<td>Nrs. {{$rates->Room4}}</td>									
									<td>Nrs. {{$rates->Electricity}}</td>									
								</tr>
							</tbody>
						</table>
					</div>
    			</div>
    		</div>
		</div>

        <div id="addpayment" class="tab-pane fade">
            <div class="row">
            	<div class="col-sm-9">
	           <form action="" method="POST" class="form">
	           		{{csrf_field()}}

	  				<div class="form-group">
	  				  <label for="roomno">RoomNo</label>
	  				  <input name="roomno" type="text" class="form-control" id="exampleInputEmail1" placeholder="Room number">
	  				</div>
	  				<div class="form-group">
    					<label for="Name">Name</label>
   						<select name ="name" class="form-control">
   						  <option>{{$assign->Room1}}</option>
   						  <option>{{$assign->Room2}}</option>
   						  <option>{{$assign->Room3}}</option>
   						</select>
  					</div>
  					<div class="form-group">
	  				  <label for="eprev">Previous Unit</label>
	  				  <input name="eprev" type="number" class="form-control" placeholder="previous electricity unit">
	  				</div>
	  				<div class="form-group">
	  				  <label for="enow">Present Unit</label>
	  				  <input name="enow" type="number" class="form-control" placeholder="previous electricity now">
	  				</div>
	  				<div class="form-group">
	  				  <label for="paidamount">Amount Paid</label>
	  				  <input name="paidamount" type="number" class="form-control" placeholder="paid amount">
	  				</div>
	  				<div class="form-group">
	  				  <label for="rent">Rent for this room</label>
	  				  <input name="rent" type="number" class="form-control" placeholder="paid amount">
	  				</div>
	  				<div class="form-group">
	  				  <label for="rent_paid_upto">Rent Paid Upto</label>
	  				  <input name="rent_paid_upto" type="text" class="form-control" placeholder="Rent kati mahina samma ko tireko">
	  				</div>
	  				<div class="form-group">
	  				  <label for="elec_paid_upto">Electricity Paid Upto</label>
	  				  <input name="elec_paid_upto" type="text" class="form-control" placeholder="Batti kati mahina samma ko tireko">
	  				</div>
	  				<div class="form-group">
	  				  <label for="paid_at">Paid At</label>
	  				  <input name="paid_at" type="text" class="form-control" placeholder="Paisa tireko date">
	  				</div>
	  				<div class="form-group">
	  				  <label for="rent_paid_to">Paid To </label>
	  				  <input name="rent_paid_to" type="text" class="form-control" placeholder="Paisa Liney manchey">
	  				</div>
	  				<button type="submit" class="btn btn-default">Submit</button>
				</form>
            </div>
        </div>
		</div>

		</div><!--end of tab contents -->
    		


    	</div><!--end of contents -->
	</div>
</div>


@endsection
