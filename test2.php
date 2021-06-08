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

$sql = "SELECT * FROM categories group BY category ASC";
    $handle = $con->prepare($sql);
    $handle->execute();
    // $getAllProducts = $handle->fetchAll(PDO::FETCH_ASSOC);
    $getAllCategories = $handle->fetchAll(PDO::FETCH_ASSOC);
$pageTitle = "Categories";
$metaDesc = "Categories List";
?>

<div class="row">
<!-- get each category -->
        <?php
        foreach($getAllCategories as $category)
        {
        ?>
        <div class="col-md-3  mt-2">
                <div class="card">
                  
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="category.php?product=<?php echo $category['id'] ?>">
                                <?php echo $category['category']; ?>
                            </a>
                        </h5>
                        
                        <p class="card-t">
                        <?php
                            $sql2="SELECT * FROM products p,categories c WHERE p.category_id = c.id ";
                         
                         //echo $category['id'];
                          
        
                            $handle1 = $con->prepare($sql2);
                            $handle1->execute();
                            $getAllProducts = $handle1->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($getAllProducts as $product)
                                    {
                                        ?>  
                                    
                                  
                                   
                                    <li> <?php echo $product['product']; ?>
                                        <?php echo $product['price']; ?>
                                        </li>

                                       
                                        
                                    <?php
                                    }
                                    ?>             
                         </p>
      
                    </div>
                </div>
            </div>
        <?php 
        }
        ?>



<?php
       
        ?>
            <div class="col-md-3  mt-2">
                <div class="card">
                  
                    <div class="card-body">
                        <h5 class="card-title">
                            <a>
                            Uncategorized
                            </a>
                        </h5>
                        
                        <p class="card-t">
                        <?php

                            $sql3="SELECT * FROM products WHERE category_id is Null"  ?>       
                              <?php 
                            
                            $handle2 = $con->prepare($sql3);
                            $handle2->execute();
                            // $getAllProducts = $handle->fetchAll(PDO::FETCH_ASSOC);
                            $getAllProducts1 = $handle2->fetchAll(PDO::FETCH_ASSOC);
       
                                    foreach($getAllProducts1 as $product)
                                    {
                                        ?>  
                                    
                                    <li>   <?php echo $product['product']; ?> </li>
                                        
                                    <?php
                                    }
                                    ?>             
                         </p>
      
                    </div>
                </div>
            </div>
        <?php 
        
        ?>
    </div>
    <!-- apply footer -->
<?php include('layout/footer.php');?>