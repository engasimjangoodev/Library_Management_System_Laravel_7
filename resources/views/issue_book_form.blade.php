@extends('layouts.template')
@section('content')

    <div class="row">

        <div class="col-md-6">

            <form method="post" id="book_issue_form" enctype="multipart/form-data">
                <div class="card mt-5 ">
                    <div class="card-header">
                        First Portion
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="book_name">Book Name</label>
                            <select class="form-control" name="book_name1" id="book_name1">

                            </select>

                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <button type="button" id="loaddata" class="btn btn-info btn-sm"><i
                                    class="fas fa-arrow-alt-circle-right"></i>
                            </button>
                            <small> Check Availability</small> <small><i class="fas fa-check-circle"></i></small> <span
                                style="color: red">222 <small>Book</small></span>
                            <small>
                                <small
                                    style="color: #4fbd4f">Available
                                </small>
                            </small>

                        </div>

                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-6">

                                    <strong> Title:</strong>
                                    <span id="book_title"></span>
                                    <br>

                                    <strong> ISBN:</strong>
                                    <span id="book_ISBN"></span>
                                    <br>
                                    <strong> Qty Available:</strong>
                                    <span id="book_qty"></span> <br>
                                    <strong> Category Name:</strong>
                                    <span id="Category_name"></span> <br>


                                </div>
                                <div class="col-md-6">
                                    <strong> Publisher Name:</strong> <small id="publisher_name"></small> <br>
                                    <strong> Supplier:</strong> <small id="supplier_name">2018-10-4</small> <br>
                                    <div id="book_img" name="book_img"></div>

                                </div>

                            </div>


                        </div>

                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <form>
                <div class="card mt-5 ">
                    <div class="card-header">
                        Second Portion
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="Member_name">Member Name</label>
                            <select class="form-control" id="Member_name1" name="Member_name1">

                            </select>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-info btn-sm"><i
                                    class="fas fa-arrow-alt-circle-right"></i>
                            </button>

                            <small> Check Member</small> <small><i class="fas fa-check-circle"></i></small>
                            <small style="color: red">
							<span>Its a Student
							</span>
                            </small>
                            <small>
                                <small
                                    style="color: #4fbd4f">Valid Member
                                </small>
                            </small>
                        </div>


                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-6">
                                    <strong> User Name:</strong> <span id="member_username"></span> <br>
                                    <strong> Phone:</strong> <span id="member_phone"></span> <br>
                                    <strong> Address:</strong> <span id="member_address"></span> <br>
                                    <strong> Card Id:</strong> <span id="member_card_id"></span> <br>
                                </div>
                                <div class="col-md-6">
                                    <strong> Email:</strong> <small id="member_email"></small> <br>
                                    <strong> Join Date:</strong> <small id="member_join_at"></small> <br>
                                    <div id="Member_img_div"></div>
                                </div>

                            </div>


                        </div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="book_name">Due Date</label>
                                    <input type="date" name="due_date" id="due_date"><br>
                                    <span id="due_date_error" class="text-danger"></span>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success"><i
                                        class="fas fa-arrow-alt-circle-right"></i> Make
                                    this issue
                                </button>
                                <span id="success_message"></span>

                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>









@stop
@section('script')
    <script>

        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            get_Book_Members_List();

            //load on change of book list data to text fields
            $('#book_name1').change(function () {
                var book_id = $('#book_name1').val();
                Load_book_text(book_id);
            });

            //load on change of members list data to text fields
            $('#Member_name1').change(function () {
                var id = $('#Member_name1').val();
                Load_Member_text(id);
            });

            function Load_book_text(defaultOption) {

                // var book_id = $('#book_name1').val();
                $.ajax({
                    type: "post",
                    url: "{{route('get_Book_Members_List')}}",
                    dataType: "JSON",
                    data: {book_id: defaultOption},
                    success: function (data) {

                        $('#book_title').text(data.title);
                        $('#book_ISBN').text(data.ISBN);
                        $("#book_qty").text(data.number_of_coypies);
                        $("#Category_name").text(data.category_name);
                        $("#supplier_name").text(data.Supplier_name);
                        $("#publisher_name").text(data.publisher_name);
                        $("#book_img").html('<img style="width: 120px"  src="http://' + window.location.host +
                            '/Library_Management_System_Laravel_7/public/assets/Images/Books/' + data.cover_img +
                            '" alt=" No file is Exists in DB ">');

                    }
                });

                return false;
            }

            function Load_Member_text(id) {

                $.ajax({
                    type: "post",
                    url: "{{route('get_Members_data_By_ID')}}",
                    dataType: "JSON",
                    data: {id: id},
                    success: function (data) {

                        $('#member_username').text(data.username);
                        $('#member_phone').text(data.phone);
                        $("#member_address").text(data.address);
                        $("#member_email").text(data.email);
                        $("#member_join_at").text(data.join_at);
                        $("#member_card_id").text(data.card_id);
                        $("#Member_img_div").html('<img style="width: 120px"  src="http://' + window.location.host +
                            '/Library_Management_System_Laravel_7/public/assets/Images/Members/' + data.profile_photo +
                            '" alt=" No file is Exists in DB ">');

                    }
                });

                return false;
            }

            //load dropdown list in add model from database
            function get_Book_Members_List() {

                $.ajax({
                    type: "post",
                    url: "{{route('get_Book_Members_List')}}",
                    dataType: "JSON",
                    success: function (data) {
                        var members_html = '';
                        var books_html = '';

                        // loop length controller
                        var members_len = data.members.length;
                        var books_len = data.books.length;

                        for (var i = 0; i < members_len; i++) {
                            members_html += '<option value=' + data.members[i].id + '>' + data.members[i].name + '</option>';
                        }
                        $('#Member_name1').html(members_html);


                        for (var i = 0; i < books_len; i++) {
                            books_html += '<option value=' + data.books[i].id + '>' + data.books[i].title + '</option>';
                        }
                        $('#book_name1').html(books_html);
                        //load first value load into text fields
                        var first_book = $('#book_name1 option:first').val();
                        Load_book_text(first_book);

                        //load first value load into text fields
                        var first_member = $('#Member_name1 option:first').val();
                        Load_Member_text(first_member);
                    }
                });
                return false;
            }

            //save
            $('#book_issue_form').on('submit', function () {
                var book_id = $('#book_name1').val();
                var member_id = $('#Member_name1').val();
                var due_date = $('#due_date').val();


                $.ajax({
                    type: "POST",
                    url: "{{route('save')}}",

                    dataType: "JSON",
                    data: {book_id: book_id, member_id: member_id, due_date: due_date},
                    success: function (data) {
                        if (data.error) {

                            if (data.due_date_error != '') {
                                $('#due_date_error').html(data.due_date_error);
                            } else {
                                $('#due_date_error').html('');
                            }

                        }
                        if (data.success) {
                            $('#success_message').html(data.success);
                            $('#due_date_error').html('');
                            $('[name="due_date"]').val("");
                        }
                        $('#contact').attr('disabled', false);
                    }

                });
                return false;

            });


        });

    </script>

@endsection
