<?php
require 'validate.php';
include('layout/header.php');
include('layout/footer.php');
$pageTitle = "Sort Phrases";
$metaDesc = "Sort Phrases";
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



<!DOCTYPE html>
<html>
<head>
	<title>Test1</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="col-md-3  mt-2">
	<h1>Sort List</h1>
	<p>Your Phrases</p>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<input type="hidden" name="action" value="sort" />
		<label for="to_sort">Please enter the words/phrases to be sorted separated by commas:</label><br/>
		<textarea name="to_sort" id="to_sort" type="text" style="width: 400px; height: 150px;"></textarea><br/>
		<?php echo ""?>
  <br><br>
		<input type="submit" value="Sort" name="submit" />
	</form>
	<?php
print_r( $to_sort , TRUE);
echo "<br>";
?>
</div>
	
</body>
</html>