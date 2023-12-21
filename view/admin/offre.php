<?php
if(isset($_SESSION['roleUser'])){
    if($_SESSION['roleUser']==2) header('location: index.php?route=home');
ob_start();
$offre="active";
?>
<button data-bs-toggle="modal" data-bs-target="#addOffer" class="btn btn-success  mb-4 me-4"> Add Offer</button>                
<table class="agent table align-middle bg-white">
    <thead class="bg-light">
        <tr>
            <th>Image</th>
            <th>Title</th>
            <!-- <th>description</th> -->
            <th>entreprise</th>
            <th>location</th>
            <th>Is Active</th>
            <th>Is Approve</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $indic=0;
        foreach($collection['listJobs'] as $job){
        ?>
        <tr class="freelancer">
            <td>
                <div class="d-flex align-items-center">
                    <img src="assets/uploads/<?=$job['imageURL']?>" alt=""
                        style="width: 45px; height: 45px" class="rounded-circle" />
                </div>
            </td>
            <td>
                <div class="">
                    <p class="fw-bold mb-1 f_name"><?=$job['title'] ?></p>
                </div>
            </td>
            <!-- <td>
                <p class="fw-normal mb-1 f_title"><?=$job['description'] ?> </p>
            </td> -->
            <td>
                <p class="fw-normal mb-1 f_title"><?=$job['entreprise'] ?> </p>
            </td>
            <td>
                <p class="fw-normal mb-1 f_title"><?=$job['location'] ?> </p>
            </td>
            <td class="f_position"><?php echo ($job['IsActive']==1)? "Active":"In Active"; ?> </td>
            <td class="f_position"><?php echo ($job['approve']==1)? "Aprouve":"In Aprouve"; ?> </td>
            <td>
                <img src="assets/img/user-x.svg" onclick="supremeConfirm(<?=$job['jobID']?>)" alt="">
                <img class="ms-2 edit" data-bs-toggle="modal" data-bs-target="#edit<?=$indic?>" src="assets/img/edit.svg" alt="">
                <img class="ms-2 edit" data-bs-toggle="modal" data-bs-target="#Descsri<?=$indic?>" src="assets/img/edit.svg" alt="">
            </td>
            <div class="modal fade" id="Descsri<?=$indic?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog  modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method='POST' action="index.php?route=offre">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">TinyMCE Editor</h5>
                                        
                                            <!-- TinyMCE Editor -->
                                            <textarea class="tinymce-editor" name='descriptDetail'>
                                            
                                            </textarea>

                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="id_Jobs" value='<?=$job['jobID']?>'>
                                <div class="d-flex w-100 justify-content-center">
                                    <input type="submit" name='submit' value='updateOffreDescriptio' class="btn btn-success  mb-4 me-4">
                                    <button type='button' class="btn btn-danger btn-block mb-4 " data-bs-dismiss="modal">Annuler</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="edit<?=$indic?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog  modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="forms" method='POST' action="index.php?route=offre">
                                <div class="row mb-4">
                                    <div class="">
                                        <input placeholder="Title" value='<?=$job['title']?>' type="text" name='title'   class="form-control first_name" >
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="">
                                        <input placeholder="Description" value='<?=$job['description']?>' type="text" name='description'  class="form-control first_name" >
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="">
                                        <input placeholder="Entreprise" value='<?=$job['entreprise']?>' type="text" name='entreprise'  class="form-control first_name" >
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="">
                                        <input placeholder="Location" value='<?=$job['location']?>' type="text" name='location'  class="form-control first_name" >
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" >Active / In Active</label>
                                    <select name="IsActive" class="form-control email" id="">
                                        <?php
                                        
                                        for($i=0;$i<count($collection['tempActiveTable']);$i++){
                                        ?>
                                        <option value="<?=$i?>" <?php echo ($i==$job['IsActive'])? 'selected':'' ?>><?=$collection['tempActiveTable'][$i]?></option>
                                        <?php 
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" >Approve / In Approve</label>
                                    <select name="approve" class="form-control email" id="">
                                        <?php
                                        for($i=0;$i<count($collection['tempAprouveTable']);$i++){
                                        ?>
                                        <option value="<?=$i?>" <?php echo ($i==$job['approve'])? 'selected':'' ?>><?=$collection['tempAprouveTable'][$i]?></option>
                                        <?php 
                                        }
                                        ?>
                                    </select>
                                </div>
                                <input type="hidden" name="id_Jobs" value='<?=$job['jobID']?>'>
                                <div class="d-flex w-100 justify-content-center">
                                    <input type="submit" name='submit' value='updateOffre' value='Save Edit' class="btn btn-success  mb-4 me-4">
                                    <button type='button' class="btn btn-danger btn-block mb-4 " data-bs-dismiss="modal">Annuler</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </tr>
        <?php
        $indic++;
        }
        ?>
    </tbody>
</table>
<div class="modal fade" id="addOffer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="forms" method='POST' enctype="multipart/form-data" action="index.php?route=offre">
                    <div class="row mb-4">
                        <div class="">
                            <input  type="file" name='photo'   class="form-control first_name" >
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="">
                            <input placeholder="Title" type="text" name='title'   class="form-control first_name" >
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="">
                            <input placeholder="Description" type="text" name='description'  class="form-control first_name" >
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="">
                            <input placeholder="Entreprise" type="text" name='entreprise'  class="form-control first_name" >
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="">
                            <input placeholder="Location" type="text" name='location'  class="form-control first_name" >
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label" >Role User</label>
                        <select name="IsActive" class="form-control email" id="">
                            <option value="0">non Active</option>
                            <option value="1" selected>Active</option>
                        
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="form-label" >Role User</label>
                        <select name="approve" class="form-control email" id="">
                            <option value="0" selected>Non Approve</option>
                            <option value="1">Aprouve</option>
                        </select>
                    </div>
                    <div class="d-flex w-100 justify-content-center">
                        <button type="submit" name='submit' value='addOfferCrud' value='' class="btn btn-success  mb-4 me-4">Add</button>
                        <button class="btn btn-danger btn-block mb-4 " data-bs-dismiss="modal">Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>    
<script>
    function supremeConfirm(idOffre){
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
        var xml = new XMLHttpRequest();
        xml.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            window.location.reload();
            }
        }
        let url = "index.php?deletOfre="+idOffre+"&route=deletOfre";
        xml.open("GET", url, true);
        xml.send();
        }
    });
    }
</script>   
<?php
$content=ob_get_clean();
include 'header.php';
}else{
    header('location: index.php?route=home');
}
?>
