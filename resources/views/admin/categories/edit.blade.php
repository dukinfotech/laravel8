@extends('layouts.admin')

@section('content')
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Chỉnh sửa</h3>
	</div>
	<!-- /.card-header -->
	<!-- form start -->
	<form role="form" id="category-form" action="/admin/categories/{{ $category->id }}" method="POST">
		@csrf
		@method('PUT')
		<div class="card-body">
			<div class="form-group">
				<label for="name">Tên thể loại <span class="text-danger">*</span></label>
				<input type="text" name="name" class="form-control" id="name" placeholder="Nhập tên thể loại" value="{{ old('name', $category->name) }}">
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
			<button type="submit" class="btn btn-primary">Cập nhật</button>
		</div>
	</form>
</div>
@endsection