<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

/*
    laravel不會預設controller會用到什麼東西, 所以有用到什麼namespace 功能要自己use
    use App\Models\Post;  取用post model （eloquent orm方法）
    use DB;  用來存取資料庫
    use Auth  用來使用驗證
*/
use App\Models\Post;
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
        //這是db的方法
        //$results = DB::select('select * from posts order by id DESC');

        //下面是laravel eloquent orm 的 model 方法
        $results = Post::orderBy('id','DESC')->paginate(25);

        $to_view_data = [
            'posts' => $results
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

        /*  這是DB寫入方法
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
        */

        //eloquent寫入方法
        $insert_att['author_id'] = Auth::id();
        $insert_att['created_date'] = date ("Y-m-d");
        $insert_att['created_time'] = date ("H:i:s");
        $insert_att['title'] = $request->input('title');
        $insert_att['excerpt'] = $request->input('excerpt');
        $insert_att['content'] = $request->input('content');
        $insert_att['status'] = $request->input('status')? 'publish' : 'unpublish';
        $insert_att['comment_status'] = $request->input('comment_status')? 'allow' : 'close';
        $insert_att['type'] = 'post';
        Post::create($insert_att);

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
        /*db用法
        $results = DB::select('select * from posts where id = ?', [$id])[0];
        */

        //eloquent用法
        $results = Post::where('id','=',$id)->first();

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
        /*db用法
        $results = DB::select('select * from posts where id = ?', [$id])[0];
        */

        //eloquent用法
        $results = Post::where('id','=',$id)->first();

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
        /* db方法
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
        */

        //eloquent寫入方法  先查出要update的資料
        $need_modify_post = Post::where('id','=',$id)->first();

        $update_att['modified_date'] = date ("Y-m-d");
        $update_att['modified_time'] = date ("H:i:s");
        $update_att['title'] = $request->input('title');
        $update_att['excerpt'] = $request->input('excerpt');
        $update_att['content'] = $request->input('content');
        $update_att['status'] = $request->input('status');
        $update_att['comment_status'] = $request->input('comment_status');

        $need_modify_post->update($update_att);

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
        /* db方法
        DB::delete('delete from posts where id = ?', [$id]);
        */

        //eloquent寫入方法  先查出要update的資料
        $need_delete_post = Post::where('id','=',$id)->first();
        $need_delete_post->delete();
        return redirect()->route('posts.index');
    }
}
