@extends('layouts.app')

@section('title', 'Create Room')

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

  <form action="{{ route('room.update', ['id' => $room->id]) }}" method="post">
    @csrf
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-body">
            <div class="form-group">
              <label for="room_type_id">Room Type</label>
              <select id="room_type_id" name="room_type_id" class="form-control custom-select">
                <option disabled>Select one</option>
                @foreach ($room_types as $room_type)
                  <option value="{{ $room_type->id }}" @if ($room->room_type_id == $room_type->id) selected @endif>{{ $room_type->room_type }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="room_name">Room Name</label>
              <input type="text" id="room_name" value="{{ $room->room_name }}" name="room_name" class="form-control">
            </div>
            <div class="form-group">
              <label for="area">Area</label>
              <input type="text" id="area" value="{{ $room->area }}" name="area" class="form-control">
            </div>
            <div class="form-group">
              <label for="price">Price</label>
              <input type="number" class="form-control" id="price" value="{{ $room->price }}" name="price" step="0">
            </div>
            <div class="form-group">
              <label for="facility">Facility</label>
              <textarea id="facility" name="facility" class="form-control" rows="4">{{ $room->facility }}</textarea>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <input type="submit" value="Update Room" class="btn btn-success float-right">
      </div>
    </div>
  </form>
@endsection