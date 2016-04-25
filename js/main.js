function tim(){
  var dateandtime = Date();
  // alert(dateandtime);
  console.log(dateandtime);
  return dateandtime;
}
function readURL(input) {
  if ($(".previewimage").length){
    $(".previewimage").remove();
    $(".dasimg").remove();
  }
  if (input.files && input.files[0]) {
      var reader = new FileReader();
      
      reader.onload = function (e) {
        $(".pre-img").append("<img class='previewimage' src='" + e.target.result + "' alt='previewimage' />")
        $(".hideimg").append("<img src='" + e.target.result + "' class='dasimg' />");
          // $('#blah').attr('src', e.target.result);
          $(".wideinp").val($(".dasimg").width());
          $(".tallinp").val($(".dasimg").height());
          console.log("W:" + $(".dasimg").width() + ", H: " + $(".dasimg").height());
      }
      
      reader.readAsDataURL(input.files[0]);
  }
}
/* Popup/Overlay */
$(".popup, .dasfiln").click(function(e){
  $("#overlay").fadeIn(300);
  $(".previews").delay(200).fadeIn(300);
  e.preventDefault();
  return false;
});
$("#subbutt").click(function(){

});
$("#overlay").click(function(){
  $(".previews").fadeOut(300);
  $(this).delay(200).fadeOut(300);
  $(".dz-image").remove();
  $(".previmgrt").remove();
});
$(".metad").click(function(){
  $(".aboutmeta").toggle();
  return false;
});
 $(document).keyup(function(e) {
  if (e.keyCode === 13) $('#andreasbutton').click();     // enter
  if (e.keyCode === 27) $('#overlay').click();   // esc
});
/* Make popup fade in on upload */
$(function() {
  $("input:file").change(function (){

    // var fileName = $(this).files[0].name;
    // console.log(fileName);
    var filN = $(this).val().replace(/C:\\fakepath\\/i, '');
    var ext = filN.substr(filN.length - 3);
    if ($("option[value='" + ext + "']").length){
      $("#fromsel").val(ext);
    }
    $("#overlay").fadeIn(300);
    $(".previews").delay(200).fadeIn(300);
        readURL(this);
    $(".filename").html(filN);
    $(".filenamev").val(filN);
    $(".dasfiln").html(filN);

  });
});

/* LEZ DO THIS */
$(document).ready(function() { 
  $('#testForm').ajaxForm(function() { 
    console.log("Uploaded " + document.getElementById("rilfil").files[0].name + " successfully");
  }); 
}); 



$(document).ready(function(){console.log("VER 9");});
/*
function handleFileSelect(evt) {
  var files = evt.target.files;
  var output = [];
  for (var i = 0, f; f = files[i]; i++) {
    output.push('<li><strong>', escape(f.name), '</strong> (', f.type || 'n/a', ') - ',
                f.size, ' bytes, last modified: ',
                f.lastModifiedDate ? f.lastModifiedDate.toLocaleDateString() : 'n/a',
                '</li>');
  }
  document.getElementById('list').innerHTML = '<ul>' + output.join('') + '</ul>';
}

document.getElementById('files').addEventListener('change', handleFileSelect, false);*/

/*** Ajax test 1  ***//*
 $("#testForm").submit(function(e){
    var postData = $(this).serializeArray();
    var formURL = $(this).attr("action");
      $.ajax({
          url : formURL,
          type: "POST",
          crossDomain: false,
          data : postData,
          dataType: "json",
          success:function(data, textStatus, jqXHR) 
          {
              //data: return data from server
              console.log(json_encode(this.data));
              console.log(this.data + "," + this.url);
          },
          error: function(jqXHR, textStatus, errorThrown) 
          {
              //if fails   
              alert('it didnt work');   
          }
        });
      e.preventDefault(); //STOP default action
      return false;
    });
  /*});*/

/*** Ajax test 2 ***/
/*** Ajax test 1  ***//*
 $("#testForm").submit(function(e){
    var postData = $(this).serializeArray();
    var formURL = $(this).attr("action");
      $.ajax({
          url : formURL,
          type: "POST",
          crossDomain: false,
          data : postData,
          dataType: "json",
          success:function(data, textStatus, jqXHR) 
          {
              //data: return data from server
              console.log(json_encode(this.data));
              console.log(this.data + "," + this.url);
          },
          error: function(jqXHR, textStatus, errorThrown) 
          {
              //if fails   
              alert('it didnt work');   
          }
        });
      e.preventDefault(); //STOP default action
      return false;
    });
  /*});*/

/*** Ajax test 2 ***/
/*
$('form').on('submit', uploadFiles);

function uploadFiles(event)
{
  event.stopPropagation(); // Stop stuff happening
    event.preventDefault(); // Totally stop stuff happening

    // START A LOADING SPINNER HERE
    $("#spinner").fadeIn();

    // Create a formdata object and add the files
    var form = $("#testForm")[0];
    var data = new FormData(form);
    $("#rilfil").each(files, function(key, value){
        data.append(key, value);
    });

    $.ajax({
        url: 'oldupload.php?files',
        type: 'POST',
        data: data,
        cache: false,
        dataType: 'json',
        processData: false, // Don't process the files
        contentType: false, // Set content type to false as jQuery will tell the server its a query string request
        success: function(data, textStatus, jqXHR)
        {
            if(typeof data.error === 'undefined')
            {
                // Success so call function to process the form
                submitForm(event, data);
            }
            else
            {
                // Handle errors here
                console.log('ERRORS: ' + data.error);
            }
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
            // Handle errors here
            console.log('ERRORS: ' + textStatus);
            // STOP LOADING SPINNER
        }
    });
}
/************************//*
function submitForm(event, data){
  // Create a jQuery object from the form
    $form = $(event.target);

    // Serialize the form data
    var formData = $form.serialize();

    // You should sterilise the file names
    /*$.each(data.files, function(key, value)
    {
        formData = formData + '&filenames[]=' + value;
    });*/
/*
    $.ajax({
        url: 'oldupload.php',
        type: 'POST',
        data: formData,
        cache: false,
        dataType: 'json',
        success: function(data, textStatus, jqXHR)
        {
            if(typeof data.error === 'undefined')
            {
                // Success so call function to process the form
                console.log('SUCCESS: ' + data.success);
            }
            else
            {
                // Handle errors here
                console.log('ERRORS: ' + data.error);
                alert("Error: " + data.error);
            }
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
            // Handle errors here
            console.log('ERRORS: ' + textStatus);
        },
        complete: function()
        {
            // STOP LOADING SPINNER
            $("#spinner").fadeOut();
        }
    });
}
*/