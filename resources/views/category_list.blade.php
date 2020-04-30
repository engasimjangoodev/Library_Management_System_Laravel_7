@extends('layouts.template')

@section('content')
<div class="">
	<span id="success_message"></span>
	<h1>Category
		<small>List</small>

		<div class="float-right"><a href="javascript:void(0);" id="add_btn" class="btn btn-info"
									data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span>
				Add New</a></div>
	</h1>
	<table class="table table-striped table-responsive-md" id="mydata">
		<thead>
		<tr>
			<th>ID</th>
			<th>Category Name</th>
			<th>Book Num</th>
			<th style="text-align: right;">Actions</th>
		</tr>
		</thead>
		<tbody id="show_category_list">

		</tbody>
	</table>
</div>


<!-- MODAL ADD -->
<form>
	<div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		 aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="">Add New Category</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<div class="form-group row">
						<label class="col-md-2 col-form-label">Category Name</label>
						<div class="col-md-10">
							<input type="text" name="category_name" id="category_name" class="form-control"
								   placeholder="Book Category Name">
							<span id="category_name_error" class="text-danger"></span>
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
	<div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		 aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<input type="hidden" name="up_category_id" id="up_category_id" class="form-control" value="">

					<div class="form-group row">
						<label class="col-md-2 col-form-label">Category Name</label>
						<div class="col-md-10">
							<input type="text" name="Edit_category_name" id="Edit_category_name" class="form-control"
								   placeholder="Book Category Name">
							<span id="Edit_category_name_error" class="text-danger"></span>
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
	<div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		 aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<strong>Are you sure to delete this record?</strong>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="category_id_delete" id="category_id_delete" class="form-control">
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

		show_category_list();	//call function to show category list
		//Save category
		$('#btn_save').on('click', function () {
			var category_name = $('#category_name').val();


			$.ajax({
				type: "POST",
				url: "<?php echo site_url('Category/save')?>",
				async: false,
				dataType: "JSON",
				data: {category_name: category_name},
				success: function (data) {

					if (data.error) {
						if (data.category_name_error != '') {
							$('#category_name_error').html(data.category_name_error);
						} else {
							$('#category_name_error').html('');
						}
					}
					if (data.success) {
						$('#success_message').html(data.success);

						$('#category_name_error').html('');


						$('[name="category_name"]').val("");

						$('#Modal_Add').modal('hide');
						show_category_list();
					}
					$('#contact').attr('disabled', false);
				}


			});
			return false;
		});

		$('#mydata').dataTable();

		//function show all category
		function show_category_list() {
			$.ajax({
				type: 'ajax',
				url: "<?php echo site_url('Category/list_data')?>",
				async: false,
				dataType: 'json',
				success: function (data) {
					var html = '';
					var i;
					for (i = 0; i < data.length; i++) {
						html += '<tr>' +
							// '<td>'+data[i].id+'</td>'+

							'<td>' + data[i].id + '</td>' +
							'<td>' + data[i].name + '</td>' +
							'<td>' + data[i].num_books + '</td>' +
							'<td style="text-align:right;">' +
							'<a href="javascript:void(0);" class=" btn btn-info btn-sm category_edit" data-category_id="' + data[i].id + '" > <i class="fas fa-edit"></i> </a>' + ' ' +
							'<a href="javascript:void(0);" class=" btn btn-danger btn-sm  item_delete" data-category_id="' + data[i].id + '">   <i class="fas fa-trash"></i> </a>' +
							'</td>' +
							'</tr>';
					}
					$('#show_category_list').html(html);
				}

			});
		}

		//get data for update record
		$('#show_category_list').on('click', '.category_edit', function () {


			var category_id = $(this).data('category_id');
			$.ajax({
				type: "POST",
				url: "<?php echo site_url('Category/edit_List_by_id')?>",
				dataType: "JSON",
				data: {category_id: category_id},
				success: function (data) {
					$('[name="up_category_id"]').val(data.id);
					$('[name="Edit_category_name"]').val(data.name);

					$('#Modal_Edit').modal('show');
				}

			});
			return false;

		});

		//update record to database
		$('#btn_update').on('click', function () {
			var up_category_id = $('#up_category_id').val();
			var Edit_category_name = $('#Edit_category_name').val();


			$.ajax({
				type: "POST",
				url: "<?php echo site_url('Category/update')?>",
				dataType: "JSON",
				data: {up_category_id: up_category_id, Edit_category_name: Edit_category_name},
				success: function (data) {
					if (data.error) {
						if (data.Edit_category_name_error != '') {
							$('#Edit_category_name_error').html(data.Edit_category_name_error);
						} else {
							$('#Edit_category_name_error').html('');
						}

						$('#Modal_Edit').modal('show');

					} else {
						$('#success_message').html(data.success);

						$('#Edit_category_name_error').html('');


						$('[name="Edit_category_name"]').val("");

						$('#Modal_Edit').modal('hide');
						show_category_list();
					}
				}
			});
			return false;
		});


		//get data for delete record
		$('#show_category_list').on('click', '.item_delete', function () {
			var category_id = $(this).data('category_id');

			$('#Modal_Delete').modal('show');
			$('[name="category_id_delete"]').val(category_id);
		});

		//delete record to database
		$('#btn_delete').on('click', function () {
			var category_id = $('#category_id_delete').val();
			$.ajax({
				type: "POST",
				url: "<?php echo site_url('Category/delete')?>",
				dataType: "JSON",
				data: {category_id: category_id},
				success: function (data) {
					$('[name="category_id_delete"]').val("");
					$('#Modal_Delete').modal('hide');
					show_category_list();
				}
			});
			return false;
		});


	});

</script>
@endsection
