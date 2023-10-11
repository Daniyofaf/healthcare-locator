<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Amakari Healthcare Locator</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/amakari-logo.png" rel="icon">
  <link href="assets/img/" rel="apple-touch-icon">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">



  <!-- <script src="https://maps.googleapis.com/maps/api/js?key="></script> -->\
  <!-- <script src="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v6.13.1/build/ol.js"></script> -->

  


<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

<!-- Leaflet JavaScript -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>


  <style>
    /* Reset some default styles */
    body {
      margin-top: -20px;
      display: flex;
      flex-direction: column;
      height: 10px;
      
    }

    body img{
      margin-top: -20px;
      display: flex;
      flex-direction: column;
      height: 10px;
      
    }

    .main {
      flex-grow: 1;
      /* This will make the content grow to fill available space */
      margin-bottom: auto;
    }

    form {
      margin-top: -350px;
    }


    /* Basic styling for search result items */
    .search-results {
      flex-grow: 1;
      list-style-type: none;
      padding: 0;
      margin: 55px;
    }

    .search-results li {
      padding: 50px;
    }

    .search-result {
      display: flex;
      border: 1px solid #ddd;
      padding: 10px;
      margin-bottom: 10px;
      background-color: #f9f9f9;
    }

    /* Styling for title and description on the left */
    .result-info {
      flex: 1;
      padding-right: 50px;
    }

    .result-title {
      font-weight: bold;
      font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }

    .result-description {
      color: black;
    }

    /* Styling for map view on the right */
    .result-map {
      width: 10px;
      flex: 1;
      height: 300px;
      /* Adjust the height as needed */
      background-color: #ddd;
      /* Placeholder background color */

      align-self: center;
      align-content: center;
    }

    .result-map iframe {
      width: 10%;
    }

    .container {
      color: white;
      display: flex;
      align-items: center;
      /* Center items vertically */

    }

    .container select{
      color: black;
      border-color: blue;
      border-radius: 10px;
      /* background-color: blue; Set the default background color */
  border: 1px solid #ccc; /* Add a border for styling */
  padding: 6px; /* Add padding for better appearance */
  transition: background-color 0.3s; /* Smooth transition for background color */

  background-color: white; /* Change the background color when focused */
  outline: none; /* Remove the default outline on focus */
  box-shadow: 0 0 5px rgba(52, 152, 219, 0.5);

    }



    /* Style the select container */
.custom-select {
  position: relative;
  display: inline-block;
  padding: 8px;
  background-color: #fff;
  border: 2px solid #ccc;
  border-radius: 5px;
  cursor: pointer;
  transition: border-color 0.3s, background-color 0.3s;
}

.custom-select select {
  appearance: none; /* Remove default arrow icon in some browsers */
  padding: 5px;
  font-size: 16px;
  border: none;
  background-color: transparent;
  width: 100%;
  cursor: pointer;
}

/* Style the select element when it's focused */
.custom-select:focus-within {
  border-color: #007bff; /* Change border color on focus */
  box-shadow: 0 0 4px rgba(0, 123, 255, 0.6); /* Add a subtle shadow on focus */
}

/* Style the select dropdown arrow */
.custom-select::after {
  content: "\25BC"; /* Unicode down arrow */
  position: absolute;
  top: 50%;
  right: 10px;
  transform: translateY(-50%);
  font-size: 14px;
  pointer-events: none; /* Ensure the arrow doesn't interfere with clicking the select */
}

/* Style the select dropdown options */
.custom-select select option {
  background-color: #fff;
  color: #333;
  font-size: 16px;
}

/* Style the select options on hover */
.custom-select select option:hover {
  background-color: #007bff;
  color: #fff;
}

/* Style the select options when selected */
.custom-select select option:checked {
  background-color: #007bff;
  color: #fff;
}

/* Style the select when disabled */
.custom-select:disabled {
  background-color: #eee;
  cursor: not-allowed;
}




    .container h1 {
      margin-top: 50px;
      align-content: center;
      color: blue;
      display: flex;
      font-size: 60px;
      /* Center items vertically */

    }

    .container p {
      margin-top: 50px;
      align-content: center;
      color: blue;
      display: flex;

      /* Center items vertically */

    }

    
      

    #container1 {
      padding-left: 50px;
      padding-bottom: 400px;
    }

    #container1 p {
      font-size: 40px;
    }
   

  </style>




</head>

<body style="background-image: url(img/R.jpg);" >  

<div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <header>
    <!-- ======= Header ======= -->
    @extends('layouts.header')

    <!-- End Header  -->
  </header>
  <div class="main">



    <!-- ======= Hero Section ======= -->
    <div id="hero" class="img" > 
      <div class="overlay-itro"></div>
      <div class="hero-content display-table">
        <div class="table-cell">
          <div class="container" id="container1">

            <h1 class=""><strong>Search your nearby&nbsp;</strong></h1>
            <p class="hero-subtitle"><strong><span class="typed" data-typed-items="Hospitals, Clinics, Specialized Hospitals, Specialized Clinics"> </span></strong></p>

          </div>

          <form action="{{ route('search') }}" method="GET" required>
            <div class="container" >
              <select name="table">
                <option value="AnyHealthCare">Any HealthCare</option>
                <option value="hospital">Hospital</option>
                <option value="specializedhospital">Specialized Hospital</option>
                <option value="clinic">Clinic</option>
                <option value="specializedclinic">Specialized Clinic</option>
              </select>
              <input type="text" name="query" class="form-control" placeholder="Search like Hospital around 22">
              <div class="input-group-append">
                <button class="btn btn-outline-primary" type="submit">Search</button>
              </div>
            </div>
          </form>
          

          <div class="search-results" >
            <!-- Your search result items -->
            @if(!empty($results) && count($results) > 0)

            @foreach($results as $result)

         


            <ul class="search-results">

              <li class="search-result">
                <div class="result-info">
                  <h2 class="result-title">{{ $result->h_name }}{{ $result->c_name }}{{ $result->sc_name }}{{ $result->sh_name }}</h2>
                  <h5>
                    <p class="result-description"><strong>Address:</strong> {{ $result->Region }}, {{ $result->Zone }}, {{ $result->Wereda }}</p>
                  </h5>
                  <p><strong>Service:</strong>
            @foreach ($result->Service as $service)
                {{ $service }},
            @endforeach
        </p>

        

                </div>



                <div id="map{{ $loop->index + 1 }}" style="width: 50%; height: 300px;"></div>

                <script>
                        // Retrieve latitude and longitude values from your PHP variables
                        var latitude{{ $loop->index }} = {{ $result->Latitude }};
                        var longitude{{ $loop->index }} = {{ $result->Longitude }};

                        // Initialize the map
                        var map{{ $loop->index }} = L.map('map{{ $loop->index + 1 }}').setView([latitude{{ $loop->index }}, longitude{{ $loop->index }}], 15);

                        // Add a tile layer (OpenStreetMap)
                        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                        }).addTo(map{{ $loop->index }});

                        // Add a marker to the map
                        L.marker([latitude{{ $loop->index }}, longitude{{ $loop->index }}]).addTo(map{{ $loop->index }});
                    </script>


      









              </li>
              <!-- Add more search result items as needed -->
            </ul>







            @endforeach

            

            @else
            <p class="no-results-message"></p>

            @endif
     

            
          </div>




        </div>
        
        </section>
      </div>





         
      @include('layouts.footer')
    </div>

  </div>

  </div>
  <!-- End Hero Section -->



  </div>





 
  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/typed.js/typed.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>





</body >

</html>

