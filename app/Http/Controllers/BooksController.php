<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

use App\Http\Requests;

class BooksController extends Controller
{
    public function index(){
        $books = Book::all();

        $carts = session()->get('carts');

        return view('book')->with(['books' => $books,'carts' => $carts]);
    }

    public function addToCart(Request $request){
        $book = Book::find($request->id);
        $carts = collect();

        $isExist = false;
        if(!empty(session()->get("carts"))){
            $carts = session()->get("carts");
            for($i = 0; $i < count($carts); $i++){

                //Ketemu buku yang sama, tambah totalnya
                if($carts[$i]['book']->id == $book->id){
                    $carts[$i] = [
                        'book'=> $book,
                        'total'=> $carts[$i]['total']+1
                    ];
                    $isExist = true;
                }
            }
        }

        if(!$isExist){
            $carts->push([
                'book' => $book,
                'total' => 1
            ]);
        }
        //kosongin buat di refresh
        session()->put('carts',[]);
        session()->put('carts',$carts);

        return redirect()->back();
    }

}
