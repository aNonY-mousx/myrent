@extends('layouts.rent')

@section('title', 'mYRent')

@section('content')
	@parent
<!--body content  i.e everything else in the body except navbar -->


<!-- jumbotron -->
<div class="jumbotron">
	<div class="container text-center">
	<h2><strong>Welcome</strong></h2>
	<p>To the website</p>
	</div>
</div>
<!-- end of jumbotron -->


<div class="container-fluid">

	<div class="sth">

		<br><br><br>
		<div class="row">
			<h1 class="text-center text-danger" style="color:#89949b"> <span class="glyphicon glyphicon-bullhorn"></span>  WELCOME TO THE RENTAL SERVICE   <span class="glyphicon glyphicon-bullhorn"></span></h1>
		</div>	
		<br><br>

		<div class="row">
	
			<div class="col-md-6" style="color:white">
				<hr>
				<h4 >
					where U can see all your payment info <span class="glyphicon glyphicon-info-sign"></span>	
				</h4>
				<p>Just login to your account via the credentials given to u and then access many features of this site .</p>
				<hr>
		 	</div>
		 	<div class= "col-md-6" style="color:white">
		 		<hr>
		 		<h4 >
		 			 aNd see Your rental details 
		 		</h4>
				<p>
					Yes. You can check your payment history from the day this system was implemented and enquire  <span class="glyphicon glyphicon-question-sign"></span>   with us 
				</p>
				<hr>
			</div>
	
			<br><br><br><br><br>
		</div>
	</div>

</div>
<!-- end of the body content -->

<!-- footer -->
<br><br>
<footer class="container-fluid">
	<div class="row">
		<div class="col-sm-4">
			<h3>Contact Us</h3>
			<hr>
			<form action="" id="feedbackform" method="post">
					<div class="form-group">
                    <label for="name" class="col-md-4">Email</label>
					<input type="email" name="feedbackemail" class="form-control">
					</div>
					<div class="form-group">
                    <label for="msg" class="col-md-4">Message</label>
					<textarea name="msg" id="" cols="20" rows="5" form="feedbackform" class="form-control"></textarea>
					</div>
					<div class="form-group">
					<button type="submit" class="btn btn-success">Send</button>
					</div>
			</form>
		</div>
	</div>
	<div class="text-center" style="background-color:#333333;padding: 25px">
  		<p style="color:white">Thank U for visiting the site. All rights reserved &#174</p>
  		<p style="color:white">copyRight &copy;</p>
  	</div>
</footer>
<!-- end of footer -->

@endsection


























