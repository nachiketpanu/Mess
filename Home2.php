<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="bootstrap-5.3.2-dist\css\bootstrap.min.css">
    <style>
        .custom-carousel {
            width: 70%;
            height: 50%;
            margin-top: 10%;
            margin-left: 10%;
            align: center;
        }
        .custom-carousel img {
            width: 100%; /* Ensure images fill the container */
            height: 100%; /* Maintain the specified height */
            object-fit: cover; /* Adjust image scaling */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-light bg-primary fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="Admin.php"><img src="logo.PNG" alt="" width="50" height="50" class="d-inline-block align-text-top"></a>
            <a href="login.php" class="btn ms-auto p-2 bd-highlight">Login</a>
            <?php if(!empty ($_SESSION)){?>
            <a class="btn btn-danger text-light" href="logout.php">Logout</a>
            <?php
                }
            ?>
        </div>
    </nav>
    <div id="carouselExampleIndicators" class="carousel slide custom-carousel" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="Slides/1.png" class="d-block w-100" alt="">
            </div>
            <div class="carousel-item">
            <img src="Slides/2.png" class="d-block w-100" alt="">
            </div>
            <div class="carousel-item">
            <img src="Slides/1.png" class="d-block w-100" alt="">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <script src="bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
    <!-- <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="..." class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>
    </div> -->
    <!-------------------------------------------------1 service--------------------------------------------------->
    <div class="card border-light mt-3 mb-3" style="min-width: 20%">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="Include_services/1.jpg" class="img-fluid rounded-start"  style="min-width: 20%">
            </div>
            <div class="col-md-8">
                <div class=" card-body">
                    <h2 class="card-title">EAISY ACCOUNTING SYSTEM FOR SCHOOL</h2>
                    <!-- <img src="Include_services/1.jpg"  class="d-flex rounded float-end w-60 h-60" alt=""> -->
                </div>
            </div>
        </div>
    </div>
    <!-------------------------------------------------2 service--------------------------------------------------->
    <div class="card border-light mb-3" style="min-width: 20%">
        <div class="row g-0">
            <div class="col-md-8">
                <div class=" card-body">
                    <h2 class="card-title">EAISY ATTENDENCE AND STUDENT RECORD SYSTEM</h2>
                    <!-- <img src="Include_services/2.jpg"  class="rounded float-start w-40 h-40" alt=""> -->
                </div>
            </div>
            <div class="col-md-4">
                <img src="Include_services/2.jpg" class="img-fluid rounded-end" alt="...">
            </div>
        </div>
    </div>
    <!-------------------------------------------------3 service--------------------------------------------------->
    <div class="card border-light mb-3"  style="min-width: 20%">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="Include_services/3.png" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class=" card-body">
                    <h2 class="card-title">LIVE INFO OF STUDENT (IN & OUT TIME) IN SCHOOL TO THEIRS PARENTS VIA SMS</h2>
                    <!-- <img src="Include_services/3.png"  class="rounded float-end w-20 h-20" alt=""> -->
                </div>
            </div>
        </div>
    </div>
    <!-------------------------------------------------4 service--------------------------------------------------->
    <div class="card border-light mb-3" style="min-width: 20%">
        <div class="row g-0">
            <div class="col-md-8">
                <div class=" card-body">
                    <h2 class="card-title">LIVE LOCATION FOR BUS STUDENTS PERENTS WITH (IN & OUT TIME)</h2>
                    <!-- <img src="Include_services/4.jpg"  class="rounded float-start w-40 h-40" alt=""> -->
                </div>
            </div>
            <div class="col-md-4">
                <img src="Include_services/4.jpg" class="img-fluid rounded-end" alt="...">
            </div>
        </div>
    </div>
    <!-------------------------------------------------5 service--------------------------------------------------->
    <div class="card border-light mb-3"  style="min-width: 20%">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="Include_services/5.png" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class=" card-body">
                    <h2 class="card-title">CREATING UNIVERSAL IDENTITY ONLINE FOR EVERY STUDENTS ON M.E.S.S. CLOUD</h2>
                    <!-- <img src="Include_services/5.png"  class="rounded float-end w-20 h-20" alt=""> -->
                </div>
            </div>
        </div>
    </div>
    <!-------------------------------------------------6 service--------------------------------------------------->
    <div class="card border-light mb-3" style="min-width: 20%">
        <div class="row g-0">
            <div class="col-md-8">
                <div class=" card-body">
                    <h2 class="card-title">SCHOOL IDENTITY CARDS WILL BE PROVIDED BY US WITH PRINTED PHOTO AND DETAILS.</h2>
                    <!-- <img src="Include_services/6.jpg"  class="rounded float-start w-40 h-40" alt=""> -->
                </div>
            </div>
            <div class="col-md-4">
                <img src="Include_services/6.jpg" class="img-fluid rounded-end" alt="...">
            </div>
        </div>
    </div>
    <!-------------------------------------------------7 service--------------------------------------------------->
    <div class="card border-light mb-3"  style="min-width: 20%">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="Include_services/7.jpg" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class=" card-body">
                    <h2 class="card-title">MARKETING CAMPAIGN FOR SCHOOL</h2>
                    <!-- <img src="Include_services/7.jpg"  class="rounded float-end w-20 h-20" alt=""> -->
                </div>
            </div>
        </div>
    </div>
    <!-------------------------------------------------8 service--------------------------------------------------->
    <div class="card border-light mb-3" style="min-width: 20%">
        <div class="row g-0">
            <div class="col-md-8">
                <div class=" card-body">
                    <h2 class="card-title">GUIDENCE IN ADDMISSION PROCESS FOR STUDENTS</h2>
                    <!-- <img src="Include_services/8.jpg"  class="rounded float-start w-40 h-40" alt=""> -->
                </div>
            </div>
            <div class="col-md-4">
                <img src="Include_services/8.jpg" class="img-fluid rounded-end" alt="...">
            </div>
        </div>
    </div>
    <!-------------------------------------------------9 service--------------------------------------------------->
    <div class="card border-light mb-3"  style="min-width: 20%">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="Include_services/9.jpg" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class=" card-body">
                    <h2 class="card-title">10 LECTURES/YEAR FROM HIGH TECT TUITORS FOR 9/10 STUDENTS</h2>
                    <!-- <img src="Include_services/9.jpg"  class="rounded float-end w-20 h-20" alt=""> -->
                </div>
            </div>
        </div>
    </div>
    <!-------------------------------------------------10 service--------------------------------------------------->
    <div class="card border-light mb-3" style="min-width: 20%">
        <div class="row g-0">
            <div class="col-md-8">
                <div class=" card-body">
                    <h2 class="card-title">GUIDING STUDENTS FOR A PERTICULAR SPORTS TOWARDS HIGEST LEVEL POSIBLE</h2>
                    <!-- <img src="Include_services/10.jpg"  class="rounded float-start w-40 h-40" alt=""> -->
                </div>
            </div>
            <div class="col-md-4">
                <img src="Include_services/10.jpg" class="img-fluid rounded-end" alt="...">
            </div>
        </div>
    </div>
    <!-------------------------------------------------11 service--------------------------------------------------->
    <div class="card border-light mb-3" style="min-width: 20%">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="Include_services/11.jpg" class="img-fluid rounded-end" alt="...">
            </div>
            <div class="col-md-8">
                <div class=" card-body">
                    <h2 class="card-title">SELF DEFENCE ACTIVITIES FOR ALL STUDENTS AND STAFFS</h2>
                    <!-- <img src="Include_services/11.jpg"  class="rounded float-start w-40 h-40" alt=""> -->
                </div>
            </div>
        </div>
    </div>
    <!-------------------------------------------------12 service--------------------------------------------------->
    <div class="card border-light mb-3" style="min-width: 20%">
        <div class="row g-0">
            <div class="col-md-8">
                <div class=" card-body">
                    <h2 class="card-title">PRODUCTIVE LEARNING TECHNIQUES SESSION FOR STUDENTS EVERY 3MONTH</h2>
                    <!-- <img src="Include_services/12.jpg"  class="rounded float-start w-40 h-40" alt=""> -->
                </div>
            </div>
            <div class="col-md-4">
                <img src="Include_services/12.jpg" class="img-fluid rounded-end" alt="...">
            </div>
        </div>
    </div>
    <!-------------------------------------------------13 service--------------------------------------------------->
    <div class="card border-light mb-3" style="min-width: 20%">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="Include_services/13.jpg" class="img-fluid rounded-end" alt="...">
            </div>
            <div class="col-md-8">
                <div class=" card-body">
                    <h2 class="card-title">CAREER GUIDENCE ALONG WITH BUDGET</h2>
                    <!-- <img src="Include_services/13.jpg"  class="rounded float-start w-40 h-40" alt=""> -->
                </div>
            </div>
        </div>
    </div>
    <!-------------------------------------------------14 service--------------------------------------------------->
    <div class="card border-light mb-3" style="min-width: 20%">
        <div class="row g-0">
            <div class="col-md-8">
                <div class=" card-body">
                    <h2 class="card-title">FOREIGN STUDIES GUIDENCE</h2>
                    <!-- <img src="Include_services/14.jpg"  class="rounded float-start w-40 h-40" alt=""> -->
                </div>
            </div>
            <div class="col-md-4">
                <img src="Include_services/14.jpg" class="img-fluid rounded-end" alt="...">
            </div>
        </div>
    </div>    
</body>
</html>