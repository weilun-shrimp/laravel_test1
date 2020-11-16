<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/*
    laravel不會預設controller會用到什麼東西, 所以有用到什麼namespace 功能要自己use
    use DB;  用來存取資料庫
    use Auth  用來使用驗證
*/
use DB;
use Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = DB::select('select * from posts order by id DESC');

        $to_view_data = [
            'posts' => $result
        ];

        return view('posts.list', $to_view_data);
        //去秀出/resource/view下面的posts資料夾下面的list.blade.php, 並傳參數給它
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
            laravelr將post過來的值用一個＄request變數打包成集合
            若要取用值有兩種方法
            第一種 直接使用 ＄POST_['input名'];
            第二種 $request->input('input名');
        */
        echo $request->input('status');
        echo '</br>';
        echo $request->input('comment_status');


        DB::insert('insert into posts (author_id, created_date, created_time, title, excerpt, content, status, comment_status, type) values (?, ?, ?, ?, ?, ?, ?, ?, ?)', 
            array(
                Auth::id(), 
                date ("Y-m-d"),
                date ("H:i:s"),
                $request->input('title'),
                $request->input('excerpt'),
                $request->input('content'),
                $request->input('status')? 'publish' : 'unpublish',
                $request->input('comment_status')? 'allow' : 'close',
                'post'
        ));
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $results = DB::select('select * from posts where id = ?', [$id]);
        $to_view_data = [
            'post' => $results
        ];
        return view('posts.show', $to_view_data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $results = DB::select('select * from posts where id = ?', [$id]);
        $to_view_data = [
            'post' => $results
        ];
        return view('posts.edit', $to_view_data);
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
        DB::update('update posts set title = ?, content = ?, excerpt = ?, status = ?, comment_status = ?, modified_date = ?, modified_time = ? where id = ?', array(
            $request->input('title'),
            $request->input('content'),
            $request->input('excerpt'),
            $request->input('status'),
            $request->input('comment_status'),
            date ("Y-m-d"),
            date ("H:i:s"),
            $id
        ));
        return $this->show($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('delete from posts where id = ?', [$id]);
        return redirect()->route('posts.index');
    }
}
