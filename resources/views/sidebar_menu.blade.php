<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4 sidebar-dark-primary">
	<!-- Brand Logo -->
	<a href="{{ route('dashboard') }}" class="brand-link">
		<img src="{{ asset('admin_lte') }}/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
		style="opacity: .8">
		<span class="brand-text font-weight-light">{{ config('app.name') }}</span>
	</a>
	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="{{ asset('admin_lte') }}/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<a href="#" class="d-block">Administrator</a>
			</div>
		</div>
		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
				with font-awesome or any other icon font library -->
				<li class="nav-item">
					<a href="{{ route('dashboard') }}" class="nav-link">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>
							Dashboard
						</p>
					</a>
				</li>
				<li class="nav-item has-treeview">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-tools"></i>
						<p>
							Setting
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{route('kwitansi.index')}}" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<i class="nav-icon fas fa-file-invoice"></i>
								<p>Kwitansi</p>
							</a>
						</li>
						<li class="nav-item has-treeview">
							<a href="#" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<i class="nav-icon fas fa-truck-loading"></i>
								<p>
									Inventory
									<i class="right fas fa-angle-left"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="{{ route('konfigurasi.form') }}" class="nav-link">
										<i class="far fa-dot-circle nav-icon"></i>
										<p>Konfigurasi</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="{{ route('master-barang.index') }}" class="nav-link">
										<i class="far fa-dot-circle nav-icon"></i>
										<p>Master Barang</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="{{ route('master-barang-kategori.index') }}" class="nav-link">
										<i class="far fa-dot-circle nav-icon"></i>
										<p>Kategori Master Barang</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="{{ route('supplier.index') }}" class="nav-link">
										<i class="far fa-dot-circle nav-icon"></i>
										<p>Supplier</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="{{ route('pembelian_barang.index') }}" class="nav-link">
										<i class="far fa-dot-circle nav-icon"></i>
										<p>Pembelian</p>
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</li>
				<li class="nav-item">
					<a href="{{ route('penjualan.create') }}" class="nav-link">
						<i class="nav-icon fas fa-money-bill-wave"></i>
						<p>
							Kasir
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="{{ route('penjualan.index') }}" class="nav-link">
						<i class="nav-icon fas fa-history"></i>
						<p>
							Data Transaksi
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="{{route('laporan.index')}}" class="nav-link">
						<i class="nav-icon far fa-file"></i>
						<p>
							Laporan
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="{{ url('logout') }}" class="nav-link">
						<i class="nav-icon fas fa-th"></i>
						<p>
							Logout
						</p>
					</a>
				</li>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>