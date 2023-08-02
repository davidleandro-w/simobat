<x-layout>
    <x-slot name="title">Dashboard</x-slot>
    <x-slot name="activeMenu">dashboard</x-slot>
    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-primary">
                <div class="card-body">
                    <h5>Selamat datang {{ auth()->user()->fullname }}!</h5>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <h4 class="font-weight-bold mb-3">Resume Obat</h4>
    <div class="row">
        <div class="col-md-3">
            <div class="info-box bg-info">
                <span class="info-box-icon"><i class="fas fa-list"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Jenis Obat</span>
                    <h1 class="info-box-number">{{ number_format($jumlah_jenis_obat, 0) }}</h1>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="info-box bg-success">
                <span class="info-box-icon"><i class="fas fa-pills"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Total Obat</span>
                    <h1 class="info-box-number">{{ number_format($jumlah_obat, 0) }}</h1>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="info-box bg-danger">
                <span class="info-box-icon"><i class="fas fa-pills"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Obat Expired</span>
                    <h1 class="info-box-number">{{ number_format($jumlah_obat_expired, 0) }}</h1>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="info-box bg-warning">
                <span class="info-box-icon"><i class="fas fa-pills"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Obat Belum Expired</span>
                    <h1 class="info-box-number">{{ number_format($jumlah_obat_belum_expired, 0) }}</h1>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <h4 class="font-weight-bold mb-3">Resume User</h4>
    <div class="row">
        <div class="col-md-4">
            <div class="small-box bg-blue">
                <div class="inner">
                    <h3>{{ number_format($jumlah_user, 0) }}</h3>
                    <p>User Terdaftar</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ number_format($jumlah_user_aktif, 0) }}</h3>
                    <p>User Aktif</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-check"></i>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ number_format($jumlah_user_tidak_aktif, 0) }}</h3>
                    <p>User Belum Aktif</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-times"></i>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <h4 class="font-weight-bold mb-3">Daftar Obat</h4>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <input type="text" id="search" class="form-control mb-2" placeholder="Cari obat">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No</th>
                                    <th>Nama Obat</th>
                                    <th>Nama Jenis Obat</th>
                                    <th>Satuan</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Total Harga Stok</th>
                                    <th>Tgl.Expired</th>
                                    <th>Informasi Expired</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($obats as $obat)
                                <tr id="obat-{{ $obat->id_obat }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $obat->nama_obat }}</td>
                                    <td>{{ $obat->jenis_obat->nama_jenis_obat }}</td>
                                    <td>{{ $obat->satuan }}</td>
                                    <td>Rp {{ number_format($obat->harga, 0, ',', '.') }}</td>
                                    <td>{{ $obat->stok }}</td>
                                    <td>Rp {{ number_format($obat->harga * $obat->stok, 0, ',', '.') }}</td>
                                    <td
                                        class="{{ $obat->tanggal_expired->isPast() ? 'text-danger font-weight-bold' : '' }}">
                                        {{ $obat->tanggal_expired->format('Y-m-d') }}
                                        @if ($obat->tanggal_expired->isPast())
                                        (exp)
                                        @endif
                                    </td>
                                    <td>
                                        {{$obat->tanggal_expired->diffForHumans()}}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>