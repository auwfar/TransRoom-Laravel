@extends('layouts.app')

@section('title', 'Booking Room')

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
      <a class="btn btn-primary btn-sm" href="{{ route('booking.create') }}">
        <i class="fas fa-plus"></i> Booking Room
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
              Transaction Code
            </th>
            <th>
              Transaction Date
            </th>
            <th>
              Customer Name
            </th>
            <th>
              Total Room Price
            </th>
            <th>
              Total Extra Charge
            </th>
            <th>
              Final Total
            </th>
            <th style="width: 20%">
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach ($transactions as $transaction)
            <tr>
              <td>#</td>
              <td>{{ $transaction->trans_code }}</td>
              <td>{{ $transaction->trans_date }}</td>
              <td>{{ $transaction->cust_name }}</td>
              <td>{{ $transaction->total_room_price }}</td>
              <td>{{ $transaction->total_extra_charge }}</td>
              <td>{{ $transaction->final_total }}</td>
              <td class="project-actions text-right">
                <a class="btn btn-danger btn-sm" href="{{ route('booking.destroy', ['id' => $transaction->id]) }}">
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