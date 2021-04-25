@extends('layouts.admin')

@section('content')
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Danh sách bài viết</h3>
		<a class="btn btn-success float-sm-right" href="/admin/posts/create">
			Thêm mới
		</a>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<table id="post-table" class="table table-bordered table-striped">
			<thead>
			<tr>
				<th>#</th>
				<th>Tiêu đề</th>
				<th>Ảnh thumbnail</th>
				<th>Tóm tắt</th>
				<th>Nội dung</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
	<!-- /.card-body -->
</div>
@endsection

@push('scripts')
<script>
	$(function () {
    $("#post-table").DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
	});
</script>
@endpush