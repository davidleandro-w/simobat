<div class="modal fade" id="editFormModal" tabindex="-1" role="dialog" aria-labelledby="editFormModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editFormModalLabel">Form Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    <div class="form-group">
                        <label for="editNamaObat">Nama Obat:</label>
                        <input type="text" name="editNamaObat" id="editNamaObat" class="form-control" value="">
                        <span class="invalid-feedback" role="alert" id="editNamaObatError"></span>
                    </div>
                    <div class="form-group">
                        <label for="editIdJenisObat">Nama Jenis Obat:</label>
                        <select name="editIdJenisObat" id="editIdJenisObat" class="form-control">
                            <option value="">Pilih Jenis Obat</option>
                            @foreach ($jenisObats as $jenisObat)
                            <option value="{{ $jenisObat->id_jenis_obat }}">{{ $jenisObat->nama_jenis_obat }}</option>
                            @endforeach
                        </select>
                        <span class="invalid-feedback" role="alert" id="editIdJenisObatError"></span>
                    </div>
                    <div class="form-group">
                        <label for="editSatuan">Satuan:</label>
                        <input type="text" name="editSatuan" id="editSatuan" class="form-control" value="">
                        <span class="invalid-feedback" role="alert" id="editSatuanError"></span>
                    </div>
                    <div class="form-group">
                        <label for="editHarga">Harga:</label>
                        <input type="number" name="editHarga" id="editHarga" class="form-control" value="" min="0">
                        <span class="invalid-feedback" role="alert" id="editHargaError"></span>
                    </div>
                    <div class="form-group">
                        <label for="editStok">Stok:</label>
                        <input type="number" name="editStok" id="editStok" class="form-control" value="" min="0">
                        <span class="invalid-feedback" role="alert" id="editStokError"></span>
                    </div>
                    <div class="form-group">
                        <label for="editTanggalExpired">Tanggal Expired:</label>
                        <input type="date" name="editTanggalExpired" id="editTanggalExpired" class="form-control"
                            value="">
                        <span class="invalid-feedback" role="alert" id="editTanggalExpiredError"></span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                <button type="button" class="btn btn-info" id="confirmEditButton">Simpan</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
    $('#editFormModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var itemId = button.data('itemid');
        var itemNamaObat = button.data('itemnamaobat');
        var itemIdJenisObat = button.data('itemidjenisobat');
        var itemSatuan = button.data('itemsatuan');
        var itemHarga = button.data('itemharga');
        var itemStok = button.data('itemstok');
        var itemTanggalExpired = button.data('itemtanggalexpired');
        
        var modal = $(this);
        modal.find('#editNamaObat').val(itemNamaObat);
        modal.find('#editIdJenisObat').val(itemIdJenisObat);
        modal.find('#editSatuan').val(itemSatuan);
        modal.find('#editHarga').val(itemHarga);
        modal.find('#editStok').val(itemStok);
        modal.find('#editTanggalExpired').val(itemTanggalExpired);
        
        $('#confirmEditButton').on('click', function () {
            response = $.ajax({
                url: '{{ route('obat.update', '') }}/' + itemId,
                method: 'put',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'id_obat': itemId,
                    'nama_obat': $('#editNamaObat').val(),
                    'id_jenis_obat': $('#editIdJenisObat').val(),
                    'satuan': $('#editSatuan').val(),
                    'harga': $('#editHarga').val(),
                    'stok': $('#editStok').val(),
                    'tanggal_expired': $('#editTanggalExpired').val(),
                },
                success: function(response) {
                    location.reload();
                    $('#editFormModal').modal('hide');
                },
                error: function(error) {
                    if (error.responseJSON.errors) {
                        if (error.responseJSON.errors.nama_obat) {
                            $('#editNamaObat').addClass('is-invalid');
                            $('#editNamaObatError').html(error.responseJSON.errors.nama_obat[0]);
                            console.log(error.responseJSON.errors.nama_obat[0]);
                        }
                        if (error.responseJSON.errors.id_jenis_obat) {
                            $('#editIdJenisObat').addClass('is-invalid');
                            $('#editIdJenisObatError').html(error.responseJSON.errors.id_jenis_obat[0]);
                            console.log(error.responseJSON.errors.id_jenis_obat[0]);
                        }
                        if (error.responseJSON.errors.satuan) {
                            $('#editSatuan').addClass('is-invalid');
                            $('#editSatuanError').html(error.responseJSON.errors.satuan[0]);
                            console.log(error.responseJSON.errors.satuan[0]);
                        }
                        if (error.responseJSON.errors.harga) {
                            $('#editHarga').addClass('is-invalid');
                            $('#editHargaError').html(error.responseJSON.errors.harga[0]);
                            console.log(error.responseJSON.errors.harga[0]);
                        }
                        if (error.responseJSON.errors.stok) {
                            $('#editStok').addClass('is-invalid');
                            $('#editStokError').html(error.responseJSON.errors.stok[0]);
                            console.log(error.responseJSON.errors.stok[0]);
                        }
                        if (error.responseJSON.errors.tanggal_expired){
                            $('#editTanggalExpired').addClass('is-invalid');
                            $('#editTanggalExpiredError').html(error.responseJSON.errors.tanggal_expired[0]);
                            console.log(error.responseJSON.errors.tanggal_expired[0]);
                        }
                    }
                }
            });
        });
    });

    $('#editFormModal').on('hidden.bs.modal', function () {
        $('#confirmEditButton').off('click');
        $('#editNamaObat').removeClass('is-invalid');
        $('#editNamaObatError').html('');
        $('#editIdJenisObat').removeClass('is-invalid');
        $('#editIdJenisObatError').html('');
        $('#editSatuan').removeClass('is-invalid');
        $('#editSatuanError').html('');
        $('#editHarga').removeClass('is-invalid');
        $('#editHargaError').html('');
        $('#editStok').removeClass('is-invalid');
        $('#editStokError').html('');
        $('#editTanggalExpired').removeClass('is-invalid');
        $('#editTanggalExpiredError').html('');
    });
        
});
</script>
@endpush