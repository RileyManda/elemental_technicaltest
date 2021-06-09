<?php 
    session_start();
    require_once('db.php');    
    require_once('helper.php');  
    
    if(isset($_GET['product']) && !empty($_GET['product']) && is_numeric($_GET['product']))
    {


$sql = "SELECT p.* from products p
INNER JOIN categories cid ON cid.category = p.category_id WHERE cid.category =:category AND p.id =:category_id";

// SELECT cid.* from products p
// INNER JOIN categories cid ON cid.id = p.category_id;

        $handle = $con->prepare($sql);
        $params = [
                ':category'=>1,
                ':category_id' =>$_GET['id']
            ];
        $handle->execute($params);
        if($handle->rowCount() == 1 )
        {
            $getProductData = $handle->fetch(PDO::FETCH_ASSOC);
            $imgUrl = PRODUCT_IMG_URL.str_replace(' ','-',strtolower($getProductData ['name']));
        }
        else
        {
            $error = '404! No record found';
        }

    }
    else
    {
        $error = '404! No record found';
    }

	$pageTitle = 'Product';
	$metaDesc = 'Product Categories';
	
	
include('layout/header.php');
include('layout/footer.php');
