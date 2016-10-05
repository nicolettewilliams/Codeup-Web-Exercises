<?php



?>

<html>
<head>
    <title>Ad Lister</title>
    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Poiret+One|Pacifico' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>

    <nav class="navbar navbar-default navbar navbar-inverse navbar-static-top">

        <form class="form-inline signin">
            <div class="form-group">
                <input type="email" class="form-control" id="email" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="password3" placeholder="Password">
            </div>
            <div class="form-group signinbut">
                <button type="submit" class="btn btn-default navbut">Sign in</button>
            </div>
        </form>
        <div class="logo">
            Sell Your Crap!
        </div>
    </nav>

    <div class="row">
        <div class="col-xs-2">
            <div id="wrapper">
                <div id="sidebar-wrapper">
                    <ul class="sidebar-nav">
                        <li class="sidebar-brand">
                            <span class="cattitle">CATEGORIES</span>
                        </li>
                        <li>
                            <a href="#">APPLIANCES</a>
                        </li>
                        <li>
                            <a href="#">AUTO</a>
                        </li>
                        <li>
                            <a href="#">BOOKS</a>
                        </li>
                        <li>
                            <a href="#">FREE</a>
                        </li>
                        <li>
                            <a href="#">MISC.</a>
                        </li>
                        <li>
                            <a href="#">OUTDOORS</a>
                        </li>
                        <li>
                            <a href="#">TOOLS</a>
                        </li>
                        <li>
                            <a href="#">TOYS & GAMES</a>
                        </li>
                    </ul>
                </div> <!-- sidebar-wrapper -->
             </div><!--wrapper-->
        </div>
        <div class="col-md-4 gearpic">
            <img src="/img/gears.png">
            <div class="gearcontent"> 
                <p class="gear-line-one">Thanks for stopping by!</p> 
                <p class="gear-line-two">We hope to see you again soon.</p>
            </div>
        </div>
        <div class="col-md-4 col-md-offset-1">
            <p class="sign-up-text">SIGN UP</p>
            <p class="sign-up-free"> It's always free and always will be.</p>

            <div class="formdiv">
            <form class="form"type="GET" action="#">
                <div class="row">
                    <div class="col-xs-6 first-name">
                        <input name="firstname" type="text" placeholder="First Name" class="form-control input-lg" id="firstname">
                    </div>
                    <div class="col-xs-6">
                        <input name="lastname" type="text" placeholder="Last Name" class="form-control input-lg" id="lastname">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 email">
                        <input name="email" type="text" placeholder="Email" class="form-control input-lg" id="email">
                    </div>
                    <div class="col-xs-12 password">
                        <input name="password" type="text" placeholder="Password" class="form-control input-lg" id="password">
                    </div>
                </div>
                <div class="centerdiv">
                    <input class="btn btn-danger btn-lg sign-up-btn" type="submit" value="SIGN UP!"></p>
                </div>
            </form>
        </div>
        </div>
    </div>

        <footer class="footer">
            <div class="row last-row">
                <div class="col-lg-4 col-sm-6 followinfo">
                    FOLLOW US ON: 
                    <span class="fa fa-twitter"></span>
                    <span class="fa fa-linkedin"></span>
                    <span class="fa fa-facebook"></span>
                    <span class="fa fa-pinterest"></span>
                </div>

                <div class="col-lg-4">
                    <p class="sell-crap-footer">SELL YOUR CRAP <img class="copyright-image" src="/img/copyright.png"></p>
                </div>

                <div class="col-lg-4 col-sm-6 footerinfo">

                    <form class="form-inline">

                        <div>GET OUR CRAPTASTIC EMAILS!</div>

                       <div class="form-group">
                          <input type="text" class="form-control subscribe-boxes" id="exampleInputName2" placeholder="name">
                       </div>

                       <div class="form-group">
                          <input type="email" class="form-control subscribe-boxes" id="exampleInputEmail2" placeholder="email">
                       </div>

                       <button type="submit" class="btn btn-default subscribe-button">SUBMIT</button>

                    </form>

                </div>
            </div>
        </footer>


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>


    <script src="js/jquery.js"></script>

    <script src="js/bootstrap.min.js"></script>

    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    // $('.signinbut').click(function(){
    //     $('#dialog').modal('show');
    // });

    </script>
</body>
</html>

    
