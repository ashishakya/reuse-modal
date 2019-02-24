<html>
<head>
	<title></title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUIyJ"
		  crossorigin="anonymous">
	<link rel="stylesheet" href="/css/app.css">

	<style>
		body {
			padding-left: 10px;
			padding-right: 10px;
		}
	</style>
</head>
<body>
<form action="{{ route('admin.reusables.index') }}">
	<input type="text" class="form-control" name="name" placeholder="Enter name">
	<br>
	<input type="submit" class="btn btn-success">
</form>

@isset($names)
	<table class="table">
		<thead>
		<tr>
			<td>#</td>
			<td>Name</td>
			<td>Action</td>
		</tr>
		</thead>
		@foreach($names as $name)
			<tr>
				<td>{{ $loop->iteration }}</td>
				<td>{{ $name->name }}</td>
				<td>
					<button
							class="edit-btn btn btn-primary"
							data-id="{{ $name->id }}"
							data-name="{{ $name->name }}"
							data-toggle="modal"
							data-target="#reusable-modal"
					>Edit
					</button>
					<button
							class="delete-btn btn btn-danger"
							data-id="{{ $name->id }}"
							data-name="{{ $name->name }}"
							data-toggle="modal"
							data-target="#reusable-modal"
					>Delete
					</button>
				</td>

			</tr>
		@endforeach
	</table>
@endisset

<div class="modal fade" id="reusable-modal" tabindex="-1" role="dialog" aria-labelledby="reusable-modal" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="edit-content">
					<div class="form-group row">
						<div class="col-sm-2">
							<label for="edit-modal-id">Id:</label>
						</div>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="modal-id" name="id" readonly>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-2">
							<label for="edit-modal-name">Name:</label>
						</div>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="modal-name" name="name"
								   placeholder="Enter some name"/>
							<span class="text-danger" id="edit-modal-error-name"></span>
						</div>
					</div>
				</div>

				<div class="delete-content">
					Are you sure you want to delete the record of <span class="name font-weight-bold"></span>.
					<input type="hidden" class="id">
				</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn action-btn"></button>
			</div>
		</div>
	</div>
</div>

<script src="/js/app.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</body>
</html>