<?php
// Connect to the database
$db = new mysqli('localhost', 'root', '', 'employees');

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Get all employees
$sql = "SELECT * FROM employees";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $year_of_joining = $row['year_of_joining'];
        if($year_of_joining < (date("Y") - 5) && $row['active'] == 1) {
            echo '<div style="background-color:green;">';
        }
        echo "Id: " . $row["id"]. " Name: " . $row["first_name"]. " " . $row["last_name"]. " Year of Joining: " . $row["year_of_joining"]. "<br>";
        if($year_of_joining < (date("Y") - 5) && $row['active'] == 1) {
            echo '</div>';
        }
    }
} else {
    echo "0 results";
}
$db->close();

?>