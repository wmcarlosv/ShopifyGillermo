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
								<th>Etiquetas</th>
								<th>Direccion</th>
								<th>Direccion de Envio</th>
								<th>Sku Producto</th>
								<th>Cantidad</th>
								<th>Nombre Producto</th>
								<th>Descuento</th>
								<th>Total Parcial</th>
								<th>Total</th>
								<th>Estado del Pago</th>
								<th>Estado del Pedido</th>
								<th>Nro de Orden</th>
								<th>Fecha</th>
							</tr>
						</thead>
						<tbody id="load_data">
							@foreach($orders as $order)
								<tr>
									<td>{{ $order->customer }}</td>
									<td>{{ $order->phone }}</td>
									<td>{{ $order->tags }}</td>
									<td>{{ $order->address }}</td>
									<td>{{ $order->shipping_address }}</td>
									<td>{{ $order->product_sku }}</td>
									<td>{{ $order->qty }}</td>
									<td>{{ $order->product_name }}</td>
									<td>{{ $order->discount }}</td>
									<td>{{ $order->parcial_total }}</td>
									<td>{{ $order->total }}</td>
									<td>
										@if($order->payment_status == 'pending')
											Pendiente
										@elseif($order->payment_status == 'paid')
											Pagado
										@endif
									</td>
									<td>{{ $order->order_status }}</td>
									<td>{{ $order->order_no }}</td>
									<td>{{ $order->order_date }}</td>
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