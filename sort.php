<?php
// variables
$to_sort = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $to_sort = validate_input($_POST["to_sort"]);
}

function validate_input($data) {

    
	if(empty($data)) {
		echo "Form cannot be empty!";
	} else{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		$data = explode(',', $_POST['to_sort']);
		  sort($data);
		  echo implode(',', $data);  
		return $data;
	}




 
}

?>
