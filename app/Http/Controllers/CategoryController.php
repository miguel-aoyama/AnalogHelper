<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Board;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
  public function __construct()
  {
    $this->authorizeResource(Category::class, 'category');
  }

  public function index()
  {
    $user = auth()->user()->get();
    $items = auth()->user()->categories()->get();
    return view('categories.index' , ['items' => $items], ['user' => $user]);
  }

  public function create()
  {
    return view('categories.create');
  }

  public function store(CategoryRequest $request, Category $category)
  {
    $category->fill($request->all());
    $category->user_id = $request->user()->id;
    $category->save();
    return redirect()->route('categories.show',[
      'category' => $category->id,
    ]);
  }

  public function show(Category $category)
  {
    $items = auth()->user()->categories()->get();
    return view('categories.show' , ['category' => $category], ['items' => $items]);
  }

  public function edit(Category $category)
  {
    return view('categories.edit',['category' => $category]);
  }

  public function update(CategoryRequest $request, Category $category)
  {
    $category->fill($request->all());
    $category->save();
    return redirect()->route('categories.show',[
      'category' => $category->id,
    ]);
  }

  public function destroy(Request $request, Category $category)
  {
    $category->delete();
    return redirect()->route('categories.index');
  }

}
