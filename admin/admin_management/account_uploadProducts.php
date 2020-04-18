<?php include('session_start.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>KPS | Password Reset</title>
    <link href="../ad_asset/css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    <link href="../ad_asset/css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

    <!--connect to all of head connections-->
    <?php include ("../adminInclude/admin_head.php"); ?>
    <!--connect to log out pop up dialog-->
    <?php include ("../ad_asset/log_out_popup.php"); ?>

    <script>
        $(document).ready(function(){
            $("button").click(function(){
                $("#box").load("uploadModal.php");
            });
        });
    </script>

</head>
<body class="sb-nav-fixed">
<!--Start Navigation-->
<!--connect to account navigation top bar-->
<?php include('account_includeFiles/account_nav_topbar.php');?>

<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <!--connect to account navigation side bar-->
            <?php include('account_includeFiles/account_nav_sidebar.php');?>

            <!--show user login Type-->
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:
                    <?php echo $_SESSION["user_type"];?>
                </div>
            </div>
            <!-- End show user Type-->
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <a href="account_manage_profile.php">
                    <h4 class="mt-4" style="color: black;">
                        Account Management
                    </h4>
                </a> <br>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active"><a href="account_view_products.php" style="color: black;"><i class="fas fa-long-arrow-alt-left"></i> Back to Product List</a></li>
                </ol>

                <body class="bg-primary">
                <div id="layoutAuthentication">
                    <div id="layoutAuthentication_content">
                        <main>

                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-7">
                                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Upload Product</h3></div>
                                            <div class="card-body">

                                                <form action="account_processFiles/account_process_upload_image.php" method="post" class="login100-form validate-form p-b-33 p-t-5" enctype="multipart/form-data" >

                                                    <div class="form-row">
                                                        <div class="col-md-6">
                                                            <div class="form-group"><label class="small mb-1" for="price">Product Number (ID)</label>
                                                                <input class="form-control py-4" name="price" id="price" type="text"
                                                                       value=" "/>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group"><label class="small mb-1" for="price">Price</label>
                                                                <input class="form-control py-4" name="price" id="price" type="text"
                                                                       value=" "/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-6">
                                                            <div class="form-group"><label class="small mb-1" for="itemType">Product Type </label>
                                                                <select class="form-control"  id="itemType" name="itemType" style="height: 46px;" required>
                                                                    <option value=" " selected>... Choose product type ...</option>
                                                                    <option value="Dress">Dress</option>>
                                                                    <option value="Top">Top</option>
                                                                    <option value="Set">Set</option>
                                                                    <option value="Sarong">Sarong</option>
                                                                    <option value="Accessories">Accessories</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group"><label class="small mb-1" for="itemType">Product Description </label>
                                                                <select class="form-control"  id="itemType" name="itemType" style="height: 46px;" required>
                                                                    <option value=" " selected>... Choose product type ...</option>
                                                                    <option value="Long_hang_shirt">Long hang shirt</option>
                                                                    <option value="Short_hand_shirt">Short hand shirt</option>
                                                                    <option value="Bag">Bag</option>
                                                                    <option value="Shoe">Shoe</option>
                                                                    <option value="Sarong">Sarong</option>
                                                                    <option value="Accessories">Accessories</option>
                                                                    <option value="Dress">Dress</option>>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-6">
                                                            <div class="form-group"><label class="small mb-1" for="stock">Stock Number</label>
                                                                <input class="form-control py-4" name="stock" id="stock" type="text" placeholder="Enter old Password"
                                                                       value=""/>
<!--                                                                       value="--><?php //if (isset($_POST['stock'])) echo $_POST['stock'];?><!--"-->

                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="new_date">Updating Date: </label>
                                                                <input class="form-control py-4" name="new_date" id="new_date" readonly>
                                                                <script>
                                                                    const d = new Date();
                                                                    document.getElementById("new_date").value = `${d.getFullYear()}-${d.getMonth()+1}-${d.getDate()} ${d.getHours()}:${d.getMinutes()}:${d.getSeconds()}`;
                                                                </script>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="upload_image" >Product Picture</label>
                                                                <input class="form-control" type="file" id="upload_image"  name="upload_image" style="height: 46px;" >
                                                                <br>
                                                                <div id="uploaded_image"></div>
<!--                                                                --><?php //include ('upload_asset/bootstrap.php');?>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="description" >Product Details</label>
                                                                <textarea class="form-control" type="text" id="description"  name="description" > </textarea>
                                                            </div>
                                                        </div>
                                                    </div>

<!--                                                    <div class="form-row">-->
<!--                                                        <div class="col-md-6">-->
<!--                                                            <div id="uploaded_image">-->
<!--                                                            </div>-->
<!--                                                        </div>-->
<!--                                                    </div>-->
                                                    <center>
                                                        <button class="form-group mt-4 mb-0 btn btn-primary btn-block" type="submit" name="save" >
                                                            upload
                                                        </button>
                                                    </center>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </main>
                    </div>
                </div>
                <!--                <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>-->
                <!--                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>-->
                <!--                <script src="../ad_asset/js/scripts.js"></script>-->
                </body>
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid">
                <!--connect to footer file-->
                <?php include('account_includeFiles/account_footer.php');?>
            </div>
        </footer>
    </div>
</div>
<!--Connect to the Script-->
<?php include ('../adminInclude/account_nav_bar_script.xsl');?>

<script src="upload_asset/jquery.min.js"></script>
<script src="upload_asset/bootstrap.min.js"></script>
<script src="upload_asset/croppie.js"></script>

<link rel="stylesheet" href="upload_asset/croppie.css" />


<!--<script>-->
<!-- const d = new Date();-->
<!--document.getElementById("updateDate").innerHTML = `${d.getFullYear()}-${d.getMonth()+1}-${d.getDate()} ${d.getHours()}:${d.getMinutes()}:${d.getSeconds()}`;-->
<!-- // var elem =  document.getElementById('new_date').value = `${d.getUTCFullYear()}-${d.getUTCMonth() + 1}-${d.getUTCDate()}`-->
<!--</script>-->
</body>
</html>

<!--Pop up page for crop the picture before upload-->

<div id="uploadimageModal" class="modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <label><center><h4 style="position: relative; top:5px; "><b>Upload & Crop Image</b></h4></center></label>
            <hr>
            <div class="modal-body" >
                <div class="row">
                    <div class="col-md-8 text-center">
                        <div id="image_demo" style="width:450px; margin-top:40px"></div>
                    </div>
                    <div class="col-md-4" style="padding-top:30px;">
                        <br />
                        <br />
                        <br/>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success crop_image">Crop & Upload Image</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){

        $image_crop = $('#image_demo').croppie({
            enableExif: true,
            viewport: {
                width:220,
                height:330,
                type:'square' //circle
            },
            boundary:{
                width:300,
                height:330,
            }
        });

        $('#upload_image').on('change', function(){
            var reader = new FileReader();
            reader.onload = function (event) {
                $image_crop.croppie('bind', {
                    url: event.target.result
                }).then(function(){
                    console.log('jQuery bind complete');
                });
            }
            reader.readAsDataURL(this.files[0]);
            $('#uploadimageModal').modal('show');
        });

        $('.crop_image').click(function(event){
            $image_crop.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function(response){
                $.ajax({
                    url:"upload.php",
                    type: "POST",
                    data:{"image": response},
                    success:function(data)
                    {
                        $('#uploadimageModal').modal('hide');
                        $('#uploaded_image').html(data);
                    }
                });
            })
        });

    });
</script>