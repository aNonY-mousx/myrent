@extends('layouts.rent')

@section('title','Dashboard')

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
      <a class="navbar-brand" href="#">DashBoard</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Dashboard</a></li>
        <li><a href="#">Age</a></li>
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
          <h2>Dashboard</h2>
         <ul class="nav nav-pills nav-stacked">
         <li class="active"><a href="#section1">Dashboard</a></li>
         <li><a href="#section2">Rent</a></li>
         <li><a href="#section3">History</a></li>
         <li><a href="#section3">Electricity</a></li>
         </ul><br>
       </div>
    	<br>
		

  		<div class="col-sm-9">


  			<div class="well">
  				<h1>Dashboard</h1>
  				<p class="text-success">Welcome to the dashboard. Here U can check Your payment informations and more.</p>
  			</div>
			
			<div class="row">
				<div class="table-responsive">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
							<th>Payment Month</th>
							<th>Rent</th>
							<th>Last Unit</th>
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
						@foreach($payments as $payment)
							<tr>
							<td>{{$payment->rent_paid_upto}}</td>
							<td>{{$payment->rent}}</td>
							<td>{{$payment->eunit_before}}</td>
							<td>{{$payment->eunit_now}}</td>
							<td>{{$payment->eunit_now - $payment->eunit_before}}</td>
							<td>{{$elec=($payment->eunit_now - $payment->eunit_before)*15}}</td>
							<td>{{$payment->rent + $elec}}</td>
							<td>{{$payment->advance}}</td>
							<td>{{$payment->due}}</td>
							<td>{{$payment->rent}}</td>
							<td>{{$payment->paid_to}}</td>
							<td>{{$payment->payment_done_at}}</td>
		
							</tr>
		
						@endforeach
						</tbody>
					</table>
				</div>
			</div>
			<br><br>
			<div class="row">
				<div class="col-sm-4">
					<h5>Electricity</h5>
					<div class="table-responsive">
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th>Month</th>
									<th>Unit</th>
									<th>Rate</th>
									<th>Cost</th>
								</tr>
							</thead>
							<tbody>
								@foreach($payments as $payment)
									<tr>
										<td>{{$payment->rent_paid_upto}}</td>
										<td>{{$unit=$payment->eunit_now - $payment->eunit_before}}</td>
										<td>Rs.15/unit</td>
										<td>{{$unit*15}}</td>

									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>

		</div>
 	 </div>
</div>
@endsection