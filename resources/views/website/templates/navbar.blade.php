<header class="main-header">
	<nav class="navbar navbar-static-top">
		<div class="container">
			<div class="navbar-header">
				<a href="/" class="navbar-brand"><b>Admin</b>LTE</a>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
					<i class="fa fa-bars"></i>
				</button>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
					<li><a href="#">Link</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#">Action</a></li>
							<li><a href="#">Another action</a></li>
							<li><a href="#">Something else here</a></li>
							<li class="divider"></li>
							<li><a href="#">Separated link</a></li>
							<li class="divider"></li>
							<li><a href="#">One more separated link</a></li>
						</ul>
					</li>
				</ul>
				<form class="navbar-form navbar-left" role="search">
					<div class="form-group">
						<input type="text" class="form-control" id="navbar-search-input" placeholder="Search">
					</div>
				</form>
			</div>
			<!-- /.navbar-collapse -->
			<!-- Navbar Right Menu -->
			<div class="navbar-custom-menu">
				<ul class="nav navbar-nav">
					<!-- Notifications Menu -->
					<li class="dropdown notifications-menu">
						<!-- Menu toggle button -->
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="fa fa-bell-o"></i>
							<span class="label label-warning">10</span>
						</a>
						<ul class="dropdown-menu">
							<li class="header">You have 10 notifications</li>
							<li>
								<!-- Inner Menu: contains the notifications -->
								<ul class="menu">
									<li><!-- start notification -->
										<a href="#">
											<i class="fa fa-users text-aqua"></i> 5 new members joined today
										</a>
									</li>
									<!-- end notification -->
								</ul>
							</li>
							<li class="footer"><a href="#">View all</a></li>
						</ul>
					</li>
					<!-- User Account: style can be found in dropdown.less -->
					<li class="dropdown user user-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<img alt="{{ Session::get('user') }}" class="user-image" src="{{ Session::get('avatar') }}" title="{{ Session::get('user') }}" />
							<span class="hidden-xs">{{ Session::get('user') }}</span>
						</a>
						<ul class="dropdown-menu">
							<!-- User image -->
							<li class="user-header">
								<img alt="{{ Session::get('user') }}" class="img-circle" src="{{ Session::get('avatar') }}" title="{{ Session::get('user') }}" />
								<p>
									{{ Session::get('user') }} - {{ Session::get('role') }}
								</p>
							</li>
							<!-- Menu Footer-->
							<li class="user-footer">
								<div class="row">
									<div class="col-md-4">
										<a href="/form/user/{{ Session::get('user_id') }}" class="btn btn-default">Profile</a>
									</div>
									<div class="col-md-4">
										<a href="/app/settings" class="btn btn-default">Settings</a>
									</div>
									<div class="col-md-4">
										<a href="/logout" class="btn btn-default">Sign out</a>
									</div>
								</div>
							</li>
						</ul>
					</li>
				</ul>
			</div>
			<!-- /.navbar-custom-menu -->
		</div>
		<!-- /.container-fluid -->
	</nav>
</header>