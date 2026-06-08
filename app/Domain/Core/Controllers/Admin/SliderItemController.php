<?php

namespace App\Domain\Core\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Domain\Core\Models\SliderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;

class SliderItemController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = SliderItem::orderBy('order', 'asc')->latest();

        if ($search) {
            $query->where('title', 'like', "%{$search}%")
                  ->orWhere('subtitle', 'like', "%{$search}%");
        }

        $sliderItems = $query->paginate(15)->withQueryString();

        return view('admin.slider_items.index', compact('sliderItems', 'search'));
    }

    public function create()
    {
        return view('admin.slider_items.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string',
            'url' => 'required|string|max:255',
            'badge' => 'nullable|string|max:255',
            'badge_color' => 'required|string|max:255',
            'order' => 'required|integer|min:0',
            'image' => 'required|image|max:4096', // Max 4MB
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('slides', 'public');
            $data['image_path'] = '/storage/' . $path;
        }

        SliderItem::create($data);
        Cache::flush();

        return redirect()->route('admin.slider_items.index')->with('success', 'Slide criado com sucesso!');
    }

    public function edit(SliderItem $sliderItem)
    {
        return view('admin.slider_items.form', compact('sliderItem'));
    }

    public function update(Request $request, SliderItem $sliderItem)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string',
            'url' => 'required|string|max:255',
            'badge' => 'nullable|string|max:255',
            'badge_color' => 'required|string|max:255',
            'order' => 'required|integer|min:0',
            'image' => 'nullable|image|max:4096',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            if ($sliderItem->image_path && str_starts_with($sliderItem->image_path, '/storage/')) {
                $oldPath = str_replace('/storage/', '', $sliderItem->image_path);
                Storage::disk('public')->delete($oldPath);
            }
            $path = $request->file('image')->store('slides', 'public');
            $data['image_path'] = '/storage/' . $path;
        }

        $sliderItem->update($data);
        Cache::flush();

        return redirect()->route('admin.slider_items.index')->with('success', 'Slide atualizado com sucesso!');
    }

    public function destroy(SliderItem $sliderItem)
    {
        if ($sliderItem->image_path && str_starts_with($sliderItem->image_path, '/storage/')) {
            $oldPath = str_replace('/storage/', '', $sliderItem->image_path);
            Storage::disk('public')->delete($oldPath);
        }

        $sliderItem->delete();
        Cache::flush();

        return redirect()->route('admin.slider_items.index')->with('success', 'Slide eliminado com sucesso!');
    }
}
