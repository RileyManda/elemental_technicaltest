<?php
/**
 * QUESTION 1
 *
 * Create a form with a single textarea that will sort words or phrases alphabetically separated by commas.
 * Validate that the field is not empty.
 * Clean up the string to remove any extra spaces and unnecessary commas
 * The result should be shown below the form.
 *
 * Please make sure your code runs as effectively as it can.
 *
 * The end result should look like the following:
 * apples, cars, tables and chairs, tea and coffee, zebras
 */
?>
<?php
// variables
$to_sort = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $to_sort = validate_input($_POST["to_sort"]);
}

function validate_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data = explode(',', $_POST['to_sort']);
	sort($data);
	echo implode(',', $data);  
  return $data;
}

?>



<!DOCTYPE html>
<html>
<head>
	<title>Test1</title>
</head>
<body>
	<h1>Sort List</h1>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<input type="hidden" name="action" value="sort" />
		<label for="to_sort">Please enter the words/phrases to be sorted separated by commas:</label><br/>
		<textarea name="to_sort" id="to_sort" type="text" style="width: 400px; height: 150px;" ></textarea><br/>
		<input type="submit" value="Sort" name="submit" />
	</form>

	<?php
echo "<h2>Your Phrases:</h2>";
print_r( $to_sort , TRUE);
echo "<br>";
?>
</body>
</html>