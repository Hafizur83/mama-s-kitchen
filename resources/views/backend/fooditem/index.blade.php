@extends('layouts.backend.app')
@section('title',' Food Items')
@section('page_name','Food Items')
@section('breadcumb','Food Items')

@section('main_content')
<div class="card">
    
    <div class="card-body">
        <table id="dataTables" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Catagory</th>
                    <th>Description</th>
                    <th>Last Update</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $serial = 1;
                ?>
                @forelse ($FoodItems as $row)
                <tr>
                    <td>{{ $serial++ }}</td>
                    <td>{{$row->name}}</td>
                    <td><img width="80px" src="{{asset('public/images/fooditems/'.$row->image)}}" alt="Image"></td>
                    <td>{{ $row->catagory->cat_name }}</td>
                    <td>{{Strip_tags($row->body)}}</td>
                    <td>{{\Carbon\Carbon::parse($row->updated_at)->diffForHumans()}}</td>
                    <td><a href="{{ route('fooditems.edit',$row->id) }}"><i class="fas fa-edit"></i></a>
                        <form id="delete-form-{{ $row->id }}" class="d-inline" action="{{route('fooditems.delete', $row->id )}}" method="POST" onsubmit="return confirm('Are you sure want to delete this data')"> @csrf
                            <input type="hidden" name="catagory" value="{{ $row->cat_id }}">
                           <button onclick="deleteData({{ $row->id }})" type="button" class="border-0 text-primary"><i class="fas fa-trash"></i></button></form>
                    </td>
                </tr>
                @empty

                @endforelse
                
            </tbody>
        </table>
    </div>

    
</div>


@endsection


