<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div id="newsletter" class="w3-modal">
    <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
        <div class="w3-container w3-white w3-center">
            <i onclick="document.getElementById('newsletter').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
            <h2 class="w3-wide">LOG OUT</h2>
            <p>Are you sure you want to logout from the system?</p>
            <br/>
            <button type="button" class="w3-button w3-padding-large w3-red
            w3-margin-bottom" onclick="document.getElementById('newsletter').style.display='none'">
                <a href="../../login/login.php" style="color: white;">Yes</a>
            </button>
            <button type="button" class="w3-button w3-padding-large w3-red w3-margin-bottom"
                    onclick="document.getElementById('newsletter').style.display='none'">No</button>
        </div>
    </div>
</div>