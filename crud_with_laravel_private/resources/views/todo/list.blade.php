@extends('app')
@extends('layout.header')
@extends('layout.sidebar')
@extends('layout.footer')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">ToDo List</h1>
        <a href="#" data-toggle="modal" data-target="#todoFormModal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Add Todo</a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-danger d-none">
                <strong>Error!</strong> 
                <ul>
                    <li></li>
                </ul>
            </div>
            <!-- Default Bootstrap Form Controls-->
            <div id="default">
                <div class="card mb-4">
                    <div class="card-header">List Details</div>
                    <div class="card-body">
                        <!-- Component Preview-->
                        <table class="table table-bordered">
                            <thead>
                                <th class="inner-table text-right">ID</th>
                                <th class="inner-table">Title</th>
                                <th class="inner-table">Description</th>
                                <th class="inner-table text-center">Action</th>
                            </thead>
                            <tbody id="todo_list">
                                @foreach ($todo as $data)
                                <tr id="todo_{{ $data->id }}">
                                    <td class="inner-table text-right">{{ $data->id }}</td>
                                    <td class="inner-table">{{ $data->title }}</td>
                                    <td class="inner-table">{{ $data->description }}</td>
                                    <td class="inner-table text-center">
                                        <button type="button" data-todoid="{{ $data->id }}" onclick="get_todo_data(this);" class="edit-todo text-success" title="Edit ToDo" style="border:none;background-color:transparent;padding:0px;padding-right:5px;"><i class="fas fa-edit fa-lg"></i></a>
                                        <button type="button" data-todoid="{{ $data->id }}" onclick="delete_todo_data(this);" class="delete-todo text-danger" title="Delete ToDo" style="border:none;background-color:transparent;padding:0px;"><i class="fas fa-trash fa-lg text-danger"></i></button>
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
    <div class="modal fade" id="todoFormModal" tabindex="-1" role="dialog" aria-labelledby="todoFormModal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ToDo Form</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form action="" id="todo_edit_form">
                        @csrf
                        <div class="mb-3">
                            <label for="title">Title</label>
                            <input type="hidden" id="todo_id" name="todo_id" value="0">
                            <input class="form-control" id="title" type="text" name="title" placeholder="Enter Title" value="">
                        </div>
                        <div>
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter Description"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-success" type="button" id="add_edit_todo_btn" onclick="validate_todo_form(this);" data-state="add">Save</button>
                </div>
            </div>
        </div>
    </div>

@endsection