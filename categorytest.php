<?php
/**
 * QUESTION 2
 *
 * Using the data stored in the database
 * show a list of products with their prices
 * grouped by category.
 * The categories should be listed in alphabetical order.
 * The products within those categories should also be listed in alphabetical order.
 * Products with no category will be categorized as "Uncategorized".
 * If there are no results, then it should just say "There are no results available."
 *
 * Please make sure your code runs as effectively as it can.
 *
 * See test2.html for desired result.
 */
session_start();
require_once('db.php');    
require_once('helper.php');  
include('layout/header.php');
include('layout/footer.php');
// $sql = "SELECT * FROM categories GROUP BY category";
// $sql = "SELECT * FROM categories INNER JOIN products WHERE categories = category_id" ;

$sql = "SELECT *
FROM products p
CROSS JOIN categories c WHERE p.category_id = c.id ORDER BY category ASC;
SELECT *
FROM p, c;";
    $handle = $con->prepare($sql);
    $handle->execute();
    $getAllProducts = $handle->fetchAll(PDO::FETCH_ASSOC);

$pageTitle = "Categories";
$metaDesc = "Categories List";
?>

<div class="row">
        <?php
        foreach($getAllProducts as $product)
        {
        ?>
            <div class="col-md-3  mt-2">
                <div class="card">
                  
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="category.php?product=<?php echo $product['id'] ?>">
                                <?php echo $product['category']; ?>
                            </a>
                        </h5>
                        <p class="card-t">
                            <p> Product</p>
                            <?php 
                            
                            echo $product['product'];
                            ?>
                            <p> Price</p>
                             <?php 
                            
                            echo $product['price'];
                            ?>

                            
                            
                           
                        </p>
                    </div>
                </div>
            </div>
        <?php 
        }
        ?>
    </div>
<?php include('layout/footer.php');?>