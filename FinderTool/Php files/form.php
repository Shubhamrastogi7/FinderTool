<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tyre Search</title>
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
    
</head>
<body>
    <h2>Car Tyre Search</h2>
    <form action="process-form.php" method="post">


     <div class="search-box">
        <label for="inputMake">Make:<sup>*</sup></label>
        <input type="text" name="Make" id="inputMake" autocomplete="off" placeholder="Search Make" />
        <div class="result"></div>
     </div>
        <p>
            <label for="inputName">Make:<sup>*</sup></label>
            <input type="text" name="name" id="inputName">
        </p>
        <p>
            <label for="inputEmail">Model:<sup>*</sup></label>
            <input type="text" name="email" id="inputEmail">
        </p>
        <p>
            <label for="inputSubject">Year:</label>
            <input type="year" name="subject" id="inputSubject">
        </p>
        <p>
            <label for="inputComment">Variant:<sup>*</sup></label>
            <input type="text" name="message" id="inputComment" >
        </p>
        <input type="submit" value="Submit">
    </form>
</body>
</html>