<?php

namespace App\Http\Controllers;

use App\Element;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ElementController extends Controller
{
    public function showInsertForm(){
        return view('element.insertElementForm');
    }

    public function insert(Request $request){
        $this->validate($request, [
            'elementName' => 'required|unique:elements',
        ]);

        Element::create([
            'elementName' => $request['elementName']
        ]);

        return redirect('/insertElement');
    }

    public function showUpdateMenu(){
        $elements = Element::orderBy('elementName')->get();
        return view('element.updateElementMenu')->with('elements', $elements);
    }

    public function getElementId(Request $request){
        $selectId = $request['id'];
        return redirect('/updateElement/'.$selectId);
    }

    public function showUpdateForm($elementId){
        $element = Element::where('id', $elementId)->first();
        return view('element.updateElementForm')->with('element', $element);
    }

    public function update($elementId, Request $request){
        $this->validate($request, [
            'elementName' => 'required|unique:elements,elementName,'.$elementId
        ]);

        Element::where('id', $elementId)->update([
            'elementName' => $request['elementName']
        ]);

        return redirect('/updateElement');
    }

}
