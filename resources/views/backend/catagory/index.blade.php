@extends('layouts.backend.app')
@section('title',' Catagory')
@section('page_name','Catagory')
@section('breadcumb','Catagory')

@section('main_content')
<div class="card">
    
    <div class="card-body">
        <div class="mailbox-controls">
        </div>
        <table id="dataTables" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Catagory</th>
                    <th>Slug</th>
                    <th>Food Item</th>
                    <th>Last Update</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $serial = 1;
                ?>
                @forelse ($catagory as $row)
                <tr>
                    <td>{{ $serial++ }}</td>
                    <td>{{ ucfirst($row->cat_name) }}</td>
                    <td>{{$row->slug}}</td>
                    <td>{{$row->item_count}}</td>
                    <td>{{\Carbon\Carbon::parse($row->updated_at)->diffForHumans()}}</td>
                    <td>
                        <a href="{{route('catagory.edit', $row->id )}}"><i class="fas fa-edit"></i></a>
                        <form id="delete-form-{{ $row->id }}" class="d-inline" action="{{route('catagory.destroy', $row->id )}}" method="POST" onsubmit="return confirm('Are you sure want to delete this data')"> @csrf
                            @method('delete')
                           <button onclick="deleteData({{ $row->id }})" type="button" class="border-0 text-primary"><i class="fas fa-trash"></i></button></form>
                    </td>
                </tr>
                @empty
                   
                @endforelse
                
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="addModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="h4 modal-title" id="test">Add Catagory</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                </div>
                <div class="modal-body">
                <form action="{{ route('catagory.store') }}" method="POST" id="cat_form">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="test" name="cat_name" class="form-control" id="cat_name" required>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="id" value="">
                        <button class="btn btn-primary" id="addbtn">Add</button>
                        <button class="btn btn-primary" id="editbtn">Update</button>
                    </div>
                </form>
                </div>
                
            </div>
        </div>
    </div>
</div>


@endsection



