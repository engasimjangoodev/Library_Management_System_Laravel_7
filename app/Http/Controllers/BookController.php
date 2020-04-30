<?php

namespace App\Http\Controllers;

use App\Book;
use App\Categorys;
use App\Http\Requests\StoreBook;
use App\Publishers;
use App\Staffs;
use App\Suppliers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

//use Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("book")->with('book', '5');
    }

    public function add_book_page()
    {
        return view('book_add_form');
    }

    public function load_books_ajax_call()
    {
        $data = Book::all();
        return response()->json($data);

    }

    public function load_dropdown_lists()
    {
        $data = array(
            "supplier" => Suppliers::all(),
            "Publisher" => Publishers::all(),
            "Staff" => Staffs::all(),
            "Category" => Categorys::all(),

        );

        return response()->json($data);


    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    function create(StoreBook $request)
    {
        //        $val_Req = $request->validated();
        $image = $request->file('cover_img');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('assets/images/Books'), $new_name);

        Book::insertGetId(
            ['title' => $request->title,
                'cover_img' => $new_name,
                'subject' => $request->subject,
                'number_of_coypies' => $request->number_of_coypies,
                'price' => $request->price,
                'Supplier_id' => $request->Supplier_id,
                'Publisher_id' => $request->Publisher_id,
                'Staff_id' => $request->Staff_id,
                'Category_id' => $request->category_id,
                'ISBN' => $request->ISBN,
            ]
        );

        return response()->json([
            'message' => '<div class="alert alert-success">Book Add Successfully </div>'

        ]);

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Book $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $data = Book::find($request->book_id);

        return response()->json($data);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Book $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->up_book_id;
        $fleg = $request->Edit_cover_img_hidden;
        $rol = [
            'Edit_title' => 'required',
            'Edit_subject' => 'required',
            'Edit_ISBN' => 'required',
            'Edit_number_of_coypies' => 'required',
            'Edit_price' => 'required',
            'Edit_Supplier_id' => 'required',
            'Edit_Publisher_id' => 'required',
            'Edit_Staff_id' => 'required',
            'Edit_category_id' => 'required'
        ];

        if (is_null($fleg)) {
            $rol += ['Edit_cover_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',];
        }
        $val = Validator::make($request->all(), $rol);
        $val->validate();;

        //get data from request and save into array

        $data = [
            'title' => $request->Edit_title,
            'subject' => $request->Edit_subject,
            'number_of_coypies' => $request->Edit_number_of_coypies,
            'price' => $request->Edit_price,
            'Supplier_id' => $request->Edit_Supplier_id,
            'Publisher_id' => $request->Edit_Publisher_id,
            'Staff_id' => $request->Edit_Staff_id,
            'Category_id' => $request->Edit_category_id,
            'ISBN' => $request->Edit_ISBN,
        ];

        if (is_null($fleg)) {
            $dbBook = Book::find($id);
            if (file_exists(public_path() . '/assets/Images/Books/' . $dbBook->cover_img) && $dbBook->cover_img) {
                unlink(public_path() . '/assets/Images/Books/' . $dbBook->cover_img);
            }
            $image = $request->file('Edit_cover_img');
            $new_name = 'book' . rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/images/Books/'), $new_name);
            $data += ['cover_img' => $new_name];

        }
        Book::where('id', $id)
            ->update($data);
        return response()->json(['success' => '<div class="alert alert-success">Book Record Updated Successfully  </div>']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Book $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $result = Book::find($request->book_id)->delete();

        if ($result) {
            return response()->json([
                'message' => '<div class="alert alert-success">Book Deleted Successfully </div>'
            ]);

        }

    }


}
