<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Book;
use App\Members;


class Book_IssueController extends Controller
{
    public function index()

    {
        return view('issue_book_form');
    }

    public function get_Book_Members_List()
    {
        $data["members"] = Members::all();
        $data["books"] = Book::all();
        echo json_encode($data);

    }

    public function get_Members_data_By_ID(Request $request)
    {
        $id = $request->id;
        $data = Members::find($id);

        echo json_encode($data);
    }


    public function get_Book_data_By_ID(Request $request)
    {
        $book_id = $request->book_id;
        $data = Book::find($book_id);

        echo json_encode($data);
    }

    public function save()
    {

        $this->form_validation->set_rules('due_date', '', 'required');

        if ($this->form_validation->run()) {
            $Staff_id = 2;
            $status = 1;
            $data = $this->Book_Issue_model->add_book($Staff_id, $status);
            $data = array(
                'success' => '<div class="alert alert-success">Book Issued Successfully </div>'
            );
        } else {
            $data = array(
                'error' => true,
                'due_date_error' => form_error('due_date'),

            );
        }
        echo json_encode($data);

    }


    public function update()
    {
        $this->form_validation->set_rules('Edit_title', 'Book title', 'required|min_length[5]|max_length[55]');
        $this->form_validation->set_rules('Edit_number_of_coypies', 'Please Enter Number of Coypies', 'required');
        $this->form_validation->set_rules('Edit_Supplier_id', 'Please Select Supplier ID', 'required');
        $this->form_validation->set_rules('Edit_Publisher_id', 'Please Select Publisher ID', 'required');
        $this->form_validation->set_rules('Edit_subject', 'Book Subject', 'required|min_length[5]|max_length[55]');
        $this->form_validation->set_rules('Edit_price', 'Price is Required ', 'required');
        $this->form_validation->set_rules('Edit_Staff_id', 'Please Select Staff ID ', 'required');
//		$this->form_validation->set_rules('cover_file', 'Please Select Cover File', 'required');

        if ($this->form_validation->run()) {
            $book_id = $this->input->post("book_id");
            $data = $this->Book_Issue_model->update($book_id);

            $data = array(
                'success' => '<div class="alert alert-success">Book Update Successfully </div>'
            );
        } else {
            $data = array(
                'error' => true,
                'Edit_title_error' => form_error('Edit_title'),
                'Edit_number_of_coypies_error' => form_error('Edit_number_of_coypies'),
                'Edit_Supplier_id_error' => form_error('Edit_Supplier_id'),
                'Edit_Publisher_id_error' => form_error('Edit_Publisher_id'),
                'Edit_subject_error' => form_error('Edit_subject'),
                'Edit_price_error' => form_error('Edit_price'),
                'Edit_Staff_id_error' => form_error('Edit_Staff_id'),
                'Edit_cover_file_error_error' => form_error('Edit_cover_file'),
            );
        }
        echo json_encode($data);
    }


    public function delete()
    {
        $book_id = $this->input->post("book_id");
        $data = $this->Book_Issue_model->delete($book_id);
        echo json_encode($data);

    }


}
