@extends('page.dashboard.layout')

@section('content')

<style>
    input, textarea {
        border-radius: 24px;
        background: #e0e0e0;
        box-shadow: inset 20px 20px 60px #bebebe,
            inset -20px -20px 60px #ffffff;
    }
</style>
<div class="wrapper" style="">
        <div class="d-flex align-items-start justify-content-between">
            <div class="d-flex flex-column">
                <div class="h5 text-light">Edit New Todo</div>
                <br>
            </div>
            <div class="info btn ml-md-4 ml-0">
                <span class="fas fa-info" title="Info"></span>
            </div>
        </div>
        <form action="{{ route('UpdateTodo', $todo->id) }}" method="POST" class="form-group">
            @csrf
            <div class="mt-0">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Title of todo" value="{{ $todo->title }}">
            </div>
            <div class="mt-3">
                <label for="date">Date</label>
                <input type="date" name="date" id="date" class="form-control" value="{{ $todo->date }}">
            </div>
            <div class="mt-3">
                <label for="description">Description</label>
                <textarea type="text" name="description" id="description" class="form-control">{{ $todo->description }}</textarea>
            </div>

            <button type="submit" class="btn btn-secondary text-white mt-3">Add Todo</button>
        </form>
    </div>
@endsection
