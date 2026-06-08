<?php

namespace App\Domain\Core\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Domain\Core\Models\MenuItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class MenuController extends Controller
{
    public function index()
    {
        // Get parent menus with their child submenus
        $menuItems = MenuItem::whereNull('parent_id')
            ->with('children')
            ->orderBy('order', 'asc')
            ->get();

        return view('admin.menus.index', compact('menuItems'));
    }

    public function create()
    {
        $parentMenus = MenuItem::whereNull('parent_id')->orderBy('order', 'asc')->get();
        return view('admin.menus.form', compact('parentMenus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:menu_items,id',
            'order' => 'required|integer|min:0',
        ]);

        MenuItem::create($request->all());
        Cache::flush();

        return redirect()->route('admin.menus.index')->with('success', 'Item de menu criado com sucesso!');
    }

    public function edit(MenuItem $menu)
    {
        $parentMenus = MenuItem::whereNull('parent_id')
            ->where('id', '!=', $menu->id)
            ->orderBy('order', 'asc')
            ->get();

        return view('admin.menus.form', compact('menu', 'parentMenus'));
    }

    public function update(Request $request, MenuItem $menu)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:menu_items,id',
            'order' => 'required|integer|min:0',
        ]);

        // Prevent self-parenting loop
        if ($request->parent_id && $request->parent_id == $menu->id) {
            return back()->withErrors(['parent_id' => 'Um item de menu não pode ser pai de si mesmo.']);
        }

        $menu->update($request->all());
        Cache::flush();

        return redirect()->route('admin.menus.index')->with('success', 'Item de menu atualizado com sucesso!');
    }

    public function destroy(MenuItem $menu)
    {
        $menu->delete();
        Cache::flush();

        return redirect()->route('admin.menus.index')->with('success', 'Item de menu eliminado com sucesso!');
    }
}
