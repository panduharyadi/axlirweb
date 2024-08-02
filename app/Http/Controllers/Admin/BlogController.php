<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Blog;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::all();

        $transactions = Transaction::all();
        $chartData = [];
        foreach ($transactions as $transaction) {
            $date = Carbon::parse($transaction->created_at)->format('d/m');
            if(isset($chartData[$date])) {
                $chartData[$date] += $transaction->total;
            } else {
                $chartData[$date] = $transaction->total; 
            }
        }
        return view('backend.pages.Blog.list', compact('chartData', 'blogs'));
    }

    // show blog yang di user
    public function feBlog()
    {
        $blogUser = Blog::whereDate('post', '>=', date('Y-m-d', strtotime('-1 day')))
                        ->whereDate('post', '<=', date('Y-m-d'))
                        ->get();
        return view('frontend.pages.blog', compact('blogUser'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $transactions = Transaction::all();
        $chartData = [];
        foreach ($transactions as $transaction) {
            $date = Carbon::parse($transaction->created_at)->format('d/m');
            if(isset($chartData[$date])) {
                $chartData[$date] += $transaction->total;
            } else {
                $chartData[$date] = $transaction->total; 
            }
        }
        return view('backend.pages.Blog.add', compact('chartData'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->hasFile('upload')) {
            // upload cover
            $file = $request->file('upload');
            $filename = sprintf('%s_%s.%s', date('Y-m-d'), md5(microtime(true)), $file->extension());
            $image_path = $file->move('storage/blog', $filename);

            $slug = substr($request->content, 0, 50);

            Blog::create([
                'image' => $image_path,
                'headline' => $request->headline,
                'slug' => $slug,
                'content' => $request->content,
                'meta' => $request->meta,
                'post' => $request->jadwal
            ]);

            return redirect()->route('admin.blogs')->with('success', 'Blog Created');
        }
    }

    public function ckeditorUpload(Request $request)
    {
        if($request->hasFile('upload'))
        {
            $file = $request->file('upload');
            $filename = sprintf('%s_%s.%s', date('Y-m-d'), md5(microtime(true)), $file->extension());
            $file->move(public_path('uploads/ckeditor'), $filename);
            $url = asset('uploads/ckeditor/' . $filename);

            return response()->json(['uploaded' => 1, 'url' => $url]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $singleBlogs = Blog::find($id);
        if(!$singleBlogs) {
            abort(404);
        }
        return view('frontend.pages.single-blog', compact('singleBlogs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blogs = Blog::find($id);
        $blogs->delete();

        return redirect()->back();
    }
}