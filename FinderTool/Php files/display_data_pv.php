<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "TyreSize");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}



if ( isset( $_POST['submit'] ) ) {
    // retrieve the form data by using the element's name attributes value as key $firstname = $_GET['firstname']; $lastname = $_GET['lastname']; // display the results echo '<h3>Form GET Method</h3>'; echo 'Your name is ' . $lastname . ' ' . $firstname; exit;
    
    
    $make= $_REQUEST('Make');
    $model= $_REQUEST('Model');
    $year= $_REQUEST('Year');
    $variant= $_REQUEST('Variant');

    }


    $sql = "SELECT  position,size FROM car_models_pv where model = $model and year = $year and variant= $variant";



if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>id</th>";
                echo "<th>first_name</th>";
                echo "<th>last_name</th>";
                echo "<th>email</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['first_name'] . "</td>";
                echo "<td>" . $row['last_name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>