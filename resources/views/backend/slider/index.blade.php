@extends('layouts.backend.app')
@section('title',' Slider')
@section('page_name','Slider')
@section('breadcumb','Slider')

@section('main_content')
<div class="card">
    
    <div class="card-body">
        <div class="mailbox-controls">
        </div>
        <table id="dataTables" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Ttile</th>
                    <th>Sub Title</th>
                    <th>Image</th>
                    <th>Last Update</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $serial = 1;
                ?>
                @forelse ($slider as $row)
                <tr>
                    <td>{{ $serial++ }}</td>
                    <td>{{$row->title}}</td>
                    <td>{{ $row->sub_title }}</td>
                    <td><img width="80px" src="{{asset('public/images/slider/'.$row->image)}}" alt="Image"></td>
                    <td>{{\Carbon\Carbon::parse($row->updated_at)->diffForHumans()}}</td>
                    <td>
                        <a href="{{route('slider.edit', $row->id )}}"><i class="fas fa-edit"></i></a>
                        <form id="delete-form-{{ $row->id }}" class="d-inline" action="{{route('slider.destroy', $row->id )}}" method="POST" onsubmit="return confirm('Are you sure want to delete this data')"> @csrf
                            @method('DELETE')
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



