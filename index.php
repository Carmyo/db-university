<?php
define("DB_SERVERNAME", "localhost:3306");
define("DB_USERNAME","root");
define("DB_PASSWORD", "root");
define("DB_NAME", "db-university");

// Connect
$conn = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn && $conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
    die();
}else{
    echo "ok";
}



$sql = "SELECT `name` FROM `teachers`";
$result = $conn->query($sql);
if ($result && $result->num_row > 0) {
    while($row = $result->fetch_assoc()) {
        ?>
        <p>
        <?php
        echo "Nome ".$row['name'];
        ?>
        </p>
        <?php 
    }
    } elseif ($result) {
        echo "0 results";

    }else {
        echo "query error";
    }    
    $conn->close();

?>

<?php
$sql = "SELECT COUNT(id), `department_id` FROM `degrees` GROUP BY `department_id`";
$result = $conn->query($sql);
if ($result && $result->num_row > 0) {
    while($row = $result->fetch_assoc()) {
        ?>
        <p>
        <?php
        echo "Numero totale corsi ".$row[''];
        ?>
        </p>
        <?php 
    }
    } elseif ($result) {
        echo "0 results";

    }else {
        echo "query error";
    }    
    $conn->close();
?>



