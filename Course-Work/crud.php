<?php

require("connection.php");

function image_upload($img) {
    // Check if the file is empty
    if (empty($img) || $img['size'] == 0) {
        header("location: addProduct.php?alert=img_empty");
        exit;
    }

    // Check image size (less than 2MB)
    if ($img['size'] > 1 * 1024 * 1024) {
        header("location: addProduct.php?alert=img_size");
        exit;
    }

    $tmp_loc = $img['tmp_name'];
    $fileMimeType = mime_content_type($tmp_loc);

    $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/svg+xml'];

    if (!in_array($fileMimeType, $allowedMimeTypes)) {
        header("location: addProduct.php?alert=img_type");
        exit;
    }

    $new_name = random_int(11111, 99999) . $img['name'];
    $new_loc = UPLOAD_SRC . $new_name;

    if (!move_uploaded_file($tmp_loc, $new_loc)) {
        header("location: addProduct.php?alert=img_upload");
        exit;
    } else {
        return $new_name;
    }
}

function image_remove($img){
    if(!unlink(UPLOAD_SRC.$img)){
        header("location: addProduct.php?alert=img_rem_fail");
        exit;
    }
    else{
        echo "deleted";
    }
}

    if(isset($_POST['addproduct'])){
        $name = $_POST['name'];
        $price = $_POST['price'];
        $desc = $_POST['desc'];
       // $image = $_POST['image'];
        if (empty($name) || empty($price) ||empty($desc)) {
            header("location: addProduct.php?alert=add_empty_fields");
        }
        // else if (preg_match('/[0-9]/', $name)){
        //     header("location: addProduct.php?alert=add_numbers");
        // }
        else if (preg_match('/[^0-9.]/', $price)){
            header("location: addProduct.php?alert=add_letters");
        }
        else{
            foreach($_POST as $key => $value){
            $_POST[$key] = mysqli_real_escape_string($con, $value);
            }
            $name = $_POST["name"];
            $price = $_POST["price"];
            $desc = $_POST["desc"];
            $imgpath = image_upload($_FILES['image']);
            $query = "INSERT INTO `tbl_product`(`name`, `price`, `description`, `image`) VALUES ('$name','$price','$desc','$imgpath')";
            if(mysqli_query($con,$query)){
                header("location: addProduct.php?success=added");
            }
            else{
                header("location: addProduct.php?alert=add_failed");
            }
        }
    }

    if(isset($_GET['rem']) && $_GET['rem'] > 0){
        $query="SELECT * FROM tbl_product WHERE id='$_GET[rem]'";
        $result = mysqli_query($con,$query);
        
        if ($result === false) {
            die("Query failed: " . mysqli_error($con));
        }
        else{
            $fetch= mysqli_fetch_assoc($result);
            image_remove($fetch['image']);
            $query = "delete from tbl_product where id = '$_GET[rem]'";
            if(mysqli_query($con,$query)){
                header("location: addProduct.php?success=removed");
            }
            else{
                header("location: addProduct.php?alert=remove_failed");
            }
            // $query = "DELETE * FROM tbl_product WHERE 'id'="
        }
    }

    if(isset($_POST['editproduct'])){
        $name = $_POST['name'];
        $price = $_POST['price'];
        $desc = $_POST['desc'];
       // $image = $_POST['image'];
        if (empty($name) || empty($price) ||empty($desc)) {
            header("location: addProduct.php?alert=edit_empty_fields");
        }
        // else if (preg_match('/[0-9]/', $name)){
        //     header("location: addProduct.php?alert=edit_numbers");
        // }
        else if (preg_match('/[^0-9.]/', $price)){
            header("location: addProduct.php?alert=edit_letters");
        }
        else{
            foreach($_POST as $key => $value){
            $_POST[$key] = mysqli_real_escape_string($con, $value);
            }
            if(file_exists($_FILES['image']['tmp_name']) || is_uploaded_file($_FILES['image']['tmp_name'])){
                $query="SELECT * FROM tbl_product WHERE id='$_POST[editpid]'";
                $result = mysqli_query($con,$query);
                $fetch= mysqli_fetch_assoc($result);

                image_remove($fetch['image']);

                $imgpath = image_upload($_FILES['image']);

                $update = "UPDATE tbl_product SET name='$_POST[name]',price='$_POST[price]',description='$_POST[desc]',image='$imgpath' WHERE id='$_POST[editpid]'";
                }
            else{
                $update = "UPDATE tbl_product SET name='$_POST[name]',price='$_POST[price]',description='$_POST[desc]' WHERE id='$_POST[editpid]'";
            }
            if(mysqli_query($con,$update)){
                header("location: addProduct.php?success=updated");
            }
            else{
                header("location: addProduct.php?alert=update_failed");
            }
        }
    }

    if (isset($_POST['form_submit'])) {
        $email = $_POST['email'];
        $name = $_POST['name'];
        $subject = $_POST['subject'];
        $query = $_POST['query'];

        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("location: contact.php?alert=form_email");
        }

        else if (preg_match('/[0-9]/', $name)){
            header("location: contact.php?alert=form_numbers");
        }

        else if (empty($name)) {
            header("location: contact.php?alert=form_name");
        }

        else if (empty($query)) {
            header("location: contact.php?alert=form_query");
        }

        else{
            foreach($_POST as $key => $value){
            $_POST[$key] = mysqli_real_escape_string($con, $value);
            }
            $query = "INSERT INTO `tbl_questions`(`email`, `name`, `question`, `query`) VALUES ('$email','$name','$subject','$query')";
            if(mysqli_query($con,$query)){
                header("location: contact.php?success=form_success");
            }
            else{
                header("location: addProduct.php?alert=form_failed");
            }
        }
    }

    if (isset($_POST['model_submit'])) {
        $email = $_POST['email'];

        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("location: contact.php?alert=model_email");
        }

        else{
            header("location: contact.php?success=model_success");
            foreach($_POST as $key => $value){
            $_POST[$key] = mysqli_real_escape_string($con, $value);
            }
            $query = "INSERT INTO `tbl_register`(`email`) VALUES ('$email')";
            if(mysqli_query($con,$query)){
                header("location: contact.php?success=model_success");
            }
            else{
                header("location: addProduct.php?alert=model_failed");
            }
        }
    }
?>