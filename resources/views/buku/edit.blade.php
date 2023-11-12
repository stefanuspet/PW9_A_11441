<?php
date_default_timezone_set('Asia/Jakarta');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
    <title>Atma Library</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .dropdown-menu {
            background: rgba(255, 255, 255, 0.8);
            /* Mengatur latar belakang transparan */
            border: 1px solid #ccc;
            /* Garis tepi */
            border-radius: 10px;
            /* Sudut membulat */
            padding: 15px;
        }

        .carousel-caption {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: rgba(255, 255, 255, 0.8);
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 15px;
            text-align: center;
            width: 80%;
            height: 100%;
        }

        .text-black {
            color: black;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="text-center">
            <h4><b>Atma Library</b></h4>
            <h6>{{ date('Y-m-d') }}</h6>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul></ul>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('index')}}">Buku Saya <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('pinjam.index')}}">Pinjam</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('kembalikanView')}}">Kembalikan</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a>210711441</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria- haspopup="true" aria-expanded="false">
                        <i class="fa fa-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria- labelledby="userDropdown">
                        <div class="text-center">
                            <img src="https://mdbcdn.b-cdn.net/img/new/avatars/8.webp" class="rounded-circle mb-3" style="width:100px;" alt="Avatar" />
                            <h5 class="mb-2"><strong>{{ Auth::user()->username }}</strong></h5>
                            <p class="text-muted">{{ Auth::user()->email}}</p>
                        </div>
                        <div class="dropdown-divider"></div>
                        <div>
                            <a class="dropdown-item" href="#"><i class="fa fa-user"></i> Profile</a>
                            <a class="dropdown-item" href="{{ route('actionLogout') }}"><i class="fa fa-user"></i> Logout</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="position-relative d-flex justify-content-center" style="width: 100%; height: 86vh;">
        <img class="d-block w-100 h-100" src="https://img.freepik.com/free-photo/abstract-blur-defocused-bookshelf-library_1203-9640.jpg?w=900&t=st=1698697077~exp=1698697677~hmac=1a12d710da0136a68f348da615842a1d1f70266855cd129d10e3e012bf782d16" alt="First slide">
        <div class="carousel-caption" style="max-height: fit-content;">
            <div class="d-flex justify-content-center">
                <div class="mt-4 fw-bold text-black p-2 rounded" style="background-color: #75E7B4; opacity: 0.8; width: 20%;">
                    <b>Edit Buku Saya</b>
                </div>
            </div>
            <form action="{{route('buku.update', $buku->id_buku)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group col-md-6 text-left text-dark mb-2">
                    <label for="judul"><b>Judul Buku</b></label>
                    <input class="form-control" type="text" name="judul" id="judul" value="{{old('judul', $buku->judul)}}">
                </div>
                <div class="form-group col-md-6 text-left text-dark mb-2">
                    <label for="penulis"><b>Penulis</b></label>
                    <input class="form-control " type="text" name="penulis" id="penulis" value="{{old('penulis',$buku->penulis)}}">
                </div>
                <div class="col-md-6 text-left" style="margin-top: 20px;">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <!--Latest compiled JavaScript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js "></script>

    <script>
        window.onload = function() {
            // Menghapus riwayat perambanan
            window.history.pushState({}, '', '/'); // Mengganti URL ke halaman login
        }
    </script>
</body>

</html>