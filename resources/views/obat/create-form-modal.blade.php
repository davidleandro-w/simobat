<button type="button" class="btn btn-success btn-sm mb-2" data-toggle="modal" data-target="#createFormModal">
    <i class="fas fa-plus mr-1"></i>
    Tambah Data
</button>

<div class="modal fade" id="createFormModal" tabindex="-1" role="dialog" aria-labelledby="createFormModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createFormModalLabel">Form Data Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form -->
                <form id="createForm">
                    <div class="form-group">
                        <label for="createNamaObat">Nama Obat:</label>
                        <input type="text" name="createNamaObat" id="createNamaObat" class="form-control" value="">
                        <span class="invalid-feedback" role="alert" id="createNamaObatError"></span>
                    </div>
                    <div class="form-group">
                        <label for="createIdJenisObat">Nama Jenis Obat:</label>
                        <select name="createIdJenisObat" id="createIdJenisObat" class="form-control">
                            <option value="">Pilih Jenis Obat</option>
                            @foreach ($jenisObats as $jenisObat)
                            <option value="{{ $jenisObat->id_jenis_obat }}">{{ $jenisObat->nama_jenis_obat }}</option>
                            @endforeach
                        </select>
                        <span class="invalid-feedback" role="alert" id="createIdJenisObatError"></span>
                    </div>
                    <div class="form-group">
                        <label for="createSatuan">Satuan:</label>
                        <input type="text" name="createSatuan" id="createSatuan" class="form-control" value="">
                        <span class="invalid-feedback" role="alert" id="createSatuanError"></span>
                    </div>
                    <div class="form-group">
                        <label for="createHarga">Harga:</label>
                        <input type="number" name="createHarga" id="createHarga" class="form-control" value="" min="0">
                        <span class="invalid-feedback" role="alert" id="createHargaError"></span>
                    </div>
                    <div class="form-group">
                        <label for="createStok">Stok:</label>
                        <input type="number" name="createStok" id="createStok" class="form-control" value="" min="0">
                        <span class="invalid-feedback" role="alert" id="createStokError"></span>
                    </div>
                    <div class="form-group">
                        <label for="createTanggalExpired">Tanggal Expired:</label>
                        <input type="date" name="createTanggalExpired" id="createTanggalExpired" class="form-control"
                            value="">
                        <span class="invalid-feedback" role="alert" id="createTanggalExpiredError"></span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                <button type="button" class="btn btn-info" id="confirmCreateButton">Simpan</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
    $('#createFormModal').on('show.bs.modal', function (event) {
        $('#confirmCreateButton').on('click', function () {
            response = $.ajax({
                url: '{{ route('obat.store') }}',
                method: 'post',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'nama_obat': $('#createNamaObat').val(),
                    'id_jenis_obat': $('#createIdJenisObat').val(),
                    'satuan': $('#createSatuan').val(),
                    'harga': $('#createHarga').val(),
                    'stok': $('#createStok').val(),
                    'tanggal_expired': $('#createTanggalExpired').val(),
                },
                success: function(response) {
                    location.reload();
                    $('#createFormModal').modal('hide');
                },
                error: function(error) {
                    if (error.responseJSON.errors) {
                        if (error.responseJSON.errors.nama_obat) {
                            $('#createNamaObat').addClass('is-invalid');
                            $('#createNamaObatError').html(error.responseJSON.errors.nama_obat[0]);
                            console.log(error.responseJSON.errors.nama_obat[0]);
                        }
                        if (error.responseJSON.errors.id_jenis_obat) {
                            $('#createIdJenisObat').addClass('is-invalid');
                            $('#createIdJenisObatError').html(error.responseJSON.errors.id_jenis_obat[0]);
                            console.log(error.responseJSON.errors.id_jenis_obat[0]);
                        }
                        if (error.responseJSON.errors.satuan) {
                            $('#createSatuan').addClass('is-invalid');
                            $('#createSatuanError').html(error.responseJSON.errors.satuan[0]);
                            console.log(error.responseJSON.errors.satuan[0]);
                        }
                        if (error.responseJSON.errors.harga) {
                            $('#createHarga').addClass('is-invalid');
                            $('#createHargaError').html(error.responseJSON.errors.harga[0]);
                            console.log(error.responseJSON.errors.harga[0]);
                        }
                        if (error.responseJSON.errors.stok) {
                            $('#createStok').addClass('is-invalid');
                            $('#createStokError').html(error.responseJSON.errors.stok[0]);
                            console.log(error.responseJSON.errors.stok[0]);
                        }
                        if (error.responseJSON.errors.tanggal_expired){
                            $('#createTanggalExpired').addClass('is-invalid');
                            $('#createTanggalExpiredError').html(error.responseJSON.errors.tanggal_expired[0]);
                            console.log(error.responseJSON.errors.tanggal_expired[0]);
                        }
                    }
                }
            });
        });
    });

    $('#createFormModal').on('hidden.bs.modal', function () {
        $('#confirmCreateButton').off('click');
        $('#createForm').trigger('reset');
        $('#createNamaJenisObat').removeClass('is-invalid');
        $('#createNamaJenisObatError').html('');
        $('#createIdJenisObat').removeClass('is-invalid');
        $('#createIdJenisObatError').html('');
        $('#createSatuan').removeClass('is-invalid');
        $('#createSatuanError').html('');
        $('#createHarga').removeClass('is-invalid');
        $('#createHargaError').html('');
        $('#createStok').removeClass('is-invalid');
        $('#createStokError').html('');
        $('#createTanggalExpired').removeClass('is-invalid');
        $('#createTanggalExpiredError').html('');
    });
});
</script>
@endpush