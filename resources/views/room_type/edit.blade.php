@extends('layouts.app')

@section('title', 'Edit Room Type')

@section('content')
  @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif

  <form action="{{ route('room_type.update', ['id' => $room_type->id]) }}" method="post">
    @csrf
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-body">
            <div class="form-group">
              <label for="room_type">Room Type</label>
              <input type="text" id="room_type" value="{{ $room_type->room_type }}" name="room_type" class="form-control">
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <input type="submit" value="Update Room Type" class="btn btn-success float-right">
      </div>
    </div>
  </form>
@endsection