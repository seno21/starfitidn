@extends('layouts.main')
@section('content_backend')
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">List User</h4>
                {{-- {{dd($users)}} --}}
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                <label
                                                    class="badge {{ $user->role == 'partner' ? 'badge-info' : 'badge-warning' }}">
                                                    {{ $user->role }}
                                                </label>
                                            </td>
                                            <td>
                                                <button class="btn btn-outline-primary change-role-btn"
                                                    data-id="{{ $user->id }}" data-role="{{ $user->role }}">
                                                    Ganti Role
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Get all buttons with the class 'change-role-btn'
            const changeRoleButtons = document.querySelectorAll('.change-role-btn');
            let selectedUserId = null;
            let selectedUserRole = null;

            changeRoleButtons.forEach(button => {
                button.addEventListener('click', () => {
                    // Get user ID and role from the data attributes
                    selectedUserId = button.getAttribute('data-id');
                    selectedUserRole = button.getAttribute('data-role');

                    // Show SweetAlert2 confirmation dialog
                    swal({
                        title: 'Konfirmasi Perubahan Role',
                        text: `Anda yakin ingin mengganti role dari ${selectedUserRole} menjadi ${selectedUserRole === 'user' ? 'partner' : 'user'}?`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3f51b5',
                        cancelButtonColor: '#ff4081',
                        confirmButtonText: 'Great ',
                        buttons: {
                            cancel: {
                                text: "Cancel",
                                value: null,
                                visible: true,
                                className: "btn btn-danger",
                                closeModal: true,
                            },
                            confirm: {
                                text: "OK",
                                value: true,
                                visible: true,
                                className: "btn btn-primary",
                                closeModal: true
                            }
                        }
                    }).then((result) => {
                        if (result) {
                            // Perform the AJAX request to change the role using Fetch API
                            fetch("{{ route('ganti-role') }}", {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/x-www-form-urlencoded',
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                    },
                                    body: new URLSearchParams({
                                        id: selectedUserId,
                                        currentRole: selectedUserRole,
                                    })
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        // Find the table row and update it
                                        const tableRow = document.querySelector(`button[data-id="${selectedUserId}"]`).closest('tr');
                                        const newRole = data.user.role;

                                        // Update the role column in the table
                                        tableRow.querySelector('td:nth-child(4) .badge').textContent = newRole;
                                        tableRow.querySelector('td:nth-child(4) .badge').className =`badge ${newRole === 'partner' ? 'badge-info' : 'badge-warning'}`;

                                        const button = tableRow.querySelector('td:nth-child(5) .change-role-btn');
                                        button.setAttribute('data-role', newRole);
                                        // Show success alert
                                        showSwal('success-message')
                                    } else {
                                        throw new Error('Something went wrong');
                                    }
                                })
                                .catch(error => {
                                    swal({
                                        title: 'Ada Kesalahan',
                                        text: 'Terdapat error silakan periksa',
                                        icon: 'error',
                                        button: {
                                        text: "ok",
                                        value: true,
                                        visible: true,
                                        className: "btn btn-primary"
                                        }
                                    })
                                    console.error('Error:', error);
                                });
                        }
                    });
                });
            });
        });
    </script>
@endsection
