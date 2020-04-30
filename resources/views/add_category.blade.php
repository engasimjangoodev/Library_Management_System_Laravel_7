@extends('layouts.template')
@section('content')
<form>
	<div class="" id="" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		 aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<span id="success_message"></span>
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
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Reset</button>
					<button type="button" type="submit" id="btn_save" class="btn btn-info">Save</button>
				</div>
			</div>
		</div>
	</div>
</form>

<form>
	<div class="modal fade" id="List_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		 aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" style="color: #4fbd4f" t>New Category Added Successfully </h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<table class="table table-striped table-responsive-md" id="mydata">
						<thead>
						<tr>
							<th>ID</th>
							<th>Category Name</th>
							<th>Book Num</th>

						</tr>
						</thead>
						<tbody id="show_category_list">

						</tbody>
					</table>

				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

				</div>
			</div>
		</div>
	</div>
</form>



@stop
@section('script')


<script>
	$(document).ready(function () {

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
							'</td>' +
							'</tr>';
					}
					$('#show_category_list').html(html);
				}

			});
		}

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

						$('#List_Modal').modal('show');
						show_category_list();
					}
					$('#contact').attr('disabled', false);
				}


			});
			return false;
		});






	}	);
</script>
@endsection
