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
    <div class="position-relative d-flex justify-content-center" style="width: 100%; height: 100vh;">
        <img class="d-block w-100 h-100" src="https://img.freepik.com/free-photo/abstract-blur-defocused-bookshelf-library_1203-9640.jpg?w=900&t=st=1698697077~exp=1698697677~hmac=1a12d710da0136a68f348da615842a1d1f70266855cd129d10e3e012bf782d16" alt="First slide">
        <div class="position-absolute mt-4 fw-bold text-black p-2 rounded" style="background-color: #75E7B4; opacity: 0.8;">
            <b>Buku Saya</b>
        </div>
        <div class="carousel-caption" style="max-height: fit-content;">
            <div class="d-flex justify-content-start">
                <a class="btn btn-success my-2" href="{{route('buku.create')}}">Tambah Buku</a>
            </div>
            <table class="table">
                <thead>
                    <tr style="background-color: rgba(145,146,143, 0.8);">
                        <th scope="col">No</th>
                        <th scope="col">Judul Buku</th>
                        <th scope="col">Penulis</th>
                        <th scope="col">Status Buku</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $counter = 1;
                    @endphp
                    <!-- forelse show all bukus -->
                    @forelse($filter as $item)
                    <!-- if id penerbit ==  id current user -->
                    <tr>
                        <td>{{ $counter++ }}</td>
                        <td>{{$item->judul}}</td>
                        <td>{{$item->penulis}}</td>
                        <td>{{$item->status}}</td>
                        <td>
                            <!-- delete & edit with confirm-->
                            <div class="d-flex align-item-center justify-content-center">
                                <form action="{{ route('destroy', $item->id_buku) }}" method="POST">
                                    <a onclick="return confirm('Apakah anda yakin ingin mengedit data ini?')" href="{{ route('buku.edit', $item->id_buku) }}" class="text-primary p-1">.
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                        </svg>
                                    </a>
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-transparent text-danger p-1" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <!-- end -->
                    @empty
                    <div class="alert alert-danger">
                        Data buku belum tersedia.
                    </div>
                    @endforelse
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $filter->links('pagination.custom') }}
            </div>
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