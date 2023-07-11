<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg bg-info"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
            <form class="form-inline mr-auto">
                <ul class="navbar-nav mr-3">
                    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>
            </form>
            <ul class="navbar-nav navbar-right">
                <li class="dropdown"><a href="#" data-toggle="dropdown"
                        class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                        <img alt="image" src="<?= base_url();?>assets/img/user/<?= $user['image'];?>"
                            class="rounded-lg mr-1">
                        <div class="d-sm-none d-lg-inline-block">Hi, <?= $user['name'];?></div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right mt-3">
                        <?php if(session()->get('role') == "Operator"):?>
                        <a href="<?= base_url('operator/profil');?>" class="dropdown-item has-icon">
                            <i class="fas fa-user"></i> Profil
                        </a>
                        <?php else:?>
                        <a href="<?= base_url('profil');?>" class="dropdown-item has-icon">
                            <i class="fas fa-user"></i> Profil
                        </a>
                        <?php endif;?>
                        <a href="<?= base_url('logout');?>" class="dropdown-item has-icon text-danger">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>