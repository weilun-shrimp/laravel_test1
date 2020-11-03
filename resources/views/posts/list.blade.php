

<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

		<title>{{ env('APP_NAME') }}</title>
	</head>
	<body>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

		<h1>歡迎光臨{{ env('APP_NAME') }}</h1>

		<div class="container">
			<div class="row">
				<div class="col">
					<nav class="navbar navbar-expand-lg navbar-light bg-light">
						<a class="navbar-brand" href="#">Navbar</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse" id="navbarNav">
							<ul class="navbar-nav">
								<li class="nav-item active">
									<a class="nav-link" href="{{route('show.indexpage')}}">Home <span class="sr-only">(current)</span></a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="{{route('posts.index')}}">blog</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#">Pricing</a>
								</li>
								<li class="nav-item">
									<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
								</li>
							</ul>
						</div>
					</nav>
				</div>
			</div>
		</div>

		<div class='container'>
			<div class='row'>
				<div class='col'>
					<a href="{{ route('posts.create') }}">新增文章</a>
				</div>
			</div>
		</div>

		<div class='container'>
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
		</div>

	</body>
</html>