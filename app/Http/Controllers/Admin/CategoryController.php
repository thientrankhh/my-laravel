<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    private CategoryRepository $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categoryRepository->orderByDesc('created_at')->paginate(10);

        return view("admin.categories.index",
            compact('categories')
        )->with('success', 'Show list categories');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin/categories/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $params = $request->except('_token');
        $params['slug'] = Str::slug($params['name'], '-');

        $this->categoryRepository->create($params);

        return redirect()->route("admin.categories.index")->with('success', 'Create category success');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $params = $request->all();
        $params['slug'] = Str::slug($params['name'], '-');
        $this->categoryRepository->update($params, $id);

        return redirect()->route("admin.categories.index")->with('success', 'Update category success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->categoryRepository->delete($id);

        return redirect()->route('admin.categories.index')->with('success', 'Delete category success');
    }

    public function checkUniqueNameCategories(Request $request)
    {
        $name = $request->name;
        $result = "true";
        $category = $this->categoryRepository->findByField('name', $name);
        if (sizeof($category) != 0) {
            $result = "false";
        }

        return $result;
    }

    public function checkUniqueNameCategoriesEdit(Request $request)
    {
        $name = $request->name;
        $id   = $request->id_category;

        $result = "true";
        $category =  $this->categoryRepository->where('name', $name)->where('id', '<>', $id)->get();
        if (sizeof($category) != 0) {
            $result = "false";
        }

        return $result;
    }
}
