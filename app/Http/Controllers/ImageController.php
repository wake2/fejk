<?php

namespace App\Http\Controllers;

use App\Author;
use App\Image;

use Illuminate\Support\Facades\Input;


class ImageController extends Controller
{
    function show()
    {

        $images = Image::all();

        return view('images.show', ['images' => $images]);
    }


    public function create()
    {
        return view('images.create');
    }


    public function store()
    {
        $image = new Image();

        if (Input::hasfile('file')) {

            $file = Input::file('file');
            $title = Input::get('title');
            $content = Input::get('content');

            $author = Author::where('name', Input::get('author'))->first();

            if (!$author) {
                $author = new Author();
                $author->name = Input::get('author');
                $author->save();
            }

            $name = time().'.'.$file->getClientOriginalExtension();
            $file->move('images', $name);

            $image->file = $name;
            $image->title = $title;
            $image->content = $content;
            $image->author_id = $author->id;
            $image->save();

            return redirect('/')->with('status', 'Dodano zdjęcie!');

        }
    }



    public function edit($id)
    {
        $image = Image::find($id);

        return view('images.edit', ['image' => $image]);
    }


    public function update()
    {
        $id = Input::get('id');
        $title = Input::get('title');
        $content = Input::get('content');

        $image = Image::find($id);

        $image->title = $title;
        $image->content = $content;
        $image->save();

        return redirect('/')->with('status', 'Zaktualizowano zdjęcie!');
    }


    public function destroy($id)
    {
        $image = Image::find($id);
        $image->delete();

        return redirect('/')->with('status', 'Usunięto zdjęcie!');

    }

}



