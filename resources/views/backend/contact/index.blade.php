@extends('layouts.backend.app')
@section('title',' Contact')
@section('page_name','Contact')
@section('breadcumb','Contact')

@section('main_content')
<div class="card">
    
    <div class="card-body">
        <div class="mailbox-controls">
        </div>
        <table id="dataTables" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Time</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $serial = 1;
                ?>
                @forelse ($contact as $row)
                <tr>
                    <td>{{ $serial++ }}</td>
                    <td>{{$row->name}}</td>
                    <td>{{ $row->email }}</td>
                    <td>{{ $row->subject }}</td>
                    <td>{{\Carbon\Carbon::parse($row->created_at)->diffForHumans()}}</td>
                    <td><a href="{{ route('contact.show',$row->id) }}"><i class="fas fa-eye"></i></a>
                        <form id="delete-form-{{ $row->id }}" class="d-inline" action="{{route('contact.destroy', $row->id )}}" method="POST" onsubmit="return confirm('Are you sure want to delete this data')"> @csrf
                            @method('DELETE')
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
                <h5 class="h4 modal-title" id="test">Show Message</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                </div>
                <div class="modal-body">
                    <div id="nameshow"></div>
                </div>
                
            </div>
        </div>
    </div>
    
</div>


@endsection

@section('script')
<script>
    
     
</script>
@endsection


