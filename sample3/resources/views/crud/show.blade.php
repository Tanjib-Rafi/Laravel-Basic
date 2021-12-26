<!DOCTYPE html>
<html>  
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
	<title></title>
	<style>
	body,html {
			margin: 0;
			padding: 0;
			height: 100%;
			background: #7abecc !important;
		}
	</style>
</head>
<body>
<a class="btn btn-success m-5"  href="{{ URL::to('insert') }}">Add Employee</a>
<div class="container-fluid text-center">
@if(Session::has('msg'))
    <div class="alert alert-danger" role="alert">
  <strong>{{ Session::get('msg') }} </strong>
</div>
@endif
		<h4 class="mb-5">All Employees Information</h4>
	<table class="table table-danger">
		<thead>
		  <tr>
		    <th scope="col">ID</th>
			<th scope="col">Name</th>
			<th scope="col">Email</th>
			<th scope="col">Salary</th>
			<th scope="col">Date of Birth</th>
			<th scope="col">Department</th>
			<th scope="col">Status</th>
			<th scope="col">Gender</th>
			<th scope="col">Action</th>
		  </tr>
		</thead>
		<tbody>
		@if ($employees)
			@foreach($employees as $e)
		<tr>

			<td>{{ $e->id }}</td>

			<td>{{ $e->name }}</td>

			<td>{{ $e->email }}</td>

			<td>{{ $e->salary }} BDT</td>

			<td>{{ $e->birthdate }}</td>

			<td>{{ $e->department }}</td>
			
			<!-- status -->
			@if ($e->status == '1')
				<td class="text-success">Active</td>
            @else  
				<td class="text-danger">Inactive</td>
            @endif
			<!-- status end -->

			<td>{{ $e->gender }}</td>

		<td>
			<a href="{{ URL:: to('edit/'.$e->id) }}" class="btn btn-warning">Edit</a>
			<!-- <a href="{{ URL:: to('delete/'.$e->id) }}" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Delete</a> -->
			<a  class="btn btn-danger" data-toggle="modal" data-target="#myModal{{ $e->id }}">Delete</a>
			<div class="modal" id="myModal{{ $e->id }}">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Delete Confirmation</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete <b>"{{ $e->name }}"</b>!</p>
                </div>
                <div class="modal-footer">
                    <a  href="{{ URL:: to('delete/'.$e->id) }}" class="btn btn-danger">Yes</a>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
		</td>

		</tr>
		    @endforeach
		@else
		<tr>
			<td colspan="3" class="text-center">No Records</td>
	    </tr>
	    @endif
	</tbody>
	  </table>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>