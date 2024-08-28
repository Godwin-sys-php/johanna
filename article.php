<?php
// get article
$id = $_GET['id'] ?? '';
$article = null;
$content = null;

if ($id) {
    $file_path = '../admin/articles/list.json';

    // Vérifier si le fichier JSON existe
    if (file_exists($file_path)) {
        // Lire le contenu actuel du fichier JSON
        $json = file_get_contents($file_path);

        // Décoder le JSON en tableau PHP
        $data = json_decode($json, true);

        // Vérifier si le JSON a été correctement décodé
        if ($data === null && json_last_error() !== JSON_ERROR_NONE) {
            die('Erreur lors du décodage du JSON.');
        }

        // Trouver l'article avec l'ID correspondant
        $article = null;
        foreach ($data as $item) {
            if ($item['id'] === $id) {
                $article = $item;
                $content = file_get_contents("../admin/articles/$id.html");
                break;
            }
        }
    }
}

?>

<!DOCTYPE html>
<html>
  <head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon" />

    <title><?= 
    $article ? $article['title'] : 'Article'
     ?></title>

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <!-- slider stylesheet -->
    <link
      rel="stylesheet"
      type="text/css"
      href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
    />

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />
  </head>

  <body>
    <div style="background-color: white;width: 100vw; text-align: center;margin: 0;padding-top: 1rem;padding-bottom: 1rem;border-bottom: solid 4px #4c7e81;">
      <a href="/index.php">
      <img src="/images/logo_horiz.png" style="height: 10vh;" />
      </a>  
    </div>
    <section class="service_section">
      <br />
      <div class="container py_mobile_45">
        <div class="heading_container">
        </div>
        <h1>
          <?= $article ? $article['title'] : 'Article' ?>
        </h1>
        <?= $content ?>
      </div>
    </section>
  </section>

    <!-- end service section -->

    <!-- info section -->

    <section class="info_section layout_padding2">
      <div class="container">
        <!-- <div class="social_container">
          <div class="social_box">
            <a href="">
              <i class="fa fa-facebook" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-twitter" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-linkedin" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-instagram" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-youtube" aria-hidden="true"></i>
            </a>
          </div>
        </div> -->
        <div class="contact_items">
          <a href="">
            <div class="item">
              <div class="img-box">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
              </div>
              <div class="detail-box">
                <p>Kabare, Sud-Kivu, République Démocratique du Congo</p>
              </div>
            </div>
          </a>
          <a href="">
            <div class="item">
              <div class="img-box">
                <i class="fa fa-phone" aria-hidden="true"></i>
              </div>
              <div class="detail-box">
                <p>+243 813 764 827</p>
              </div>
            </div>
          </a>
          <a href="">
            <div class="item">
              <div class="img-box">
                <i class="fa fa-envelope" aria-hidden="true"></i>
              </div>
              <div class="detail-box">
                <p>directeur.general@johannabusiness.com</p>
              </div>
            </div>
          </a>
        </div>
      </div>
    </section>

    <!-- end info section -->

    <!-- footer section -->
    <footer class="container-fluid footer_section">
      <p>
        &copy; <span id="displayDate"></span> All Rights Reserved
      </p>
    </footer>
    <!-- end  footer section -->

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <!-- End Google Map -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="js/custom.js"></script>
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"></script>
  </body>
</html>
