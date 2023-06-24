<form action="{{ route('product.update', $record->id) }}" method="POST" enctype="multipart/form-data">
	@method('PUT')
	@csrf
	<div class="d-flex flex-wrap gap-2 mb-2">
		<div class="form-floating flex-fill">
			<input type="text" class="form-control" required="" id="nameModal" name="name" autocomplete="off" placeholder="Name" value="{{ $record->name }}">
			<label for="nameModal">Name</label>
		</div>
		<div class="form-floating flex-fill">
			<input type="text" class="form-control numeric" required="" id="price" name="price" autocomplete="off" placeholder="Price" value="{{ number_format($record->price, 0, ',', '.') }}">
			<label for="price">Price</label>
		</div>
	</div>

	<div class="label-select position-relative mb-2">
		<select required="" name="categories[]" id="categoryModal" multiple="" class="form-select select2multipleModal" aria-label="Floating categories to be selected">
			@foreach ($categories as $element)
				@php($selected = false)

				@forelse ($record->categories as $each)
					@if ($element->id == $each->id)
						@php($selected = true)
					@endif
				@empty
				@endforelse

				<option value="{{ $element->id }}" @if($selected) selected="" @endif>{{ $element->name }}</option>
			@endforeach
		</select>
		<label for="categoryModal" class="text-muted">Category</label>
	</div>

	<div class="form-floating mb-2">
		<textarea class="form-control" placeholder="Description" id="descriptionModal" style="height: 96px" name="description">{{ $record->description }}</textarea>
		<label for="descriptionModal">Description</label>
	</div>

	@php($image = 'storage/ngodeng/products/' . $record->image)
	@if($record->image == 'default.png')
		@php($image = 'img/default.png')
	@endif

	<img src="{{ asset($image) }}" alt="{{ Str::headline($record->name) }}" class="img-fluid w-99 mb-2" id="imgOnModal">

	<div class="group d-flex flex-wrap justify-content-start align-items-center gap-2">
		<label for="fileInputModal" class="btn btn-color">Picture<i class="bi bi-cloud-upload ms-2"></i></label>
		<input type="file" name="image" class="form-control d-none" id="fileInputModal" accept=".jpg, .jpeg, .png">
		<small class="small form-text" id="fileNameModal">{{ $record->image ?? 'No file chosen' }}</small>
	</div>

	<button type="submit" class="d-none" id="btnSubmitOnModal">Save</button>
</form>