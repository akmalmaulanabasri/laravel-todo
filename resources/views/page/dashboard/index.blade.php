    @extends('page.dashboard.layout')
    @section('content')
        <div class="wrapper todo-app mt-5">
            <div class="d-flex align-items-start justify-content-between">
                <div class="d-flex flex-column">
                    <div class="h5 text-dark">My Todo's</div>
                    <p class="text-dark text-justify">
                        Here's a list of activities you have to do
                    </p>
                    <span>
                        <a class="mr-2 text-dark" href="{{ route('add') }}"><i class="fa fa-plus"></i> Create New Task</a>
                    </span>
                </div>
            </div>
            @if (session('hasLogin'))
                <div class="alert my-3 alert-danger">
                    Anda Sudah Login
                </div>
            @endif
            <div class="work border-bottom pt-3">
                <div class="d-flex align-items-center py-2 mt-1">
                    <div>
                        <span class="text-dark fas fa-comment btn"></span>
                    </div>
                    <div class="text-dark">{{ count($todos) }} todos</div>
                    <button class="ml-auto btn text-dark fas fa-angle-down" type="button" data-toggle="collapse"
                        data-target="#comments" aria-expanded="false" aria-controls="comments"></button>
                </div>
            </div>
            <div id="comments" class="mt-1">
                @foreach ($todos as $t)
                    <div class="comment mt-2 mb-2 d-flex align-items-center justify-content-between">
                        @if ($t->status == 0)
                            <a href="{{ route('todoComplete', $t->id) }}" class="mx-3 text-dark">
                                <i class="fa fa-check"></i>
                            </a>
                        @else
                            <a class="mx-3 text-dark">
                                <i class="fa fa-bookmark"></i>
                            </a>
                        @endif
                        <div data-bs-toggle="modal" data-bs-target="#modalDetail{{ $t->id }}"
                            class="d-flex flex-column w-75">
                            <b class="text-justify">
                                {{ $t->title }}
                            </b>
                            <p class="">Deadline <span class="date">{{ $t->date }}</span></p>
                        </div>
                        <a href="{{ route('todoDelete', $t->id) }}" class="mx-3 text-danger">
                            <i class="fa fa-trash"></i>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        @foreach ($todos as $t)
            <div class="modal fade" id="modalDetail{{ $t->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{ $t->title }}</h5>
                        </div>
                        <div class="modal-body">
                            <table class="table border">
                                <tr>
                                    <td>Deadline</td>
                                    <td> : </td>
                                    <td>{{ $t->date }}</td>
                                </tr>
                                <tr>
                                    <td>Title</td>
                                    <td> : </td>
                                    <td>{{ $t->title }}</td>
                                </tr>
                                <tr>
                                    <td>Description</td>
                                    <td> : </td>
                                    <td>{{ $t->description }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <a href="{{ route('todo-edit', $t->id) }}" class="btn btn-warning">Edit Todo</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        @if (session('empty'))
            <script>
                Swal.fire(
                    'Gagal',
                    'Tidak ada yang dipilih',
                    'error'
                )
            </script>
        @endif
        @if (session('success-update'))
            <script>
                Swal.fire(
                    'Sukses',
                    'Berhasil update todo',
                    'success'
                )
            </script>
        @endif
        @if (session('success-delete'))
            <script>
                Swal.fire(
                    'Sukses',
                    'Berhasil delete todo',
                    'success'
                )
            </script>
        @endif
    @endsection
