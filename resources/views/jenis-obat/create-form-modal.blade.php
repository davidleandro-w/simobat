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
                        <label for="createNamaJenisObat">Nama Jenis Obat:</label>
                        <input type="text" name="createNamaJenisObat" id="createNamaJenisObat" class="form-control"
                            value="">
                        <span class="invalid-feedback" role="alert" id="createNamaJenisObatError"></span>
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
                url: '{{ route('jenis-obat.store') }}',
                method: 'post',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'nama_jenis_obat': $('#createNamaJenisObat').val(),
                },
                success: function(response) {
                    location.reload();
                    $('#createFormModal').modal('hide');
                },
                error: function(error) {
                    if (error.responseJSON.errors) {
                        if (error.responseJSON.errors.username) {
                            $('#createNamaJenisObat').addClass('is-invalid');
                            $('#createNamaJenisObatError').html(error.responseJSON.errors.username[0]);
                            console.log(error.responseJSON.errors.username[0]);
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
    });
});
</script>
@endpush