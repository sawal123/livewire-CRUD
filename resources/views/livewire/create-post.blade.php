<div class="mt-5">
    {{-- The whole world belongs to you. --}}
    <h1>{{ $title }}</h1>
    <h4>Masukan data valid!</h4>
    @if (session('status'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Holy guacamole!</strong> {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <form wire:submit.prevent='save'>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com"
                wire:model='email'>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" placeholder="Your Name..." wire:model='name'>
        </div>
        <button class="btn btn-primary">Submit</button>
    </form>
    <div class="mt-5">
        <h2>View Data</h2>
        {{-- {{$posts}} --}}



        <div class="">
            <input type="text"  class="form-control mb-3 w-25" placeholder="Searching..." wire:model.live='katakunci'>
        </div>
        {{-- @if (!$data->isEmpty()) --}}
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
                    @foreach ($datas as $key => $data)
                        <tr wire:key="{{ $data->id }}">
                            <td>{{ $datas->firstItem() + $key }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->name }}</td>
                            <td>
                                <button wire:click='delete({{ $data->id }})'
                                    wire:confirm="Are you sure you want to delete this post?"
                                    class="btn btn-danger">Delete</button>
                                <button wire:click='edit({{ $data->id }})' class="btn btn-primary"
                                    data-bs-toggle="modal" data-bs-target="#staticBackdrop">Edit</button>
                            </td>

                        </tr>
                    @endforeach
                    @include('components.modalUpdate')
                </tbody>
            </table>
            {{$datas->links()}}
        {{-- @else
            <h1 class="text-center mt-5">
                Tidak ada data
            </h1>
        @endif --}}
    </div>
</div>
