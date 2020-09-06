@extends('layouts.app')

@section('content')

<h1 class="text-center">Create Todo </h1>
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card card-default">
            <div class="card-header">
                Create a new todo
            </div>

            <div class="card-body">
                @if ($errors->any())

                <ul class="list-group">
                    @foreach ($errors->all() as $error)

                    <li class="list-group-item p-0">
                        <div class="alert alert-danger m-0 ">
                            {{$error}}

                        </div>
                    </li>

                    @endforeach
                </ul>

                @endif
                <form action="store-todo" method="POST">
                    @csrf
                    <div class="form-group">
                        <input id="name" class="form-control" type="text" name="name" placeholder="Name " />
                    </div>
                    <div class="form-group">
                        <textarea id="description" class="form-control" name="description" rows="3"
                            placeholder="Description"></textarea>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-success">Create todo</button type="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
