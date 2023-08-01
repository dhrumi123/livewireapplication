<div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
                <div class="col-sm-6">
                    <h1 class="m-0">Appointments</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Appointments</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-2 justify-content-end d-flex">
                        <a href="{{ route('admin.appointments.create') }}">
                            <button class="btn-primary add-appointment"> <i class="mr-1 fa fa-plus-circle"></i>
                                Add new Appointment </button>
                        </a>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-hover">
                                <tr>
                                    <th scope="col"> # </th>
                                    <th scope="col"> Clinet Name </th>
                                    <th scope="col"> Date </th>
                                    <th scope="col"> Time </th>
                                    <th scope="col"> Status </th>
                                    <th scope="col"> Options </th>
                                </tr>
                                <thead>
                                <tbody>
                                    @foreach ($appointments as $appointment)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td> {{ $appointment->client->name }} </td>
                                            <td> {{ $appointment->date->format('d-m-y') }} </td>
                                            <td> {{ $appointment->time->format('H:m A') }} </td>
                                            <td>
                                                @if ($appointment->status == '0')
                                                    <span class="badge badge-success"> Closed</span>
                                                @elseif($appointment->status == '1')
                                                    <span class="badge badge-primary"> Scheduled</span>
                                                @endif
                                            </td>
                                            <td><a href="" class="mr-1 edit-link btn btn-icon btn-outline-info">
                                                    <i class="fa fa-edit"></i> </a>
                                                <a href="#"
                                                    class="mr-1 delete-link btn btn-icon btn-outline-danger"> <i
                                                        class="fa fa-trash"></i> </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                </thead>
                            </table>
                        </div>
                        <div class="card-footer d-flex justify-content-end">

                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

    {{-- <div class="modal fade" id="form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        @if ($showEditModal)
                            <span>Edit Uers</span>
                        @else
                            <span>Add New Uers</span>
                        @endif
                    </h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"><i
                            class="fa fa-times" aria-hidden="true"></i></button>
                </div>
                <div class="modal-body">
                    <form id="create-form">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" wire:model.defer='state.name'
                                class="form-control @error('name') is-invalid @enderror" id="name"
                                aria-describedby="name" placeholder="Enter Name">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                wire:model.defer='state.email' id="email" aria-describedby="email"
                                placeholder="Enter Email">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" wire:model.defer='state.password' placeholder="Enter Password">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="confirmPassword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="confirmPassword"
                                wire:model.defer='state.password_confirmation' placeholder="Enter New Password">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                            class="mr-2 fa fa-times"></i>Cancel</button>
                    <button type="button" class="btn btn-success"
                        wire:click.prevent="{{ $showEditModal ? 'updateUser' : 'createUser' }}"><i
                            class="mr-2 fa fa-save"></i>
                        @if ($showEditModal)
                            <span> Update </span>
                        @else
                            <span> Save </span>
                        @endif
                    </button>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Delete User</h5>
                </div>
                <div class="modal-body">
                    <h4>Are you sure you want to delete this user? </h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                            class="mr-2 fa fa-times"></i>Cancel</button>
                    <button type="button" class="btn btn-danger" wire:click.prevent="deleteUser"><i
                            class="mr-2 fa fa-trash"></i> Delete User
                    </button>
                </div>
            </div>
        </div>
    </div> --}}
</div>
