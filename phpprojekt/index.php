<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Level HTML Template by Tooplate</title>

    <!--Stylesheets-->
    <?php 
        include('partials/stylesheets.php')
    ?>

</head>

    <body>
        <div class="tm-main-content" id="top">
            <!-- Top Navbar -->
            <?php
                include('partials/navbar.php')
            ?>
            <!--hotel finder-->
            <?php
                include('partials/finder.php')
            ?>
            
            <!--Newsletter-->
            <?php
                include('partials/newsletter.php')
            ?>
            
            <!--Info-->
            <?php
                include('partials/3info.php')
            ?>
            
            <div class="tm-section tm-section-pad tm-bg-gray" id="tm-section-4">
                <div class="container">
                    <div class="row">
                        <!--Slideshow-->
                        <?php
                            include('partials/slideshow.php')
                        ?>
                        <!--Places-->
                        <?php
                            include('partials/places.php')
                        ?>
                    </div>
                </div>
            </div>

            <div class="tm-bg-video">
                <div class="overlay">
                    <i class="fa fa-5x fa-play-circle tm-btn-play"></i>
                    <i class="fa fa-5x fa-pause-circle tm-btn-pause"></i>
                </div>
                <!--Video-->
                <?php
                    include('partials/video.php')
                ?>
                <!--Article-->
                <?php
                    include('partials/article.php')
                ?>
            </div>          
            <!--Form-->
            <?php
                include('form.php')
            ?>
            <!--Footer-->
            <?php
                include('partials/footer.php')
            ?>
        </div>
        
        <!--JS files-->
        <?php
            include('partials/js.php')
        ?>
                          
        <!--Google Map-->
        <?php
            include('partials/map.php')
        ?>
                     
    </body>
</html>