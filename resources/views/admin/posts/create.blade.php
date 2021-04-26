@extends('layouts.admin')

@section('content')
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Thêm mới</h3>
	</div>
	<!-- /.card-header -->
	<!-- form start -->
	<form role="form" id="post-form" action="/admin/posts" method="POST">
		@csrf
		<div class="card-body">
			<div class="form-group">
				<label for="title">Tiêu đề <span class="text-danger">*</span></label>
				<input type="text" name="title" class="form-control" id="title" placeholder="Nhập tiêu đề" value="{{ old('title') }}">
			</div>
			<div class="form-group">
				<label for="thumbnail-path">Ảnh thumbnail</label>
				<div class="input-group">
					<div class="input-group-prepend">
						<button class="btn btn-info pl-3 pr-3" type="button" id="lfm" data-input="thumbnail-path" data-preview="holder">
							<i class="fas fa-images"></i>
						</button>
					</div>
					<input type="text" name="thumbnail_path" class="form-control" id="thumbnail-path" value="{{ old('thumbnail_path') }}" readonly>
				</div>
				<div id="holder" class="mt-3">
					@if(old('thumbnail_path'))
					<img src="{{ old('thumbnail_path') }}" style="height: 5rem;">
					@endif
				</div>
			</div>
			<div class="form-group">
				<label for="summary">Nội dung tóm tắt</label>
				<textarea class="form-control" name="summary" id="summary" rows="3">{{ old('summary') }}</textarea>
			</div>
			<div class="form-group">
				<label for="tags">Thẻ tag</label>
				<select class="select2" multiple="multiple" style="width: 100%;" name="tags[]">
					@foreach($tags as $tag)
					<option value="{{ $tag->id }}" {{ (old('tags') && in_array($tag->id, old('tags'))) ? 'selected' : '' }}>{{ $tag->name }}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="content">Nội dung chính <span class="text-danger">*</span></label>
				<textarea class="tinymce-editor form-control" name="content" id="content" rows="10">{{ old('content') }}</textarea>
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