<div class="input-group">
	<span class="input-group-btn">
		<a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
			<i class="fa fa-picture-o"></i> Choose
		</a>
	</span>
	<input id="thumbnail" class="form-control" type="text" name="filepath">
</div>
<div id="holder"></div>

<script src="/assets/lib/jquery-3.6.0.min.js"></script>
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
    $('#lfm').filemanager('image')
</script>