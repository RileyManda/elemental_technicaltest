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
// $sql = "SELECT p.* from products p";

$sql = "SELECT * FROM categories GROUP BY category";



// SELECT cid.* from products p
// INNER JOIN categories cid ON cid.id = p.category_id;
// SELECT cid.* from products p
// INNER JOIN categories cid ON cid.id = p.category_id;

//filter:-Show Categories
// $sql = "SELECT p.*, c.* from products p , categories c
// WHERE p.category_id = c.id";

    $handle = $con->prepare($sql);
    $handle->execute();
    $getAllProducts = $handle->fetchAll(PDO::FETCH_ASSOC);

$pageTitle = "Products";
$metaDesc = "Product List";
?>

<div class="row">
        <?php
        foreach($getAllProducts as $product)
        {
            // $imgUrl = PRODUCT_IMG_URL.str_replace(' ','-',strtolower($product['product_name']));
        ?>
            <div class="col-md-3  mt-2">
                <div class="card">
                  
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="category.php?product=<?php echo $product['id'] ?>">
                                <?php echo $product['product']; ?>
                            </a>
                        </h5>
                        <strong>$ <?php echo $product['price']?></strong>

                        <p class="card-t">
                            <?php echo substr($product['category_id'],0,50) ?>'...
                        </p>
                        <p class="card-text">
                            <a href="category.php?product=<?php echo $product['id']?>" class="btn btn-primary btn-sm">
                                Show Category
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        <?php 
        }
        ?>
    </div>
<?php include('layout/footer.php');?>