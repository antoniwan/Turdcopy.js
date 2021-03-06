<?php
  /**
   * This block of code initializes the copy by retrieving the JSON Copy file
   * via PHP and uses ECHOs to print the output copy in server-side.
   * Why use server-side printing? Because delivering the copy on page load
   * via JavaScript will cause the page to initially load without copy and in
   * case of slowdowns the page will look like a total turd without the copy strings.
   * By loading the copy server-side we ensure that the copy is loaded when the page loads.
   */
  global $blurb; // We set $blurb as global (which is horrible), for lazyness. Need to fix this later, perhaps made this a class...
  if(isset($_GET['l']))
  {
    $blurbLang = $_GET['l']; // Set the default language to whatever the l var on the URL is.
  } else {
    $blurbLang = 'EN'; // Set the default blurb to English (this could be potentially use to mount different language files)
  }
  $blurbFile = file_get_contents('js/turdcopy-blurbs-'.$blurbLang.'.json'); // Open the JSON COPY file for the specified language
  $blurb = json_decode($blurbFile); // JSON decode it so that we can use it later
  // Now we have all the site's copy on the $blurb variable as a PHP Object Array

  /**
   * Made a wrapper/helper function in case we need it afterwards.
   * (Better than having to edit every single blurb echo later if needed...)
   * @param  string $blurbID ID of the blurb string, it's the string's container data-blurb-id attribute value.
   * @return string          Prints the blurb copy string.
   */
  function printBlurb($blurbID)
  {
    global $blurb; // get the global $blurb variable...
    echo $blurb->{$blurbID}->text;
  }

  /**
   * End of turdcopy.js init PHP code.
   */

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title data-blurb-id="sitetitle"><?php printBlurb('siteTitle') ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
  </head>

  <body>

    <!-- Navigation
    ================================================== -->
    <div class="navbar-wrapper">

      <div class="container">

	<div class="navbar navbar-inverse">
	  <div class="navbar-inner">

	    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	    </a>
	    <a class="brand" data-blurb-id="navHeader" href="#"><?php printBlurb('navHeader') ?></a>

	    <div class="nav-collapse collapse">
	      <ul class="nav">
		<li class="active"><a href="#" data-blurb-id="navMenuItem1"><?php printBlurb('navMenuItem1') ?></a></li>
                <li><a href="#" data-blurb-id="navMenuItem2"><?php printBlurb('navMenuItem2') ?></a></li>
                <li><a href="#" data-blurb-id="navMenuItem3"><?php printBlurb('navMenuItem3') ?></a></li>
                <li><a href="#" data-blurb-id="navMenuItem4"><?php printBlurb('navMenuItem4') ?></a></li>
              </ul>
            </div>
	  </div>
	</div>

      </div>
    </div>

    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide">
      <div class="carousel-inner">
        <div class="item active">
          <img src="img/examples/slide-01.jpg" alt="">
          <div class="container">
            <div class="carousel-caption">
              <h1 data-blurb-id="carHeader1"><?php printBlurb('carHeader1') ?></h1>
              <p class="lead" data-blurb-id="carCopy1"><?php printBlurb('carCopy1') ?></p>
              <a class="btn btn-large btn-primary" href="#" data-blurb-id="carCTA1"><?php printBlurb('carCTA1') ?></a>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="img/examples/slide-02.jpg" alt="">
          <div class="container">
            <div class="carousel-caption">
              <h1 data-blurb-id="carHeader2"><?php printBlurb('carHeader2') ?></h1>
              <p class="lead" data-blurb-id="carCopy1"><?php printBlurb('carCopy2') ?></p>
              <a class="btn btn-large btn-primary" href="#" data-blurb-id="carCTA2"><?php printBlurb('carCTA2') ?></a>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="img/examples/slide-03.jpg" alt="">
          <div class="container">
            <div class="carousel-caption">
              <h1 data-blurb-id="carHeader3"><?php printBlurb('carHeader3') ?></h1>
              <p class="lead" data-blurb-id="carCopy1"><?php printBlurb('carCopy3') ?></p>
              <a class="btn btn-large btn-primary" href="#" data-blurb-id="carCTA3"><?php printBlurb('carCTA3') ?></a>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
    </div>

    <!-- Main Content
    ================================================== -->
    <div class="container marketing">
      <div class="row">
        <div class="span12">
          <h3 data-blurb-id="mainContentHeader"><?php printBlurb('mainContentHeader') ?></h3>
          <div data-blurb-id="mainContentCopy"><?php printBlurb('mainContentCopy') ?></div>
        </div>
      </div>


      <div class="row">
        <div class="span4">
          <img class="img-circle" data-src="holder.js/140x140">
          <h2 data-blurb-id="subContentHeader1"><?php printBlurb('subContentHeader1') ?></h2>
          <p data-blurb-id="subContentCopy1"><?php printBlurb('subContentCopy1') ?></p>
          <p><a class="btn" href="#" data-blurb-id="subContentCTA1"><?php printBlurb('subContentCTA1') ?></a></p>
        </div>
        <div class="span4">
          <img class="img-circle" data-src="holder.js/140x140">
          <h2 data-blurb-id="subContentHeader2"><?php printBlurb('subContentHeader2') ?></h2>
          <p data-blurb-id="subContentCopy2"><?php printBlurb('subContentCopy2') ?></p>
          <p><a class="btn" href="#" data-blurb-id="subContentCTA2"><?php printBlurb('subContentCTA2') ?></a></p>
        </div>
        <div class="span4">
          <img class="img-circle" data-src="holder.js/140x140">
          <h2 data-blurb-id="subContentHeader3"><?php printBlurb('subContentHeader3') ?></h2>
          <p data-blurb-id="subContentCopy3"><?php printBlurb('subContentCopy3') ?></p>
          <p><a class="btn" href="#" data-blurb-id="subContentCTA3"><?php printBlurb('subContentCTA3') ?></a></p>
        </div>
      </div>

      <hr class="featurette-divider">

    <!-- Footer
    ================================================== -->

      <footer>
	<p class="pull-right"><a href="#" data-blurb-id="backToTop"><?php printBlurb('backToTop') ?></a></p>
	<p><?php printBlurb('copyright') ?></p>
      </footer>

    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="../scripts/turdcopy.js"></script>

    <script>
      new TurdApp (document, $, {
        callbacks: {
          fb_share: function(copy) {
            console.log("FB SHARE CALLBACK");
          }
        }
      });
    </script>
  </body>
</html>
