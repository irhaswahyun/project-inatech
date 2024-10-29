<div class="sidebar-header" style="padding-bottom: 0px">
    <img src="{{ asset('storage/asset_web/Logo Fluks w Text.png') }}" alt="" srcset="" style="height: 3.3rem">
</div>
<div class="sidebar-menu">
    <ul class="menu">
        <li class="sidebar-item  {{ $activeMenu == 'dashboard' ? 'active' : '' }}">
            <a href="{{ url('/dashboard') }}" class='sidebar-link'>
                <i data-feather="home" width="20"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class='sidebar-title'>MANAJEMEN TAMBAK</li>
        <li class="sidebar-item {{ $activeMenu == 'kelolaPengguna' ? 'active' : '' }}">
            <a href="{{ url('/kelolaPengguna') }}" class='sidebar-link'>
                <i data-feather="triangle" width="20"></i>
                <span>Kelola Pengguna</span>
            </a>
        </li>
        <li
            class="sidebar-item has-sub {{ in_array($activeMenu, ['kelolaGudang', 'kelolaPJGudang']) ? 'active' : '' }}">
            <a href="#" class='sidebar-link'>
                <i data-feather="triangle" width="20"></i>
                <span>Kelola Gudang</span>
            </a>
            <ul class="submenu {{ in_array($activeMenu, ['kelolaGudang', 'kelolaPJGudang']) ? 'active' : '' }}">
                <li class="{{ $activeMenu == 'kelolaGudang' ? 'active' : '' }}">
                    <a href="{{ url('/kelolaGudang') }}">Gudang</a>
                </li>
                <li class="{{ $activeMenu == 'kelolaPJGudang' ? 'active' : '' }}">
                    <a href="{{ url('/kelolaPJGudang') }}">Penanggung Jawab Gudang</a>
                </li>
            </ul>
        </li>
        <li class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i data-feather="triangle" width="20"></i>
                <span>Kelola Tambak</span>
            </a>
            <ul class="submenu ">
                <li>
                    <a href="{{ url('/tambak') }}">Tambak</a>
                </li>
                <li>
                    <a href="{{ url('/pjTambak') }}">Penanggung Jawab Tambak</a>
                </li>
                <li>
                    <a href="{{ url('/kolam') }}">Kolam</a>
                </li>
                <li>
                    <a href="{{ url('/fasekolam') }}">Fase Kolam</a>
                </li>
            </ul>
        </li>
        <li class='sidebar-title'>MANAJEMEN INVENTORY</li>
        <li
            class="sidebar-item has-sub {{ in_array($activeMenu, ['kelolaPakan', 'kelolaPakanGudang', 'kelolaTransaksiPakan']) ? 'active' : '' }}">
            <a href="#" class='sidebar-link'>
                <i data-feather="triangle" width="20"></i>
                <span>Manajemen Pakan</span>
            </a>
            <ul
                class="submenu {{ in_array($activeMenu, ['kelolaPakan', 'kelolaPakanGudang', 'kelolaTransaksiPakan']) ? 'active' : '' }}">
                <li class="{{ $activeMenu == 'kelolaPakan' ? 'active' : '' }}">
                    <a href="{{ url('/kelolaPakan') }}">Pakan</a>
                </li>
                <li class="{{ $activeMenu == 'kelolaPakanGudang' ? 'active' : '' }}">
                    <a href="{{ url('/kelolaPakanGudang') }}">Pakan ke Gudang</a>
                </li>
                <li class="{{ $activeMenu == 'kelolaTransaksiPakan' ? 'active' : '' }}">
                    <a href="{{ url('/kelolaTransaksiPakan') }}">Transaksi Pakan</a>
                </li>
            </ul>
        </li>
        <li
            class="sidebar-item  has-sub {{ in_array($activeMenu, ['kelolaAlat', 'kelolaAlatGudang', 'kelolaTransaksiAlat']) ? 'active' : '' }}">
            <a href="#" class='sidebar-link'>
                <i data-feather="briefcase" width="20"></i>
                <span>Manajemen Alat</span>
            </a>
            <ul
                class="submenu {{ in_array($activeMenu, ['kelolaAlat', 'kelolaAlatGudang', 'kelolaTransaksiAlat']) ? 'active' : '' }}">
                <li>
                    <a href="{{ url('/kelolaAlat') }}">Alat</a>
                </li>
                <li>
                    <a href="{{ url('/kelolaAlatGudang') }}">Alat ke Gudang</a>
                </li>
                <li>
                    <a href="{{ url('/kelolaTransaksiAlat') }}">Transaksi Alat</a>
                </li>
            </ul>
        </li>
        <li class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i data-feather="triangle" width="20"></i>
                <span>Manajemen Obat</span>
            </a>
            <ul class="submenu ">
                <li>
                    <a href="component-alert.html">Obat</a>
                </li>
                <li>
                    <a href="component-badge.html">Obat ke Gudang</a>
                </li>
                <li>
                    <a href="component-breadcrumb.html">Transaksi Obat</a>
                </li>
            </ul>
        </li>
        <li class='sidebar-title'>MANAJEMEN BUDIDAYA</li>
        <li class="sidebar-item {{ $activeMenu == 'anco' ? 'active' : '' }}">
            <a href="{{ url('/anco') }}" class='sidebar-link'>
                <i data-feather="triangle" width="20"></i>
                <span>Anco</span>
            </a>
        </li>
        <li class="sidebar-item {{ $activeMenu == 'kualitasAir' ? 'active' : '' }}">
            <a href="{{ url('/kualitasair') }}" class='sidebar-link'>
                <i data-feather="triangle" width="20"></i>
                <span>Kualitas Air</span>
            </a>
        </li>
        <li class="sidebar-item {{ $activeMenu == 'penanganan' ? 'active' : '' }}">
            <a href="{{ url('/penanganan') }}" class='sidebar-link'>
                <i data-feather="triangle" width="20"></i>
                <span>Penanganan</span>
            </a>
        </li>
        <li class="sidebar-item {{ $activeMenu == 'sampling' ? 'active' : '' }}">
            <a href="{{ url('/sampling') }}" class='sidebar-link'>
                <i data-feather="triangle" width="20"></i>
                <span>Sampling</span>
            </a>
        </li>
        <li class="sidebar-item {{ $activeMenu == 'pakanHarian' ? 'active' : '' }}">
            <a href="{{ url('/pakanHarian') }}" class='sidebar-link'>
                <i data-feather="triangle" width="20"></i>
                <span>Pakan Harian</span>
            </a>
        </li>
        <li class="sidebar-item {{ $activeMenu == 'kematianUdang' ? 'active' : '' }}">
            <a href="{{ url('/kematianUdang') }}" class='sidebar-link'>
                <i data-feather="triangle" width="20"></i>
                <span>Kematian Udang</span>
            </a>
        </li>
        {{-- <li class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i data-feather="file-text" width="20"></i>
                <span>Form Elements</span>
            </a>

            <ul class="submenu ">

                <li>
                    <a href="form-element-input.html">Input</a>
                </li>

                <li>
                    <a href="form-element-input-group.html">Input Group</a>
                </li>

                <li>
                    <a href="form-element-select.html">Select</a>
                </li>

                <li>
                    <a href="form-element-radio.html">Radio</a>
                </li>

                <li>
                    <a href="form-element-checkbox.html">Checkbox</a>
                </li>

                <li>
                    <a href="form-element-textarea.html">Textarea</a>
                </li>

            </ul>

        </li>




        <li class="sidebar-item  ">
            <a href="form-layout.html" class='sidebar-link'>
                <i data-feather="layout" width="20"></i>
                <span>Form Layout</span>
            </a>

        </li>




        <li class="sidebar-item  ">
            <a href="form-editor.html" class='sidebar-link'>
                <i data-feather="layers" width="20"></i>
                <span>Form Editor</span>
            </a>

        </li>




        <li class="sidebar-item  ">
            <a href="table.html" class='sidebar-link'>
                <i data-feather="grid" width="20"></i>
                <span>Table</span>
            </a>

        </li>




        <li class="sidebar-item active ">
            <a href="table-datatable.html" class='sidebar-link'>
                <i data-feather="file-plus" width="20"></i>
                <span>Datatable</span>
            </a>

        </li>




        <li class='sidebar-title'>Extra UI</li>



        <li class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i data-feather="user" width="20"></i>
                <span>Widgets</span>
            </a>

            <ul class="submenu ">

                <li>
                    <a href="ui-chatbox.html">Chatbox</a>
                </li>

                <li>
                    <a href="ui-pricing.html">Pricing</a>
                </li>

                <li>
                    <a href="ui-todolist.html">To-do List</a>
                </li>

            </ul>

        </li>




        <li class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i data-feather="trending-up" width="20"></i>
                <span>Charts</span>
            </a>

            <ul class="submenu ">

                <li>
                    <a href="ui-chart-chartjs.html">ChartJS</a>
                </li>

                <li>
                    <a href="ui-chart-apexchart.html">Apexchart</a>
                </li>

            </ul>

        </li>




        <li class='sidebar-title'>Pages</li>



        <li class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i data-feather="user" width="20"></i>
                <span>Authentication</span>
            </a>

            <ul class="submenu ">

                <li>
                    <a href="auth-login.html">Login</a>
                </li>

                <li>
                    <a href="auth-register.html">Register</a>
                </li>

                <li>
                    <a href="auth-forgot-password.html">Forgot Password</a>
                </li>

            </ul>

        </li>




        <li class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i data-feather="alert-circle" width="20"></i>
                <span>Errors</span>
            </a>

            <ul class="submenu ">

                <li>
                    <a href="error-403.html">403</a>
                </li>

                <li>
                    <a href="error-404.html">404</a>
                </li>

                <li>
                    <a href="error-500.html">500</a>
                </li>

            </ul>

        </li> --}}
    </ul>
</div>
<button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
