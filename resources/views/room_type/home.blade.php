@extends('layouts.app')

@section('title', 'Room Type')

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
      <a class="btn btn-primary btn-sm" href="{{ route('room_type.create') }}">
        <i class="fas fa-plus"></i> Create Room Type
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
          </tr>
        </thead>
        <tbody>
          @foreach ($room_types as $room_type)
            <tr>
              <td>#</td>
              <td>{{ $room_type->room_type }}</td>
              <td class="project-actions text-right">
                <a class="btn btn-info btn-sm" href="{{ route('room_type.edit', ['id' => $room_type->id]) }}">
                  <i class="fas fa-pencil-alt"></i> Edit
                </a>
                <a class="btn btn-danger btn-sm" href="{{ route('room_type.destroy', ['id' => $room_type->id]) }}">
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