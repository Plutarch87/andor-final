@extends('layouts.app')

@section('title', 'Brojevi')

@section('sidebar')
@stop

@section('content')
	<table class="table table-striped">
	   <thead>
	     <tr>
	       <th>Datum</th>
	       <th>Broj Narudzbi</th>
	       <th>Suma</th>
	     </tr>
	   </thead>
	   <tbody>
	   @foreach($orders as $order)
	     <tr>
	       <td>{{ $order->created_at }}</td>
	       <td>{{ count($order->cart) }}</td>
	       <td>{{ $order->total }}</td>
	     </tr>
	   @endforeach	     
	      <tr>
	       <td></td>
	       <td></td>
	       <th>Total: {{ App\Order::sum('total') }}</th>
	     </tr>
	   </tbody>
	 </table>
@endsection