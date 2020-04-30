@extends('layouts.template')
@section('content')
<div class=" " id="contaner">
	<div class="">
		<span id="success_message"></span>
		<h1>Issued Books
			<small>List</small>

			<div class="float-right"><a href="javascript:void(0);"  id="add_btn" class="btn btn-info" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Add New</a></div>
		</h1>
		<table class="table table-striped" id="mydata">
			<thead>
			<tr>
				<th>ID</th>
				<th>Title</th>
				<th>Member Name</th>
				<th>Staff_Name</th>
				<th>Status</th>
				<th>Borrow Date</th>
				<th>Due Date</th>
				<th style="text-align: right;">Actions</th>
			</tr>
			</thead>
			<tbody id="1show_data">

			</tbody>
		</table>
	</div>
</div>
<!-- MODAL ADD -->
<form>
	<div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
						<label class="col-md-2 col-form-label">Book Title</label>
						<div class="col-md-10">
							<input type="text" name="title" id="title" class="form-control" placeholder="Book Title">
							<span id="title_error" class="text-danger"></span>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-2 col-form-label">Subject</label>
						<div class="col-md-10">
							<input type="text" name="subject" id="subject" class="form-control" placeholder="subject">
							<span id="subject_error" class="text-danger"></span>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-md-2 col-form-label"># Coypies</label>
						<div class="col-md-10">
							<input type="text" name="number_of_coypies" id="number_of_coypies" class="form-control" placeholder="Enter Number of Coypies">
							<span id="number_of_coypies_error" class="text-danger"></span>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-2 col-form-label">Price</label>
						<div class="col-md-10">
							<input type="text" name="price" id="price" class="form-control" placeholder="Price">
							<span id="price_error" class="text-danger"></span>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-2"></div>
						<div class="col-md-3">
							<label class="col-md-12 col-form-label">Supplier</label>
							<select name="Supplier_id"  class="form-control" id="Supplier_id">

							</select>
							<span id="Supplier_id_error" class="text-danger"></span>
						</div>


						<div class="col-md-3">
							<label class="col-md-12 col-form-label">Publisher</label>
							<select class="form-control" name="Publisher_id" id="Publisher_id">
							</select>
							<span id="Publisher_id_error" class="text-danger"></span>
						</div>


						<div class="col-md-3">
							<label class="col-md-12 col-form-label">Staff</label>
							<select class="form-control" name="Staff_id" id="Staff_id">
							</select>
							<span id="Staff_id_error" class="text-danger"></span>
						</div>

					</div>
					<div class="form-group row">
						<label class="col-md-2 col-form-label">Book Cover Image </label>
						<div class="col-md-10">
							<input type="file" name="cover_file" class="form-control-file" id="cover_file">
							<span id="cover_file_error" class="text-danger"></span>
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" type="submit" id="btn_save" class="btn btn-info">Save</button>
				</div>
			</div>
		</div>
	</div>
</form>
<!--END MODAL ADD-->

<!-- MODAL EDIT -->
<form>
	<div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit Book</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<input type="hidden" name="up_book_id" id="up_book_id" class="form-control" value="">

					<div class="form-group row">
						<label class="col-md-2 col-form-label">Book Title</label>
						<div class="col-md-10">
							<input type="text" name="Edit_title" id="Edit_title" class="form-control" placeholder="Book Title">
							<span id="Edit_title_error" class="text-danger"></span>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-2 col-form-label">Subject</label>
						<div class="col-md-10">
							<input type="text" name="Edit_subject" id="Edit_subject" class="form-control" placeholder="subject">
							<span id="Edit_subject_error" class="text-danger"></span>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-md-2 col-form-label"># Coypies</label>
						<div class="col-md-10">
							<input type="text" name="Edit_number_of_coypies" id="Edit_number_of_coypies" class="form-control" placeholder="Enter Number of Coypies">
							<span id="Edit_number_of_coypies_error" class="text-danger"></span>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-2 col-form-label">Price</label>
						<div class="col-md-10">
							<input type="text" name="Edit_price" id="Edit_price" class="form-control" placeholder="Price">
							<span id="Edit_price_error" class="text-danger"></span>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-2"></div>
						<div class="col-md-3">
							<label class="col-md-12 col-form-label">Supplier ID</label>
							<select name="Edit_Supplier_id"  class="form-control" id="Edit_Supplier_id">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
							</select>
							<span id="Edit_Supplier_id_error" class="text-danger"></span>
						</div>


						<div class="col-md-3">
							<label class="col-md-12 col-form-label">Publisher ID</label>
							<select class="form-control" name="Edit_Publisher_id" id="Edit_Publisher_id">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
							</select>
							<span id="Edit_Publisher_id_error" class="text-danger"></span>
						</div>


						<div class="col-md-3">
							<label class="col-md-12 col-form-label">Staff ID</label>
							<select class="form-control" name="Edit_Staff_id" id="Edit_Staff_id">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
							</select>
							<span id="Edit_Staff_id_error" class="text-danger"></span>
						</div>

					</div>
					<div class="form-group row">
						<label class="col-md-2 col-form-label">Book Cover Image </label>
						<div class="col-md-10">
							<input type="file" name="Edit_cover_file" class="form-control-file" id="Edit_cover_file">
							<span id="cover_file_error" class="text-danger"></span>
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" type="submit" id="btn_update" class="btn btn-info">Update</button>
				</div>
			</div>
		</div>
	</div>
</form>
<!--END MODAL EDIT-->

<!--MODAL DELETE-->
<form>
	<div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Delete Book</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<strong>Are you sure to delete this record?</strong>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="book_id_delete" id="book_id_delete" class="form-control">
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

	$(document).ready(function(){

		show_issue_book();	//call function show all product
		//Save product
		$('#btn_save').on('click',function() {



			$.ajax({
				type: "POST",
				url  : "<?php echo site_url('Book/save')?>",
				async : false,
				dataType: "JSON",

				success: function (data) {

					if (data.error) {
						if (data.title_error != '') {
							$('#title_error').html(data.title_error);
						} else {
							$('#title_error').html('');
						}
						if (data.subject_error != '') {
							$('#subject_error').html(data.subject_error);
						} else {
							$('#subject_error').html('');
						}
						if (data.price_error != '') {
							$('#price_error').html(data.price_error);
						}
						else {
							$('#price_error').html('');
						}
						if (data.number_of_coypies_error != '') {
							$('#number_of_coypies_error').html(data.number_of_coypies_error);
						} else {
							$('#number_of_coypies_error').html('');
						}
						if (data.Supplier_id_error != '') {
							$('#Supplier_id_error').html(data.Supplier_id_error);
						} else {
							$('#Supplier_id_error').html('');
						}
						if (data.Publisher_id_error != '') {
							$('#Publisher_id_error').html(data.Publisher_id_error);
						} else {
							$('#Publisher_id_error').html('');
						}
						if (data.Staff_id_error != '') {
							$('#Staff_id_error').html(data.Staff_id_error);
						} else {
							$('#Staff_id_error').html('');
						}

					}
					if (data.success) {
						$('#success_message').html(data.success);

						$('#number_of_coypies_error').html('');
						$('#Publisher_id_error').html('');
						$('#title_error').html('');
						$('#price_error').html('');
						$('#subject_error').html('');
						$('#Staff_id_error').html('');
						$('#Supplier_id_error').html('');


						$('[name="number_of_coypies"]').val("");
						$('[name="Publisher_id"]').val("");
						$('[name="title"]').val("");
						$('[name="subject"]').val("");
						$('[name="Staff_id"]').val("");
						$('[name="Supplier_id"]').val("");
						$('[name="price"]').val("");


						$('#Modal_Add').modal('hide');
						show_product();
					}
					$('#contact').attr('disabled', false);
				}


			});
			return false;
		});

		$('#mydata').dataTable();

		//function show all product
		function show_issue_book(){
			$.ajax({
				type  : 'ajax',
				url  : "<?php echo site_url('Book_Issue/show_issue_book')?>",
				async : false,
				dataType : 'json',
				success : function(data){
					var html = '';
					var i;
					for(i=0; i<data.length; i++){
						html += '<tr>'+
							// '<td>'+data[i].id+'</td>'+

							'<td>'+data[i].id+'</td>'+
							'<td>'+data[i].title+'</td>'+
							'<td>'+data[i].Member_name+'</td>'+
							'<td>'+data[i].Staff_name+'</td>'+
							'<td>'+data[i].status+'</td>'+
							'<td>'+data[i].date_borrow+'</td>'+
							'<td>'+data[i].Due_Date+'</td>'+
							'<td style="text-align:right;">'+
							'<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-book_id="'+data[i].id+'" > <i class="fas fa-edit"></i></a>'+' '+
							'<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-book_id="'+data[i].id+'"> <i class="fas fa-trash"></i></a>'+
							'</td>'+
							'</tr>';
					}
					$('#1show_data').html(html);
				}

			});
		}

		//get data for update record
		$('#show_data').on('click','.item_edit',function(){
			// var book_id = 3;

			var book_id = $(this).data('book_id');
			$.ajax({
				type: "POST",
				url  : "<?php echo site_url('Book/book_list_id')?>",
				dataType : "JSON",
				data : {book_id:book_id},
				success: function(data){
					$('[name="Edit_number_of_coypies"]').val('');
					$('[name="Edit_Publisher_id"]').val('');
					$('[name="Edit_title"]').val('');
					$('[name="Edit_subject"]').val('');
					$('[name="Edit_Staff_id"]').val('');
					$('[name="Edit_Supplier_id"]').val('');
					$('[name="Edit_price"]').val('');
					$('[name="up_book_id"]').val('');


					$('[name="up_book_id"]').val(data.id);
					$('[name="Edit_number_of_coypies"]').val(data.number_of_coypies);
					$('[name="Edit_Publisher_id"]').val(data.Publisher_id);
					$('[name="Edit_title"]').val(data.title);
					$('[name="Edit_subject"]').val(data.subject);
					$('[name="Edit_Staff_id"]').val(data.Staff_id);
					$('[name="Edit_Supplier_id"]').val(data.Supplier_id);
					$('[name="Edit_price"]').val(data.price);
					$('#Modal_Edit').modal('show');
				}

			});
			return false;

		});

		//update record to database
		$('#btn_update').on('click',function(){
			var Edit_number_of_coypies = $('#Edit_number_of_coypies').val();
			var Edit_Publisher_id = $('#Edit_Publisher_id').val();
			var Edit_title        = $('#Edit_title').val();
			var Edit_subject      = $('#Edit_subject').val();
			var Edit_Staff_id     = $('#Edit_Staff_id').val();
			var Edit_Supplier_id  = $('#Edit_Supplier_id').val();
			var Edit_price        = $('#Edit_price').val();
			var book_id 		  = $('[name="up_book_id"]').val();

			$.ajax({
				type : "POST",
				url  : "<?php echo site_url('Book/update')?>",
				dataType : "JSON",
				data : {Edit_number_of_coypies:Edit_number_of_coypies , Edit_Publisher_id:Edit_Publisher_id, Edit_title:Edit_title ,
					Edit_Supplier_id:Edit_Supplier_id ,Edit_subject:Edit_subject,Edit_Staff_id:Edit_Staff_id,Edit_price:Edit_price ,book_id:book_id},
				success: function(data)
				{
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

						$('#Modal_Edit').modal('show');

					}else
					{
						$('#success_message').html(data.success);

						$('#Edit_number_of_coypies_error').html('');
						$('#Edit_Publisher_id_error').html('');
						$('#Edit_title_error').html('');
						$('#Edit_price_error').html('');
						$('#Edit_subject_error').html('');
						$('#Edit_Staff_id_error').html('');
						$('#Edit_Supplier_id_error').html('');


						$('[name="Edit_number_of_coypies"]').val("");
						$('[name="Edit_Publisher_id"]').val("");
						$('[name="Edit_title"]').val("");
						$('[name="Edit_subject"]').val("");
						$('[name="Edit_Staff_id"]').val("");
						$('[name="Edit_Supplier_id"]').val("");
						$('[name="Edit_price"]').val("");

						$('#Modal_Edit').modal('hide');
						show_product();
					}
				}
			});
			return false;
		});



		//get data for delete record
		$('#show_data').on('click','.item_delete',function(){
			var book_id = $(this).data('book_id');

			$('#Modal_Delete').modal('show');
			$('[name="book_id_delete"]').val(book_id);
		});

		//delete record to database
		$('#btn_delete').on('click',function(){
			var book_id = $('#book_id_delete').val();
			$.ajax({
				type : "POST",
				url  : "<?php echo site_url('Book/delete')?>",
				dataType : "JSON",
				data : {book_id:book_id},
				success: function(data){
					$('[name="book_id_delete"]').val("");
					$('#Modal_Delete').modal('hide');
					show_product();
				}
			});
			return false;
		});


		//load dropdown list in add model from database
		$('#add_btn').on('click',function(){
			var book_id = $('#book_id_delete').val();
			$.ajax({
				type : "POST",
				url  : "<?php echo site_url('Book/get_supplier')?>",
				dataType : "JSON",
				success: function(data){


					var Supplier_html = '';
					var Publisher_html = '';
					var Staff_html = '';

					// loop length controller
					var supplier_len = data.supplier.length;
					var Publisher_len = data.Publisher.length;
					var Staff_len = data.Staff.length;


					for (var i = 0; i < supplier_len; i++) {
						Supplier_html += '<option value=' + data.supplier[i].id + '>' + data.supplier[i].name + '</option>';
					}
					$('#Supplier_id').html(Supplier_html);


					for (var i = 0; i < Publisher_len; i++) {
						Publisher_html += '<option value=' + data.Publisher[i].id + '>' + data.Publisher[i].name + '</option>';
					}
					$('#Publisher_id').html(Publisher_html);


					for (var i = 0; i < Staff_len; i++) {
						Staff_html += '<option value=' + data.Staff[i].id + '>' + data.Staff[i].name + '</option>';
					}
					$('#Staff_id').html(Staff_html);




					$('#Modal_Add').modal('show');

				}
			});
			return false;
		});

	});

</script>
@endsection
