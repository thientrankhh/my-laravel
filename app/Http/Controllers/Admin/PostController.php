<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public CategoryRepository $categoryRepo;

    public PostRepository $postRepo;

    public function __construct(CategoryRepository $categoryRepo, PostRepository $postRepo)
    {
        $this->categoryRepo = $categoryRepo;
        $this->postRepo = $postRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categoryRepo->all();
        $posts = $this->postRepo->with('category')->orderByDesc('created_at')->paginate(10);

        return view("admin.posts.index", compact('posts', 'categories'))->with('success', 'List all posts');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoryRepo->all();

        return view("addmin.posts.create", compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = $request->all();
        $params = array_merge($params, [
            'status' => empty($params['status']) ? 0 : 1,
            'outstanding' => empty($params['outstanding']) ? 0 : 1,
            'slug' => Str::slug($params['name'], '-')
        ]);

        if ($request->image) {
            $params['image'] = $this->postRepo->uploadImages($request->image);
        }

        $this->postRepo->create($params);

        return redirect()->route('admin.posts.index')->with('success', 'Add post success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function checkUniqueNamePost(Request $request)
    {
        $name = $request->name;
        $result = "true";
        $post = $this->postRepo->findByField('name', $name);
        if (sizeof($post) != 0) {
            $result = "false";
        }

        return $result;
    }

    public function checkUniqueNamePostEdit(Request $request)
    {
        $name = $request->name;
        $id = $request->id_post;

        $result = "true";
        $post = $this->postRepo->where('name', $name)->where('id', '<>', $id)->get();
        if (sizeof($post) != 0) {
            $result = "false";
        }

        return $result;
    }
}
