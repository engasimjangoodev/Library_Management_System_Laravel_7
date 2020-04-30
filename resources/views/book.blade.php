@extends('layouts.template')
@section('content')
    <div class="">
        <span id="success_message"></span>
        <!--	<span id="cover_img_load_error"></span>-->

        <h1>Books
            <small>List</small>

            <div class="float-right"><a href="javascript:void(0);" id="add_btn" class="btn btn-info"
                                        data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span>
                    Add New</a></div>
        </h1>
        <table class="table table-striped col-md-11 table-responsive-md" id="mydata">
            <thead>
            <tr>
                <th>Cover</th>
                <th>Book</th>
                <th>ISBN</th>
                <th>Category</th>
                <th>Price</th>
                <th>Qty.</th>
                <th>Staff_Name</th>
                <th style="text-align: right;">Actions</th>
            </tr>
            </thead>
            <tbody id="show_data">

            </tbody>
        </table>
    </div>


    <!-- MODAL ADD -->
    <form method="post" id="add_form" enctype="multipart/form-data">
        <div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            {{ csrf_field() }}

            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="">Add New Book</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{--                        {{    @csrf }}--}}
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Title</label>
                            <div class="col-md-10">
                                <input type="text" name="title" id="title" class="form-control"
                                       placeholder="title">
                                <span id="title_error" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Subject</label>
                            <div class="col-md-10">
                                <input type="text" name="subject" id="subject" class="form-control"
                                       placeholder="subject">
                                <span id="subject_error" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">ISBN</label>
                            <div class="col-md-10">
                                <input type="text" name="ISBN" id="ISBN" class="form-control" placeholder="ISBN">
                                <span id="ISBN_error" class="text-danger"></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Quantity</label>
                            <div class="col-md-10">
                                <input type="number" name="number_of_coypies" id="number_of_coypies"
                                       class="form-control"
                                       placeholder="Enter Number of Coypies">
                                <span id="number_of_coypies_error" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Price</label>
                            <div class="col-md-10">
                                <input type="number" name="price" id="price" class="form-control" placeholder="Price">
                                <span id="price_error" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2"></div>
                            <div class="col-md-3">
                                <label class="col-md-12 col-form-label">Supplier</label>
                                <select name="Supplier_id" class="form-control" id="Supplier_id">

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

                            <div class="col-md-2"></div>

                            <div class="col-md-3">
                                <label class="col-md-12 col-form-label">Category</label>
                                <select class="form-control" name="category_id" id="category_id">
                                </select>
                                <span id="category_id_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-3">
                                <label class=" col-form-label">Cover Image</label>

                                <input type="file" name="cover_img" class="form-control-file" id="cover_img"
                                       accept="image/*">
                                <span id="cover_img_error" class="text-danger"></span>


                            </div>
                            <div class="col-md-3">
                                <img id="image_preview_container" src=""
                                     alt="" style="max-height: 120px; max-width: 180px;">
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
    <!--END MODAL ADD-->

    <!-- MODAL EDIT -->
    <form method="post" id="edit_form" enctype="multipart/form-data">
        <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
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
                                <input type="text" name="Edit_title" id="Edit_title" class="form-control"
                                       placeholder="Book Title">
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
                                <input type="number" name="Edit_number_of_coypies" id="Edit_number_of_coypies"
                                       class="form-control" placeholder="Enter Number of Coypies">
                                <span id="Edit_number_of_coypies_error" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Price</label>
                            <div class="col-md-10">
                                <input type="number" name="Edit_price" id="Edit_price" class="form-control"
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
                                <img id="Edit_image_preview_container" src=""
                                     alt="" style="max-height: 120px; max-width: 180px;">
                            </div>
                            {{--                            <div class="col-md-3">--}}
                            {{--                                <div name="Edit_cover_img_div"></div>--}}


                            {{--                            </div>--}}
                            <div class="col-md-3">
                                <label class=" col-form-label">Change Cover Image</label>
                                <input type="file" name="Edit_cover_img" class="form-control-file"
                                       id="Edit_cover_img" accept="image/*">
                                <input type="hidden" name="Edit_cover_img_hidden" class="form-control-file"
                                       id="Edit_cover_img_hidden" value="">


                                <span id="Edit_cover_img_error" class="text-danger"></span>


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

        $(document).ready(function () {
            //remove error message on chenge of field for Add Model
            $('#title').change(function () {
                $('#title_error').html('');
            });
            $('#price').change(function () {
                $('#price_error').html('');
            });
            $('#subject').change(function () {
                $('#subject_error').html('');
            });
            $('#ISBN').change(function () {
                $('#ISBN_error').html('');
            });
            $('#number_of_coypies').change(function () {
                $('#number_of_coypies_error').html('');
            });
            $('#Supplier_id').change(function () {
                $('#Supplier_id_error').html('');
            });
            $('#Publisher_id').change(function () {
                $('#Publisher_id_error').html('');
            });
            $('#Staff_id').change(function () {
                $('#Staff_id_error').html('');
            });
            $('#category_id').change(function () {
                $('#category_id_error').html('');
            });
            $('#cover_img').change(function () {
                $('#cover_img_error').html('');
            });


            //remove error message on chenge of field for Edit Model
            $('#Edit_title').change(function () {
                $('#Edit_title_error').html('');
            });
            $('#Edit_price').change(function () {
                $('#Edit_price_error').html('');
            });
            $('#Edit_subject').change(function () {
                $('#Edit_subject_error').html('');
            });
            $('#Edit_ISBN').change(function () {
                $('#Edit_ISBN_error').html('');
            });
            $('#Edit_number_of_coypies').change(function () {
                $('#Edit_number_of_coypies_error').html('');
            });
            $('#Edit_Supplier_id').change(function () {
                $('#Edit_Supplier_id_error').html('');
            });
            $('#Edit_Publisher_id').change(function () {
                $('#Edit_Publisher_id_error').html('');
            });
            $('#Edit_Staff_id').change(function () {
                $('#Edit_Staff_id_error').html('');
            });
            $('#Edit_category_id').change(function () {
                $('#Edit_category_id_error').html('');
            });
            $('#Edit_cover_img').change(function () {
                $('#Edit_cover_img_error').html('');
            });


            $('#Edit_cover_img').change(function () {
                //if user click on brows image and leave and cancel the browsing
                if ($('#Edit_cover_img')[0].files.length === 0) {
                    //we set the old image to preview section
                    $('#Edit_cover_img_error').html('Please Select an Image file.')
                    $('#Edit_image_preview_container').attr('src', 'assets/Images/Books/'+$('#Edit_cover_img_hidden').val());
                } else {
                    //flage null when new image is loaded
                    $('#Edit_cover_img_hidden').val('');

                    $('#Edit_cover_img_error').html('');
                    let reader = new FileReader();

                    reader.onload = (e) => {

                        $('#Edit_image_preview_container').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(this.files[0]);
                }
            });

            $('#cover_img').change(function () {
                if ($('#cover_img')[0].files.length === 0) {
                    $('#image_preview_container').attr('src', '');
                } else {
                    $('#cover_img_error').html('');
                    let reader = new FileReader();

                    reader.onload = (e) => {

                        $('#image_preview_container').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(this.files[0]);
                }
            });


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            load_books();	//call function show all books
            //Save books
            $('#add_form').on('submit', function (e) {
                e.preventDefault();

                var cover_img = $('#cover_img').val();
                // var cover_img = $('#cover_img').prop('files')[0];
                // var form_data = new FormData();
                // form_data.append('file', cover_img);
                $.ajax({
                        cache: false,
                        contentType: false,
                        processData: false,
                        url: " {{route('create')}}",
                        method: "post",
                        // data: {
                        //     title: title, price: price, ISBN: ISBN, Staff_id: Staff_id,
                        //     Supplier_id: Supplier_id, Publisher_id: Publisher_id,
                        //     category_id: category_id, subject: subject, number_of_coypies: number_of_coypies,
                        //     cover_img: cover_img
                        // },
                        // data: $('#add_form').serialize(),
                        data: new FormData(this),

                        beforeSend: (function () {
                            $('#title_error').html('');
                            $('#subject_error').html('');
                            $('#price_error').html('');
                            $('#ISBN_error').html('');
                            $('#Publisher_id_error').html('');
                            $('#Staff_id_error').html('');
                            $('#Supplier_id_error').html('');
                            $('#number_of_coypies_error').html('');
                            $('#category_id_error').html('');
                            $('#cover_img_error').html('');

                        }),

                        success: function (data) {

                            $('#title').val('');
                            $('#subject').val('');
                            $('#price').val('');
                            $('#ISBN').val('');
                            $('#Publisher_id').val('');
                            $('#Staff_id').val('');
                            $('#Supplier_id').val('');
                            $('#number_of_coypies').val('');
                            $('#category_id').val('');
                            $('#cover_img').val('');
                            $('#image_preview_container').attr('src', '');

                            $('#success_message').html(data.message);

                            $('#Modal_Add').modal('hide');
                            load_books();	//call function show all books

                        }
                        ,
                        error: function (data) {
                            if (data.status === 422) {
                                var errors = $.parseJSON(data.responseText);
                                $.each(errors, function (key, value) {
                                    // $('#category_id_error').show().append(value + "<br/>"); //this is my div with messages
                                    if ($.isPlainObject(value)) {
                                        $.each(value, function (key, value) {

                                            if (key == 'category_id') {
                                                $('#category_id_error').html(value);
                                            }
                                            if (key == 'title') {
                                                $('#title_error').html(value);
                                            }
                                            if (key == 'price') {
                                                $('#price_error').html(value);
                                            }
                                            if (key == 'Staff_id') {
                                                $('#Staff_id_error').html(value);
                                            }
                                            if (key == 'Publisher_id') {
                                                $('#Publisher_id_error').html(value);
                                            }
                                            if (key == 'subject') {
                                                $('#subject_error').html(value);
                                            }
                                            if (key == 'Supplier_id') {
                                                $('#Supplier_id_error').html(value);
                                            }
                                            if (key == 'number_of_coypies') {
                                                $('#number_of_coypies_error').html(value);
                                            }
                                            if (key == 'category_id') {
                                                $('#category_id_error').html(value);
                                            }
                                            if (key == 'cover_img') {
                                                $('#cover_img_error').html(value);
                                            }
                                            if (key == 'ISBN') {
                                                $('#ISBN_error').html(value);
                                            }
                                            // $('#category_id_error').show().append(value + "<br/>");
                                        });

                                    }

                                });
                            }

                        }

                    }
                );
            })
            // $('#mydata').dataTable();

            //function show all product
            function load_books() {
                $.ajax({
                    type: 'get',
                    url: "{{ route('load_books_ajax_call') }}",
                    async: true,
                    dataType: 'json',
                    success: function (data) {
                        var html = '';
                        var i;

                        for (i = 0; i < data.length; i++) {

                            //class="img-thumbnail"
                            html += '<tr>'
                                + '<td><img style="width: 80px;  height: 76px;"  class="sm" src="assets/Images/Books/' + data[i].cover_img +
                                '" alt=" No Cover "></td>' +
                                '<td>' + data[i].id + '<br>' + data[i].title + '<br><span><strong>Subject: </strong>' + data[i].subject + '</span><br> ' +
                                '<span><strong> Supplier: </strong>' + data[i].Supplier_id + '</span></td>' +
                                '<td>' + data[i].ISBN + '</td>' +
                                '<td>' + data[i].Category_id + '</td>' +
                                '<td>' + data[i].price + '</td>' +
                                '<td>' + data[i].number_of_coypies + '</td>' +
                                '<td>' + data[i].Staff_id + '</td>' +
                                '<td style="text-align:right;">' +
                                '<a href="javascript:void(0);" class=" btn btn-info btn-sm item_edit" data-book_id="' + data[i].id + '" > <i class="fas fa-edit"></i> </a>' + ' ' +
                                '<a href="javascript:void(0);" class=" btn btn-danger btn-sm  item_delete" data-book_id="' + data[i].id + '">   <i class="fas fa-trash"></i> </a>' +
                                '</td>' +
                                '</tr>';
                        }

                        $('#show_data').html(html);
                    }
                    ///<th>ID</th>
                    //			<th>Book</th>
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
                // var book_id = 3;

                var book_id = $(this).data('book_id');
                $.ajax({
                    type: "Post",
                    url: "{{route('book_edit')}}",
                    dataType: "JSON",
                    data: {book_id: book_id},
                    success: function (data) {
                        $('[name="Edit_number_of_coypies"]').val('');
                        $('[name="Edit_Publisher_id"]').val('');
                        $('[name="Edit_title"]').val('');
                        $('[name="Edit_subject"]').val('');
                        $('[name="Edit_Staff_id"]').val('');
                        $('[name="Edit_Supplier_id"]').val('');
                        $('[name="Edit_price"]').val('');
                        $('[name="up_book_id"]').val('');
                        $('[name="Edit_ISBN"]').val('');

                        load_dropdown_for_edit(data.Supplier_id, data.Staff_id, data.Publisher_id, data.Category_id);

                        $('[name="up_book_id"]').val(data.id);
                        $('[name="Edit_number_of_coypies"]').val(data.number_of_coypies);
                        $('[name="Edit_title"]').val(data.title);
                        $('[name="Edit_subject"]').val(data.subject);
                        $('[name="Edit_price"]').val(data.price);
                        $('[name="Edit_ISBN"]').val(data.ISBN);

                        $('#Edit_image_preview_container').attr('src', 'assets/Images/Books/' + data.cover_img);


                        if (data.cover_img) {
                            $("#Edit_cover_img_hidden").val(data.cover_img);

                        }
                    }

                });
                return false;

            });

            //update record to database
            $('#edit_form').on('submit', function (e) {

                e.preventDefault();
                $.ajax({
                        cache: false,
                        contentType: false,
                        processData: false,
                        type: "post",
                        url: '{{route('book_update')}}',
                        async: true,
                        data: new FormData(this),
                        beforeSend: (function () {
                            $('#Edit_number_of_coypies_error').html('');
                            $('#Edit_Publisher_id_error').html('');
                            $('#Edit_title_error').html('');
                            $('#Edit_price_error').html('');
                            $('#Edit_subject_error').html('');
                            $('#Edit_Staff_id_error').html('');
                            $('#Edit_ISBN_error').html('');
                            $('#Edit_Supplier_id_error').html('');
                            $('#Edit_cover_img_error').html('');
                            $('#Edit_cover_img_load_error').html('');
                        }),
                        success: function (data) {

                            $('#success_message').html(data.success);

                            $('[name="Edit_number_of_coypies"]').val("");
                            $('[name="Edit_Publisher_id"]').val("");
                            $('[name="Edit_title"]').val("");
                            $('[name="Edit_subject"]').val("");
                            $('[name="Edit_Staff_id"]').val("");
                            $('[name="Edit_Supplier_id"]').val("");
                            $('[name="Edit_price"]').val("");
                            $('[name="Edit_ISBN"]').val("");
                            $('[name="Edit_cover_img"]').val("");
                            $('#Edit_cover_img_hidden').val('');

                            $('#Modal_Edit').modal('hide');
                            load_books();
                    },
                    error:function (data) {
                    if (data.status === 422) {
                        var errors = $.parseJSON(data.responseText);
                        $.each(errors, function (key, value) {
                            // $('#category_id_error').show().append(value + "<br/>"); //this is my div with messages
                            if ($.isPlainObject(value)) {
                                $.each(value, function (key, value) {

                                    if (key == 'Edit_category_id') {
                                        $('#Edit_category_id_error').html(value);
                                    }
                                    if (key == 'Edit_title') {
                                        $('#Edit_title_error').html(value);
                                    }
                                    if (key == 'Edit_price') {
                                        $('#Edit_price_error').html(value);
                                    }
                                    if (key == 'Edit_Staff_id') {
                                        $('#Edit_Staff_id_error').html(value);
                                    }
                                    if (key == 'Edit_Publisher_id') {
                                        $('#Edit_Publisher_id_error').html(value);
                                    }
                                    if (key == 'Edit_subject') {
                                        $('#Edit_subject_error').html(value);
                                    }
                                    if (key == 'Edit_Supplier_id') {
                                        $('#Edit_Supplier_id_error').html(value);
                                    }
                                    if (key == 'Edit_number_of_coypies') {
                                        $('#Edit_number_of_coypies_error').html(value);
                                    }
                                    if (key == 'Edit_category_id') {
                                        $('#Edit_category_id_error').html(value);
                                    }
                                    if (key == 'Edit_cover_img') {
                                        $('#Edit_cover_img_error').html(value);
                                    }
                                    if (key == 'Edit_ISBN') {
                                        $('#Edit_ISBN_error').html(value);
                                    }
                                    // $('#category_id_error').show().append(value + "<br/>");
                                });


                            }

                        });
                    }
                    $('#Modal_Edit').modal('show');
                }

            });
            return false;
        });


        //get data for delete record
        $('#show_data').on('click', '.item_delete', function () {
            var book_id = $(this).data('book_id');

            $('#Modal_Delete').modal('show');
            $('[name="book_id_delete"]').val(book_id);
        });

        //delete record to database
        $('#btn_delete').on('click', function () {
            var book_id = $('#book_id_delete').val();
            $.ajax({
                type: "POST",
                url: "{{'book_destroy'}}",
                dataType: "JSON",
                data: {book_id: book_id},
                success: function (data) {

                    $('#success_message').html(data.message);
                    $('[name="book_id_delete"]').val("");
                    $('#Modal_Delete').modal('hide');
                    load_books();

                },
                error: function (data) {
                    if (data.status === 500) {
                        $('#success_message').html(' <div class="alert alert-danger">Book Recorde is Not allow to Delete Recode is in use of Other section. </div>');
                        $('[name="book_id_delete"]').val("");
                        $('#Modal_Delete').modal('hide');
                    }

                }

            });
            return false;
        });

        //load dropdown list in add model from database
        $('#add_btn').on('click', function () {
            // var book_id = $('#book_id').val();
            let _token = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                type: "post",
                url: "{{route('load_dropdown_lists')}}",
                dataType: "JSON",
                data: {_token: _token},
                success: function (data) {


                    var Supplier_html = '<option value="" selected></option>';
                    var Publisher_html = '<option value="" selected></option>';
                    var Staff_html = '<option value="" selected></option>';
                    var category_html = '<option value="" selected></option>';

                    // loop length controller
                    var supplier_len = data.supplier.length;
                    var Publisher_len = data.Publisher.length;
                    var Staff_len = data.Staff.length;
                    var Category_len = data.Category.length;


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

                    for (var i = 0; i < Category_len; i++) {
                        category_html += '<option value=' + data.Category[i].id + '>' + data.Category[i].name + '</option>';
                    }
                    $('#category_id').html(category_html);


                    $('#Modal_Add').modal('show');

                }
            });
            return false;
        });

        //load dropdown list in Edit model from database
        function load_dropdown_for_edit(Supplier_id, Staff_id, Publisher_id, Category_id) {
            // var book_id = $('#book_id').val();
            $.ajax({
                    type: "post",
                    url: "{{route('load_dropdown_lists')}}",
                    dataType: "JSON",
                    // data:{book_id:book_id},
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


        })
        ;


    </script>

@endsection
