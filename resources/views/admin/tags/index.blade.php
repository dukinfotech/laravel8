@extends('layouts.admin')

@section('content')
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Danh sách thẻ tag</h3>
		<a class="btn btn-success float-right" href="/admin/tags/create">
			Thêm mới
		</a>
	</div>
	<!-- /.card-header -->
	<div class="card-body table-responsive">
		<table id="tag-table" class="table table-bordered table-striped">
			<thead>
			<tr>
				<th width="10">#</th>
				<th>Tên thẻ</th>
				<th width="100">Tác vụ</th>
			</tr>
			</thead>
			<tbody>
				@foreach($tags as $k=> $tag)
				<tr>
					<td>{{ $k+1 }}</td>
					<td>{{ $tag->name }}</td>
					<td>
						<a href="/admin/tags/{{ $tag->id }}/edit" class="btn btn-warning" title="Chỉnh sửa">
							<i class="fas fa-edit"></i>
						</a>
						<button class="btn btn-danger delete-btn" data-url="/admin/tags/{{ $tag->id }}" title="Xóa">
							<i class="fas fa-trash-alt"></i>
						</button>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<!-- /.card-body -->
</div>
@endsection

@push('scripts')
<script>
$("#tag-table").DataTable({
	"columnDefs": [
		{
			"targets": 2,
			"orderable": false
		}
	]
});
</script>
@endpush