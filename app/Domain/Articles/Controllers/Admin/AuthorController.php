<?php

namespace App\Domain\Articles\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Domain\Articles\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;

class AuthorController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = Author::latest();

        if ($search) {
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('role', 'like', "%{$search}%");
        }

        $authors = $query->paginate(15)->withQueryString();

        return view('admin.authors.index', compact('authors', 'search'));
    }

    public function create()
    {
        return view('admin.authors.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'facebook_url' => 'nullable|string|max:255',
            'twitter_url' => 'nullable|string|max:255',
            'linkedin_url' => 'nullable|string|max:255',
            'avatar' => 'required|image|max:2048',
        ]);

        $data = $request->except('avatar');
        $data['slug'] = Str::slug($request->name);

        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('authors', 'public');
            $data['avatar_path'] = '/storage/' . $path;
        }

        Author::create($data);
        Cache::flush();

        return redirect()->route('admin.authors.index')->with('success', 'Autor criado com sucesso!');
    }

    public function edit(Author $author)
    {
        return view('admin.authors.form', compact('author'));
    }

    public function update(Request $request, Author $author)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'facebook_url' => 'nullable|string|max:255',
            'twitter_url' => 'nullable|string|max:255',
            'linkedin_url' => 'nullable|string|max:255',
            'avatar' => 'nullable|image|max:2048',
        ]);

        $data = $request->except('avatar');
        $data['slug'] = Str::slug($request->name);

        if ($request->hasFile('avatar')) {
            if ($author->avatar_path && str_starts_with($author->avatar_path, '/storage/')) {
                $oldPath = str_replace('/storage/', '', $author->avatar_path);
                Storage::disk('public')->delete($oldPath);
            }
            $path = $request->file('avatar')->store('authors', 'public');
            $data['avatar_path'] = '/storage/' . $path;
        }

        $author->update($data);
        Cache::flush();

        return redirect()->route('admin.authors.index')->with('success', 'Autor atualizado com sucesso!');
    }

    public function destroy(Author $author)
    {
        if ($author->avatar_path && str_starts_with($author->avatar_path, '/storage/')) {
            $oldPath = str_replace('/storage/', '', $author->avatar_path);
            Storage::disk('public')->delete($oldPath);
        }

        $author->delete();
        Cache::flush();

        return redirect()->route('admin.authors.index')->with('success', 'Autor eliminado com sucesso!');
    }
}
