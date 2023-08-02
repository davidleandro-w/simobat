<div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog"
    aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteConfirmationModalLabel">Konfirmasi Penghapusan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus <span class="font-weight-bold" id="deleteItemName"></span> ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteButton">Ya, Hapus</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
    $('#deleteConfirmationModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var itemId = button.data('itemid');
        var itemName = button.data('itemname');
        var modal = $(this);
        modal.find('#deleteItemName').text(itemName);
        $('#confirmDeleteButton').on('click', function () {
            console.log('Item with ID ' + itemId + ' has been deleted.');
            $('#deleteConfirmationModal').modal('hide');
            $.ajax({
                url: '{{ route('obat.destroy', '') }}/' + itemId,
                method: 'delete',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'id_obat': itemId
                },
                success: function(response) {
                    console.log(response);
                    location.reload();
                },
                error: function(response) {
                    console.log(response);
                }
            });
        });
    });

    $('#deleteConfirmationModal').on('hidden.bs.modal', function () {
        $('#confirmDeleteButton').off('click');
    });
});
</script>
@endpush