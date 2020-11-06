@extends('layouts.master')
@section('title', '新增文章')
@section('content')
<div class='row'>
	<div class='col'>
		<a href="{{ route('posts.create') }}">新增文章</a>
	</div>
</div>
<div class='row'>
	<div class='col'>
		<h1>文章列表頁面</h1>
		這是blog  list頁, 傳入的參數是"{{$name}}"
		</br>

		可以直接用兩個大括號將變數包起來顯示
		</br>

		<?php

		echo '也可以在php裡面echo'.$name;
		?>
	</div>
</div>
@endsection
