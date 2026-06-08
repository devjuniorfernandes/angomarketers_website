<?php

namespace App\Domain\Core\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Domain\Core\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;

class PartnerController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = Partner::orderBy('order', 'asc')->latest();

        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }

        $partners = $query->paginate(15)->withQueryString();

        return view('admin.partners.index', compact('partners', 'search'));
    }

    public function create()
    {
        return view('admin.partners.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'nullable|url|max:255',
            'order' => 'required|integer|min:0',
            'logo' => 'required|image|max:2048',
        ]);

        $data = $request->except('logo');

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('partners', 'public');
            $data['logo_path'] = '/storage/' . $path;
        }

        Partner::create($data);
        \Illuminate\Support\Facades\Cache::flush();

        return redirect()->route('admin.partners.index')->with('success', 'Parceiro criado com sucesso!');
    }

    public function edit(Partner $partner)
    {
        return view('admin.partners.form', compact('partner'));
    }

    public function update(Request $request, Partner $partner)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'nullable|url|max:255',
            'order' => 'required|integer|min:0',
            'logo' => 'nullable|image|max:2048',
        ]);

        $data = $request->except('logo');

        if ($request->hasFile('logo')) {
            if ($partner->logo_path && str_starts_with($partner->logo_path, '/storage/')) {
                $oldPath = str_replace('/storage/', '', $partner->logo_path);
                Storage::disk('public')->delete($oldPath);
            }
            $path = $request->file('logo')->store('partners', 'public');
            $data['logo_path'] = '/storage/' . $path;
        }

        $partner->update($data);
        \Illuminate\Support\Facades\Cache::flush();

        return redirect()->route('admin.partners.index')->with('success', 'Parceiro atualizado com sucesso!');
    }

    public function destroy(Partner $partner)
    {
        if ($partner->logo_path && str_starts_with($partner->logo_path, '/storage/')) {
            $oldPath = str_replace('/storage/', '', $partner->logo_path);
            Storage::disk('public')->delete($oldPath);
        }

        $partner->delete();
        \Illuminate\Support\Facades\Cache::flush();

        return redirect()->route('admin.partners.index')->with('success', 'Parceiro eliminado com sucesso!');
    }
}
