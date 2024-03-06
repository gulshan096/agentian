<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="https://getbootstrap.com/docs/3.3/examples/carousel/carousel.css" rel="stylesheet">
        <script src = "/scripts/jquery.min.js"></script>
        <script src = "/bootstrap/js/bootstrap.min.js"></script>
    </head>
    <body>
        <form method="post" action="wp-sliderClass.php" enctype="multipart/form-data">
                <div class="jumbotron text-center">
                    <h2>Upload Image</h2>
                </div>
                <div class="container" style="width:20%;">
                        <div class="form-group">
                            <label>Choose Image</label>
                            <input type="file" name="Image" id="Image" value="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Big Text</label>
                            <input type="text" name="Big" id="Big" value="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Small Text</label>
                            <input type="text" name="Small" id="Small" value="" class="form-control">
                        </div>
                        <button id="submit" name="submit" type="Submit" class="btn btn-primary">Upload Image</button>
                </div>
        </form>
    </body>
</html>



