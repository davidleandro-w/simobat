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
                        <label for="createFullname">Fullname:</label>
                        <input type="text" name="createFullname" id="createFullname" class="form-control" value="">
                        <span class="invalid-feedback" role="alert" id="createFullnameError"></span>
                    </div>
                    <div class="form-group">
                        <label for="createUsername">Username:</label>
                        <input type="text" name="createUsername" id="createUsername" class="form-control" value="">
                        <span class="invalid-feedback" role="alert" id="createUsernameError"></span>
                    </div>
                    <div class="form-group">
                        <label for="createPassword">Password:</label>
                        <input type="text" name="createPassword" id="createPassword" class="form-control" value="">
                        <span class="invalid-feedback" role="alert" id="createPasswordError"></span>
                    </div>
                    <div class="form-group">
                        <label for="createIsActive">Status Aktif:</label>
                        <select name="createIsActive" id="createIsActive" class="form-control">
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                        <span class="invalid-feedback" role="alert" id="isActiveError"></span>
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
                url: '{{ route('user.store') }}',
                method: 'post',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'username': $('#createUsername').val(),
                    'fullname': $('#createFullname').val(),
                    'password': $('#createPassword').val(),
                    'is_active': $('#createIsActive').val()
                },
                success: function(response) {
                    location.reload();
                    $('#createFormModal').modal('hide');
                },
                error: function(error) {
                    if (error.responseJSON.errors) {
                        if (error.responseJSON.errors.username) {
                            $('#createUsername').addClass('is-invalid');
                            $('#createUsernameError').html(error.responseJSON.errors.username[0]);
                            console.log(error.responseJSON.errors.username[0]);
                        }
                        if (error.responseJSON.errors.fullname) {
                            $('#createFullname').addClass('is-invalid');
                            $('#createFullnameError').html(error.responseJSON.errors.fullname[0]);
                            console.log(error.responseJSON.errors.fullname[0]);
                        }
                        if (error.responseJSON.errors.password) {
                            $('#createPassword').addClass('is-invalid');
                            $('#createPasswordError').html(error.responseJSON.errors.password[0]);
                            console.log(error.responseJSON.errors.password[0]);
                        }
                        if (error.responseJSON.errors.is_active) {
                            $('#createIsActive').addClass('is-invalid');
                            $('#createIsActiveError').html(error.responseJSON.errors.is_active[0]);
                            console.log(error.responseJSON.errors.is_active[0]);
                        }
                    }
                }
            });
        });
    });

    $('#createFormModal').on('hidden.bs.modal', function () {
        $('#confirmCreateButton').off('click');
        $('#createForm').trigger('reset');
        $('#createUsername').removeClass('is-invalid');
        $('#createUsernameError').html('');
        $('#createFullname').removeClass('is-invalid');
        $('#createFullnameError').html('');
        $('#createPassword').removeClass('is-invalid');
        $('#createPasswordError').html('');
        $('#createIsActive').removeClass('is-invalid');
        $('#createIsActiveError').html('');
    });
});
</script>
@endpush