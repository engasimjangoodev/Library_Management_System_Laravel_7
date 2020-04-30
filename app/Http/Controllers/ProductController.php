<?php

namespace App\Http\Controllers;
use App\Book;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $posts = Book::all();

        return view('product', ['posts' => $posts]);

//        return view('product');
    }
    public function book_data()
    {
        $books = Book::all();
//        return json_encode($books);
                return response()->json(['data'=>$books]);

//        return response()->json(['success'=>'Item deleted successfully.']);   echo json_encode($data);
    }
}
