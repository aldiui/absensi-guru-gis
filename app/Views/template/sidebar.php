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
            <li class="<?= (uri(1) == 'home') ? 'active' : '';?>">
                <a href="<?= base_url('home');?>" class="nav-link"><i class="fas fa-home"></i><span>Home</span></a>
            </li>
            <li class="<?= (uri(1) == 'riwayat') ? 'active' : '';?>">
                <a href="<?= base_url('riwayat');?>" class="nav-link"><i
                        class="fas fa-file-alt"></i><span>Riwayat</span></a>
            </li>
            <li class="<?= (uri(1) == 'absensi') ? 'active' : '';?>">
                <a href="<?= base_url('absensi');?>" class="nav-link"><i
                        class="fas fa-camera"></i><span>Absensi</span></a>
            </li>
            <li class="<?= (uri(1) == 'izin') ? 'active' : '';?>">
                <a href="<?= base_url('izin');?>" class="nav-link"><i class="fas fa-calendar"></i><span>Izin</span></a>
            </li>
            <li class="<?= (uri(1) == 'profil') ? 'active' : '';?>">
                <a href="<?= base_url('profil');?>" class="nav-link"><i class="fas fa-user"></i><span>Profil</span></a>
            </li>
        </ul>
    </aside>
</div>