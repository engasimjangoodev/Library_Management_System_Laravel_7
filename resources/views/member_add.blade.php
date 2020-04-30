@extends('layouts.template')
@section('content')
<span id="success_message"></span>
<form method="post" id="add_form" enctype="multipart/form-data">
	<div class="" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		 aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="">Add New Member</h5>
				</div>
				<div class="modal-body">

					<div class="form-group row">
						<label class="col-md-2 col-form-label">Member Name</label>
						<div class="col-md-10">
							<input type="text" name="name" id="name" class="form-control" placeholder="Member Name">
							<span id="name_error" class="text-danger"></span>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-2 col-form-label">phone</label>
						<div class="col-md-10">
							<input type="text" name="phone" id="phone" class="form-control" placeholder="phone">
							<span id="phone_error" class="text-danger"></span>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-2 col-form-label">Email</label>
						<div class="col-md-10">
							<input type="text" name="email" id="email" class="form-control" placeholder="email">
							<span id="email_error" class="text-danger"></span>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-2 col-form-label">User Name</label>
						<div class="col-md-10">
							<input type="text" name="username" id="username" class="form-control"
								   placeholder="username">
							<span id="username_error" class="text-danger"></span>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-md-2 col-form-label">password</label>
						<div class="col-md-10">
							<input type="password" name="password" id="password" class="form-control"  placeholder="Enter password">
							<span id="password_error" class="text-danger"></span>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-2 col-form-label">Confirm password</label>
						<div class="col-md-10">
							<input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Enter Confirm assword">
							<span id="confirm_password_error" class="text-danger"></span>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-2 col-form-label">Card ID</label>
						<div class="col-md-10">
							<input type="text" name="card_id" id="card_id" class="form-control" placeholder="Card ID">
							<span id="card_id_error" class="text-danger"></span>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-2">
							<label class="col-md-12 col-form-label">Address</label>
						</div>
						<div class="col-md-10">
							<input type="text" name="address" id="address" class="form-control" placeholder="address">
							<span id="address_error" class="text-danger"></span>
						</div>


					</div>
					<div class="form-group row">

						<div class="col-md-2"></div>

						<div class="col-md-3">
							<label class="col-md-12 col-form-label">Library</label>
							<select class="form-control" name="Library_id" id="Library_id">
							<option value="1"> Lahore Libarary of Science  </option>
							</select>
							<span id="Library_id_error" class="text-danger"></span>

						</div>
						<div class="col-md-7">
							<label class=" col-form-label">Profile Photo</label>

							<input type="file" name="profile_photo" class="form-control-file" id="profile_photo">
							<span id="profile_photo_error" class="text-danger"></span>
							<span id="profile_photo_load_error" class="text-danger"></span>
						</div>


					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" id="btn_save" class="btn btn-info">Save</button>
				</div>
			</div>
		</div>
	</div>
</form>
@stop
@section('script')
<script>
	$(document).ready(function () {
		$('#add_form').on('submit', function (e) {
			e.preventDefault();
			$.ajax({
				type: "POST",
				url: "<?php echo site_url('Member/save')?>",
				async: false,
				dataType: "JSON",
				data: new FormData(this),
				processData: false,
				contentType: false,
				cache: false,
				async: false,
				success: function (data) {

					if (data.error) {
						if (data.name_error != '') {
							$('#name_error').html(data.name_error);
						} else {
							$('#name_error').html('');
						}
						if (data.phone_error != '') {
							$('#phone_error').html(data.phone_error);
						} else {
							$('#phone_error').html('');
						}
						if (data.email_error != '') {
							$('#email_error').html(data.email_error);
						} else {
							$('#email_error').html('');
						}
						if (data.username_error != '') {
							$('#username_error').html(data.username_error);
						} else {
							$('#username_error').html('');
						}
						if (data.password_error != '') {
							$('#password_error').html(data.password_error);
						} else {
							$('#password_error').html('');
						}
						if (data.card_id_error != '') {
							$('#card_id_error').html(data.card_id_error);
						} else {
							$('#card_id_error').html('');
						}
						if (data.address_error != '') {
							$('#address_error').html(data.address_error);
						} else {
							$('#address_error').html('');
						}
						if (data.Library_id_error != '') {
							$('#Library_id_error').html(data.Library_id_error);
						} else {
							$('#Library_id_error').html('');
						}
						if (data.profile_photo_error != '') {
							$('#profile_photo_error').html(data.profile_photo_error);
						} else {
							$('#profile_photo_error').html('');
						}




					}
					if (data.success) {


						$('#success_message').html(data.success);

						$('#name_error').html("");
						$('#phone_error').html("");
						$('#email_error').html("");
						$('#username_error').html("");
						$('#password_error').html("");
						$('#card_id_error').html("");
						$('#address_error').html("");
						$('#Library_id_error').html("");
						$('#profile_photo_error').html("");


						$('[name="name"]').val("");
						$('[name="phone"]').val("");
						$('[name="email"]').val("");
						$('[name="username"]').val("");
						$('[name="password"]').val("");
						$('[name="card_id"]').val("");
						$('[name="address"]').val("");
						$('[name="Library"]').val("");
						$('[name="profile_photo"]').val("");
						$('[name="confirm_password"]').val("");


					}
					$('#contact').attr('disabled', false);
				}

			});
			return false;

		});
	})

</script>
@endsection
