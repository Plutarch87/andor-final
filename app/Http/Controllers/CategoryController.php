<?php

namespace App\Http\Controllers;

use App\Item;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Repositories\CategoryRepository;
use DB;

class CategoryController extends Controller
{
    
    protected $categories;

    /**
     * Constructor
     */
    public function __construct(CategoryRepository $categories)
    {
        $this->categories = $categories;
    }

    /**
     * Index
     */
    public function index()
    {
        $items = Item::orderBy('created_at', 'desc')->paginate(12);    	

        return view('index', compact('items'));
    }

    /**
     * Show
     */
    public function show(Category $category)
    {
        $items = $category->items()->orderBy('created_at', 'desc')->paginate(12);

        return view('kategorije.show', compact('category', 'items'));
    }

    /**
     * Store
     */
    public function store(Request $request)
    {
    	$this->validate($request, [
            'name' => 'required|max:255',
            ]);
        $request->user()->categories()->create([
            'name' => $request->name,
            'slug' => str_slug($request->name)
            ]);
        
        return back();
    }

    /**
     * Delete
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        return back();
    }

    public function getAllCategories()
    {
        $categories = DB::table('categories')
                        ->join('subcats', 'subcats.category_id', '=', 'categories.id')
                        ->select(DB::raw('categories.name as category_name'), 'subcats.*')
                        ->get();

        return response()->json($categories);
    }

}
