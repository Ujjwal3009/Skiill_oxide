<style>
.carousel {
    height: 500px;
}

.carousel .carousel-item>img {
    width: 730%;
    margin-left: -275%;
    margin-top: -110%;



}

.text {
    margin-top: -350px;
    position: absolute;

}

.btns {
    position: absolute;

    margin-top: -200px;
    margin-left: 340px;
}


@media only screen and (max-width:600px) {

    .text {
        margin-top: -440px;
    }

    .btns {
        margin-left: 100px;
        margin-top: -270px;

    }

    .btn2 {
        margin-top: 10px;

    }

    .btn3 {
        margin-top: 10px;
    }


}

.carousel {
    height: 600px;
}

}
</style>
<!--==========================================--------->
<div class="carousel">
    <a href="#" class="carousel-item"><img src="images/cover-img.jpg" alt=""></a>
    <a href="#" class="carousel-item"><img src="images/cover-img(1).jpg" alt=""></a>
    <a href="#" class="carousel-item"><img src="images/cover-img(2).jpg" alt=""></a>
</div>
<div class="row">
    <div class="col s12 l12 m12 text center">
        <h3 style="color:#0f2f48;"><b>Advance Medicine <br /> Trusted Care</b></h3>
    </div>
</div>
<div class="row btns ">
    <div class="col s12 l4 m12 btn1">
        <div class="btn " style=" background-color:#59b103;width:auto;height:auto;"><i class="fa fa-handshake-o fa-xs"
                aria-hidden="true"></i> Sponsors/<br>CROs </div>
    </div>
    <div class="col s12 l4 m12 btn2">
        <div class="btn " style=" background-color:#59b103;width:auto;height:auto;"><i class="fa fa-stethoscope  left"
                aria-hidden="true"></i><span style="margin-left:-10px;">Patients/Study Patients </span></div>
    </div>
    <div class="col s12 l4 m12 btn3">
        <div class="btn" style=" background-color:#59b103;width:auto;height:auto;"><i class="fa fa-user-md  left"
                aria-hidden="true"></i><a href="physcians.php"><span>Physicians/<br>MDs/DOs</span></a></div>
    </div>
</div>
<!--============================================================---------->







<!--=============================================-->
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script>
(function($) {
    $(function() {
        $('.carousel').carousel({

        }); //autoplY
        setInterval(function() {
            $('.carousel').carousel('next');

        }, 3000);
    });
})(jQuery)
</script>