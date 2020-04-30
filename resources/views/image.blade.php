@extends('layouts.template')
    @section('content')
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Codechief | Laravel Ajax Image Upload</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css"/>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<body>

<div class="container mt-4">
    <div class="row">
        <div class="col-sm-12">
            <h4>Upload image using ajax with preview</h4>
        </div>
    </div>
    <hr/>

    <form method="POST" enctype="multipart/form-data" id="upload_image_form" action="javascript:void(0)">

        <div class="row">
            <div class="col-md-12 mb-2">
                <img id="image_preview_container" src="{{ asset('storage/image/image-preview.png') }}"
                     alt="preview image" style="max-height: 150px;">
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <input type="file" name="image" placeholder="Choose image" id="image">
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                </div>
            </div>


            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        <div class="" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                                    <option value="1">1</option>

                                </select>
                                <span id="Supplier_id_error" class="text-danger"></span>
                            </div>


                            <div class="col-md-3">
                                <label class="col-md-12 col-form-label">Publisher</label>
                                <select class="form-control" name="Publisher_id" id="Publisher_id">
                                    <option value="1">1</option>
                                </select>
                                <span id="Publisher_id_error" class="text-danger"></span>
                            </div>


                            <div class="col-md-3">
                                <label class="col-md-12 col-form-label">Staff</label>
                                <select class="form-control" name="Staff_id" id="Staff_id">
                                    <option value="1">1</option>
                                </select>
                                <span id="Staff_id_error" class="text-danger"></span>
                            </div>

                        </div>
                        <div class="form-group row">

                            <div class="col-md-2"></div>

                            <div class="col-md-3">
                                <label class="col-md-12 col-form-label">Category</label>
                                <select class="form-control" name="category_id" id="category_id">
                                    <option value="1">1</option>
                                </select>
                                <span id="category_id_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-7">
                                <label class=" col-form-label">Cover Image</label>

                                <input type="file" name="cover_file" class="form-control-file" id="cover_file" >
                                <span id="cover_file_error" class="text-danger"></span>
                                {{--                            <span id="cover_file_load_error" class="text-danger"></span>--}}
                                {{--                                @error('cover_file')--}}
                                {{--                                <span class="alert alert-danger">{{$message}}</span>--}}

                                {{--                                @enderror--}}
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
</div>


</body>
</html>
@stop
@section('script')
    <script>
        $(document).ready(function (e) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#image').change(function () {

                let reader = new FileReader();

                reader.onload = (e) => {

                    $('#image_preview_container').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);

            });

            $('#upload_image_form').submit(function (e) {

                e.preventDefault();

                var formData = new FormData(this);

                $.ajax({
                    type: 'POST',
                    url: "{{ url('photo')}}",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        this.reset();
                        alert('Image has been uploaded successfully');
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            });
        });
    </script>
@endsection
