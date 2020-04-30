@extends('layouts.template')
@section('contact')

<div class="">
	<span id="success_message"></span>
	<!--	<span id="cover_file_load_error"></span>-->

	<h1>Members
		<small>List</small>

		<div class="float-right"><a href="javascript:void(0);" id="add_btn" class="btn btn-info"
									data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span>
				Add New</a></div>
	</h1>
	<table class="table table-striped col-md-11 table-responsive-md" id="mydata">
	<thead>
	<tr>
		<th>Profile</th>
		<th>Member</th>
		<th>User</th>
		<th>Join</th>
		<th>Phone</th>
		<th>Address</th>
		<th style="text-align: right;">Actions</th>
	</tr>
	</thead>
	<tbody id="show_data">

	</tbody>
	</table>
</div>


<!-- MODAL ADD -->
<!--END MODAL ADD-->
<form method="post" id="add_form1" enctype="multipart/form-data">

	<div class="modal fade" id="Modal_Add"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"

aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="">Add New Book</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
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




<!-- MODAL EDIT -->
<form method="post" id="edit_form" enctype="multipart/form-data">
	<div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		 aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit Member</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<input type="hidden" name="up_member_id" id="up_member_id" class="form-control" value="">

					<div class="form-group row">
						<label class="col-md-2 col-form-label">member Title</label>
						<div class="col-md-10">
							<input type="text" name="Edit_title" id="Edit_title" class="form-control"
								   placeholder="member Title">
							<span id="Edit_title_error" class="text-danger"></span>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-md-2 col-form-label">Subject</label>
						<div class="col-md-10">
							<input type="text" name="Edit_subject" id="Edit_subject" class="form-control"
								   placeholder="subject">
							<span id="Edit_subject_error" class="text-danger"></span>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-2 col-form-label">ISBN</label>
						<div class="col-md-10">
							<input type="text" name="Edit_ISBN" id="Edit_ISBN" class="form-control"
								   placeholder="ISBN">
							<span id="Edit_ISBN_error" class="text-danger"></span>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-md-2 col-form-label"># Coypies</label>
						<div class="col-md-10">
							<input type="text" name="Edit_number_of_coypies" id="Edit_number_of_coypies"
								   class="form-control" placeholder="Enter Number of Coypies">
							<span id="Edit_number_of_coypies_error" class="text-danger"></span>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-2 col-form-label">Price</label>
						<div class="col-md-10">
							<input type="text" name="Edit_price" id="Edit_price" class="form-control"
								   placeholder="Price">
							<span id="Edit_price_error" class="text-danger"></span>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-2"></div>
						<div class="col-md-3">
							<label class="col-md-12 col-form-label">Supplier ID</label>
							<select name="Edit_Supplier_id" class="form-control" id="Edit_Supplier_id">

							</select>
							<span id="Edit_Supplier_id_error" class="text-danger"></span>
						</div>


						<div class="col-md-3">
							<label class="col-md-12 col-form-label">Publisher ID</label>
							<select class="form-control" name="Edit_Publisher_id" id="Edit_Publisher_id">

							</select>
							<span id="Edit_Publisher_id_error" class="text-danger"></span>
						</div>


						<div class="col-md-3">
							<label class="col-md-12 col-form-label">Staff ID</label>
							<select class="form-control" name="Edit_Staff_id" id="Edit_Staff_id">

							</select>
							<span id="Edit_Staff_id_error" class="text-danger"></span>
						</div>

					</div>
					<div class="form-group row">

						<div class="col-md-2"></div>

						<div class="col-md-3">
							<label class="col-md-12 col-form-label">Category</label>
							<select class="form-control" name="Edit_category_id" id="Edit_category_id">
							</select>
							<span id="Edit_category_id_error" class="text-danger"></span>
						</div>
						<div class="col-md-3">
							<div name="Edit_cover_file_div"></div>


						</div>
						<div class="col-md-3">
							<label class=" col-form-label">Change Cover Image</label>
							<input type="file"  name="Edit_cover_file" class="form-control-file" id="Edit_cover_file">
							<span id="Edit_cover_file_error" class="text-danger"></span>
							<span id="Edit_cover_file_load_error" class="text-danger"></span>


						</div>

					</div>


				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" id="btn_update" class="btn btn-info">Update</button>
				</div>
			</div>
		</div>
	</div>
</form>
<!--END MODAL EDIT-->

<!--MODAL DELETE-->
<form>
	<div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		 aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Delete member</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<strong>Are you sure to delete this record?</strong>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="member_id_delete" id="member_id_delete" class="form-control">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
					<button type="button" type="submit" id="btn_delete" class="btn btn-info">Yes</button>
				</div>
			</div>
		</div>
	</div>
</form>
<!--END MODAL DELETE-->
@stop
@section('script')
<script>
	$(document).ready(function () {

		show_product();	//call function show all members
		//Save members
		$('#add_form1').on('submit', function (e) {
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
							$('#Modal_Add').modal('hide');

					}
					$('#contact').attr('disabled', false);
				}

			});
			return false;

		});


		$('#mydata').dataTable();

		//function show all product
		function show_product() {
			$.ajax({
				type: 'ajax',
				url: "<?php echo site_url('member/member_data')?>",
				async: false,
				dataType: 'json',
				success: function (data) {
					var html = '';
					var i;

					for (i = 0; i < data.length; i++) {
//<th>Profile</th>
//		<th>Member</th>
//		<th>email</th>
//		<th>create_time</th>
//		<th>phone</th>
//		<th>Library_id</th>
//		<th>address</th>
						//class="img-thumbnail"
						html += '<tr>'
							+ '<td><img style="width: 80px;  height: 76px;"  class="sm" src="http://' + window.location.host +
							'/Library_Management_System_Codeigniter3/assets/images/Members/' + data[i].profile_photo +
							'" alt=" No Cover "></td>' +
							'<td><small>ID: </small>' + data[i].id + '<br><small>Name: </small>' + data[i].name + '<br><span><small>Email: </small>' + data[i].email + '</span></td> ' +

							'<td>' + data[i].username + '</td>' +
							'<td>' + data[i].create_time + '</td>' +
							'<td>' + data[i].phone + '</td>' +
							'<td>' + data[i].address + '</td>' +


							'<td style="text-align:right;">' +
							'<a href="javascript:void(0);" class=" btn btn-info btn-sm item_edit" data-member_id="' + data[i].id + '" > <i class="fas fa-edit"></i> </a>' + ' ' +
							'<a href="javascript:void(0);" class=" btn btn-danger btn-sm  item_delete" data-member_id="' + data[i].id + '">   <i class="fas fa-trash"></i> </a>' +
							'</td>' +
							'</tr>';
					}

					$('#show_data').html(html);


				}
				///<th>ID</th>
				//			<th>member</th>
				//			<th>ISBN</th>
				//			<th>Category</th>
				//			<th>Price</th>
				//			<th>Qty.</th>
				//			<th>Staff_Name</th>
			})
			;
		}

		//get data for update record
		$('#show_data').on('click', '.item_edit', function () {
			// var member_id = 3;
			var member_id = $(this).data('member_id');
			$.ajax({
				type: "POST",
				url: "<?php echo site_url('Member/members_list_id')?>",
				dataType: "JSON",
				data: {members_id: members_id},
				success: function (data) {
					$('[name="Edit_number_of_coypies"]').val('');
					$('[name="Edit_Publisher_id"]').val('');
					$('[name="Edit_title"]').val('');
					$('[name="Edit_subject"]').val('');
					$('[name="Edit_Staff_id"]').val('');
					$('[name="Edit_Supplier_id"]').val('');
					$('[name="Edit_price"]').val('');
					$('[name="up_members_id"]').val('');
					$('[name="Edit_ISBN"]').val('');

					load_dropdown_for_edit(data.Supplier_id, data.Staff_id, data.Publisher_id, data.Category_id);


					$('[name="up_members_id"]').val(data.id);
					$('[name="Edit_number_of_coypies"]').val(data.number_of_coypies);
					// $('[name="Edit_Publisher_id"]').val(data.Publisher_id);
					$('[name="Edit_title"]').val(data.title);
					$('[name="Edit_subject"]').val(data.subject);
					// $('[name="Edit_Staff_id"]').val(data.Staff_id);
					// $('[name="Edit_Supplier_id"]').val(data.Supplier_id);
					$('[name="Edit_price"]').val(data.price);
					$('[name="Edit_ISBN"]').val(data.ISBN);

					$('[name="Edit_cover_file_div"]').html('<img style="width: 120px"  src="http://' + window.location.host +
						'/Library_Management_System_Codeigniter3/assets/images/Members/' + data.cover_img +
						'" alt=" No file is Exists in DB ">');
					// if (data.cover_img) {
					// 	$('[name="Edit_cover_file"]').val(data.cover_img);
					//
					// }
				}

			});
			return false;

		});

		//update record to database
		$('#edit_form').on('submit', function () {


			$.ajax({
				type: "POST",
				url: "<?php echo site_url('Member/update')?>",
				async: false,
				dataType: "JSON",
				data: new FormData(this),
				processData: false,
				contentType: false,
				cache: false,
				success: function (data) {
					if (data.error) {
						if (data.Edit_title_error != '') {
							$('#Edit_title_error').html(data.Edit_title_error);
						} else {
							$('#Edit_title_error').html('');
						}
						if (data.Edit_subject_error != '') {
							$('#Edit_subject_error').html(data.Edit_subject_error);
						} else {
							$('#Edit_subject_error').html('');
						}
						if (data.Edit_price_error != '') {
							$('#Edit_price_error').html(data.Edit_price_error);
						} else {
							$('#Edit_price_error').html('');
						}
						if (data.Edit_number_of_coypies_error != '') {
							$('#Edit_number_of_coypies_error').html(data.Edit_number_of_coypies_error);
						} else {
							$('#Edit_number_of_coypies_error').html('');
						}
						if (data.Edit_Supplier_id_error != '') {
							$('#Edit_Supplier_id_error').html(data.Edit_Supplier_id_error);
						} else {
							$('#Edit_Supplier_id_error').html('');
						}
						if (data.Edit_Publisher_id_error != '') {
							$('#Edit_Publisher_id_error').html(data.Edit_Publisher_id_error);
						} else {
							$('#Edit_Publisher_id_error').html('');
						}
						if (data.Edit_Staff_id_error != '') {
							$('#Edit_Staff_id_error').html(data.Edit_Staff_id_error);
						} else {
							$('#Edit_Staff_id_error').html('');

						}
						if (data.Edit_cover_file_error != '') {
							$('#Edit_cover_file_error').html(data.Edit_cover_file_error);
						} else {
							$('#Edit_cover_file_error').html('');

						}
						if (data.Edit_ISBN_error != '') {
							$('#Edit_ISBN_error').html(data.Edit_ISBN_error);
						} else {
							$('#Edit_ISBN_error').html('');

						}if (data.Edit_cover_file_load_error != '') {
							$('#Edit_cover_file_load_error').html(data.Edit_cover_file_load_error);
						} else {
							$('#Edit_cover_file_load_error').html('');

						}

						$('#Modal_Edit').modal('show');

					} else {
						$('#success_message').html(data.success);

						$('#Edit_number_of_coypies_error').html('');
						$('#Edit_Publisher_id_error').html('');
						$('#Edit_title_error').html('');
						$('#Edit_price_error').html('');
						$('#Edit_subject_error').html('');
						$('#Edit_Staff_id_error').html('');
						$('#Edit_ISBN_error').html('');
						$('#Edit_Supplier_id_error').html('');
						$('#Edit_cover_file_error').html('');
						$('#Edit_cover_file_load_error').html('');


						$('[name="Edit_number_of_coypies"]').val("");
						$('[name="Edit_Publisher_id"]').val("");
						$('[name="Edit_title"]').val("");
						$('[name="Edit_subject"]').val("");
						$('[name="Edit_Staff_id"]').val("");
						$('[name="Edit_Supplier_id"]').val("");
						$('[name="Edit_price"]').val("");
						$('[name="Edit_cover_file"]').val("");

						$('#Modal_Edit').modal('hide');
						show_product();
					}
				}
			});
			return false;
		});


		//get data for delete record
		$('#show_data').on('click', '.item_delete', function () {
			var member_id = $(this).data('member_id');

			$('#Modal_Delete').modal('show');
			$('[name="member_id_delete"]').val(member_id);
		});

		//delete record to database
		$('#btn_delete').on('click', function () {
			var member_id = $('#member_id_delete').val();
			$.ajax({
				type: "POST",
				url: "<?php echo site_url('member/delete')?>",
				dataType: "JSON",
				data: {member_id: member_id},
				success: function (data) {
					$('[name="member_id_delete"]').val("");
					$('#Modal_Delete').modal('hide');
					show_product();
				}
			});
			return false;
		});

		//load dropdown list in add model from database
		$('#add_btn').on('click', function () {
			// var member_id = $('#member_id').val();
			$.ajax({
				type: "POST",
				url: "<?php echo site_url('Member/get_Library')?>",
				dataType: "JSON",
				success: function (data) {
					var Library_html = '<option value="" selected></option>';

					// loop length controller
					var lib_len = data.Library.length;

					for (var i = 0; i < lib_len; i++) {
						Library_html += '<option value=' + data.Library[i].id + '>' + data.Library[i].name + '</option>';
					}
					$('#Library_id').html(Library_html);

					$('#Modal_Add').modal('show');

				}
			});
			return false;
		});

		//load dropdown list in Edit model from database
		function load_dropdown_for_edit(Supplier_id, Staff_id, Publisher_id, Category_id) {
			// var member_id = $('#member_id').val();
			$.ajax({
					type: "POST",
					url: "<?php echo site_url('member/get_supplier')?>",
					dataType: "JSON",
					// data:{member_id:member_id},
					success: function (data) {


						var Supplier_html = '';
						var Publisher_html = '';
						var Staff_html = '';
						var category_html = '';

						// loop length controller
						var supplier_len = data.supplier.length;
						var Publisher_len = data.Publisher.length;
						var Staff_len = data.Staff.length;
						var Category_len = data.Category.length;

						for (var i = 0; i < supplier_len; i++) {
							if (data.supplier[i].id == Supplier_id) {
								Supplier_html += '<option value=' + data.supplier[i].id + ' selected>' + data.supplier[i].name + '</option>';

							} else
								Supplier_html += '<option value=' + data.supplier[i].id + '>' + data.supplier[i].name + '</option>';

						}
						$('#Edit_Supplier_id').html(Supplier_html);


						for (var i = 0; i < Publisher_len; i++) {
							if (data.Publisher[i].id == Publisher_id) {
								Publisher_html += '<option value=' + data.Publisher[i].id + ' selected >' + data.Publisher[i].name + '</option>';
							} else
								Publisher_html += '<option value=' + data.Publisher[i].id + '>' + data.Publisher[i].name + '</option>';
						}
						$('#Edit_Publisher_id').html(Publisher_html);


						for (var i = 0; i < Staff_len; i++) {
							if (data.Staff[i].id == Staff_id) {
								Staff_html += '<option value=' + data.Staff[i].id + ' selected >' + data.Staff[i].name + '</option>';
							} else
								Staff_html += '<option value=' + data.Staff[i].id + '>' + data.Staff[i].name + '</option>';
						}
						$('#Edit_Staff_id').html(Staff_html);


						for (var i = 0; i < Category_len; i++) {
							if (data.Category[i].id == Category_id) {
								category_html += '<option value=' + data.Category[i].id + ' selected >' + data.Category[i].name + '</option>';
							} else
								category_html += '<option value=' + data.Category[i].id + '>' + data.Category[i].name + '</option>';
						}
						$('#Edit_category_id').html(category_html);


						$('#Modal_Edit').modal('show');

					}
				}
			);
			return false;
		}


	});


</script>
@endsection
