<?php

namespace App\Http\Controllers;

use App\Comment;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function insert($pokemonId, Request $request){
        $this->validate($request, [
            'body' => 'required|min:3',
        ],[
                'required' => 'The comment content is required',
                'min' => 'The comment content must be at least :min characters.',
            ]
        );

        $comment = Comment::create([
            'body' => $request['body']
        ]);

        $comment->user_id = Auth::user()->id;
        $comment->pokemon_id = $pokemonId;
        $comment->save();

        return redirect('/pokemonDetail/'.$pokemonId);
    }
}
