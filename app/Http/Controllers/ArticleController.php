<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{

    public function index()
    {
        $articles = Article::all();
        return view('welcome', compact('articles'));
    }

    public function saveArticle(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        $subject = $request->input('subject');
        $content = $request->input('content');

        if ($request->hasFile('image')) {
            $path = 'images';
            $imagePath = $request->file('image')->store($path);
        }

        $input = [
            'subject' => $subject,
            'content' => $content,
            'image' => $imagePath ?? null, // Assign the image path or null if no image was uploaded
        ];

        Article::create($input);

        return redirect('/');
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'subject' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        $article = Article::findOrFail($id);
        $article->subject = $request->input('subject');
        $article->content = $request->input('content');

        if ($request->hasFile('image')) {
            $path = 'images';
            $imagePath = $request->file('image')->store($path);
            $article->image = $imagePath;
        }

        $article->save();

        return redirect('/');
    }
}