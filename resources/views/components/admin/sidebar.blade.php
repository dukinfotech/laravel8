<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="/admin" class="brand-link">
		<img src="{{ asset('assets/lib/adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
					style="opacity: .8">
		<span class="brand-text font-weight-light">Dashboard</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="{{ asset('assets/lib/adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info w-100">
				<a href="#">{{ auth()->user()->name }}</a>
				<a href="/logout" class="float-right fa-lg" style="transform: translateY(.165em);" title="Đăng xuất">
					<i class="fas fa-sign-out-alt"></i>
				</a>
			</div>
		</div>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<li class="nav-item">
					<a href="/admin/posts" class="nav-link">
						<i class="nav-icon far fa-edit"></i>
						<p>
							Quản lý bài viết
						</p>
					</a>
				</li>
				@role('Super Admin')
				<li class="nav-item">
					<a href="/admin/tags" class="nav-link">
						<i class="nav-icon fas fa-tags"></i>
						<p>
							Quản lý thẻ tag
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="/admin/categories" class="nav-link">
						<i class="nav-icon fab fa-elementor"></i>
						<p>
							Quản lý thể loại
						</p>
					</a>
				</li>
				@endrole
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>
