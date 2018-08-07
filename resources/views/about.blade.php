@extends('layouts.guest-app')


@section('local-css')
  
    /* Post List */


    #myCarousel, .carousel-inner{
        height: 75vh;
    }

    #welcome-message h2{
      font-family: 'Roboto', sans-serif;
      margin: 6.5% 0 0 0;
    }

  .carousel-inner .item div.about-us{
      background-image: -webkit-linear-gradient(rgba(0,0,0, 0.5), rgba(0,0,0, 0.5)), url(../images/image3.jpg) !important;
      background-size: cover;
      background-position: auto;
    }

  .img-polaroid{
      padding: 4px;
      background-color: #eee;
      border: 1px solid #ccc;
      border: 1px solid rgba(0, 0, 0, 0.2);
  }
  
  .whoWeAre p
  {
    font-size: 18px;
    line-height: 35px;
    font-family: 'Montserrat', sans-serif;
    margin-bottom: 4%;
  }

  .whoWeAre button
  {
    border-radius: 3px;
  }

  .whoWeAre img{

}
@endsection

@section('carousel')
    
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
       
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <div class="about-us"></div>
            </div>
       </div>

        <div id="welcome-message">
            
            <h2>About us</h2>
            <br>
           
        </div>
    </div>
@endsection

@section('container1-content')
    
    <br><br>
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-body subtitle"><b>Supercools</b></div>
            </div>
            <br>
    </div>
    <br><br>
    <div class="row whoWeAre">

        <div class="text-center">
          
            <p> Supercool are young students and future African leaders who are passionate about techlogies, and want to make an impact and solve Africa's biggest problems for the good of the continent and African population. Supercool is composed of 6 second year Computing students which include Ticio Victoriano, Kone Fanhatcha, Eli Chipuila, Abel Makanzu, Andrew Minja and Given Edward.
            </p>
            
          {{-- <button onClick="window.location.href='https://alueducation.com/'" class="btn btn-lg btn-info">Go to ALU</button> --}}
        </div>
    </div>
    <br>
    <div class="row text-center">

        <div class="col-sm-2">
          <img src="images/team1.jpg" alt="" class="img-polaroid img-responsive" />
          <div class="roles">
            <h5><strong>Ticio Victoriano</strong></h5>

            <ul class="social-profile">
              <li><a href="#"><i class="icon-facebook icon-32 icon-circled"></i></a></li>
              <li><a href="#"><i class="icon-twitter icon-32 icon-circled"></i></a></li>
              <li><a href="#"><i class="icon-linkedin icon-32 icon-circled"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="col-sm-2">
          <img src="images/team2.jpg" alt="" class="img-polaroid img-responsive" />
          <div class="roles">
            <h5><strong>Kone Fanhatcha</strong></h5>

            <ul class="social-profile">
              <li><a href="#"><i class="icon-facebook icon-32 icon-circled"></i></a></li>
              <li><a href="#"><i class="icon-twitter icon-32 icon-circled"></i></a></li>
              <li><a href="#"><i class="icon-linkedin icon-32 icon-circled"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="col-sm-2">
          <img src="images/team3.jpg" alt="" class="img-polaroid img-responsive" />
          <div class="roles">
            <h5><strong>Abel Makanzu</strong></h5>

            <ul class="social-profile">
              <li><a href="#"><i class="icon-facebook icon-32 icon-circled"></i></a></li>
              <li><a href="#"><i class="icon-twitter icon-32 icon-circled"></i></a></li>
              <li><a href="#"><i class="icon-linkedin icon-32 icon-circled"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="col-sm-2">
          <img src="images/team4.jpg" alt="" class="img-polaroid img-responsive" />
          <div class="roles">
            <h5><strong>Eli Chipuila</strong></h5>

            <ul class="social-profile">
              <li><a href="#"><i class="icon-facebook icon-32 icon-circled"></i></a></li>
              <li><a href="#"><i class="icon-twitter icon-32 icon-circled"></i></a></li>
              <li><a href="#"><i class="icon-linkedin icon-32 icon-circled"></i></a></li>
            </ul>
          </div>
        </div>

        <div class="col-sm-2">
          <img src="images/team5.jpg" alt="" class="img-polaroid img-responsive" />
          <div class="roles">
            <h5><strong>Andrew Minja</strong></h5>

            <ul class="social-profile">
              <li><a href="#"><i class="icon-facebook icon-32 icon-circled"></i></a></li>
              <li><a href="#"><i class="icon-twitter icon-32 icon-circled"></i></a></li>
              <li><a href="#"><i class="icon-linkedin icon-32 icon-circled"></i></a></li>
            </ul>
          </div>
        </div>

        <div class="col-sm-2">
          <img src="images/team6.jpg" alt="" class="img-polaroid img-responsive" />
          <div class="roles">
            <h5><strong>Given Edward</strong></h5>

            <ul class="social-profile">
              <li><a href="#"><i class="icon-facebook icon-32 icon-circled"></i></a></li>
              <li><a href="#"><i class="icon-twitter icon-32 icon-circled"></i></a></li>
              <li><a href="#"><i class="icon-linkedin icon-32 icon-circled"></i></a></li>
            </ul>
          </div>
        </div>
      </div>

@endsection

@section('container2-content')
    
@endsection
