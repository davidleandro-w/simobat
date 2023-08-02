<x-layout>
    <x-slot name="title">Kelola User</x-slot>
    <x-slot name="activeMenu">user</x-slot>
    <div class="card">
        <div class="card-body">
            @include('user.create-form-modal')
            <input type="text" id="search" class="form-control mb-2" placeholder="Cari user">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Fullname</th>
                            <th>Status Aktif</th>
                            <th style="width: 40px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr id="user-{{ $user->id_user }}">
                            <td>{{ $loop->iteration }}</td>
                            <td><code>{{ $user->username }}</code></td>
                            <td>{{ $user->password }}</td>
                            <td>{{ $user->fullname }}</td>
                            <td>
                                @if ($user->is_active)
                                <span class="badge badge-success">Aktif</span>
                                @else
                                <span class="badge badge-danger">Tidak Aktif</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-info btn-xs mr-1" data-toggle="modal"
                                        data-target="#editFormModal" data-itemid="{{ $user->id_user }}"
                                        data-itemusername="{{ $user->username }}"
                                        data-itemfullname="{{ $user->fullname }}"
                                        data-itemisactive="{{ $user->is_active?1:0 }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal"
                                        data-target="#deleteConfirmationModal" data-itemid="{{ $user->id_user }}"
                                        data-itemname="{{ $user->username }}">
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

    @include('user.delete-confirmation-modal')
    @include('user.edit-form-modal')

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