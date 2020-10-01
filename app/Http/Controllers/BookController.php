<?php

namespace App\Http\Controllers;
use JWTAuth;
use Illuminate\Http\Request;

use App\Book;

class BookController extends Controller
{
    protected $user;
 
    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book = Book::all();
        if($book && $book->count() > 0){
             return response(['message'=>'Show data success','data'=>$book],200);
        }else{
            return response(['message'=>'Data not found','data'=>null],404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = Book::create([
            "title" => $request->title,
            "description" => $request->description,
            "author" => $request->author,
            "publisher" => $request->publisher,
            "date_of_issue" => $request->date_of_issue,
        ]);
        return response(['message'=>'Create data success','data'=>$book],200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);
        if($book && $book->count() > 0){
            return response(['message'=>'Show data success','data'=>$book],200);
       }else{
           return response(['message'=>'Data not found','data'=>null],404);
       }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        if($book){
            $book->title = $request->title;
            $book->description = $request->description;
            $book->author = $request->author;
            $book->publisher = $request->publisher;
            $book->date_of_issue = $request->date_of_issue;

            $book->save();
            return response(['message'=>'Update data success','data'=>$book],200);
        }else{
            return response(['message'=>'Update data failed','data'=>null],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::destroy($id);
        if($book){
            $book > delete();
            return response([],204);
        }else{
            return response(['message'=>'Delete data failed','data'=>null],404);
        }
    }
}
