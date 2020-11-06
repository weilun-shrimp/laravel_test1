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
						<li class="nav-item active">
							<a class="nav-link" href="{{route('show.testss.indexpage')}}">testss_Home <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{route('posts.index')}}">blog</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">關於我們</a>
						</li>
						<li class="nav-item">
							<a class="nav-link disabled" href="#">聯絡我們</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{route('login')}}">[登入]</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{route('register')}}">[註冊]</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</div>
</div>