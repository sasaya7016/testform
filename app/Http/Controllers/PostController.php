<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePost;

use League\Csv\Reader;
use League\Csv\Statement;

use Illuminate\Http\Response;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = DB::table('posts')
        ->select('id', 'lastname', 'firstname','text', 'email')
        ->orderBy('created_at', 'desc')
        ->get();

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePost $request)
    {
        $post = new Post;
        $post->lastname= $request->input('lastname');
        $post->firstname= $request->input('firstname');
        $post->email= $request->input('email');
        $post->text= $request->input('text');
        $post->save();

        return redirect('posts/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = DB::table('posts')
        ->select('id', 'lastname', 'firstname','text', 'email')
        ->orderBy('created_at', 'desc')
        ->get();

        $post = Post::find($id);

        return view('posts.edit', compact('post'));
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
        $post = Post::find($id);
        $post->lastname= $request->input('lastname');
        $post->firstname= $request->input('firstname');
        $post->email= $request->input('email');
        $post->text= $request->input('text');
        $post->save();

        return redirect('posts/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('posts/index');
    }


    public function importCSV(Request $request, Statement $stmt, Post $post)
    {
        $file_path = $request->file('file')->getPathname();
       
        $csv = Reader::createFromPath($file_path, 'r')->setHeaderOffset(0);
        $records = $stmt->process($csv);
        $data = [];

        foreach ($records as $record) {
            $record['created_at'] = now();
            $record['updated_at'] = now();
            $data[] = $record;
        }
        $post->insert($data);

        return redirect()->route('posts.index');
    }


    public function exportCSV()
    {
        $csv = \League\Csv\Writer::createFromFileObject(new \SplTempFileObject());

        $csv->insertOne(['id', '苗字', '名前', 'メールアドレス','コメント']);

        Post::all()->each(function($post) use($csv) {
            $csv->insertOne($post->toArray());
        });

        return new Response($csv->getContent(), 200, [
            'Content-Encoding' => 'none',
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="'.'testform.csv'.'"',
            'Content-Description' => 'File Transfer',
        ]);
    }
}