@extends('layouts.app')

@section('title', 'Room')

@section('content')
  <!-- Default box -->

  @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
  @endif

  @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
  @endif
  <div class="card">
    <div class="card-body">
      <a class="btn btn-primary btn-sm" href="{{ route('room.create') }}">
        <i class="fas fa-plus"></i> Create Room
      </a>
    </div>

    <div class="card-body p-0">
      <table class="table table-striped projects">
        <thead>
          <tr>
            <th style="width: 1%">
              #
            </th>
            <th>
              Room Type
            </th>
            <th>
              Room Name
            </th>
            <th>
              Area
            </th>
            <th>
              Price
            </th>
            <th>
              Facility
            </th>
            <th style="width: 20%">
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach ($rooms as $room)
            <tr>
              <td>#</td>
              <td>{{ $room->room_type }}</td>
              <td>{{ $room->room_name }}</td>
              <td>{{ $room->area }}</td>
              <td>{{ $room->price }}</td>
              <td>{{ $room->facility }}</td>
              <td class="project-actions text-right">
                <a class="btn btn-info btn-sm" href="{{ route('room.edit', ['id' => $room->id]) }}">
                  <i class="fas fa-pencil-alt"></i> Edit
                </a>
                <a class="btn btn-danger btn-sm" href="{{ route('room.destroy', ['id' => $room->id]) }}">
                  <i class="fas fa-trash"></i> Delete
                </a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
@endsection