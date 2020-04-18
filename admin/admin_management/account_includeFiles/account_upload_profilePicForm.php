
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" />
<style>

    #profileDisplay {
        display: block;
        height: 180px;
        width: 35%;
        margin: 0px auto;
        border-radius: 50%;
    }

    .img-placeholder {
        width: 31%;
        color: white;
        height: 100%;
        background: black;
        opacity: .7;
        height: 180px;
        border-radius: 50%;
        z-index: 2;
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        display: none;
    }
    .img-placeholder h6 {
        margin-top: 37%;
        color: white;
    }
    .img-div:hover .img-placeholder {
        display: block;
        cursor: pointer;
    }
</style>

<script>
    function triggerClick(e)
    {
        document.querySelector('#profileImage').click();

    }

    function displayImage(e)
    {
        if (e.files[0])
        {
            var reader = new FileReader();
            reader.onload = function(e)
            {
                document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(e.files[0]);
        }
    }
</script>