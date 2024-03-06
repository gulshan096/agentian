<?php
    $dir_name = "sjain/slider_image/";
    $images = glob($dir_name."*.*");

if(isset($_POST["submit"])){
    $getImage=  basename($_FILES["Image"]["name"]);
    if($getImage==""){
        echo "Please choose";
    }
    else
    {
        $target="sjain/slider_image/";
        $ran=time();
        $target=$target.$ran.$getImage;
        $imageName=$ran.$getImage;
        
        if($_FILES["Image"]["type"]=="image/jpg"||$_FILES["Image"]["type"]=="image/jpeg"||$_FILES["Image"]["type"]=="image/png"){
            move_uploaded_file($_FILES["Image"]["tmp_name"], $target);
            if(move_uploaded_file){
                echo '<div class="jumbotron text-center container">File is uploaded</div>';
                echo '<script>location.href ="https://khaleejtimesevents.sjain.io/ktnetzero/wp-sliderClass.php"</script>';
            }
            else
            {
                echo "Please choose Image";
            }
        }
        
    }
}
?>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="https://getbootstrap.com/docs/3.3/examples/carousel/carousel.css" rel="stylesheet">
        <script src = "/scripts/jquery.min.js"></script>
        <script src = "/bootstrap/js/bootstrap.min.js"></script>
    </head>
    <style>
        img {
        max-inline-size: 100%;
        block-size: auto;
        aspect-ratio: 2/1;
        object-fit: cover;
        }
    </style>
    <body>
        <div class="jumbotron text-center">
            <div class="container">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <?php
                    $i=0;
                    if(count($images)){
                        foreach ($images as $image) {
                            if($i==0){
                                echo '<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>';
                                $i++;
                            }
                            else
                            {
                                echo '<li data-target="#carousel-example-generic" data-slide-to="0"></li>';
                                $i++;
                            }
                        }
                    }
                    ?>
                </ol>
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <?php
                    $a=0;
                    if(count($images)){
                        foreach ($images as $image) {
                            if($a==0){
                                echo '<div class="item active">
                                        <img src="'.$image.'" class = "img-responsive" alt="..." ><br />
                                      </div>';
                                $a++;
                            }
                            else
                            {
                                echo '<div class="item">
                                        <img src="'.$image.'" class = "img-responsive" alt="..." ><br />
                                </div>';
                                $a++;
                            }
                        }
                    }
                    ?>
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                </div>
                <div class="container" style="width:20%;">
                        <button type="button" onclick="back()">Go Back</button>
                </div>
            </div>
        </div>
        <script>
            function back(){ 
                location.href ="https://khaleejtimesevents.sjain.io/ktnetzero/wp-slider.php";
            } 
        </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script>
    $('.carousel').carousel()
</script>
</body>
</html>