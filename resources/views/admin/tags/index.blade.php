@extends('layouts.admin')

@section('content')
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Danh sách thẻ tag</h3>
		<a class="btn btn-success float-sm-right" href="/admin/tags/create">
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
						<a href="/admin/tags/{{ $tag->id }}/edit" class="btn btn-warning" title="Sửa">
							<i class="fas fa-edit"></i>
						</a>
						<form action="/admin/tags/{{ $tag->id }}" class="d-inline" method="DELETE">
							@csrf
							<button type="submit" class="btn btn-danger">
								<i class="fas fa-trash-alt"></i>
							</button>
						</form>
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
	$(function () {
    $("#tag-table").DataTable({
			"columnDefs": [
				{
					"targets": 2,
					"orderable": false
				}
			]
		});
	});
</script>
@endpush