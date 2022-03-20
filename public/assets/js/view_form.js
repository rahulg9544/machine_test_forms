
function view_forms(id) {
    $.ajax({
        url: '/api/html_fields/'+id,
        type: 'GET',
        success: function (results) {
            debugger;
            divData = '';
            if (results.data.length > 0) {
                $.each(results.data, function (i, val) {
                    debugger;
                    if(val.html_field_id == '1')
                    {
                        divData += '<div class="form-group">';
                        divData += '<label><b>'+val.html_field_value+'</b></label>';
                        divData += '<input type="text" name="'+val.html_field_value+'" class="form-control"  required>';
                        divData += '</div>';
                    }else if(val.html_field_id == '2'){
                        divData += '<div class="form-group">';
                        divData += '<label><b>'+val.html_field_value+'</b></label>';
                        divData += '<input type="number" name="'+val.html_field_value+'" class="form-control"  required>';
                        divData += '</div>';
                    }else if(val.html_field_id == '3')
                    {
                        divData += '<div class="form-group">';
                        divData += '<label><b>'+val.html_field_value+'</b></label>';
                        divData += '<select class="form-control " name="'+val.html_field_value+'">';
                        if(val.options.length>0)
                        {
                            $.each(val.options, function (i, val) {
                             divData += '<option value="'+val.value+'" >'+val.label+'</option>';
                            });
                        }
                        divData += '</select>';
                        divData += '</div>';
                    }
                });
              }
              $('#form-create').html(divData);
            
        }
    });
}
function deleteForm() {
    var origin   = window.location.href;
    var segments = origin.split( '/' );
    var action = segments[3];
    var formId = segments[4];
    
    let text = "Are you sure you want to delete this form permanently??";
  if (confirm(text) == true) {
    
    $.ajax({
        url: '/api/html_fields/'+formId,
        method: 'DELETE',
        success: function (result) {
          alert("Form deleted successfully");
          window.location.replace("/");
        },
        error: function (response) {
            debugger;
          var resStatus = response.status;
          var resJson = response.responseJSON;
          if (resStatus == 401) {
            alert("Sorry you have no permission. Please Login");
          } else if (resStatus == 422) {
            alert("Sorry Something went wrong");
          } else {
            alert("Sorry Something went wrong");
          }
        },
      });
    
    
  } else {
   
  }
}
$(document).ready(function () {
    var origin   = window.location.href;
    var segments = origin.split( '/' );
    var action = segments[3];
    var id = segments[4];
    view_forms(id);
 
});
