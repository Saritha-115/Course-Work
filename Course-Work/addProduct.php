<?php
  require("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CRUD Page</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"
    />
    <style>
      /* Your existing styles... */
      #back-to-top {
        position: fixed;
        bottom: 20px;
        right: 20px;
        display: none; /* Initially hidden */
        z-index: 999;
      }
    </style>
  </head>
  <body class="bg-light">
    <!-- navbar -->
    <nav
      class="navbar navbar-expand-md bg-dark pt-5 pb-5 mb-3 navbar-fixed-top"
    >
      <div class="container-xxl ">
        <!-- navbar brand / title -->
        <a class="navbar-brand" href="about.html">
          <span class="text-light fw-bold">
            <i class="bi bi-book-half"></i>
            Themiya Store
          </span>
        </a>
        <!-- toggle button for mobile nav -->
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#main-nav" 
          aria-controls="main-nav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- navbar links -->
        <div
          class="collapse navbar-collapse justify-content-end align-center"
          id="main-nav"
        >
          <ul class="navbar-nav text-primary">
            <li class="nav-item">
              <a class="nav-link text-light" href="about.html">About The Store</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="contact.php">Get in Touch</a>
            </li>
            <li class="nav-item ms-2 d-none d-md-inline">
              <button
                type="button"
                class="btn btn-success"
                data-bs-toggle="modal"
                data-bs-target="#addproduct"
              ><i class="bi bi-plus"></i>
                Add Book
              </button>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- alert -->
    <?php
      if(isset($_GET['alert'])){
        if($_GET['alert'] == 'img_upload'){
          echo<<<alert
          <div class="container alert alert-danger alert-dismissible text-center" role="alert">
            <strong>Image Uploading Failed!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          alert;
        }
        if($_GET['alert'] == 'img_type'){
          echo<<<alert
          <div class="container alert alert-danger alert-dismissible text-center" role="alert">
            <strong>Image Type Does Not Match! Try jpg, png, svg!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          alert;
        }
        if($_GET['alert'] == 'img_empty'){
          echo<<<alert
          <div class="container alert alert-danger alert-dismissible text-center" role="alert">
            <strong>Image Is Empty!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          alert;
        }
        if($_GET['alert'] == 'img_size'){
          echo<<<alert
          <div class="container alert alert-danger alert-dismissible text-center" role="alert">
            <strong>Image Size Is Too Big!Try Less Than 1mb</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          alert;
        }
        if($_GET['alert'] == 'img_rem_fail'){
          echo<<<alert
          <div class="container alert alert-danger alert-dismissible text-center" role="alert">
            <strong>Image Removing Failed!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          alert;
        }
        if($_GET['alert'] == 'add_failed'){
          echo<<<alert
          <div class="container alert alert-danger alert-dismissible text-center" role="alert">
            <strong>Book Adding Failed!Server Down!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          alert;
        }
        if($_GET['alert'] == 'remove_failed'){
          echo<<<alert
          <div class="container alert alert-danger alert-dismissible text-center" role="alert">
            <strong>Book Removing Failed!Server Down!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          alert;
        }
        if($_GET['alert'] == 'update_failed'){
          echo<<<alert
          <div class="container alert alert-danger alert-dismissible text-center" role="alert">
            <strong>Book Updating Failed!Server Down!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          alert;
        }
        if($_GET['alert'] == 'edit_empty_fields'){
          echo<<<alert
          <div class="container alert alert-danger alert-dismissible text-center" role="alert">
            <strong>Empty Fields Detected! Cannot Update!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          alert;
        }
        if($_GET['alert'] == 'add_empty_fields'){
          echo<<<alert
          <div class="container alert alert-danger alert-dismissible text-center" role="alert">
            <strong>Empty Fields Detected! Cannot Add!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          alert;
        }
        // if($_GET['alert'] == 'add_numbers'){
        //   echo<<<alert
        //   <div class="container alert alert-danger alert-dismissible text-center" role="alert">
        //     <strong>Cannot Enter Numbers In Name! Cannot Add!</strong>
        //     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        //   </div>
        //   alert;
        // }
        if($_GET['alert'] == 'add_letters'){
          echo<<<alert
          <div class="container alert alert-danger alert-dismissible text-center" role="alert">
            <strong>Cannot Enter Letters In Price! Cannot Add!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          alert;
        }
        // if($_GET['alert'] == 'edit_numbers'){
        //   echo<<<alert
        //   <div class="container alert alert-danger alert-dismissible text-center" role="alert">
        //     <strong>Cannot Enter Numbers In Name! Cannot Update!</strong>
        //     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        //   </div>
        //   alert;
        // }
        if($_GET['alert'] == 'edit_letters'){
          echo<<<alert
          <div class="container alert alert-danger alert-dismissible text-center" role="alert">
            <strong>Cannot Enter Letters In Price! Cannot Update!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          alert;
        }
      }
      else if(isset($_GET['success'])){
        if($_GET['success'] == 'added'){
          echo<<<alert
          <div class="container alert alert-success alert-dismissible text-center" role="alert">
            <strong>Book Added Successfully!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          alert;
        }
        if($_GET['success'] == 'removed'){
          echo<<<alert
          <div class="container alert alert-success alert-dismissible text-center" role="alert">
            <strong>Book Removed Successfully!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          alert;
        }
        if($_GET['success'] == 'updated'){
          echo<<<alert
          <div class="container alert alert-success alert-dismissible text-center" role="alert">
            <strong>Book Updated Successfully!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          alert;
        }
      }
    ?>
    
    <!-- table -->
    <div class="container mt-3 p-0">
      <table class="table table-hover text-center">
        <thead class="bg-dark text-light">
          <tr>
            <th width="10%" scope="col" class="rounded-start">Sr. No.</th>
            <th width="15%" scope="col">Image</th>
            <th width="10%" scope="col">Name</th>
            <th width="10%" scope="col">Price</th>
            <th width="35%" scope="col">Description</th>
            <th width="20%" scope="col" class="rounded-end">Action</th>
          </tr>
        </thead>
        <tbody class="bg-white">
          <?php
            $query = "SELECT * FROM tbl_product";
            $result = mysqli_query($con, $query);
            $i = 1;
            $fetch_src=FETCH_SRC;

            if ($result) { // Check if the query was successful
                // Fetch data from the result set
                while ($row = mysqli_fetch_assoc($result)) {
                    // Process the data here
                    echo<<<product
                  <tr class="align-middle">
                    <th scope="row">$i</th>
                    <td><img src="$fetch_src$row[image]" width = "150px"></td>
                    <td>$row[name]</td>
                    <td>$$row[price]</td>
                    <td>$row[description]</td>
                    <td>
                    <a href="?edit=$row[id]" class="btn btn-warning me-2"><i class="bi bi-pencil-square"></i></a>
                    <button onclick="confirm_rem($row[id])" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                    </td>
                  </tr>
                  product;
                  $i++;
                }

                // Don't forget to free the result set when you're done with it
                mysqli_free_result($result);
            } else {
                // Handle the query error, e.g., by displaying an error message
                echo "Query failed: " . mysqli_error($conn);
            }
          ?>
        </tbody>
      </table>
    </div>

    <!-- Modal edit -->
    <div
      class="modal fade"
      id="editproduct"
      data-bs-backdrop="static"
      data-bs-keyboard="false"
      tabindex="-1"
      aria-labelledby="staticBackdropLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <form action="crud.php" name="myForm" method="post" enctype="multipart/form-data">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" >Edit Product</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body">
              <div class="input-group mb-3">
                <span class="input-group-text">Name</span>
                <input
                  type="text"
                  class="form-control"
                  placeholder="Product Name"
                  name="name"
                  id="editname"
                />
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text" >Price</span>
                <input
                  type="number"
                  class="form-control"
                  placeholder="Product Price"
                  name="price"
                  min="1"
                  id="editprice"
                />
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text">Description</span>
                <textarea class="form-control" name="desc" id="editdesc"></textarea>
              </div>
              <img src="" id="editimg" width="100%" class="mb-3"><bt>
              <div class="input-group mb-3">
                <label class="input-group-text">Image</label>
                <input
                  type="file"
                  class="form-control"
                  name="image"
                  accept=".jpg,.png,.svg"
                />
              </div>
              <input type="hidden" name="editpid" id="editpid">
            </div>
            <div class="modal-footer">
              <button
                type="reset"
                class="btn btn-outline-secondary"
                data-bs-reset="modal"
              >
                Reset
              </button>
              <button type="submit" class="btn btn-success" name="editproduct">
                Edit
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- Modal add -->
    <div
      class="modal fade"
      id="addproduct"
      data-bs-backdrop="static"
      data-bs-keyboard="false"
      tabindex="-1"
      aria-labelledby="staticBackdropLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <form action="crud.php" name="myForm" method="post" enctype="multipart/form-data">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" >Add Product</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body">
              <div class="input-group mb-3">
                <span class="input-group-text">Name</span>
                <input
                  type="text"
                  class="form-control"
                  placeholder="Product Name"
                  name="name"
                />
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text">Price</span>
                <input
                  type="number"
                  class="form-control"
                  placeholder="Product Price"
                  name="price"
                  min="1"
                />
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text">Description</span>
                <textarea class="form-control" name="desc"></textarea>
              </div>
              <div class="input-group mb-3">
                <label class="input-group-text">Image</label>
                <input
                  type="file"
                  class="form-control"
                  name="image"
                  accept=".jpg,.png,.svg"
                />
              </div>
            </div>
            <div class="modal-footer">
              <button
                type="reset"
                class="btn btn-outline-secondary"
                data-bs-reset="modal"
              >
                Reset
              </button>
              <button type="submit" class="btn btn-success" name="addproduct">
                Add
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
    
    <!-- read books -->
    <?php
      if(isset($_GET['edit']) && $_GET['edit'] > 0){
        $query = "select * from tbl_product where id='$_GET[edit]'";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);
        echo"
          <script>
            var editproduct = new bootstrap.Modal(document.getElementById('editproduct'), {
            keyboard: false
            });
            document.querySelector('#editname').value='$row[name]';
            document.querySelector('#editprice').value='$row[price]';
            document.querySelector('#editdesc').value='$row[description]';
            document.querySelector('#editimg').src='$fetch_src$row[image]';
            document.querySelector('#editpid').value='$_GET[edit]';
            editproduct.show();
          </script>
        ";
      }
    ?>

    <script>
      function confirm_rem(id){
        if(confirm("Are you sure, you want to delete this book?")){
          window.location.href="crud.php?rem="+id;
        }
      }
    </script>

    <!-- btn back to top -->
    <button id="back-to-top" class="btn btn-secondary">
      <i class="bi bi-arrow-up"></i>
    </button>

    <!-- back top js code -->
    <script>
      var backToTopButton = document.getElementById("back-to-top");

      window.addEventListener("scroll", function () {
        if (window.pageYOffset > 100) {
          backToTopButton.style.display = "block";
        } else {
          backToTopButton.style.display = "none";
        }
      });

      backToTopButton.addEventListener("click", function () {
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE, and Opera
      });
    </script>

  </body>
</html>
