<?php
if(isset($_SESSION['roleUser']) && $_SESSION['roleUser']==1){
    header('location: index.php?route=home');
}
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