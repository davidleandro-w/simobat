<x-layout>
    <x-slot name="title">Referensi Jenis Obat</x-slot>
    <x-slot name="activeMenu">jenis-obat</x-slot>
    <div class="card">
        <div class="card-body">
            @include('jenis-obat.create-form-modal')
            <input type="text" id="search" class="form-control mb-2" placeholder="Cari jenis obat">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Nama Jenis Obat</th>
                            <th style="width: 40px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jenis_obats as $jenis_obat)
                        <tr id="jenis_obat-{{ $jenis_obat->id_jenis_obat }}">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $jenis_obat->nama_jenis_obat }}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-info btn-xs mr-1" data-toggle="modal"
                                        data-target="#editFormModal" data-itemid="{{ $jenis_obat->id_jenis_obat }}"
                                        data-itemnamajenisobat="{{ $jenis_obat->nama_jenis_obat }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal"
                                        data-target="#deleteConfirmationModal"
                                        data-itemid="{{ $jenis_obat->id_jenis_obat }}"
                                        data-itemname="{{ $jenis_obat->nama_jenis_obat }}">
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

    @include('jenis-obat.delete-confirmation-modal')
    @include('jenis-obat.edit-form-modal')

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