
@extends('layouts.master')
@section('title', '新增文章')
@section('content')
<div class='row'>
	<div class='col'>
		<h1>新增文章頁面</h1>
		{{ Form::open(array('url' => 'foo/bar')) }}
			<div class="form-group">
			    <?php
			    	echo Form::label('create_post_title_input', '文章標題', array(
			    		'class' => 'create_post_label', 
			    		'id' => 'create_post_title_label'
			    	));
			    	echo Form::text('title', '', array(
			    		'class' => 'form-control', 
			    		'id' => 'create_post_title_input',
			    		'maxlength' => '255'
			    	));
		    	?>
	    	</div>
	    	<div class="form-group">
		    	<?php
			    	echo Form::label('create_post_content_input', '文章內容', array(
			    		'class' => 'create_post_label', 
			    		'id' => 'create_post_content_label'
			    	));
			    	echo Form::textarea('content', '', array(
			    		'class' => 'form-control', 
			    		'id' => 'create_post_content_input'
			    	));
		    	?>
	    	</div>
	    	<div class="form-group">
		    	<?php
			    	echo Form::label('create_post_cexcerpt_input', '文章概要', array(
			    		'class' => 'create_post_label', 
			    		'id' => 'create_post_excerpt_label'
			    	));
			    	echo Form::textarea('excerpt', '', array(
			    		'class' => 'form-control', 
			    		'id' => 'create_post_cexcerpt_input',
			    		'rows' => '3'
			    	));
		    	?>
	    	</div>
	    	<div class="form-group form-check">
		    	<?php
			    	echo Form::label('status', '發布', array(
			    		'class' => 'create_post_label', 
			    		'id' => 'create_post_status_label'
			    	));
			    	echo Form::checkbox('status', '', array(
			    		'class' => 'form-check-input', 
			    		'id' => 'create_post_status_input'
			    	));
		    	?>
	    	</div>
	    	<div class="form-group form-check">
		    	<?php
			    	echo Form::label('comment_status', '允許留言', array(
			    		'class' => 'create_post_label', 
			    		'id' => 'create_post_status_label'
			    	));
			    	echo Form::checkbox('comment_status', '', array(
			    		'class' => 'form-check-input', 
			    		'id' => 'create_post_comment_status_input'
			    	));
			    ?>
		    </div>


		    <?php 
			    echo Form::submit('新增文章', array(
			    	'class' => 'btn btn-primary'
			    )); 
		    ?>
		{{ Form::close() }}
	</div>
</div>
@endsection

