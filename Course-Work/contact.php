<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Page</title>
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
      section {
        padding: 60px 0;
      }

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
  <body class="bf-light">
    <!-- navbar -->
    <nav class="navbar navbar-expand-md bg-dark pt-5 pb-5 navbar-fixed-top">
      <div class="container-xxl">
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
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link text-light" href="about.html"
                >About The Store</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="contact.php"
                >Get in Touch</a
              >
            </li>
            <li class="nav-item ms-2 d-none d-md-inline">
              <a class="nav-link text-light" href="addProduct.php">Add Book</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- contact form -->
    <!-- form-control, form-label, form-select, input-group, input-group-text -->
    <section id="contact">
      <?php
      if(isset($_GET['alert'])){
        if($_GET['alert'] == 'model_email'){
          echo<<<alert
          <div class="container alert alert-danger alert-dismissible text-center" role="alert">
            <strong>Email Is Empty Or Type It Correctly In The Register For Updatess!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          alert;
        }
        if($_GET['alert'] == 'model_failed'){
          echo<<<alert
          <div class="container alert alert-danger alert-dismissible text-center" role="alert">
            <strong>Registration Failed!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          alert;
        }
      }
        else if(isset($_GET['success'])){
        if($_GET['success'] == 'model_success'){
          echo<<<alert
          <div class="container alert alert-success alert-dismissible text-center" role="alert">
            <strong>Registered Successfully!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          alert;
        }
      }
      ?>
      <div class="container-lg">
        <div class="text-center">
          <h2>Get in Touch</h2>
          <p class="lead">
            Questions to ask? Fill out the form to contact me directly...
          </p>
        </div>
        <div class="row justify-content-center my-5">
          <div class="col-lg-6">
            <form method="post" action="crud.php" enctype="multipart/form-data">
              <label for="email" class="form-label">Email address:</label>
              <div class="input-group mb-4">
                <span class="input-group-text">
                  <i class="bi bi-envelope-fill text-secondary"></i>
                </span>
                <input
                  type="text"
                  name="email"
                  class="form-control"
                  placeholder="e.g. mario@example.com"
                />
                <!-- tooltip -->
                <span class="input-group-text">
                  <span
                    class="tt"
                    data-bs-placement="bottom"
                    title="Enter an email address we can reply to."
                  >
                    <i class="bi bi-question-circle text-muted"></i>
                  </span>
                </span>
              </div>
              <label for="name" class="form-label">Name:</label>
              <div class="mb-4 input-group">
                <span class="input-group-text">
                  <i class="bi bi-person-fill text-secondary"></i>
                </span>
                <input
                  type="text"
                  name="name"
                  class="form-control"
                  placeholder="e.g. Mario"
                />
                <!-- tooltip -->
                <span class="input-group-text">
                  <span
                    class="tt"
                    data-bs-placement="bottom"
                    title="Pretty self explanatory really..."
                  >
                    <i class="bi bi-question-circle text-muted"></i>
                  </span>
                </span>
              </div>
              <label for="subject" class="form-label"
                >What is your question about?</label
              >
              <div class="mb-4 input-group">
                <span class="input-group-text">
                  <i class="bi bi-chat-right-dots-fill text-secondary"></i>
                </span>
                <select class="form-select" name="subject">
                  <option value="pricing" selected>Pricing query</option>
                  <option value="content">Content query</option>
                  <option value="other">Other query</option>
                </select>
              </div>
              <div class="mb-4 mt-5 form-floating">
                <textarea
                  class="form-control"
                  name="query"
                  style="height: 140px"
                  placeholder="query"
                ></textarea>
                <label for="query">Your query...</label>
              </div>
              <?php
              if(isset($_GET['alert'])){
                if($_GET['alert'] == 'form_email'){
                  echo<<<alert
                  <div class="container alert alert-danger alert-dismissible text-center" role="alert">
                    <strong>Email Is Empty Or Type It Correctly!</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  alert;
                }
                if($_GET['alert'] == 'form_numbers'){
                  echo<<<alert
                  <div class="container alert alert-danger alert-dismissible text-center" role="alert">
                    <strong>Name Cannot Have Numbers!</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  alert;
                }
                if($_GET['alert'] == 'form_name'){
                  echo<<<alert
                  <div class="container alert alert-danger alert-dismissible text-center" role="alert">
                    <strong>Name Is Empty!</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  alert;
                }
                if($_GET['alert'] == 'form_query'){
                  echo<<<alert
                  <div class="container alert alert-danger alert-dismissible text-center" role="alert">
                    <strong>Your Query Is Empty!</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  alert;
                }
                if($_GET['alert'] == 'form_failed'){
                  echo<<<alert
                  <div class="container alert alert-danger alert-dismissible text-center" role="alert">
                    <strong>Submit Failed!Sever Down!</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  alert;
                }
              }
              else if(isset($_GET['success'])){
                if($_GET['success'] == 'form_success'){
                  echo<<<alert
                  <div class="container alert alert-success alert-dismissible text-center" role="alert">
                    <strong>Submitted Successfully!</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  alert;
                }
              }
              ?>
              <div class="mb-4 text-center">
                <button type="submit" class="btn btn-success" name="form_submit">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- get updates / modal trigger -->
    <section style="background-color: rgb(240, 239, 239)">
      <div class="container">
        <div class="text-center">
          <h2>Stay in The Loop</h2>
          <p class="lead">Get the latest updates as they happen...</p>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-8 text-center">
            <p class="text-muted my-4">
              Stay in the Know: Dive into the Latest Reads! Explore our
              ever-growing collection of new arrivals, fresh releases, and
              trending titles. Find your next literary adventure and be the
              first to uncover the stories that are making waves in the world of
              literature. Check back often for the freshest updates and
              recommendations that will keep your reading list exciting and up
              to date.
            </p>
            <button
              class="btn btn-success"
              data-bs-toggle="modal"
              data-bs-target="#reg-modal"
            >
              Register for Updates
            </button>
          </div>
        </div>
      </div>
    </section>

    <!-- modal itself -->
    <form method="post" action="crud.php" enctype="multipart/form-data">
      <div
        class="modal fade"
        id="reg-modal"
        tabindex="-1"
        aria-labelledby="modal-title"
        aria-hidden="true"
      >
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modal-title">Get the Latest Updates</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body">
              <p>
                Stay in the Know: Dive into the Latest Reads! Explore our
                ever-growing collection of new arrivals, fresh releases, and
                trending titles. Find your next literary adventure and be the
                first to uncover the stories that are making waves in the world of
                literature. Check back often for the freshest updates and
                recommendations that will keep your reading list exciting and up
                to date.
              </p>
                <label for="modal-email" class="form-label"
                  >Your email address:</label
                >
                <input
                  type="text"
                  class="form-control"
                  name="email"
                  placeholder="e.g. mario@example.com"
                />
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success" name="model_submit">Submit</button>
              </div>
          </div>
        </div>
      </div>
    </form>

    <!-- Footer -->
    <footer class="bg-dark text-light py-4">
      <div class="container me-5" style="padding: 20px 0">
        <div class="row">
          <div class="col-md-6">
            <h4>Contact Us</h4>
            <p>
              Feel free to get in touch with us for any questions or inquiries:
            </p>
            <ul class="list-unstyled">
              <li>
                <i class="bi bi-envelope-fill"></i> Email:
                contact@themiyastore.com
              </li>
              <li><i class="bi bi-telephone-fill"></i> Phone: 0112 633 824</li>
              <li><i class="bi bi-whatsapp"></i> WhatsApp: +94 77 163 3824</li>
            </ul>
          </div>
          <div class="col-md-6">
            <h4>Follow Us</h4>
            <p>
              Stay connected with us on <br />
              social media:
            </p>
            <ul class="list-unstyled">
              <li>
                <i class="bi bi-facebook"></i>
                <a
                  href="https://web.facebook.com/login/?_rdc=1&_rdr"
                  class="text-light"
                  target="_blank"
                  >Facebook</a
                >
              </li>
              <li>
                <i class="bi bi-instagram"></i>
                <a
                  href="https://www.instagram.com/accounts/login/"
                  class="text-light"
                  target="_blank"
                  >Instagram</a
                >
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

    <!-- js tooltips popper code -->
    <script>
      const tooltips = document.querySelectorAll(".tt");
      tooltips.forEach((t) => {
        new bootstrap.Tooltip(t);
      });
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
