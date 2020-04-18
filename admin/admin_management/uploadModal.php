
<html>
<head>
    <title>Make Price Range Slider using JQuery with PHP Ajax</title>

    <script src="csjv/jquery.min.js"></script>
    <script src="csjv/bootstrap.min.js"></script>
    <script src="csjv/croppie.js"></script>
    <link rel="stylesheet" href="csjv/bootstrap.min.css" />
    <link rel="stylesheet" href="csjv/croppie.css" />
    <!--    <style>-->
    <!--        p{-->
    <!--            padding: 15px;-->
    <!--            background: #F0E68C;-->
    <!--        }-->
    <!--    </style>-->
    <!--    <script>-->
    <!--        $(document).ready(function(){-->
    <!--            $('.myParagraph').hide();-->
    <!--            // Toggles paragraphs display-->
    <!--            $(".toggle-btn").click(function(){-->
    <!--                $("p").toggle();-->
    <!--            });-->
    <!--        });-->
    <!--    </script>-->
</head>
<body>
<div class="container">
    <br />
    <h3 align="center">Image Crop & Upload using JQuery with PHP Ajax</h3>
    <br />
    <br />
    <div class="panel panel-default">
        <div class="panel-heading" align="center">Select Profile Image</div>
        <div class="panel-body" align="center">
            <input type="file" name="upload_image" id="upload_image" />
            <br />
            <div id="uploaded_image"></div>
        </div>
    </div>
</div>
</body>
</html>


<div id="uploadimageModal" class="modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Upload & Crop Image</h4>
            </div>
            <div class="modal-body" >
                <div class="row">
                    <div class="col-md-8 text-center">
                        <div id="image_demo" style="width:450px; margin-top:40px"></div>
                    </div>
                    <div class="col-md-4" style="padding-top:30px;">
                        <br />
                        <br />
                        <br/>
                        <button class="btn btn-success crop_image">Crop & Upload Image</button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
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
                width:310,
                height:430,
                type:'square' //circle
            },
            boundary:{
                width:350,
                height:430,
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