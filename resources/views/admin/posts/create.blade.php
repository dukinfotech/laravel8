@extends('layouts.admin')

@section('content')
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Thêm mới</h3>
	</div>
	<!-- /.card-header -->
	<!-- form start -->
	<form role="form" id="tag-form" action="/admin/tags" method="POST">
		@csrf
		<div class="card-body">
			<div class="form-group">
				<label for="tittle">Tiêu đề <span class="text-danger">*</span></label>
				<input type="text" name="tittle" class="form-control" id="tittle" placeholder="Nhập tiêu đề" value="{{ old('title') }}">
			</div>
			<div class="form-group">
				<label for="thumbnail-path">Ảnh thumbnail</label>
				<div class="input-group">
					<div class="input-group-prepend">
						<button class="btn btn-info pl-3 pr-3" type="button">
							<i class="fas fa-images"></i>
						</button>
					</div>
					<input type="text" name="thumbnail_path" class="form-control" id="thumbnail-path" value="{{ old('thumbnail_path') }}" readonly>
				</div>
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
			<button type="submit" class="btn btn-primary">Tạo</button>
		</div>
	</form>
</div>
@endsection