@extends('adminlte::page')

@section('title', 'Products')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
@stop

@section('content')
	<div class="row" style="margin-top: 10px;">
		<div class="col-md-12">
			<div class="card card-success">
				<div class="card-header">
					<h3><i class="fas fa-box"></i> Products</h3>
				</div>
				<div class="card-body">
					<table class="table table-bordered table-striped display nowrap" style="width:100%">
						<thead>
							<tr>
								<th>Title</th>
								<th>Sku</th>
								<th>Description</th>
								<th>Store</th>
								<th>Image</th>
								<th>Labels</th>
								<th>Status</th>
								<th>Price</th>
								<th>Shopify Product ID</th>
								<th>Variant ID</th>
							</tr>
						</thead>
						<tbody>
							@foreach($products as $product)
								<tr>
									<td>{{ $product->title }}</td>
									<td>{{ $product->sku }}</td>
									<td>{{ $product->description }}</td>
									<td>{{ $product->store }}</td>
									<td><img src="{{ $product->image }}" style="width: 250px; height: 250px;" alt=""></td>
									<td>{{ $product->labels }}</td>
									<td>{{ $product->status }}</td>
									<td>{{ $product->price }}</td>
									<td>{{ $product->shopify_product_id }}</td>
									<td>{{ $product->variant_id }}</td>
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
			rowReorder: {
	            selector: 'td:nth-child(2)'
	        },
			responsive: true
		});
	});
</script>
@stop