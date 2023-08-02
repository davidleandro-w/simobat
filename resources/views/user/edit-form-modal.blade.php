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
                        <label for="editFullname">Fullname:</label>
                        <input type="text" name="editFullname" id="editFullname" class="form-control" value="">
                        <span class="invalid-feedback" role="alert" id="editFullnameError"></span>
                    </div>
                    <div class="form-group">
                        <label for="editUsername">Username:</label>
                        <input type="text" name="editUsername" id="editUsername" class="form-control" value="">
                        <span class="invalid-feedback" role="alert" id="editUsernameError"></span>
                    </div>
                    <div class="form-group">
                        <label for="editIsActive">Status Aktif:</label>
                        <select name="editIsActive" id="editIsActive" class="form-control">
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                        <span class="invalid-feedback" role="alert" id="isActiveError"></span>
                    </div>
                    <div class="form-group">
                        <label for="editPassword">Ganti Password (optional):</label>
                        <input type="text" name="editPassword" id="editPassword" class="form-control" value="">
                        <span class="invalid-feedback" role="alert" id="editPasswordError"></span>
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
        var itemUsername = button.data('itemusername');
        var itemFullName = button.data('itemfullname');
        var itemIsActive = button.data('itemisactive');
        
        var modal = $(this);
        modal.find('#editUsername').val(itemUsername);
        modal.find('#editFullname').val(itemFullName);
        modal.find('#editIsActive').val(itemIsActive);
        
        $('#confirmEditButton').on('click', function () {
            response = $.ajax({
                url: '{{ route('user.update', '') }}/' + itemId,
                method: 'put',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'id_user': itemId,
                    'username': $('#editUsername').val(),
                    'fullname': $('#editFullname').val(),
                    'password': $('#editPassword').val(),
                    'is_active': $('#editIsActive').val()
                },
                success: function(response) {
                    location.reload();
                    $('#editFormModal').modal('hide');
                },
                error: function(error) {
                    if (error.responseJSON.errors) {
                        if (error.responseJSON.errors.username) {
                            $('#editUsername').addClass('is-invalid');
                            $('#editUsernameError').html(error.responseJSON.errors.username[0]);
                            console.log(error.responseJSON.errors.username[0]);
                        }
                        if (error.responseJSON.errors.fullname) {
                            $('#editFullname').addClass('is-invalid');
                            $('#editFullnameError').html(error.responseJSON.errors.fullname[0]);
                            console.log(error.responseJSON.errors.fullname[0]);
                        }
                        if (error.responseJSON.errors.password) {
                            $('#editPassword').addClass('is-invalid');
                            $('#editPasswordError').html(error.responseJSON.errors.password[0]);
                            console.log(error.responseJSON.errors.password[0]);
                        }
                        if (error.responseJSON.errors.is_active) {
                            $('#editIsActive').addClass('is-invalid');
                            $('#editIsActiveError').html(error.responseJSON.errors.is_active[0]);
                            console.log(error.responseJSON.errors.is_active[0]);
                        }
                    }
                }
            });
        });
    });

    $('#editFormModal').on('hidden.bs.modal', function () {
        $('#confirmEditButton').off('click');
        $('#editUsername').removeClass('is-invalid');
        $('#editUsernameError').html('');
        $('#editFullname').removeClass('is-invalid');
        $('#editFullnameError').html('');
        $('#editPassword').removeClass('is-invalid');
        $('#editPasswordError').html('');
        $('#editIsActive').removeClass('is-invalid');
        $('#editIsActiveError').html('');
    });
});
</script>
@endpush