<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <!-- <base href=".user/"> -->
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="user/images/favicon.png">
    <!-- Page Title  -->
    <title>Home | DashLite Admin Template</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="user/assets/css/dashlite.css?ver=3.1.2">
    <link id="skin-default" rel="stylesheet" href="user/assets/css/theme.css?ver=3.1.2">
</head>

<body class="nk-body bg-white npc-landing ">
    <div class="nk-app-root">
        <div class="nk-main ">
            <header class="header has-header-main-s1 bg-lighter" id="home">
                <div class="header-main header-main-s1 is-sticky is-transparent">
                    <div class="container header-container">
                        <div class="header-wrap">
                            <div class="header-logo">
                                <a href="html/index.html" class="logo-link">
                                    <img class="logo-light logo-img" src="user/images/logo.png" srcset="user/images/logo2x.png 2x" alt="logo">
                                    <img class="logo-dark logo-img" src="user/images/logo-dark.png" srcset="user/images/logo-dark2x.png 2x" alt="logo-dark">
                                </a>
                            </div>
                            <div class="header-toggle">
                                <button class="menu-toggler" data-target="mainNav">
                                    <em class="menu-on icon ni ni-menu"></em>
                                    <em class="menu-off icon ni ni-cross"></em>
                                </button>
                            </div><!-- .header-nav-toggle -->
                            <nav class="header-menu" data-content="mainNav">
                                <ul class="menu-list ms-lg-auto">
                                    <li class="menu-item"><a href="index.php?route=home" class="menu-link nav-link">Home</a></li>
                                    <li class="menu-item"><a href="#service" class="menu-link nav-link">Service</a></li>
                                    <li class="menu-item"><a href="#feature" class="menu-link nav-link">Features</a></li>
                                    <li class="menu-item"><a href="#pricing" class="menu-link nav-link">Pricing</a></li>
                                    <li class="menu-item"><a href="#reviews" class="menu-link nav-link">Reviews</a></li>
                                    <li class="menu-item"><a href="#" class="menu-link nav-link">All Offre</a></li>
                                </ul>
                                <ul class="menu-btns">
                                    <?php
                                    if(isset($_SESSION['idUser'])){
                                        ?>
                                    <li>
                                        <form method='post' action="index.php">
                                        <!-- <a href="index.php?route=log_out" >logout</a> -->
                                            <button class="btn btn-primary btn-lg" type='submit' name='submit' value='log_out'>logout</button>
                                        </form>
                                    </li>
                                        <?php
                                    }else{
                                        ?>
                                    <li>
                                        <a href="index.php?route=login" class="btn btn-primary btn-lg">Login</a>
                                    </li>
                                        <?php
                                    }
                                    ?>
                                    
                                </ul>
                            </nav><!-- .nk-nav-menu -->
                        </div><!-- .header-warp-->
                    </div><!-- .container-->
                </div><!-- .header-main-->
                
            </header>

            <section class='senter'>
                <h2>Find Your Dream Job</h2>
                <form class="form-inline">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3">Search by Title Job</span>
                        </div>
                        <input type="text" class="form-control" id='title' onkeyup="search('title')" aria-describedby="basic-addon3">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3">Search by Location Job</span>
                        </div>
                        <input type="text" class="form-control"  id='location' onkeyup="search('location')" aria-describedby="basic-addon3">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3">Search by Entreprise Job</span>
                        </div>
                        <input type="text" class="form-control" id='entreprise' onkeyup="search('entreprise')" aria-describedby="basic-addon3">
                    </div>
                    <!-- <button type="submit" class="btn btn-primary mb-2">Search</button> -->
                </form>
                <style>
                    .senter{
                        text-align:center;
                        margin:50px;
                    }
                    .form-inline {
                        display: flex;
                        gap: 20px;
                        margin:0 100px;
                        margin-top:50px;
                    }
                </style>
            </section>
            <main id='jobs'>
<!-- ------------------------------------------------------------------------------------------- -->
            <?php
            foreach($listjob as $job):
            ?>
            <section class="section section-feature pb-0" id="feature">
                <div class="container">
                    <div class="row align-items-center justify-content-lg-between g-gs">
                        <div class="col-lg-5">
                            <div class="img-block img-block-s1 left">
                                <img style='width: 80%' src="assets/uploads/<?=$job['imageURL']?>" alt="img">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="text-block me-xl-5">
                                <h2 class="title"><?=$job["title"]?></h2>
                                <div class="review review-s3">
                                    <div class="review-content">
                                        <div class="review-rating rating rating-sm">
                                            <ul class="rating-stars">
                                                <li><em class="icon ni ni-star-fill"></em></li>
                                                <li><em class="icon ni ni-star-fill"></em></li>
                                                <li><em class="icon ni ni-star-fill"></em></li>
                                                <li><em class="icon ni ni-star-fill"></em></li>
                                                <li><em class="icon ni ni-star-fill"></em></li>
                                            </ul>
                                        </div>
                                        <div class="review-text">
                                            <p><?=$job["description"]?> </p>
                                            <h6 class="review-name text-dark"><img src="assets/img/office-building.png" style='width:20px;margin-right:10px' alt=""><?=$job["entreprise"]?></h6>
                                            <h6 class="review-name text-dark"><img src="assets/img/location.png" style='width:20px;margin-right:10px' alt=""><?=$job["location"]?></h6>
                                        </div>
                                    </div>
                                </div><!-- .review -->
                                <ul class="btns-inline">
                                <li class=>
                                    <?php
                                    if($job["approve"]==1){
                                        echo "<span style='color:red'>Already aprouved</span>";
                                        
                                    }else{
                                        if(isset($_SESSION['idUser'])){
                                    ?>
                                        <form>
                                            <button type='button' name='applyOffre'  onclick="addOffer(<?=$job['jobID']?>)" class="btn btn-lg btn-primary">Apply Offre</button>   
                                        </form>   
                                    <?php
                                        }else{
                                    ?>       
                                        <a href="index.php?action=login" class="btn btn-lg btn-primary"><span>Apply Offre</span></a>
                                        <!-- <a href="index.php?action=login" class="btn btn-success">Add Offer</a> -->
                                    <?php 
                                        }
                                    }
                                    ?>
                                    </li>
                                    <!-- <li><a href="#" class="btn btn-lg btn-primary"><span>Apply Offre</span></a></li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php endforeach ?>
            </main>
<!-- ------------------------------------------------------------------------------------------- -->
            
            <footer class="footer bg-lighter" id="footer">
                <div class="container">
                    <div class="row g-3 align-items-center justify-content-md-between py-4 py-md-5">
                        <div class="col-md-3">
                            <div class="footer-logo">
                                <a href="html/index.html" class="logo-link">
                                    <img class="logo-light logo-img" src="user/images/logo.png" srcset="user/images/logo2x.png 2x" alt="logo">
                                    <img class="logo-dark logo-img" src="user/images/logo-dark.png" srcset="user/images/logo-dark2x.png 2x" alt="logo-dark">
                                </a>
                            </div><!-- .footer-logo -->
                        </div><!-- .col -->
                        <div class="col-md-9 d-flex justify-content-md-end">
                            <ul class="link-inline gx-4">
                                <li><a href="#">How it works</a></li>
                                <li><a href="#">Service</a></li>
                                <li><a href="#">Help</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul><!-- .footer-nav -->
                        </div><!-- .col -->
                    </div>
                    <hr class="hr border-light mb-0 mt-n1">
                    <div class="row g-3 align-items-center justify-content-md-between py-4">
                        <div class="col-md-8">
                            <div class="text-base">Copyright &copy; 2022 Dashlite. Template Made by <a class="text-base fw-bold" href="#">Softnio</a></div>
                        </div><!-- .col -->
                        <div class="col-md-4 d-flex justify-content-md-end">
                            <ul class="social">
                                <li><a href="#"><em class="icon ni ni-twitter"></em></a></li>
                                <li><a href="#"><em class="icon ni ni-facebook-f"></em></a></li>
                                <li><a href="#"><em class="icon ni ni-instagram"></em></a></li>
                                <li><a href="#"><em class="icon ni ni-pinterest"></em></a></li>
                            </ul><!-- .footer-icon -->
                        </div><!-- .col -->
                    </div><!-- .row -->
                </div><!-- .container -->
            </footer>
        </div>
    </div>
    <script>
        function addOffer(idOffer){
            var xml = new XMLHttpRequest();
            xml.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if(xml.responseText=="ok"){
                        Swal.fire({
                            position: "top-end",
                            icon: "success",
                            title: "You have Apply this Offer with Succes",
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }else{
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Errore ! You have Already Apply this Offer",
                        });
                        
                    }
                    console.log(xml.responseText);
                }
            };
            let url = "index.php?route=userApplyOffre&idOffre="+idOffer;
            xml.open("GET", url, true);
            xml.send();
        }
        function search(typeSearch){
            // console.log(typeSearch);
            let input = document.getElementById(typeSearch);
            let url = "index.php?value="+input.value+"&type="+typeSearch+"&route=searchJob";
            let xml = new XMLHttpRequest();
            xml.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("jobs").innerHTML=xml.responseText;
                    
                }
            };
            xml.open("GET", url, true);
            xml.send();
        }
    </script> 
    <script src="user/assets/js/bundle.js?ver=3.1.2"></script>
    <script src="user/assets/js/scripts.js?ver=3.1.2"></script>
</body>
<style>
*::-webkit-scrollbar {
  display: none;
}
.header {
    min-height: 12vh !important;
}
</style>
</html>