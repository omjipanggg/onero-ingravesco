<div class="table-responsive">
	<table class="table table-sm table-bordered table-hover table-order-details-on-modal m-0">
		<thead>
			<tr>
				<th>Product</th>
				<th>Price</th>
				<th>Total</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($order->details as $detail)
				<tr>
					<td>{{ Str::headline($detail->name) }}<span class="badge bg-dark float-end"><i class="bi bi-x"></i><strong>{{ $detail->pivot->quantity }}</strong></span></td>
					<td>{{ number_format($detail->price, 0, ',', '.') }}</td>
					<td>{{ number_format($detail->pivot->quantity * $detail->price, 0, ',', '.') }}</td>
				</tr>
			@endforeach
		</tbody>
		<tfoot>
			<tr>
				<th colspan="2">Subtotal</th>
				<th>{{ number_format($order->total_sales, 0, ',', '.') }}</th>
			</tr>
		</tfoot>
	</table>
</div>