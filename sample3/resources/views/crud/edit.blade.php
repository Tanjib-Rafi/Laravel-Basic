<!DOCTYPE html>
<html>  
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
	<title>Login</title>
	<style>
		body,
		html {
			margin: 0;
			padding: 0;
			height: 100%;
			background: #7abecc !important;
		}
		.user_card {
			width: 450px;
			margin-top: auto;
			margin-bottom: auto;
			background: #74cfbf;
			position: relative;
			display: flex;
			justify-content: center;
			flex-direction: column;
			padding: 10px;
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			-webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			-moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			border-radius: 5px;

		}

		.form_container {
			margin-top: 20px;
		}

		#form-title{
			color: #fff;
		}
		.login_btn {
			width: 100%;
			background: orchid !important;
			color: white !important;
		}
		.login_btn:focus {
			box-shadow: none !important;
			outline: 0px !important;
		}
		.login_container {
			padding: 0 2rem;
		}
		.input-group-text {
			background: #f7ba5b !important;
			color: white !important;
			border: 0 !important;
			border-radius: 0.25rem 0 0 0.25rem !important;
            height:40px;
		}
		.input_user,
		.input_pass:focus {
			box-shadow: none !important;
			outline: 0px !important;
		}
	</style>
</head>
<body>
	<div class="container h-200">
        @if(Session::has('msg'))
    <div class="alert alert-success" role="alert">
  <strong>{{ Session::get('msg') }} </strong>
</div>
@endif
		<div class="d-flex justify-content-center h-100 mt-5">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<h3 id="form-title">REGISTER ACCOUNT</h3>
				</div>
				<div class="d-flex justify-content-center form_container" autocomplete="off">
					<form method="post" action="{{ URL::to('update/'.$employees->id )}}">
                    {{ csrf_field() }}
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
                            <input type="text" name="name" placeholder="username" value ="{{$employees->name }}" size="30">
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-envelope-square"></i></span>
							</div>
							<input type="text" name="email" placeholder="email" value ="{{$employees->email }}" size="30">
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="text" name="salary" placeholder="salary" value ="{{$employees->salary }}" size="30">
						</div>
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-calendar-week"></i></span>
                            </div>
                            <input type="date" name="birthdate" placeholder="" value ="{{$employees->birthdate }}">
                        </div>

                        <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="input-group-append" style="margin-right: 40px;">
                            <span class="input-group-text"><i class="fas fa-asterisk"></i></span>
             <select class="form-control"  name="department" value ="{{$employees->department}}">
                <label for="">SELECT DEPARTMENT</label>
                <option selected>SELECT DEPARTMENT</option>
                <option value="CSE" {{ ($employees->department == 'CSE')? 'selected' : ''}}> Computer Science & Engineering</option>
                <option value="ME" {{ ($employees->department == 'ME')? 'selected' : ''}}>Mechanical Engineering</option>
                <option value="CE" {{ ($employees->department == 'CE')? 'selected' : ''}}>Civil Engineering</option>
            </select>
        </div>
    </div>
    </div>


                        <div class="input-group mb-2">
                            <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
                            </div>  
                            <div class="mt-2">
                            <div class="form-check-inline">
                            <div class="form-group">
                  <input class="form-check-input" type="radio" name="gender" id="" value="Male" {{ ($employees->gender== 'Male')? 'checked' : '' }}>
                  <label class="form-check-label" for="">
                      Male
                  </label>

                    <input class="form-check-input" type="radio" name="gender" id=""  value="Female"{{ ($employees->gender== 'Female')? 'checked' : '' }}>
                    <label class="form-check-label" for="">
                        Female
                    </label>

                 <input class="form-check-input" type="radio" name="gender" id="" value="other"{{ ($employees->gender== 'other')? 'checked' : '' }}>
                  <label class="form-check-label" for="">
                     other

          </div>
</div>
                                </div>
                        </div>  
                        <div class="form-group">
           <div class="form-check">
                <input class="form-check-input" type="checkbox" name="status" value="1" {{ ($employees->status == '1')? 'checked' : '' }} id="" >
                <label class="form-check-label" for="">
                      Active
                </label>
            </div>
        </div>

				   		<div class="d-flex justify-content-center mt-3 login_container">
				 			<input class="btn login_btn" type="submit" value="Update Account">
                            <a class="btn btn-warning" href="{{ URL::to('show') }}">Back</a>
				   		</div>
					</form>
				</div>
			</div>
		</div>
	</div>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    </body>
</html>