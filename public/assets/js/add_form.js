var htmlList = [];

$(document).ready(function () {

    // $.ajax({
    //   url: 'api/html_fields',
    //   type: 'GET',
    //   success: function (results) {
    //       debugger;
    //     htmlList = results;
    //   }
    // });


    var divData = '';
    divData += '<div class="form-group">';
    divData += '<div class="row">';
    divData += '<div class="col-md-5"><label><b>Select HTML Field</b></label>';
    divData += '<select class="form-control sel-html-field" attr-count="1" id="html_field1" name="html_field[]">';
    divData += '<option value="1" selected>Text Field</option>';
    divData += '<option value="2">Text Field (Numbers Only)</option>';
    divData += '<option value="3">Select Box</option>';
    divData += '</select>';
    divData += '</div>';
    divData += '<div class="col-md-5"><label><b>Label Name</b></label>';
    divData += '<input type="text" name="form_name[]" class="form-control" id="form_name1" attr-count="1" placeholder="Label Name" required>';
    divData += '</div>';
    divData += '<div class="col-md-2"><label>&nbsp;</label>';
    divData += '<div class="text-center"></div>';
    divData += '</div>';
    divData += '</div>';
    divData += '<div id="selectOptionDiv1"></div>';
    divData += '</div>';
    $('.append-data').html(divData);




    $('#form-create').on('change', '.sel-html-field', function (e) {
       debugger;
        e.stopImmediatePropagation();
       var divcount = $(this).attr('attr-count');
       var attrDivcount = $(this).attr('attr-Divcount');
       var divData = '';
        if($(this).val() == '3'){
            divData += '<input type="hidden" name="count_of_option' + divcount + '" id="count_of_option' + divcount + '" value="1">';
            divData += '<div class="row">';
            divData += '<div class="col-md-1"></div>';
            divData += '<div class="col-md-4"><label>&nbsp;</label>';
            divData += '<input type="text" name="select_option_value'+attrDivcount+'[]" class="form-control" id="select_option_value' + divcount + '1" attr-count="1" placeholder="Value" required>';
            divData += '</div>';
            divData += '<div class="col-md-4"><label>&nbsp;</label>';
            divData += '<input type="text" name="select_option_label'+attrDivcount+'[]" class="form-control" id="select_option_label' + divcount + '1" attr-count="1" placeholder="Label" required>';
            divData += '</div>';
            divData += '<div class="col-md-1"><label>&nbsp;</label>';
            divData += '<div class="text-center"><button type="button" onclick="addmoreoption(' + divcount + ');">+</button></div>';
            divData += '</div>';
            divData += '</div><div id="each_options_more'+ divcount+'"></div>';
            $('#selectOptionDiv'+ attrDivcount).html(divData);
        }else{
            divData += '';
        }
      });



      $('#service_form').on('submit', function (e) {
        e.preventDefault();
        
    
    
          $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            //data: new FormData(this),
            data: $('#service_form').serialize(),
            success: function (result) {
              alert("Form added successfully");
              window.location.replace("/");
            },
            error: function (response) {
              var resStatus = response.status;
              var resJson = response.responseJSON;
              if (resStatus == 422) {
                alert("Sorry Something went wrong");
              } else {
                alert("Sorry Something went wrong");
              }
            },
          });
        
      });

});

function addmoreoption(divcount) {
    var count = $("#count_of_option"+divcount).val();
    var count1 = $("#field_count").val();
    count = parseInt(count) + 1;
    var closeBtn = '';
    if (count == '1') {
        closeBtn = '';

    }
    else {
        closeBtn = '<div class="col-md-1"><label>&nbsp;</label><div class="text-center"><button type="button" style="background-color:red" onclick="removeThis(' + divcount + ');">+</button></div></div>';

    }
    debugger;
    divData = '';



    divData += '<div  id="each_option_div' + count + '_'+divcount+'">';

    divData += '<div class="row">';
    divData += '<div class="col-md-1"></div>';
    divData += '<div class="col-md-4"><label>&nbsp;</label>';
    divData += '<input type="text" name="select_option_value'+divcount+'[]" class="form-control" id="select_option_value' + divcount +count+ '" attr-count="' + count + '" placeholder="Value" required>';
    divData += '</div>';
    divData += '<div class="col-md-4"><label>&nbsp;</label>';
    divData += '<input type="text" name="select_option_label'+divcount+'[]" class="form-control" id="select_option_label' + divcount + count+'" attr-count="' + count + '" placeholder="Label" required>';
    divData += '</div>';
    divData += '<div class="col-md-1"><label>&nbsp;</label>';
    divData += '<div class="text-center"><button type="button" onclick="removeThisOption(' + divcount + ',' + count + ');">-</button></div>';
    divData += '</div>';

    divData += '</div>';
    


    $('#each_options_more'+divcount).append(divData);
    $("#count_of_option"+divcount).val(count);


}

function addmores() {
    var count = $("#field_count").val();
    var staticdivcount = $("#static_field_count").val();
    count = parseInt(count) + 1;
    staticdivcount = parseInt(staticdivcount) + 1;
    var closeBtn = '';
    if (count == '1') {
        closeBtn = '';

    }
    else {
        closeBtn = '<div class="col-md-2"><label>&nbsp;</label><div class="text-center"><button type="button" style="background-color:red" onclick="removeThis(' + count + ')">Remove</button></div></div>';

    }
    debugger;
    divData = '';



    divData += '<div  id="html_field_div' + count + '">';

    divData += '<div class="form-group">';
    divData += '<div class="row">';
    divData += '<div class="col-md-5"><label>&nbsp;</label>';
    divData += '<select class="form-control sel-html-field" attr-count="' + count + '" attr-Divcount="' + staticdivcount + '" id="html_field' + count + '" name="html_field[]">';
    divData += '<option value="1" selected>Text Field</option>';
    divData += '<option value="2">Text Field (Numbers Only)</option>';
    divData += '<option value="3">Select Box</option>';
    divData += '</select>';
    divData += '</div>';
    divData += '<div class="col-md-5"><label>&nbsp;</label>';
    divData += '<input type="text" name="form_name[]" class="form-control" id="form_name' + count + '" attr-Divcount="' + staticdivcount + '" attr-count="' + count + '" placeholder="Label Name" required>';
    divData += '</div>';
    divData += closeBtn;
    divData += '<div class="text-center"></div>';
    divData += '</div>';
    divData += '</div>';
    
    divData += '<div id="selectOptionDiv' + staticdivcount + '"></div>';
    divData += '</div>';
    


    $('.append-data').append(divData);
    $("#field_count").val(count);
    $("#static_field_count").val(staticdivcount);


}



function removeThis(i) {
    var count = $("#field_count").val();
    $('#html_field_div' + i).remove();
    count = parseInt(count) - 1;
    
    $("#field_count").val(count);
  

}

function removeThisOption(div,number) {
    var count = $("#count_of_option"+div).val();
    $('#each_option_div' +number +'_'+div).remove();
    count = parseInt(count) - 1;
    
    $("#count_of_option"+div).val(count);
  

}