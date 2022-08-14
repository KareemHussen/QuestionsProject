<?php

namespace App\Http\Controllers;

use App\Models\Category;



class CategoryController extends Controller
{


    public function getAllCategories()
    {
        $categories = Category::all();

        if (count($categories)){
            $response = [
                'data' => $categories,
                'message' => 'Fetched Data Successfully',
                'status' => 200
            ];

        } else {
            $response = [
                'data' => $categories,
                'message' => 'Fetched Data Successfully but there is no data',
                'status' => 200
            ];

        }

        return response($response, 200);
    }

    public function getCategory($id)
    {
        if ($id == null){
            $response = [
                'data' => null,
                'message' => 'Please enter id in path',
                'status' => 401
            ];
            return response($response, 401);

        }

        $cat = Category::find($id);

        if ($cat) {
            $response = [
                'data' => $cat,
                'message' => 'Fetched Data Successfully',
                'status' => 200
            ];

            return response($response, 200);

        } else {

            $response = [
                'data' => null,
                'message' => 'Wrong Id',
                'status' => 401
            ];

            return response($response, 401);
        }

    }

    public function addCategory()
    {
        $name = request("name");

        if ($name == null) {

            $response = [
                'data' => null,
                'message' => 'Please Enter name query',
                'status' => 401
            ];
            return response($response, 401);
        }


        $cat = Category::create([
            'name' => $name
        ]);

        if ($cat) {

            $response = [
                'data' => $cat,
                'message' => 'Added Successfully',
                'status' => 200
            ];

            return response($response, 200);
        } else {

            $response = [
                'data' => null,
                'message' => 'Something went wrong',
                'status' => 401
            ];

            return response($response, 401);
        }


    }

    public function updateCategory()
    {

        $id = request('id');
        $name = request('name');

        if ($id == null) {

            $response = [
                'data' => null,
                'message' => 'Please Enter id query',
                'status' => 401
            ];
            return response($response, 401);
        }

        if ($name == null) {

            $response = [
                'data' => null,
                'message' => 'Please Enter name query',
                'status' => 401
            ];
            return response($response, 401);
        }


        $cat = Category::find($id);

        if ($cat) {

            $cat->update([
                'name' => $name
            ]);

            $response = [
                'data' => $cat,
                'message' => 'Updated Successfully',
                'status' => 200
            ];

            return response($response, 200);

        } else {

            $response = [
                'data' => null,
                'message' => 'Wrong Id',
                'status' => 401
            ];

            return response($response, 401);

        }

    }

    public function deleteCategory()
    {

        $id = request('id');


        if ($id == null) {

            $response = [
                'data' => null,
                'message' => 'Please Enter id query',
                'status' => 401
            ];
            return response($response, 401);
        }

        $cat = Category::find($id);

        if ($cat) {

            foreach ($cat->questions as $question) {

                foreach ($question->answers as $answer) {

                    $file = null;

                    if ($answer->image) {
                        $file = 'uploads/AnswersImages/' . $answer->image;
                    }

                    if (file_exists($file)) {
                        unlink($file);
                    }
                }


            }

            $cat->delete();
            $response = [
                'data' => null,
                'message' => 'Deleted Successfully',
                'status' => 200
            ];

            return response($response, 200);

        } else {

            $response = [
                'data' => null,
                'message' => 'Wrong Id',
                'status' => 401
            ];

            return response($response, 401);

        }
    }




    public function categoryPage()
    {
        $categories = Category::all();
        return view('category', ['categories' => $categories]);
    }

    public function updateCategoryView()
    {
        $category_id = request('category_id');
        $name = request('name');
        return view('update_category', ['category_id' => $category_id, 'name' => $name]);
    }

    public function updateCategoryFun()
    {

        $category_id = request('category_id');
        $name = request('name');

        if ($category_id == null) {

            return redirect('http://127.0.0.1:8000/');
        }

        if ($name == null) {

            return redirect('http://127.0.0.1:8000/');
        }

        $cat = Category::find($category_id);

        if ($cat) {

            $cat->update([
                'name' => $name
            ]);


            return redirect('http://127.0.0.1:8000/');

        } else {


            return redirect('http://127.0.0.1:8000/');

        }
    }

    public function addCategoryView()
    {
        return view('add_category');
    }

    public function addCategoryFun()
    {

        $name = request('name');

        if ($name == null) {
            return redirect('http://127.0.0.1:8000/');
        }

        Category::create([
            'name' => $name
        ]);
        return redirect('http://127.0.0.1:8000/');
    }

    public function deleteCategoryView()
    {

        $category_id = request('category_id');


        if ($category_id == null) {

            return redirect('http://127.0.0.1:8000/');
        }


        $cat = Category::find($category_id);

        if ($cat) {

            foreach ($cat->questions as $question) {

                foreach ($question->answers as $answer) {

                    $file = null;

                    if ($answer->image) {
                        $file = 'uploads/AnswersImages/' . $answer->image;
                    }

                    if (file_exists($file)) {
                        unlink($file);
                    }
                }


            }

            $cat->delete();

            return redirect('http://127.0.0.1:8000/');


        }
    }
}
