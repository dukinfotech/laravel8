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
				<th>Thể loại</th>
				<th width="200">Ảnh thumbnail</th>
				<th>Nội dung tóm tắt</th>
				<th>Thẻ tag</th>
				<th>Ngày đăng</th>
				<th>Người đăng</th>
				<th>Trạng thái</th>
				<th width="150">Tác vụ</th>
			</tr>
			</thead>
			<tbody>
			@foreach($posts as $k=> $post)
				<tr>
					<td>{{ $k+1 }}</td>
					<td>{{ $post->title }}</td>
					<td>
						@foreach($post->categories as $category)
						<span class="badge bg-primary">{{ $category->name }}</span>
						@endforeach
					</td>
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
					<td class="status-badge-{{ $post->id }}" data-public="{{ $post->isPublic }}">
						<span class="badge bg-{{ $post->isPublic ? 'success' : 'secondary' }}">
							{{ $post->isPublic ? 'Đã phát hành' : 'Chưa phát hành' }}
						</span>
					</td>
					<td>
					@can('view', $post)
						<a href="/admin/posts/{{ $post->id }}/edit" class="btn btn-warning" title="Chỉnh sửa">
							<i class="fas fa-edit"></i>
						</a>
					@endcan
					@role('Super Admin')
						<button class="btn btn-info status-btn" data-post="{{ $post->id }}" title="{{ $post->isPublic ? 'Thu hồi' : 'Phát hành' }}">
							<i class="fas fa-globe-asia"></i>
						</button>
					@endrole
					@can('delete', $post)
						<button class="btn btn-danger delete-btn" data-url="/admin/posts/{{ $post->id }}" title="Xóa">
							<i class="fas fa-trash-alt"></i>
						</button>
					@endcan
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
			"targets": [2, 3, 5, 9],
			"orderable": false
		}
	]
});

// Change Public Status Post
$('.status-btn').click(function () {
	var postId = $(this).data('post');
	$.ajax({
		method: 'POST',
		url: '/admin/posts/' + postId + '/update-status',
		data: { _method: 'PUT' }
	}).then(function () {
		var isPublic = $('.status-badge-' + postId).data('public');
		var html =  '<span class="badge bg-'+ (isPublic == 1 ? 'secondary' : 'success') +'">' +
									(isPublic == 1  ? 'Chưa phát hành' : 'Đã phát hành') + 
								'</span>';
		$('.status-badge-' + postId).html(html);
		$('.status-badge-' + postId).data('public', isPublic == 0 ? 1 : 0);
	});
});
</script>
@endpush