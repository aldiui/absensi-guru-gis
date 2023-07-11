<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <div class="d-flex justify-content-center align-items-center">
                <div class="mr-2">
                    <img src="<?= base_url();?>assets/img/<?= $setting['logo_kantor'];?>" alt="logo" width="25px">
                </div>
                <div class="mt-1">
                    <div class="font-weight-bold"><?= $setting['name_aplikasi'];?></div>
                </div>
            </div>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <div><img src="<?= base_url();?>assets/img/<?= $setting['logo_kantor'];?>" alt="logo" width="25px"></div>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="<?= (uri(2) == 'dashboard') ? 'active' : '';?>">
                <a href="<?= base_url('operator/dashboard');?>" class="nav-link"><i
                        class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Data Monitor</li>
            <li class="<?= (uri(2) == 'monitoring') ? 'active' : '';?>">
                <a href="<?= base_url('operator/monitoring');?>" class="nav-link"><i
                        class="fas fa-tv"></i><span>Monitoring</span></a>
            </li>
            <li
                class="dropdown <?= (uri(2) == 'absensi') ? 'active' : '';?> <?= (uri(2) == 'rekap') ? 'active' : '';?> <?= (uri(2) == 'izin') ? 'active' : '';?>">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-check-square"></i>
                    <span>Absensi</span></a>
                <ul class=" dropdown-menu">
                    <li class="<?= (uri(2) == 'absensi') ? 'active' : '';?>">
                        <a href="<?= base_url('operator/absensi');?>">Absensi</a>
                    </li>
                    <li class="<?= (uri(2) == 'rekap') ? 'active' : '';?>">
                        <a href="<?= base_url('operator/rekap');?>">Rekap Absensi</a>
                    </li>
                    <li class="<?= (uri(2) == 'izin') ? 'active' : '';?>">
                        <a href="<?= base_url('operator/izin');?>">Izin</a>
                    </li>
                </ul>
            </li>
            <li class="<?= (uri(2) == 'penggajian') ? 'active' : '';?>">
                <a href="<?= base_url('operator/penggajian');?>" class="nav-link"><i
                        class="fas fa-dollar-sign"></i><span>Penggajian</span></a>
            </li>
            <li class="menu-header">Data Menu</li>
            <li class="<?= (uri(2) == 'jabatan') ? 'active' : '';?>">
                <a href="<?= base_url('operator/jabatan');?>" class="nav-link"><i
                        class="fas fa-map-pin"></i><span>Jabatan</span></a>
            </li>
            <li class="<?= (uri(2) == 'karyawan') ? 'active' : '';?>">
                <a href="<?= base_url('operator/karyawan');?>" class="nav-link"><i
                        class="fas fa-user-tie"></i><span>Karyawan</span></a>
            </li>
            <li class="<?= (uri(2) == 'jadwal') ? 'active' : '';?>">
                <a href="<?= base_url('operator/jadwal');?>" class="nav-link"><i
                        class="fas fa-calendar"></i><span>Jadwal</span></a>
            </li>
            <li class="<?= (uri(2) == 'pengaturan') ? 'active' : '';?>">
                <a href="<?= base_url('operator/pengaturan');?>" class="nav-link"><i
                        class="fas fa-cogs"></i><span>Pengaturan</span></a>
            </li>
            <li class="menu-header">Data Profil</li>
            <li class="<?= (uri(2) == 'profil') ? 'active' : '';?>">
                <a href="<?= base_url('operator/profil');?>" class="nav-link"><i
                        class="fas fa-user"></i><span>Profil</span></a>
            </li>
        </ul>
    </aside>
</div>