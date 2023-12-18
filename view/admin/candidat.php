<?php
$Candidat="active";
ob_start();
?>
<table class="agent table align-middle bg-white">
    <thead class="bg-light">
        <tr>
            <th>Name</th>
            <th>Title</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody id='candidatTable'>
        <?php
        $indic=0;
        foreach($collections['listUsers'] as $users){
        ?>
        <tr class="freelancer">
            <td>
                <div class="d-flex align-items-center">
                    <img src="https://mdbootstrap.com/img/new/avatars/8.jpg" alt=""
                        style="width: 45px; height: 45px" class="rounded-circle" />
                    <div class="ms-3">
                        <p class="fw-bold mb-1 f_name"><?=$users['username'] ?></p>
                    </div>
                </div>
            </td>
            <td>
                <p class="fw-normal mb-1 f_title"><?=$users['email'] ?> </p>
                
            </td>
            <td class="f_position"><?php echo ($users['roleuserID']==1)? "admin":"user"; ?> </td>
            <td>
              <!-- <a href="../Controller/controller.php?deletUser=<?=$users['userID']?>"> -->
                <img onclick="supremeConfirm(<?=$users['userID']?>)" class="delet_user" src="assets/img/user-x.svg" alt="">
              <!-- </a> -->
                <img class="ms-2 edit" data-bs-toggle="modal" data-bs-target="#edit<?=$indic?>" src="assets/img/edit.svg" alt="">
            </td>
            <div class="modal fade" id="edit<?=$indic?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog  modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form  method='POST' action="index.php?route=candidat">
                                <div class="row mb-4">
                                    <div class="">
                                        <label class="form-label" >First name</label>
                                        <input type="text" name='name' value='<?=$users['username'] ?>' class="form-control first_name" >
                                    </div>
                                </div>
                            
                                <div class="mb-4">
                                    <label class="form-label" >Email</label>
                                    <input type="text" name='email' value='<?=$users['email']?>' class="form-control email" >
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" >Role User</label>
                                    <select name="roleuserID" class="form-control email" id="">
                                        <?php
                                        foreach($collections['RoleUsers'] as $RoleUser){
                                        ?>
                                        <option value="<?=$RoleUser['roleuserID']?>" <?php echo ($RoleUser['roleuserID']==$users['roleuserID'])?"selected":""; ?>><?=$RoleUser['name']?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <input type="hidden" name="id_user" value='<?=$users['userID']?>'>
                                <div class="d-flex w-100 justify-content-center">
                                    <button type="submit" name="submit" value='updateUser' class="btn btn-success  mb-4 me-4">Save Edit</button>
                                    <button type='button' class="btn btn-danger mb-4 me-4" data-bs-dismiss="modal">Annuler</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <script>
              function supremeConfirm(id_user){
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
                    let url = "index.php?deletCondidat="+id_user+"&route=deletCondidat";
                    xml.open("GET", url, true);
                    xml.send();
                  }
                });
              }
            </script>
        </tr>
        <?php
        $indic++;
        }
        ?>
    </tbody>
</table>
<?php
$content=ob_get_clean();
include 'header.php';
?>