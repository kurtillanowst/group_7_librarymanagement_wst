<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Unit;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use Illuminate\Http\RedirectResponse;



class AdminController extends Controller
{
    public function index()
    {
        if(Auth::id())
        {
            $user_type = Auth()->user()->usertype;

            if($user_type =='admin')
            {
                return view('admin.index');
            }
            else if($user_type == 'user')
            {
                return view('home.index');
            }
        }
        else
        {
            return redirect()->back();
        }
    }




    public function category_page()
{
    $data = Category::all();
    return view('admin.category', compact('data'));
}

    public function add_category(Request $request)
    { 
        $data = new Category;
        $data->cat_title = $request->category;
        $data->save();
        return redirect()->back()->with("message", "Category Added Successfully");
    }

    public function cat_delete($id)
    {
        $data = Category::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function edit_category($id)
    {
        $data = Category::find($id);
        if (!$data) {
            return redirect()->back()->with('error', 'Category not found!');
        }
        return view("admin.edit_category", compact("data"));
    }

    public function update_category(Request $request, $id)
    {
        $data = Category::find($id);
        $data->cat_title = $request->cat_name;
        $data->save();
        return redirect("/category_page")->with('message', 'Category updated successfully');
    }

    public function add_book()
    {
        $data = Category::all();
        return view('admin.add_book', compact('data'));
    }

public function store_book(Request $request)
{
    $data = new Books();
    $data->title = $request->book_name;
    $data->author_name = $request->author_name;
    $author_img = $request->author_img;
    $data->category_id = $request->category; // Ensure this is assigned
    $data->price = $request->price;
    $data->quantity = $request->quantity; // Ensure this is assigned
     $books_img = $request->bookImg;
    $data->description = $request->description;

   
    if ($books_img) {
        $book_img_name = time().'.'.$books_img->getClientOriginalExtension();
        $books_img->move('book', $book_img_name);
        $data->book_img = $book_img_name;
    }
       
    if ($author_img) {
        $author_img_name = time().'.'.$author_img->getClientOriginalExtension();
        $author_img->move('author', $author_img_name);
        $data->author_img = $author_img_name;
    }
    
    $data->save(); 
    return redirect()->back();
}

public function show_book()
{
   $books = Books::all();

    return view('admin.show_book',compact('books')); 
}
}