<div>
    <div>
        <a href="{{ route('user.create') }}" class="btn btn-md btn-success mb-3">TAMBAH USER</a>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">AKSI</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td class="text-center">
                            <?php
                                $newImage = str_replace("public/users", "", $user->image);
                            ?>
                            <img src="{{ asset('storage/users'.$newImage) }}" alt="{{ $user->image }}" width="150">
                        </td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td class="text-center">
                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                            <button wire:click="destroy({{ $user->id }})" class="btn btn-sm btn-danger">DELETE</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
    </div>
</div>
