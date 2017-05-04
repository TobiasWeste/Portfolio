<?
if (isset($_POST['submit'])) { // Här kollar vi om "Skicka"-knappen är klickad och vad som ska hända efter att den är klickad.

  // Kollar ifall förnamnet INTE är ifyllt och ger isåfall ett felmeddelande till användaren.
  if (!$_POST['firstName']) {
    $error = "- Please enter your first name.";
  }

  // Kollar ifall efternamnet INTE är ifyllt och ger isåfall ett felmeddelande till användaren. "<br>" gör en ny rad på sidan.
  if (!$_POST['lastName']) {
    $error = "<br>- Please enter your last name.";
  }

  // Kollar ifall e-postadressen INTE är ifylld och ger isåfall ett felmeddelande till användaren. "<br>" gör en ny rad på sidan.
  if (!$_POST['email']) {
    $error .= "<br>- Please enter your email adress.";
  }

  // Kollar ifall meddelandet INTE är ifyllt och ger isåfall ett felmeddelande till användaren. "<br>" gör en ny rad på sidan.
  if (!$_POST['message']) {
    $error .= "<br>- Please enter your message.";
  }

  // Kollar ifall svartet inte är 5
  if (intval($_POST['human']) !== 5) {
    $error .= "<br>- Please verify your not a robot.";
  }

  // Här kollar vi ifall det finns några fel och om det finns så skriver vi ut dem åt användaren.
  if ($error) {
    $result = "Oh no! An Error! Please correct the following: $error";
  }

  // Skickar mejlet ifall alla fält är ifyllda och inga fel finns.
  else {
    // PHPs mailfunktion.
    mail(
      "tobias.westerlund@optistud.fi", // <-- Adressen dit mejlet skickas
      "Subject line", // <-- Mejlets ämnesrad.
      "Name: " .$_POST['firstName']. // <-- Det användaren har angett som förnamn i formuläret.
      "\r\nLast name: " .$_POST['lastName']. // <-- Det användaren har angett som efternamn i formuläret.
      "\r\nEmail: " .$_POST['email']. // <-- Det användaren har angett som e-postadress i formuläret. \r\n gör radbrytningar i själva mejlet.
      "\r\nMessage: " .$_POST['message'] // <-- Det användaren har angett som meddelande i formuläret. \r\n gör radbrytningar i själva mejlet.
    );

    // Texten som visas efter att mejlet skickats.
    {
      $result = "Thank you! We will be in touch shortly.";
    }
  }
}
//php slutar ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Portfolio</title>


    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/Portfolio.css" rel="stylesheet">

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <!-- NAVBAR -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">Go to top</a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li class="hidden">
                        <a class="page-scroll" href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about" data-toggle="collapse" data-target=".navbar-ex1-collapse">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#project" data-toggle="collapse" data-target=".navbar-ex1-collapse">Projects</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact" data-toggle="collapse" data-target=".navbar-ex1-collapse">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <!-- NAVBAR END -->

    <!-- Intro Section -->
    <section id="intro" class="container intro-section img-background">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="intro-txt"> Hello, my name is Tobias Westerlund. </h1>
                </div>
            </div>
        </div>
    </section>
    <!-- Intro Section End -->

    <!-- About Section -->
    <section id="about" class="about-section">
        <div class="container">
                <div class="col-md-12">
                    <h1 class="light-txt">I am a student at Optima where we learn about creating websites.</h1>
                </div>
        </div>
    </section>
    <!-- About Section End -->

    <!-- Projects Section -->
    <section id="project" class="project-section">
                    <h1 class="dark-txt">Projects</h1>
                    <p> I have created a couple of websites.<br> That are linked bellow </p>
                    <div class="container">
                        <div class="col-md-12">
                          <a href="http://twesterlund.optipoint.fi/Website/">
                            <img class="img" src="img/Website.jpg">
                          </a>
                              <a href="http://twesterlund.optipoint.fi/ovning4/index.php">
                                <img class="img" src="img/SecondWebsite2.png">
                              </a>
                      </div>
                  </section>
    <!-- Project Section End -->

    <!-- Contact Section -->
    <section id="contact" class="contact-section">
        <div class="container">
            <div class="row">
                    <h1 class="light-txt">Contact me</h1>
                          <form class="col-sm-12" method="post">

                            <?php echo $result; // Prints out the result on the screen ?>

                            <input type="text" name="firstName" placeholder="First Name" value="<?php echo $POST['firstName']?>"autofocus>
                            <input type="text" name="lastName" placeholder="Last Name" value="<?php echo $POST['lastName']?>"autofocus>
                            <input type="email" name="email" placeholder="E-mail" value="<?php echo $POST['email']?>"autofocus>
                            <textarea name="message" placeholder="Your message..."></textarea>
                            <input class="human" type="text" name="human" placeholder="What is 3 + 2?">
                            <input type="submit" name="submit" value="Send message">
                          </form>
                    <a href="https://github.com/TobiasWeste">Or you can just see what I do on GitHub</a>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

<!-- FOOTER -->
    <footer>
      <div clas="row">
        <div class="col-md-4">
          <a href="https://github.com/TobiasWeste">
            <i class="fa fa-github" aria-hidden="true"></i>
          </a>
          <a href="#">
            <i class="fa fa-twitter" aria-hidden="true"></i>
          </a>
          <a href="#">
            <i class="fa fa-facebook-official" aria-hidden="true"></i>
          </a>
          <a href="#">
            <i class="fa fa-instagram" aria-hidden="true"></i>
          </a>
          <p class="text-center">Tobias Westerlund &copy; <? echo date("Y") ?></p>
        </div>
      </div>
    </footer>
<!-- FOOTER END -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Scrolling Nav JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/scrolling-nav.js"></script>

</body>

</html>
