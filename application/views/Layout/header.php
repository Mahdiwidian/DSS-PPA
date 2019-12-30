<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"> -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/dataTables.bootstrap4.min.css">
    <title><?php echo $page_title; ?></title>
</head>

<body>
    <!-- Begin Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top shadow-sm">
        <a class="navbar-brand" href="<?= base_url('kelola'); ?>"><img src="<?= base_url(); ?>/assets/img/Logo-03.png" width="50px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <?php
            if ($_SESSION['akses'] == 1) {
                ?>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= base_url('kelola'); ?>">Kelola Data <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('lolos'); ?>">Data Terverifikasi <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            <?php
            } else {
                ?>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= base_url('Mhs'); ?>">Daftar Beasiswa PPA <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url(''); ?>">Pengumuman<span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            <?php
            }
            ?>
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span>Hallo, <?= $_SESSION['ses_nama'] ?></span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="<?= base_url('login/logout'); ?>">Keluar</a>
                </div>
            </div>
            <!-- <form class="form-inline my-2 my-lg-0">
                <div id="example_filter" class="dataTables_filter">

                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" aria-controls="example">
                </div>
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
            </form> -->
        </div>
    </nav>
    <!-- END Navbar -->