jQuery.validator.addMethod("noSpace", function(value, element) { 
  return value.indexOf(" ") < 0;
});