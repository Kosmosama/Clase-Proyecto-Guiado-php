<!DOCTYPE html>
<html lang="en">
<head>
</head>

<body id="page-top">

    <!-- Principal Content Start -->
    <div id="index">

        <!-- Header -->
        <div class="row">
            <div class="col-xs-12 intro">
                <div class="carousel-inner">
                    <div class="item active">
                        <img class="img-responsive" src="/../public/images/index/woman.jpg" alt="header picture">
                    </div>
                    <div class="carousel-caption">
                        <h1>FIND NICE PICTURES HERE</h1>
                        <hr>
                    </div>
                </div>
            </div>
        </div>

        <div id="index-body">
            <!-- Pictures Navigation table -->
            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <td><a class="link active" href="#category1" data-toggle="tab">category I</a></td>
                            <td><a class="link" href="#category2" data-toggle="tab">category II</a></td>
                            <td><a class="link" href="#category3" data-toggle="tab">category III</a></td>
                        </tr>
                    </thead>
                </table>
                <hr>
            </div>

            <!-- Navigation Table Content -->
            <div class="tab-content">

                <!-- First Category pictures -->
                <div id="category1" class="tab-pane active">
                    <div class="row popup-gallery">
                        <?php
                        $idCategoria = 1;
                        shuffle($imagenesHome);
                        include __DIR__ . "/imagen-index.part.php";
                        ?>
                    </div>
                </div>

                <!-- Second Category pictures -->
                <div id="category2" class="tab-pane">
                    <div class="row popup-gallery">
                        <?php
                        $idCategoria = 2;
                        shuffle($imagenesHome);
                        include __DIR__ . "/imagen-index.part.php";
                        ?>
                    </div>
                </div>

                <!-- Third Category pictures -->
                <div id="category3" class="tab-pane">
                    <div class="row popup-gallery">
                        <?php
                        $idCategoria = 3;
                        shuffle($imagenesHome);
                        include __DIR__ . "/imagen-index.part.php";
                        ?>
                    </div>
                </div>
                <nav class="text-center">
                        <ul class="pagination">
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#" aria-label="suivant">
                                    <span aria-hidden="true">&raquo;</span>
                                </a></li>
                        </ul>
                    </nav>
            </div>

            <!-- Newsletter form -->
            <div class="index-form text-center">
                <h3>SUSCRIBE TO OUR NEWSLETTER </h3>
                <h5>Suscribe to receive our News and Gifts</h5>
                <form class="form-horizontal">
                    <div class="form-group">
                        <div class="col-xs-12 col-sm-6 col-sm-push-3 col-md-4 col-md-push-4">
                            <input class="form-control" type="text" placeholder="Type here your email address">
                            <a href="" class="btn btn-lg sr-button">SUBSCRIBE</a>
                        </div>
                    </div>
                </form>
            </div>
            <!-- End of Newsletter form -->

            <!-- Box within partners name and logo -->
            <?php
                require_once __DIR__ . "/indexlogos.view.part.php";
            ?>
        </div>
    </div>
</body>
</html>
