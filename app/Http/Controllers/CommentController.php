<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Image;
use App\Author;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;

class CommentController extends Controller
{
    function show($id)
    {

        $comments = Image::find($id)->comments;

        return view('comments.show', ['comments' => $comments, 'image_id' => $id]);


    }

    function create($id)
    {

        $image = Image::find($id);

        return view('comments.create', ['image_id' => $image->id]);

    }

    function store()
    {

        $comment = new Comment();

        $content = Input::get('content');
        $image_id = Input::get('image_id');
        $author = Author::where('name', Input::get('author'))->first();

        if (!$author) {
            $author = new Author();
            $author->name = Input::get('author');
            $author->save();
        }

        $comment->author_id = $author->id;
        $comment->image_id = $image_id;
        $comment->content = $content;

        $comment->save();

        return redirect('/comments/show/'.$image_id)->with('status', 'Dodano zdjęcie!');



    }

    function edit($id)
    {
        $comment = Comment::find($id);

        return view('comments.edit', ['comment' => $comment]);

    }

    function update()
    {
        $content = Input::get('content');
        $id = Input::get('id');

        $comment = Comment::find($id);
        $comment->content = $content;

        $comment->save();

        $image = $comment->image;

        return redirect('/comments/show/'.$image->id)->with('status', 'Zaktualizowano komentarz!');


    }

    function destroy($id)
    {

        $comment = Comment::find($id);
        $image = $comment->image;
        $comment->delete();

        return redirect('/comments/show/'.$image->id)->with('status', 'Usunięto komentarz!');

    }
}
