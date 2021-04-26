@extends('layouts.admin')

@section('content')
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Danh sách bài viết</h3>
		<a class="btn btn-success float-right" href="/admin/posts/create">
			Thêm mới
		</a>
	</div>
	<!-- /.card-header -->
	<div class="card-body table-responsive">
		<table id="post-table" class="table table-bordered table-striped">
			<thead>
			<tr>
				<th width="10">#</th>
				<th>Tiêu đề</th>
				<th width="200">Ảnh thumbnail</th>
				<th>Nội dung tóm tắt</th>
				<th>Thẻ tag</th>
				<th>Ngày đăng</th>
				<th>Người đăng</th>
				<th>Trạng thái</th>
				<th width="100">Tác vụ</th>
			</tr>
			</thead>
			<tbody>
			@foreach($posts as $k=> $post)
				<tr>
					<td>{{ $k+1 }}</td>
					<td>{{ $post->title }}</td>
					<td>
						@if ($post->thumbnail_path)
						<img src="{{ $post->thumbnail_path }}" alt="Thumbnail" height="50">
						@endif
					</td>
					<td>{{ $post->summary }}</td>
					<td>
						@foreach($post->tags as $tag)
						<span class="badge bg-primary">{{ $tag->name }}</span>
						@endforeach
					</td>
					<td>{{ $post->created_at }}</td>
					<td>{{ $post->user->name }}</td>
					<td>
						<span class="badge bg-{{ $post->isPublic ? 'success' : 'secondary' }}">
							{{ $post->isPublic ? 'Đã phát hành' : 'Chưa phát hành' }}
						</span>
					</td>
					<td>
						<a href="/admin/posts/{{ $post->id }}/edit" class="btn btn-warning" title="Sửa">
							<i class="fas fa-edit"></i>
						</a>
						<button class="btn btn-danger delete-btn" data-url="/admin/posts/{{ $post->id }}">
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
$("#post-table").DataTable({
	"columnDefs": [
		{
			"targets": [2, 4, 5, 8],
			"orderable": false
		}
	]
});
</script>
@endpush