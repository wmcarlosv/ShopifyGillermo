@extends('adminlte::page')

@section('title', 'Orders')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
@stop

@section('content')
	<div class="row" style="margin-top: 10px;">
		<div class="col-md-12">
			<div class="card card-success">
				<div class="card-header">
					<h3><i class="fas fa-file-contract"></i> Orders</h3>
				</div>
				<div class="card-body">
					<table class="table table-bordered table-striped display nowrap" style="width:100%">
						<thead>
							<tr>
								<th>Nombre del Cliente</th>
								<th>Telenfo del Cliente</th>
								<th>Order Nro</th>
								<th>Order Date</th>
								<th>Currency</th>
								<th>Status</th>
								
								
								<th>Country</th>
								<th>Province</th>
								<th>City</th>
								<th>Address</th>
								<th>Product Name</th>
								<th>Price</th>
								<th>Quantity</th>
								<th>Store</th>
							</tr>
						</thead>
						<tbody id="load_data">
							@foreach($orders as $order)
								<tr>
									<td>{{ $order->order_no }}</td>
									<td>{{ $order->order_date }}</td>
									<td>{{ $order->currency }}</td>
									<td>{{ $order->status }}</td>
									<td>{{ $order->customer }}</td>
									<td>{{ $order->phone }}</td>
									<td>{{ $order->country }}</td>
									<td>{{ $order->province }}</td>
									<td>{{ $order->city }}</td>
									<td>{{ $order->address }}</td>
									<td>{{ $order->product_name }}</td>
									<td>{{ $order->price }}</td>
									<td>{{ $order->qty }}</td>
									<td>{{ $order->store }}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@stop

@section('js')
<script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script>
	$(document).ready(function(){
		$("table").DataTable({
			responsive: true
		});
	});
</script>
@stop