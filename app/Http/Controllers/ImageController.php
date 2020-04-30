<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ImageController extends Controller
{
    public function index()
    {
        return view('image');
    }

    public function save(Request $request)
    {
        request()->validate([
            'title' => 'required',
//            'cover_file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'subject' => 'required',
            'ISBN' => 'required',
            'number_of_coypies' => 'required',
            'price' => 'required',
            'Supplier_id' => 'required',
            'Publisher_id' => 'required',
            'Staff_id' => 'required',
            'category_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($files = $request->file('image')) {

            $fileName = "image-" . time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->storeAs('image', $fileName);

            $image = new Image;
            $image->image = $fileName;
            $image->save();

            return Response()->json([
                "image" => $fileName
            ], Response::HTTP_OK);

        }

    }
}
