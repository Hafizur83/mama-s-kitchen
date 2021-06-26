@extends('layouts.backend.app')
@section('title',' reservation')
@section('page_name','reservation')
@section('breadcumb','reservation')

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
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Time</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $serial = 1;
                ?>
                @forelse ($reservation as $row)
                <tr>
                    <td>{{ $serial++ }}</td>
                    <td>{{$row->name}}</td>
                    <td>{{ $row->phone }}</td>
                    <td>{{ $row->email }}</td>
                    <td>{{ $row->date_and_time }}</td>
                    <td>
                        @if ($row->status ==false)
                           <span class="badge badge-warning">Not Confirmed</span>
                            @else
                            <span class="badge badge-success">Confirmed</span>
                        @endif
                    </td>
                    <td>{{\Carbon\Carbon::parse($row->created_at)->diffForHumans()}}</td>
                    <td><a href="{{ route('reservation.show',$row->id) }}"><i class="fas fa-eye"></i></a>
                        <form id="delete-form-{{ $row->id }}" class="d-inline" action="{{route('reservation.destroy', $row->id )}}" method="POST"> @csrf
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


