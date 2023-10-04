<?php require './core/boot.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="./public/css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.5/datatables.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.5/datatables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.6/datatables.min.css" rel="stylesheet">
</head>
<style>
    .toast {
        position: absolute;
        top: 10px;
        right: 10px;
    }
</style>

<body>


    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">CRUD</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li href="#" id="hello"><small id="emailName"></small></li>

                    </ul>

                </div>
            </div>
        </nav>
    </header>

    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
                <h1>List User</h1>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <div class="buttons text-end" id="button">
                    <button class="btn" style="background-color: #3c8dbc; color: #fff;" data-bs-toggle="modal" data-bs-target="#modalLogin"> login </button>
                    <button class="btn" style="background-color: #3c8dbc; color: #fff;" data-bs-toggle="modal" data-bs-target="#modaladd">
                        Add</button>

                </div>
            </div>

        </div>
    </div>

    <div class="container mt-4" id="showuser">


    </div>


    <!-- modal login -->
    <div id="modalLogin" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="container p-5">
                    <form method="post" id="form-login">
                        <h5 class="text-center">Login</h5>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="">
                        </div>
                        <div class="text-center custom__btn">
                            <button type="submit" class="btn" id="buttonlogin">Login</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
    <!-- end modal login -->
    <!-- modal add -->
    <div id="modaledit" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="container p-5">
                    <h5 class="text-center">Add user</h5>

                    <form method="post" id="form-data-edit">
                        <div class="mb-3">
                            <input type="hidden" id="idedit" name="id">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" name="email" id="emailedit" class="form-control" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="passwordedit" class="form-control" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">role</label>
                            <input type="text" name="role" id="roleedit" class="form-control" placeholder="">
                        </div>
                        <!-- <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" name="image" id="password" class="form-control" placeholder="">
                        </div> -->
                        <div class="text-center custom__btn">
                            <button type="submit" class="btn" id="update">Add</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
    <div id="modaladd" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="container p-5">
                    <h5 class="text-center">Add user</h5>

                    <form method="post" id="form-data">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">role</label>
                            <input type="text" name="role" id="role" class="form-control" placeholder="">
                        </div>
                        <!-- <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" name="image" id="password" class="form-control" placeholder="">
                        </div> -->
                        <div class="text-center custom__btn">
                            <button type="submit" class="btn" id="insert">Add</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
    <div id="modaldelete" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="container p-5">
                    <h5 class="text-center">Delete user</h5>

                    <form method="post" id="form-data-delete">
                        <input type="hidden" name="id" id="iddelete">
                        <p>bạn muốn xóa user
                            <small id="nameUser"></small>?
                        </p>
                        <div class="text-center custom__btn">
                            <button type="submit" class="btn" id="delete">Delete</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
    <!-- end modal add -->

    <div class="toast" id="myToast" data-bs-autohide="true">
        <div class="toast-header">
            <strong class="me-auto"><i class="bi-bell-fill"></i>notification</strong>
            <small>1 sec ago</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
        </div>
        <div class="toast-body">
            <p id="error_message"></p>
        </div>
    </div>

    </div>

</body>
<script>
    $(document).ready(function() {


        showAllUser()

        function showAllUser() {
            $.ajax({
                url: "core/action.php",
                type: "POST",
                data: {
                    action: "view"
                },
                success: function(res) {
                    $('#showuser').html(res)
                    $('table').DataTable({
                        order: [0, 'desc']
                    });
                }
            })
        }

        $('#buttonlogin').click(function(e) {
            if ($('#form-login')[0].checkValidity()) {
                e.preventDefault()
                $.ajax({
                    url: "core/action.php",
                    type: "POST",
                    data: $('#form-login').serialize() + "&action=login",
                    success: function(res) {

                        data = JSON.parse(res)
                        console.log(data);

                        if (data.code === 500) {
                            $('#hello').hide()
                        } else {


                            <?php $name = $_SESSION['user']['email'] ?>
                            $('#emailName').html(`hello, <?php echo $name ?>`)
                            $("#modalLogin").modal('hide')
                        }


                    }
                })
            }
        })
        $('#insert').click(function(e) {
            if ($('#form-data-edit')[0].checkValidity()) {
                e.preventDefault()
                $.ajax({
                    url: "core/action.php",
                    type: "POST",
                    data: $('#form-data').serialize() + "&action=insert",
                    success: function(res) {


                        $('#modaladd').modal('hide')
                        $('#form-data')[0].reset()
                        $('.toast').toast('show');
                        $('#error_message').html(res);
                        showAllUser()
                    }
                })
            }
        })
        $('#update').click(function(e) {
            if ($('#form-data-edit')[0].checkValidity()) {
                e.preventDefault()
                $.ajax({
                    url: "core/action.php",
                    type: "POST",
                    data: $('#form-data-edit').serialize() + "&action=update",
                    success: function(res) {
                        $('#modaledit').modal('hide')
                        $('.toast').toast('show');
                        $('#error_message').html(res);

                        showAllUser()
                    }
                })
            }
        })
        $('#delete').click(function(e) {
            if ($('#form-data-delete')[0].checkValidity()) {
                e.preventDefault()
                $.ajax({
                    url: "core/action.php",
                    type: "POST",
                    data: $('#form-data-delete').serialize() + "&action=delete",
                    success: function(res) {
                        $('#modaldelete').modal('hide')
                        $('.toast').toast('show');
                        $('#error_message').html(res);

                        showAllUser()


                    }
                })
            }
        })

        $("body").on('click', '.edit', function(e) {
            e.preventDefault();
            edit_id = $(this).attr('id');


            $.ajax({
                url: "core/action.php",
                type: 'POST',
                data: {
                    dataID: edit_id
                },
                success: function(res) {
                    data = JSON.parse(res)
                    $('#idedit').val(data.id)
                    $('#emailedit').val(data.email)
                    $('#passwordedit').val(data.password)
                    $('#roleedit').val(data.password)
                }
            })
        })
        $("body").on('click', '.delete', function(e) {
            e.preventDefault();
            delete_id = $(this).attr('id');


            $.ajax({
                url: "core/action.php",
                type: 'POST',
                data: {
                    dataID: delete_id
                },
                success: function(res) {
                    data = JSON.parse(res)
                    $('#iddelete').val(data.id)
                    $('#nameUser').html(data.email)

                }
            })
        })



    });
</script>



</html>