<!DOCTYPE html>
<html>
  <head>
    <title>PV Tyre Search</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
  </head>
  <body>
    <br />
    <div class="container">
      <h3 align="center">PV car tyre search</h3>
      <br />
      <div class="panel panel-default">
        <div class="panel-heading">know your tyre</div>
        <div class="panel-body">
          <div class="form-group">
            <label>Make</label>
            <select name="Make" id="Make" class="form-control input-lg" data-live-search="true" title="Select Make">

            </select>
          </div>
          <div class="form-group">
            <label>Model</label>
            <select name="Model" id="Model" class="form-control input-lg" data-live-search="true" title="Select Model">

            </select>
          </div>
          
          <div class="form-group">
            <label>Year</label>
            <select name="Year" id="Year" class="form-control input-lg" data-live-search="true" title="Select Year">

            </select>
          </div>
          
          <div class="form-group">
            <label>Variant</label>
            <select name="Variant" id="Variant" class="form-control input-lg" data-live-search="true" title="Select Variant">

            </select>
          </div>
          </div>
          </div>

        </div>
      </div>
    </div>
  </body>
</html>

<script>
$(document).ready(function(){

  $('#Make').selectpicker();

  $('#Model').selectpicker();

  load_data('make_data');

  function load_data(type, Make_id = '')
  {
    $.ajax({
      url:"new_backend.php",
      method:"POST",
      data:{type:type, Make_id:Make_id},
      dataType:"json",
      success:function(data)
      {
        var html = '';
        for(var count = 0; count < data.length; count++)
        {
          html += '<option value="'+data[count].id+'">'+data[count].name+'</option>';
        }
        if(type == 'make_data')
        {
          $('#Make').html(html);
          $('#Make').selectpicker('refresh');
        }
        else
        {
          $('#Model').html(html);
          $('#Model').selectpicker('refresh');
        }
      }
    })
  }

  $(document).on('change', '#Make', function(){
    var Make_id = $('#Make').val();
    load_data('#Model', Make_id);
  });
  
});
</script>