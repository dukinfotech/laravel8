jQuery.validator.addMethod("noSpace", function(value, element) { 
  return value.indexOf(" ") < 0;
});

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