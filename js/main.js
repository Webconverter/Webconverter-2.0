function tim(){
  var dateandtime = Date();
  // alert(dateandtime);
  console.log(dateandtime);
  return dateandtime;
}
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