@extends('layouts.master')
@section('title', '文章頁面')
@section('content')

@auth
	<div class='row'>
		<div class='col'>
			<a href="{{ route('posts.edit', $post[0]->id) }}" class='btn btn-primary'>edit</a>
			<a href="#" class='btn btn-danger' onclick="document.getElementById('delete_designate_post_form').submit()">delete</a>
			{{ Form::open(array(
				'url' => route('posts.destroy', $post[0]->id), 
				'method' => 'post', 
				'class' => 'delete_post_form', 
				'id' => 'delete_designate_post_form')) 
			}}
				@csrf 
			    {{ method_field('DELETE') }}
			{{ Form::close() }}
		</div>
	</div>
@endauth

<div class='row'>
	<div class='col'>
		<h1>{{ $post[0]->title }}</h1>

		<div class="alert alert-primary" role="alert">
			{{ $post[0]->created_date.$post[0]->created_time }}
			</br>
			post by {{ $post[0]->author_id }}

		</div>

		<div class="alert alert-secondary" role="alert">
			{{ $post[0]->excerpt }}
		</div>
		
		<div class='post_content'>
			{{ $post[0]->content }}
		</div>
	</div>
</div>
@endsection
