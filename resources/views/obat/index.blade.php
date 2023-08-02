<x-layout>
    <x-slot name="title">Kelola Obat</x-slot>
    <x-slot name="activeMenu">obat</x-slot>
    <div class="card">
        <div class="card-body">
            @include('obat.create-form-modal')
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
                            <th style="width: 40px">Action</th>
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
                            <td class="{{ $obat->tanggal_expired->isPast() ? 'text-danger font-weight-bold' : '' }}">
                                {{ $obat->tanggal_expired->format('Y-m-d') }}
                                @if ($obat->tanggal_expired->isPast())
                                (exp)
                                @endif
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-info btn-xs mr-1" data-toggle="modal"
                                        data-target="#editFormModal" data-itemid="{{ $obat->id_obat }}"
                                        data-itemnamaobat="{{ $obat->nama_obat }}"
                                        data-itemidjenisobat="{{ $obat->id_jenis_obat }}"
                                        data-itemsatuan="{{ $obat->satuan }}" data-itemharga="{{ $obat->harga }}"
                                        data-itemstok="{{ $obat->stok }}"
                                        data-itemtanggalexpired="{{ $obat->tanggal_expired->format('Y-m-d') }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal"
                                        data-target="#deleteConfirmationModal" data-itemid="{{ $obat->id_obat }}"
                                        data-itemname="{{ $obat->nama_obat }}">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('obat.delete-confirmation-modal')
    @include('obat.edit-form-modal')

    @push('scripts')
    <script>
        $(document).ready(function() {
            $('#search').on('keyup', function () {
                var value = $(this).val().toLowerCase();
                $('tbody tr').filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
    @endpush

</x-layout>