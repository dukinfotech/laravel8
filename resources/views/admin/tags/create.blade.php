@extends('layouts.admin')

@section('content')
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Thêm mới</h3>
	</div>
	<!-- /.card-header -->
	<!-- form start -->
	<form role="form" id="create-tag-form" action="/admin/tags" method="POST">
		@csrf
		<div class="card-body">
			<div class="form-group">
				<label for="name">Tên thẻ</label>
				<input type="text" name="name" class="form-control" id="name" placeholder="Nhập tên thẻ" value="{{ old('name') }}">
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

@push('scripts')
<script>
$(document).ready(function () {
  $('#create-tag-form').validate({
    rules: {
      name: {
        required: true,
        maxlength: 20
      }
    },
    messages: {
      name: {
        required: "Nhập tên thẻ",
        maxlength: "Tối đa 20 ký tự",
      }
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>
@endpush