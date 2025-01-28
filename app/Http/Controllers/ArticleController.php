<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article; // Changed to a generic 'Article' model
use App\Mail\ArticleNotification;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SendArticleNotification;

class ArticleController extends Controller
{

    public function index()
    {
        // Fetch all articles
        $articles = Article::all();
        
        // Return the view with the articles
        return view('article.index', compact('articles'));
    }
    
    public function userIndex() {
        $articles = Article::all();
        return view('article.userIndex', compact('articles'));
    }

    public function create()
    {
        return view('article.create');  // No need to pass $article here
    }

    public function store(Request $request)
{
    // Validate the request
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'author' => 'required|string|max:255',
        'category' => 'required|string', // Make sure category is validated
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Create and save the new article
    $article = new Article();
    $article->title = $validatedData['title'];
    $article->content = $validatedData['content'];
    $article->author = $validatedData['author'];
    $article->category = $validatedData['category'];  // Save the category here

    // Handle the image upload if present
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('articles', 'public');
        $article->image = $imagePath;
    }

    // Save the article to the database
    $article->save();
    
    // Redirect with success message
    return redirect()->route('articles.index')->with('success', 'Article added successfully');
}


    public function edit(Article $article)
    {
        return view('article.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $data = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'author' => 'required',
            'category' => 'required', // Add validation for category
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($article->image) {
                Storage::delete('public/' . $article->image);
            }
            $data['image'] = $request->file('image')->store('article_images', 'public');
        }
    
        // Update the article with the validated data
        $article->update($data);
    
        return redirect()->route('articles.index')->with('success', 'Article updated successfully.');
    }
    

    public function destroy(Article $article)
    {
        if ($article->image) {
            \Storage::delete('public/' . $article->image);
        }
    
        $article->delete();
        return redirect()->route('articles.index')->with('success', 'Article deleted successfully.');
    }
    public function show($id)
{
    $article = Article::findOrFail($id);
    return view('article.detail', compact('article'));
}

}
