<?php
/**
 * QUESTION 3
 *
 * For each month that had sales show a list of customers ordered by who spent the most to who spent least.
 * If the totals are the same then sort by customer.
 * If a customer has multiple products then order those products alphabetical.
 * Months with no sales should not show up.
 * Show the name of the customer, what products they bought and the total they spent.
 * Only show orders with the "Payment received" and "Dispatched" status.
 * If there are no results, then it should just say "There are no results available."
 *
 * Please make sure your code runs as effectively as it can.
 *
 * See test3.html for desired result.
 */
?>
<?php
//$con holds the connection
require_once('db.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Test3</title>
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="data.js"></script>
</head>
<body>
<h1>Top Customers per Month</h1>

<table class="table table-striped">
    <tr  class="bg-info">
        <th id="name">Name</th>
        <th>Birthday</th>
    </tr>

    <tbody id="customers">
        
    </tbody>
</table>


</script>
           <script type="text/javascript">
            console.log(customers);
        </script>

</script>
        <script src=
        "https://code.jquery.com/jquery-3.3.1.min.js">
        </script>
        <script src=
        "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js">
        </script>
        <script src=
        "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">
        </script>
        <script src=
        "https://unpkg.com/bootstrap-table@1.16.0/dist/bootstrap-table.min.js">
        </script>
           <script type="text/javascript">
            console.log(customers);
        </script>
</body>
</html>