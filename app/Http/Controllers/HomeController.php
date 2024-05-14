<?php

namespace App\Http\Controllers;

//import Model "Post
use App\Models\Post;

//return type View
use Illuminate\View\View;

use Illuminate\Http\Request;

//return type redirectResponse
use Illuminate\Http\RedirectResponse;

class HomeController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        //get posts
        $posts = Post::latest()->paginate(10);

        //render view with posts
        return view('home', compact('posts'));
    }



    /**
     * home
     *
     * @return View
     */
    public function create(): View
    {
        return view('create');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'image' => 'image|mimes:jpeg,jpg,png|max:10240',
            'asset_number' => 'required|min:8',
            'title' => 'required|min:2',
            // 'entry_date' => self::DATE_RULE, // Validasi tanggal masuk (opsional)
            // 'exit_date' => self::DATE_RULE,  // Validasi tanggal keluar (opsional)
            'content' => 'required|min:1',
            'status' => ''
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/posts', $image->hashName());

        //create post
        Post::create([
            'image' => $image->hashName(),
            'asset_number' => $request->asset_number,
            'title' => $request->title,
            'item_type' => $request->item_type,
            // 'entry_date' => $request->entry_date,
            // 'exit_date' => $request->exit_date,
            'content' => $request->content,
            'status' => $request->status
        ]);

        //redirect to index
        return redirect()->route('home')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        //get post by ID
        $post = Post::findOrFail($id);

        //render view with post
        return view('show', compact('post'));
    }
}


