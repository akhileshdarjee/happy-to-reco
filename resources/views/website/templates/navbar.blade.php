<header class="main-header">
	<nav class="navbar navbar-static-top">
		<div class="container">
			<div class="navbar-header">
				<a href="/" class="navbar-brand"><b>Happy to Reco</b></a>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
					<i class="fa fa-bars"></i>
				</button>
			</div>
			<!-- /.navbar-collapse -->
			<!-- Navbar Right Menu -->
			<div class="navbar-custom-menu">
				<ul class="nav navbar-nav">
					@if (Auth::check())
						<li>
							<a href="/">Home</a>
						</li>
						<li>
							<a href="/dashboard">Dashboard</a>
						</li>
						<li>
							<a href="/logout">Logout</a>
						</li>
					@else
						<!-- Notifications Menu -->
						<li>
							<a href="/login">Login</a>
						</li>
						<li>
							<a href="/register">Register</a>
						</li>
					@endif
				</ul>
			</div>
			<!-- /.navbar-custom-menu -->
		</div>
		<!-- /.container-fluid -->
	</nav>
</header>