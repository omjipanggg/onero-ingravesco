<div class="container mt-3">
	<div class="row">
		<div class="col">
			<div class="card-container">
				@foreach ($products as $product)
				<div class="card pointer item-on-card" data-id="{{ $product->id }}" data-name="{{ Str::headline($product->name) }}" data-price="{{ $product->price }}">
					<div class="card-body p-0">
						<img src="{{ asset('storage\\ngodeng\\products\\' . $product->image) }}" alt="{{ $product->name }}" class="card-img-top">
					</div>
					<div class="card-body py-1 px-2">
						<div class="card-text fw-bold">
							{{ Str::headline($product->name) }}
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>