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
								<th>Order Nro</th>
								<th>Order Date</th>
								<th>Currency</th>
								<th>Status</th>
								<th>Customer</th>
								<th>Phone</th>
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
								<tr data-id="{{ $order->id }}">
									<td>{{ $order->order_no }}</td>
									<td><span class="get_data_span" id="order_date_{{ $order->id }}" data-column='order_date'>{{ $order->order_date }}</span></td>
									<td><span class="get_data_span" id="currency_{{ $order->id }}" data-column='currency'>{{ $order->currency }}</span></td>
									<td><span class="get_data_span"  id="status_{{ $order->id }}" data-column='status'>{{ $order->status }}</span></td>
									<td><span class="get_data_span"  id="customer_{{ $order->id }}" data-column='customer'>{{ $order->customer }}</span></td>
									<td><span class="get_data_span"  id="phone_{{ $order->id }}" data-column='phone'>{{ $order->phone }}</span></td>
									<td><span class="get_data_span"  id="country_{{ $order->id }}" data-column='country'>{{ $order->country }}</span></td>
									<td><span class="get_data_span"  id="province_{{ $order->id }}" data-column='province'>{{ $order->province }}</span></td>
									<td><span class="get_data_span"  id="city_{{ $order->id }}" data-column='city'>{{ $order->city }}</span></td>
									<td><span class="get_data_span"  id="address_{{ $order->id }}" data-column='address'>{{ $order->address }}</span></td>
									<td><span class="get_data_span"  id="product_name_{{ $order->id }}" data-column='product_name'>{{ $order->product_name }}</span></td>
									<td><span class="get_data_span"  id="price_{{ $order->id }}" data-column='price'>{{ $order->price }}</span></td>
									<td><span class="get_data_span"  id="qty_{{ $order->id }}" data-column='qty'>{{ $order->qty }}</span></td>
									<td><span class="get_data_span"  id="store_{{ $order->id }}" data-column='store'>{{ $order->store }}</span></td>
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

		$("body").on('click','span.get_data_span', function(){
			let text = $(this).text();
			let column = $(this).attr("data-column");
			let id = $(this).attr("id");
			let data_id = $(this).parent().parent().attr("data-id");
			$(this).hide();
			$(this).parent().append("<input type='text' data-id='"+data_id+"' value='"+text+"' data-the-id='"+id+"' data-column='"+column+"' style='width:150px;' class='form-control fast-edit' />");
		});

		$("body").on('keypress', 'input.fast-edit', function(event){

			var keycode = (event.keyCode ? event.keyCode : event.which);
			let id = $(this).attr("data-the-id");
			let column = $(this).attr("data-column");
			let data_id = $(this).attr("data-id");

		    if(keycode == '13'){

		    	$.get('/admin/fast-update/'+data_id+'/'+column+'/'+$(this).val(), function(response){
		    		console.log(response);
		    	});

		    	$("#"+id).text($(this).val());
		    	$("#"+id).show();
		    	$(this).remove();
		    }
		});
	});
</script>
@stop