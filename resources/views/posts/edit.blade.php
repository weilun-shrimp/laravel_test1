
@guest
    return redirect()->route('posts.index');
@endguest



@extends('layouts.master')
@section('title', '修改文章')
@section('content')
<div class='row'>
	<div class='col'>
		<h1>修改文章頁面</h1>
		{{ Form::open(array('url' => route('posts.update', $post->id) , 'method' => 'POST')) }}
			<div class="form-group">
			    <?php
			    	echo Form::label('create_post_title_input', '文章標題', array(
			    		'class' => 'create_post_label', 
			    		'id' => 'edit_post_title_label'
			    	));
			    	echo Form::text('title', $post->title , array(
			    		'class' => 'form-control', 
			    		'id' => 'edit_post_title_input',
			    		'maxlength' => '255'
			    	));
		    	?>
	    	</div>
	    	<div class="form-group">
		    	<?php
			    	echo Form::label('create_post_content_input', '文章內容', array(
			    		'class' => 'create_post_label', 
			    		'id' => 'edit_post_content_label'
			    	));
			    	echo Form::textarea('content', $post->content , array(
			    		'class' => 'form-control', 
			    		'id' => 'edit_post_content_input'
			    	));
		    	?>
	    	</div>
	    	<div class="form-group">
		    	<?php
			    	echo Form::label('create_post_cexcerpt_input', '文章概要', array(
			    		'class' => 'create_post_label', 
			    		'id' => 'edit_post_excerpt_label'
			    	));
			    	echo Form::textarea('excerpt', $post->excerpt , array(
			    		'class' => 'form-control', 
			    		'id' => 'edit_post_cexcerpt_input',
			    		'rows' => '3'
			    	));
		    	?>
	    	</div>
	    	<div class="form-group form-check">
		    	<?php
			    	echo Form::label('status', '發布', array(
			    		'class' => 'create_post_label', 
			    		'id' => 'edit_post_status_label'
			    	));

			    	echo Form::select('status', array(
					   'publish' => 'publish',
					   'unpublish' => 'unpublish'
					), $post->status,
						array(
			    		'class' => 'form-control col-md-4', 
			    		'id' => 'edit_post_status_input'
					));
		    	?>
	    	</div>
	    	<div class="form-group form-check">
		    	<?php
		    		$status = ($post->comment_status=='allow')?'true':'false';
			    	echo Form::label('comment_status', '允許留言', array(
			    		'class' => 'create_post_label', 
			    		'id' => 'edit_post_status_label'
			    	));

			    	echo Form::select('comment_status', array(
					   'allow' => 'allow',
					   'close' => 'close'
					), $post->comment_status,
						array(
			    		'class' => 'form-control col-md-4', 
			    		'id' => 'edit_post_comment_status_input'
					));
			    ?>
		    </div>

		    @csrf 

		    {{ method_field('PATCH') }}

		    <?php 
		    	echo Form::token();

			    echo Form::submit('修改文章', array(
			    	'class' => 'btn btn-primary'
			    )); 
		    ?>
		{{ Form::close() }}
	</div>
</div>
@endsection

