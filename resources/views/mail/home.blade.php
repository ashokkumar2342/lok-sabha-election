<!DOCTYPE html>
<html>
<head>
	<title>Mail</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container"></br>
		<div class="row justify-content-center">
			<div class="col-md-10">
			<div class="card">
				<div class="card-header bg-primary text-white text-center">My Text Email</div>
				<div class="card-body text-center">
					<form action="{{ url('send/email') }} " method="post">

						{{ csrf_field() }}
						 
						<div class="form-group row"> 
							 <label for="Subject" class="col-sm-4 col-form-label text-md-right">Subject :</label>
							 <div class="col-md-6"> 
							<input id="subject" type="text" class="form-control"{{ $errors->has('subject')?'is-invalid':''}} name="subject" value="{{ old('subject') }}">	
							</div>
						</div>

						<div class="form-group row"> 
							 <label for="email" class="col-sm-4 col-form-label text-md-right">Email :</label>
							 <div class="col-md-6"> 
							<input id="email" type="email" class="form-control"{{ $errors->has('email')?'is-invalid':''}} name="email" value="{{ old('subject') }}">	
							</div>
						</div>
						<div class="form-group row"> 
							 <label for="email" class="col-sm-4 col-form-label text-md-right">Message :</label>
							 <div class="col-md-6"> 
							<textarea   class="form-control" name="message" cols="30" rows="5"></textarea>
							</div>
						</div>
						<div class="form-group row md-0">
							<div class="col-md-8 offset-md-4">
								<button type="submit" class="btn btn-success"> Send Email</button>
								
							</div>
							
						</div>
						
							

							
							
						</div>
						 
				    </form>
					
				</div>
					 
					
			 
				
			</div>
			
		</div>
		
	</div>
	<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>

</body>
</html>