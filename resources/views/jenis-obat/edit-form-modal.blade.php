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
                        <label for="editNamaJenisObat">Nama Jenis Obat:</label>
                        <input type="text" name="editNamaJenisObat" id="editNamaJenisObat" class="form-control"
                            value="">
                        <span class="invalid-feedback" role="alert" id="editNamaJenisObatError"></span>
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
        var itemNamaJenisObat = button.data('itemnamajenisobat');
        
        var modal = $(this);
        modal.find('#editNamaJenisObat').val(itemNamaJenisObat);
        
        $('#confirmEditButton').on('click', function () {
            response = $.ajax({
                url: '{{ route('jenis-obat.update', '') }}/' + itemId,
                method: 'put',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'id_jenis_obat': itemId,
                    'nama_jenis_obat': $('#editNamaJenisObat').val(),
                },
                success: function(response) {
                    location.reload();
                    $('#editFormModal').modal('hide');
                },
                error: function(error) {
                    if (error.responseJSON.errors) {
                        if (error.responseJSON.errors.nama_jenis_obat) {
                            $('#editNamaJenisObat').addClass('is-invalid');
                            $('#editNamaJenisObatError').html(error.responseJSON.errors.nama_jenis_obat[0]);
                            console.log(error.responseJSON.errors.nama_jenis_obat[0]);
                        }
                    }
                }
            });
        });
    });

    $('#editFormModal').on('hidden.bs.modal', function () {
        $('#confirmEditButton').off('click');
        $('#editNamaJenisObat').removeClass('is-invalid');
        $('#editNamaJenisObatError').html('');
    });
});
</script>
@endpush