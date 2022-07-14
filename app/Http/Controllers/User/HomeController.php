<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public CategoryRepository $categoryRepository;

    public PostRepository $postRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CategoryRepository $categoryRepository, PostRepository $postRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->postRepository = $postRepository;
        $categories = $this->categoryRepository->all();
        View::share('categories', $categories);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->postRepository->with('category')->where([
            'status' => 1,
            'outstanding' => 1,
        ])->take(6)->get();

        return view('home', compact('posts'));
    }

    public function allPosts()
    {
        $posts = $this->postRepository->where('status', true)->get();

        return view('user.posts', compact('posts'));
    }

    public function getPostsByCategory($slug)
    {
        $category = $this->categoryRepository->findWhere([
            'slug' => $slug
        ])->first();

        $posts = $this->postRepository->where('status', true)->get();

        return view('user.posts', compact('posts', 'category'));
    }
}
