<?php

namespace App\Http\Controllers;

use App\item;
use Illuminate\Http\Request;

use App\Http\Requests;

class ItemController extends Controller
{
    public function insert (request $request) {

        $this->validate($request,[
            'name' => 'required | alpha',
            'price' => 'required | integer | min:1'
        ]);

        $name = $request['name'];
        $price = $request['price'];

        item::create([
            'name'=>$name,
            'price'=>$price
        ]);
        //return view('formitem');
        return redirect('/formitem');
    }

    public function update(request $request){
        $id = $request['id'];
        $name = $request['name'];
        $price = $request['price'];

        Item::where('id', $id)->update([
           'name' => $name,
            'price' => $price
        ]);
        return view('formitem');
    }

    public function delete(request $request){
        $id = $request['id'];

        Item::where('id', $request['id'])->delete();
        return view('formitem');
    }

    public function view(){
        Item::all(); //where('id',1) -> get(); (ambil yg sesuai kondisi)
                     //              -> first(); (ambil yg sesuai kondisi, tapi yg prtama kl ktemu doang)
        $items=item::all();
//Cara 1
	return view('viewitem', ['items' => $items]);

//Cara 2
//return view('viewitem') -> with('items', $items);
    }
}
