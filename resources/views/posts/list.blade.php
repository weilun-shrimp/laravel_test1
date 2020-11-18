@extends('layouts.master')
@section('title', '新增文章')
@section('content')

@auth
	<div class='row'>
		<div class='col'>
			<a href="{{ route('posts.create') }}">新增文章</a>
		</div>
	</div>
@endauth


<div class='row'>
	<div class='col'>
		<h1>文章列表頁面</h1>
		<table class="table table-striped table-dark">
			<thead>
				<tr>
					<th scope="col">id</th>
					<th scope="col">title</th>
					<th scope="col">excerpt</th>
					<th scope="col">created_datetime</th>
					<th scope="col">status</th>
					<th scope="col">comment_status</th>
					@auth
						<th scope="col">oprate</th>
					@endauth
				</tr>
			</thead>
			<tbody>
				@foreach($posts as $post)
					<tr>
						<th scope="row">{{ $post->id }}</th>
						<td><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></td>
						<td>
							{{ mb_substr($post->excerpt,0,30,"UTF-8") }}
						</td>
						<td>
							{{ $post->created_date }}
							</br>
							{{ $post->created_time }}
						</td>
						<td>{{ $post->status }}</td>
						<td>{{ $post->comment_status }}</td>
						@auth
							<td>
								<a href="{{ route('posts.edit', $post->id) }}">edit</a> 
								
							</td>
						@endauth
					</tr>
				@endforeach
			</tbody>
		</table>
		<?php //生成laravel分頁模板（還要宣告使用bootstrap4樣式才能正常使用） ?>
		{{ $posts->links('pagination::bootstrap-4') }}
	</div>
</div>
@endsection
