@extends('layouts.admin')

@section('content')
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Cập nhật</h3>
	</div>
	<!-- /.card-header -->
	<!-- form start -->
	<form role="form" id="tag-form" action="/admin/tags/{{ $tag->id }}" method="POST">
		@csrf
		@method('PUT')
		<div class="card-body">
			<div class="form-group">
				<label for="name">Tên thẻ <span class="text-danger">*</span></label>
				<input type="text" name="name" class="form-control" id="name" placeholder="Nhập tên thẻ" value="{{ old('name', $tag->name) }}">
			</div>
      @if ($errors->any())
        <div class="text-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
		</div>
		<div class="card-footer">
			<button type="submit" class="btn btn-primary">Lưu</button>
		</div>
	</form>
</div>
@endsection