<!DOCTYPE html>
<html>
<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

</style>
<style type="text/css">
    body{
        font-family: Arail, sans-serif;
    }
    /* Formatting search box */
    .search-box{
        width: 300px;
        position: relative;
        display: inline-block;
        font-size: 14px;
    }
    .search-box input[type="text"]{
        height: 32px;
        padding: 5px 10px;
        border: 1px solid #CCCCCC;
        font-size: 14px;
    }
    .result{
        position: absolute;        
        z-index: 999;
        top: 100%;
        left: 0;
    }
    .search-box input[type="text"], .result{
        width: 100%;
        box-sizing: border-box;
    }
    /* Formatting result items */
    .result p{
        margin: 0;
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
    }
    .result p:hover{
        background: #f2f2f2;
    }
</style>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("search_backend.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>
<body>

<h3>SUV Car Tyre Search</h3>

<div>
  <form action="/action_page.php" method="POST">
        
 <div> 
  <div class="search-box">
        <label for="inputMake">Make:<sup>*</sup></label>
        <input type="text" name="Make" id="inputMake" autocomplete="off" placeholder="Search Make" />
        <div class="result"></div>
     </div>
</div>
<div> 
  <div class="search-box">
        <label for="inputModel">Model:<sup>*</sup></label>
        <input type="text" name="Model" id="inputModel" autocomplete="off" placeholder="Search Model" />
        <div class="result"></div>
     </div>
</div>
<div> 
  <div class="search-box">
        <label for="inputYear">year:<sup>*</sup></label>
        <input type="text" name="Year" id="inputYear" autocomplete="off" placeholder="Search Year" />
        <div class="result"></div>
     </div>
</div>
<div> 
  <div class="search-box">
        <label for="inputVariant">Variant:<sup>*</sup></label>
        <input type="text" name="Variant" id="inputVariant" autocomplete="off" placeholder="Search Variant" />
        <div class="result"></div>
     </div>
</div>
</br>
</br>
    
    <input type="submit" value="Submit">
  </form>
</div>

</body>
</html>

