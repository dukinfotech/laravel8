$(document).ready(function() {
  // Delete confirm
  $('.delete-btn').on('click', function () {
    var url = $(this).data('url');
    var cf = confirm('Bạn có chắc muốn xóa?');
    if (cf) {
      var form = document.createElement('form');
      form.setAttribute('method', 'POST');
      form.setAttribute('action', url);

      var inputCsrf = document.createElement('input');
      var csrfToken = $('meta[name="csrf-token"]').attr('content');
      inputCsrf.setAttribute('name', '_token');
      inputCsrf.setAttribute('type', 'hidden');
      inputCsrf.setAttribute('value', csrfToken);
      form.appendChild(inputCsrf);

      var inputMethod = document.createElement('input');
      inputMethod.setAttribute('name', '_method');
      inputMethod.setAttribute('type', 'hidden');
      inputMethod.setAttribute('value', 'DELETE');
      form.appendChild(inputMethod);

      $(document.body).append(form);
      form.submit();
    }
  });

  // Validate tag form
  $('#tag-form').validate({
    rules: {
      name: {
        required: true,
        maxlength: 25
      }
    },
    messages: {
      name: {
        required: "Nhập tên thẻ.",
        maxlength: "Tối đa 20 ký tự.",
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

  // Validate post form
  $('#post-form').validate({
    rules: {
      title: {
        required: true,
        maxlength: 60,
      },
      summary: {
        maxlength: 255,
      },
      content: {
        required: true,
      }
    },
    messages: {
      title: {
        required: 'Nhập tiêu đề bài viết.',
        maxlength: 'Tối đa 60 ký tự.',
      },
      summary: {
        maxlength: 'Tối đa 255 ký tự.'
      },
      content: {
        required: 'Nhập nội dung bài viết.',
      }
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      if (element.is("textarea")) {
        error.insertAfter(element.next());
      } else {
        element.closest('.form-group').append(error);
      }
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });

  $('#lfm').filemanager('image');

  // Setup tinymce
  var editor_config = {
    path_absolute : "/",
    selector: 'textarea.tinymce-editor',
    relative_urls: false,
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table directionality",
      "emoticons template paste textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | fullscreen",
    file_picker_callback : function(callback, value, meta) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'filemanager?editor=' + meta.fieldname;
      if (meta.filetype == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.openUrl({
        url : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no",
        onMessage: (api, message) => {
          callback(message.content);
        }
      });
    }
  };
  tinymce.init(editor_config);

  $('#post-form').submit(function() {
    var html = tinyMCE.activeEditor.getContent();
    $('#content').val(html);
  });

  // Initialize select2
  $('.select2').select2();

  // Setup CSRF Token for AJAX
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
});