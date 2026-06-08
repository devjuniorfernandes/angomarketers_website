<?php

namespace App\Domain\Core\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Domain\Core\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;

class TagController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = Tag::latest();

        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }

        $tags = $query->paginate(20)->withQueryString();

        return view('admin.tags.index', compact('tags', 'search'));
    }

    public function create()
    {
        return view('admin.tags.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:tags,name',
        ]);

        Tag::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);
        Cache::flush();

        return redirect()->route('admin.tags.index')->with('success', 'Tag criada com sucesso!');
    }

    public function edit(Tag $tag)
    {
        return view('admin.tags.form', compact('tag'));
    }

    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:tags,name,' . $tag->id,
        ]);

        $tag->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);
        Cache::flush();

        return redirect()->route('admin.tags.index')->with('success', 'Tag atualizada com sucesso!');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        Cache::flush();

        return redirect()->route('admin.tags.index')->with('success', 'Tag eliminada com sucesso!');
    }
}
