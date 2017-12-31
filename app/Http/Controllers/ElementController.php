<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ElementController extends Controller
{
    public function showUpdateMenu(){
        $elements = Element::all()->orderBy('email');
        return view('element.updateElementMenu')->with('elements', $elements);
    }

    public function getElementId(Request $request){
        $selectId = $request['id'];
        return redirect('/updateElement/'.$selectId);
    }

    public function showUpdateForm($elementId){
        $element = Element::where('elementId', $elementId)->first();
        return view('element.updateElementForm')->with('element', $element);
    }
}
