
function list_forms() {
    $.ajax({
        url: 'api/html_fields/list-forms',
        type: 'GET',
        success: function (results) {
            debugger;
            divData = '';
            if (results.data.length > 0) {
                $.each(results.data, function (i, val) {
                    divData += '<div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="200">';

                    divData += '<a href="/form-view/' + val.id + '"><div class="box">';
                    divData += '<div class="icon" style="background: #fff0da;"><i class="bi bi-list-check" style="color: #e98e06;"></i></div>';
                    divData += '<h4 class="title">'+val.form_name+'</h4>';
                    divData += '<a href="/edit-form/' + val.id + '"><div class="description">Edit</div></a>';
                    divData += '</div></a>';
                    divData += '</div>';
                });
              }
              $('#form-div').html(divData);
            
        }
    });
}

$(document).ready(function () {
    list_forms();
 
});
