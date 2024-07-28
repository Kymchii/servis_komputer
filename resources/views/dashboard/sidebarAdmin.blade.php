<li class="menu-header"><span> Menu Utama</span></li>
<li class="nav-item{{ request()->is('admin/user') ? ' active' : '' }}"><a href="{{ url('/admin/user') }}"><i class="fas fa-user-friends"></i><span> User</span></a></li>
<li class="nav-item{{ request()->is('admin/customers') ? ' active' : '' }}"><a href="{{ url('/admin/customers') }}"><i class="fas fa-chalkboard-teacher"></i><span>Customers</span></a></li>
<li class="nav-item{{ request()->is('admin/pegawai') ? ' active' : '' }}"><a href="{{ url('/admin/pegawai') }}"><i class="fas fa-address-card"></i><span>Pegawai</span></a></li>
<li class="nav-item{{ request()->is('admin/komputer') ? ' active' : '' }}"><a href="{{ url('/admin/komputer') }}"><i class="fas fa-desktop"></i><span>Komputer</span></a></li>
<li class="nav-item{{ request()->is('admin/keluhan') ? ' active' : '' }}"><a href="{{ url('/admin/keluhan') }}"><i class="fas fa-thumbtack"></i><span>Keluhan</span></a></li>
<li class="nav-item{{ request()->is('admin/barang') ? ' active' : '' }}"><a href="{{ url('/admin/barang') }}"><i class="fas fa-microchip"></i><span>Barang</span></a></li>
<li class="nav-item{{ request()->is('admin/supplier') ? ' active' : '' }}"><a href="{{ url('/admin/supplier') }}"><i class="fa fa-truck-moving"></i><span>Supplier</span></a></li>