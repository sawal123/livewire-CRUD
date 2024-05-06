<div class="mt-5">
    <h2>View Data</h2>
    <table class="table table-dark table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Email</th>
                <th>Name</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $key => $vP)
                <tr wire:key="{{ $vP->id }}">
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $vP->email }}</td>
                    <td>{{ $vP->name }}</td>
                    <td>
                        <button wire:click='delete({{ $vP->id }})'
                            wire:confirm="Are you sure you want to delete this post?"
                            class="btn btn-danger">Delete</button>
                        <button class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">Edit</button>
                    </td>
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form wire:submit.prevent='edit'>
                                <div class="modal-body">
                                    <input type="hidden"  value="{{ $vP->id }}" wire:model='id'>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                        <input type="email" class="form-control" id="exampleFormControlInput1"
                                            placeholder="name@example.com" value="{{ $vP->email }}"
                                            wire:model='email'>
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name"
                                            placeholder="Your Name..." value="{{ $vP->name }}" wire:model='name'>
                                    </div>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Understood</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                </tr>


              
            @endforeach
        </tbody>
    </table>
</div>
