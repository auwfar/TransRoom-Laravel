@extends('layouts.app')

@section('title', 'Booking Room')

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

  <div class="row">
    <div class="col-md-8">
      <form action="{{ route('booking.store') }}" method="post">
        @csrf
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Transaction</h3>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="room_id">Room</label>
              <select id="room_id" name="room_id" class="form-control custom-select">
                <option selected disabled>Select one</option>
                @foreach ($rooms as $room)
                  <option value="{{ $room->id }}">{{ $room->room_name }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="cust_name">Customer Name</label>
              <input type="text" id="cust_name" name="cust_name" class="form-control">
            </div>
            <div class="form-group">
              <div class="form-group">
                  <label>Date</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" class="form-control" id="datemask" name="trans_date" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask>
                  </div>
                </div>
            </div>
            <div class="form-group">
              <label for="days">Days</label>
              <input type="number" class="form-control" id="days" name="days">
            </div>
            <div class="form-group">
              <label for="extra_charge">Extra Charge</label>
              <input type="number" class="form-control" id="extra_charge" name="extra_charge" value="0">
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <div class="row">
          <div class="col-12">
            <input type="submit" value="Book" class="btn btn-success float-right">
          </div>
        </div>
      </form>
    </div>
    <div class="col-md-4">
      <div class="card card-secondary">
        <div class="card-header">
          <h3 class="card-title">Extra Charge</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="form-group clearfix">
            <div class="icheck-primary d-inline">
              <input type="checkbox" id="soda">
              <label for="soda">Soda (Rp. 20.000)</label>
            </div>
          </div>
          <div class="form-group clearfix">
            <div class="icheck-primary d-inline">
              <input type="checkbox" id="water">
              <label for="water">Mineral Water (Rp. 15.000)</label>
            </div>
          </div>
          <div class="form-group clearfix">
            <div class="icheck-primary d-inline">
              <input type="checkbox" id="laundry">
              <label for="laundry">Laundry (Rp. 100.000)</label>
            </div>
          </div>
          <div class="form-group clearfix">
            <div class="icheck-primary d-inline">
              <input type="checkbox" id="snack">
              <label for="snack">Snack (Rp. 25.000)</label>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
@endsection

@section('additional_javascripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8/jquery.inputmask.min.js"></script>
  <script>
    $(function () {
      $('#datemask').inputmask('yyyy-mm-dd', { 'placeholder': 'yyyy-mm-dd' })

      $('#soda').change(function() {
        var extraCharge = parseInt($('#extra_charge').val());
        if ($(this).is(':checked')) {
          extraCharge+=20000;
        } else {
          extraCharge-=20000;
        }
        $('#extra_charge').val(extraCharge);
      })

      $('#water').change(function() {
        var extraCharge = parseInt($('#extra_charge').val());
        if ($(this).is(':checked')) {
          extraCharge+=15000;
        } else {
          extraCharge-=15000;
        }
        $('#extra_charge').val(extraCharge);
      })

      $('#laundry').change(function() {
        var extraCharge = parseInt($('#extra_charge').val());
        if ($(this).is(':checked')) {
          extraCharge+=100000;
        } else {
          extraCharge-=100000;
        }
        $('#extra_charge').val(extraCharge);
      })

      $('#snack').change(function() {
        var extraCharge = parseInt($('#extra_charge').val());
        if ($(this).is(':checked')) {
          extraCharge+=25000;
        } else {
          extraCharge-=25000;
        }
        $('#extra_charge').val(extraCharge);
      })
    });
  </script>
@endsection