<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->get();
        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.articles.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|max:2048',
            'status' => 'nullable|in:draft,pending,published', // Statut de l'article
        ]);
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('articles', 'public');
            $validatedData['image'] = $imagePath;
        }
    
        // Définir le statut et la date de publication en fonction du bouton cliqué
        if ($request->input('action') === 'publish') {
            $validatedData['status'] = 'published';
            $validatedData['published_at'] = now();
        } elseif ($request->input('action') === 'save') {
            $validatedData['status'] = 'draft'; // Brouillon
            $validatedData['published_at'] = null;
        } else {
            $validatedData['status'] = 'pending'; // Par défaut ou selon besoin
            $validatedData['published_at'] = null;
        }
    
        Article::create($validatedData);
    
        return redirect()->route('admin.articles.index')->with('success', 'Article créé avec succès.');
    }
    


    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
{
    $validatedData = $request->validate([
        'title' => 'required|max:255',
        'content' => 'required',
        'image' => 'nullable|image|max:2048',
        'status' => 'required|in:draft,pending,published',
    ]);

    if ($request->hasFile('image')) {
        // Supprimer l'ancienne image si elle existe
        if ($article->image) {
            \Storage::disk('public')->delete($article->image);
        }

        $imagePath = $request->file('image')->store('articles', 'public');
        $validatedData['image'] = $imagePath;
    }

    // Définir le statut et la date de publication en fonction du bouton cliqué
    if ($request->input('action') === 'publish') {
        $validatedData['status'] = 'published';
        $validatedData['published_at'] = now();
    } elseif ($request->input('action') === 'save') {
        $validatedData['status'] = 'draft'; // Brouillon
        $validatedData['published_at'] = null;
    } else {
        $validatedData['status'] = 'pending'; // Par défaut ou selon besoin
        $validatedData['published_at'] = null;
    }

    $article->update($validatedData);

    return redirect()->route('admin.articles.index')->with('success', 'Article mis à jour avec succès.');
}


    public function destroy(Article $article)
    {
        // Supprimer l'image associée si elle existe
        if ($article->image) {
            \Storage::disk('public')->delete($article->image);
        }

        $article->delete();
        return redirect()->route('admin.articles.index')->with('success', 'Article supprimé avec succès.');
    }
}
