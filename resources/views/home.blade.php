<!Doctype <!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Boondh</title>

        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <link rel="stylesheet" href="{{asset('frontend-assets/style.css')}}">
        
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
              <a class="navbar-brand" href="#">Boondh</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link btn btn-primary text-white" href="{{url('dashboard')}}">My Account/Login</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
          
          <section id="herobox">
              <div class="container">
                  <div class="row">
                      <div class="col-md-6">
                          
                      </div>
                      <div class="col-md-6 text-md-end">
                          <h1>The Best Water<br>Right At Your Home</h1>
                          <p>100% Clear Water</p>
                      </div>
                  </div>
              </div>
          </section>

          <section id="about" class="mt-5 mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <small>Who we are</small>
                        <h2>About us</h2>
                        <p>Water plus a water distributor company selling pure mineral water.</p>
                    </div>
                    <div class="col-md-6">
                        <img src="{{asset('frontend-assets/processed (3).jpeg')}}">
                    </div>
                </div>
            </div>
        </section>

        <section id="contact" class="mt-5 mb-1">
          <div class="container">
              <div class="row">
                  <div class="col-md-12 text-center">
                      <small>Have a question?</small>
                      <h2>Contact us</h2>
                      <ul class="icons">
                        <li>
                          <div class="icon-box">
                            <span class="icon">
                              <i class="fa fa-phone"></i>
                            </span>
                            <p>Phone : 03346977744</p>
                          </div>
                        </li>
                        <li>
                          <div class="icon-box">
                            <span class="icon">
                              <i class="fa fa-envelope"></i>
                            </span>
                            <p>Email : mohammad44314@gmail.com</p>
                          </div>
                        </li>
                        <li>
                          <div class="icon-box">
                            <span class="icon">
                              <i class="fa fa-building"></i>
                            </span>
                            <p>Address : Islamabad XYZ</p>
                          </div>
                        </li>
                      </ul>
                  </div>
              </div>
          </div>
      </section>
        
      <footer class="bg-primary text-white text-center p-1">
        <p>Copyright &copy; 2021 | All Rights Reserved</p>
      </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>