<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(\App\Http\Middleware\EnsureUserIsAdmin::class);
    }

    public function index()
    {
        $categories = Category::paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|unique:categories',
            'description' => 'nullable',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        Category::create($data);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Categorie succesvol toegevoegd!');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|max:255|unique:categories,name,' . $category->id,
            'description' => 'nullable',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        $category->update($data);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Categorie succesvol bijgewerkt!');
    }

    public function destroy(Category $category)
    {
        // Controleer of er producten aan deze categorie zijn gekoppeld
        if ($category->products->count() > 0) {
            return redirect()->route('admin.categories.index')
                ->with('error', 'Deze categorie kan niet worden verwijderd omdat er producten aan gekoppeld zijn.');
        }

        $category->delete();

        return redirect()->route('admin.categories.index')
            ->with('success', 'Categorie succesvol verwijderd!');
    }
}
