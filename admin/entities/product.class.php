<?php
	
	require_once('config/db.class.php');

	class Product 
	{
	    public $productId, $productName, $cateId, $price, $quantity, $description, $picture;
	    public function __construct($proName, $catId, $price, $qty, $dest, $pic)
	    {
	        $this->productName = $proName;
	        $this->cateId = $catId;
	        $this->price = $price;
	        $this->quantity = $qty;
	        $this->description = $dest;
	        $this->picture = $pic;
	    }
	    public function insert () 
	    {
	    	//xu ly upload hinh anh
	    	$file_temp = $this->picture['tmp_name'];
	    	$user_file = $this->picture['name'];
	    	$timestamp = date("Y").date("m").date("d").date("h").date("i").date("s");
	    	echo $filepath ="upload/" .$timestamp. $user_file;
	    	if (move_uploaded_file($file_temp, $filepath)==false) {
	    		return false;
	    	}
	    	//end upload file
	    	$db = new Db();
	    	$sql = "INSERT INTO products (productName, catId,price,quantity,description, picture)VALUES ('$this->productName','$this->cateId','$this->price','$this->quantity ','$this->description','$filepath') ";

	    	$result = $db->query_excute($sql);
	    	return $result;
	    } 

	    public static function update ($id,$pro_name,$cate_id,$price,$quantity,$description)
	    {
	
	    	//end upload file
	    	$db = new Db();
	    	$sql = "UPDATE `products` SET `productName` = '$pro_name' ,
	    									`catId` = '$cate_id' ,
	    									`price` = '$price' ,
	    									`quantity` = '$quantity' ,
	    									`description` = '$description' WHERE `products`.`productId` = $id";
	    	$result = $db->query_excute($sql);
	    	return $result;
	    } 

	    public static function list_product()
	    {
	    	$db = new Db();
	    	$sql = "SELECT * FROM products";
	    	$result = $db->select_to_array($sql);
	    	return $result;
	    }
	    //lấy danh sách san pham theo loai san pham
	    public static function list_product_by_cateid($cateId){
	    	$db = new Db();
	    	$sql = "SELECT * FROM products WHERE catId={$cateId}";
	    	$result =$db->select_to_array($sql);
	    	return $result;
	    }
	    //lay ds sp cung loai
	    public static function list_product_relate($cateId,$id){
	    	$db = new Db();
	    	$sql = "SELECT * FROM products WHERE catId={$cateId} AND productId!={$id}";
	    	$result =$db->select_to_array($sql);
	    	return $result;
	    } 
	    public static function get_product($id){
	    	$db = new Db();
	    	$sql = "SELECT * FROM products WHERE ProductId={$id}";
	    	$result =$db->select_to_array($sql);
	    	return $result;
	    } 
	    // Xóa sản phẩm
	    public static function delete_product($id){
	    	$db = new Db();
	    	$sql = "DELETE FROM products WHERE ProductId={$id}";
	    	$result =$db->query_excute($sql);
	    	return 204;
	    }
	}
?>