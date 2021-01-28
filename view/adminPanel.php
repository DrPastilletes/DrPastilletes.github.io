<?php
include "../functions.php";
include "../connect.php";
include "../model/usuari.php";
include "../view/header.php";
?>
<?php
?>
<div class="container-fluid">
    <div>
        <?php
        if (isset($_SESSION["error"])) {
            ?>
            <div class="alert alert-success">
                <?php echo $_SESSION["error"]; ?>
            </div>
            <?php
            unset($_SESSION["error"]);
        }
        ?>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
            <div class="col-md-10">
                <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="th-sm">Nom</th>
                        <th class="th-sm">Cognom/s</th>
                        <th class="th-sm">DNI</th>
                        <th class="th-sm">Correu</th>
                        <th class="th-sm">Rol</th>
                        <th class="th-sm">Modificar</th>
                        <th class="th-sm">Borrar</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $con = new connect();
                    $con->openConnection();
                    foreach ($con->getUsers() as $user):?>
                        <tr>
                            <td><?php echo $user["Nom"]; ?></td>
                            <td><?php echo $user["Cognoms"]; ?></td>
                            <td><?php echo $user["DNI"]; ?></td>
                            <td><?php echo $user["Correu"]; ?></td>
                            <td><?php if($user["activation"]==0){
                                    echo "Usuari no activat";
                                }elseif ($user["activation"]==1){
                                    echo "Usuari";
                                }elseif ($user["activation"]==2){
                                    echo "Admin";
                                }elseif ($user["activation"]==3){
                                    echo "Super Admin";
                                } ?></td>
                            <td><?php if($user["activation"]==0){?>
                                    <form action="../controller/activarUser.php" method="post">
                                        <button type="submit" class="btn btn-success" name="activar" value="<?php echo $user["id"] ?>"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"/>
                                            </svg></button>
                                    </form>
                                <?php
                                }elseif ($user["activation"]==1){?>
                                    <form action="../controller/ferAdmin.php" method="post">
                                        <button type="submit" class="btn btn-success" name="ferAdmin" value="<?php echo $user["id"] ?>"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"/>
                                            </svg></button>
                                    </form>
                                    <?php
                                }elseif ($user["activation"]==2){?>
                                    <form action="../controller/ferUser.php" method="post">
                                        <button type="submit" class="btn btn-danger" name="ferUser" value="<?php echo $user["id"] ?>"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z"/>
                                            </svg></button>
                                    </form>
                                    <?php
                                }elseif ($user["activation"]==3){?>
                                    -
                                    <?php
                                }?></td>
                            <td>
                                <?php if($user["activation"]==3){?>
                                        -
                                    <?php
                                }else { ?>
                                    <form action="../controller/adminController.php" method="post">
                                        <button type="submit" class="btn btn-danger" name="borrar" value="<?php echo $user["id"] ?>"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                                            </svg></button>
                                    </form>
                                <?php } ?>

                            </td>
                        </tr>
                        <?php
                        $con->closeConnection();
                    endforeach;
                    ?>
                    </tbody>
                </table>
            </div>
        <div class="col-md-1"></div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<script type="text/javascript"
        src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.22/af-2.3.5/b-1.6.5/b-colvis-1.6.5/b-flash-1.6.5/b-html5-1.6.5/b-print-1.6.5/cr-1.5.2/fc-3.3.1/fh-3.1.7/kt-2.5.3/r-2.2.6/rg-1.1.2/rr-1.2.7/sc-2.0.3/sb-1.0.0/sp-1.2.1/sl-1.3.1/datatables.min.js"></script>
<script>$(document).ready(function () {
        var taula = $('#dtBasicExample').DataTable({
            "bStateSave": true,
            "scrollX": true,
            "autoWidth": true,
            "shrinkToFit": true,
            "fnStateSave": function (oSettings, oData) {
                localStorage.setItem('DataTables', JSON.stringify(oData));
            },
            "fnStateLoad": function (oSettings) {
                return JSON.parse(localStorage.getItem('DataTables'));
            }
        });
    });</script>
<?php include "footer.php"; ?>

