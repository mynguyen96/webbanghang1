<?php session_start(); ob_start();
    require_once("../config/db.class.php");
    include("common_helper.php");
    $db = new Db();


    // Thêm sửa xóa danh mục sản phẩm   
    if(isset($_POST['addCat'])) {
        $alias = strtoseo($_POST['name']);
        $data = array(
            'parent_id'     => $_POST['parent_id'],
            'name'          => $_POST['name'],
            'alias'         => $alias,
            'meta_keywords' => $_POST['meta_keywords'],
            'meta_descriptions' => $_POST['meta_descriptions'],
            'sort'              => $_POST['sort'],
            'created_by_user_id'=> $_POST['userid'],
            'created_date'      => time(),
            'status'            => isset($_POST['status']) ? $_POST['status'] : 0
        );

        $result = $db->insert("db_categories", $data);
        if($result) {
            header("location: ../admin/categorylist.php");
        } else {
            echo "Error: ". mysqli_error($db);
        }
        exit();
    } else if(isset($_POST['upCat'])) {
        $alias = strtoseo($_POST['name']);
        $data = array(
            'parent_id'     => $_POST['parent_id'],
            'name'          => $_POST['name'],
            'alias'         => $alias,
            'meta_keywords' => $_POST['meta_keywords'],
            'meta_descriptions' => $_POST['meta_descriptions'],
            'sort'              => $_POST['sort'],
            'created_by_user_id'=> $_POST['userid'],
            'status'            => isset($_POST['status']) ? $_POST['status'] : 0
        );
        $id = $_POST['idcat'];
        $result = $db->update("db_categories", $data, array('id'=>$id));
        if($result) {
            header("location: ../admin/categorylist.php");
        } else {
            echo "Error: ". mysqli_error($db);
        }
        exit();
    } else if(isset($_GET['catDel'])) {
        $result = $db->delete("db_categories",$_GET['catDel']);
        if($result) {
            header("location: ../admin/categorylist.php");
        } else {
            echo "Error: ". mysqli_error($db);
        }
        exit();
    }
    
    // xao gio hang 
    if(isset($_GET['rmcart'])) {
        $id = (int)$_GET['rmcart'];

        unset($_SESSION['cart'][$id]);
        if(empty($_SESSION['cart'])){
            header("location: ../index.php");
        }else{
            $_SESSION['rm_sucess'] = "Đã xóa sản phẩm ra khỏi giỏ hàng";
            header("location: ../checkout.php");
        }

    }

?>