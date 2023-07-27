<div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div>
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    @if ($updateMode)
                        @include('livewire.update')
                    @else
                        @include('livewire.create')
                    @endif

                    <table class="table mt-5 table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Title</th>
                                <th>Body</th>
                                <th width="150px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->body }}</td>
                                    <td>
                                        <button wire:click="edit({{ $post->id }})"
                                            class="btn btn-primary btn-sm">Edit</button>
                                        <button wire:click="delete({{ $post->id }})"
                                            class="btn btn-danger btn-sm">Delete</button>
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
