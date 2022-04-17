<!DOCTYPE html
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>IdeaZ</title>
    <link rel="stylesheet" href="style_submit.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body>

    <!-- Navbar -->
    <div class="w3-top">
      <div class="w3-bar w3-red w3-left-align w3-card w3-large">
        <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
        <a href="index.html" class="w3-bar-item w3-button w3-padding-large w3-hover-white">Main Page</a>
        <a onclick="openForm()" href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Tag</a>
        <a href="about.html" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">About</a>
      </div>

      <!-- Navbar on small screens -->
      <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
        <a href="#" class="w3-bar-item w3-button w3-padding-large">Main Page</a>
        <a href="#" class="w3-bar-item w3-button w3-padding-large">Tag</a>
        <a href="#" class="w3-bar-item w3-button w3-padding-large">About</a>
      </div>
    </div>

    <!-- Popup -->
    <div class="form-popup" id="myForm">
      <form class="form-container">
        <h1 class="w3-center">Available Category</h1>
        <div class="w3-padding-16 w3-margin-right"><img src="images/logo_suggest.png" width="50" alt="suggest"> Suggest your ideas to the staff</i></div>
        <div class="w3-padding-16"><img src="images/logo_complain.png" width="50" alt="complain"> Complain about what you don't like about the school</i></div>
        <div class="w3-padding-16"><img src="images/logo_month_april.png" width="50" alt="april"> April's Subject: Library</i></div>
        <div class="w3-padding-16"><img src="images/logo_month_may.png" width="50" alt="may"> May's Subject: Education</i></div>
        <div class="w3-padding-16"><img src="images/logo_month_june.png" width="50" alt="june"> June's Subject: Garden</i></div>
        <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
      </form>
    </div>

    <div class="container">
      <div class="wrapper">
        <section class="post">
          <header>Creating Category</header>
          <form action="#" onsubmit="if(document.getElementById('agree').checked) { return true; } else { alert('Please indicate that you have read and agree to the Terms and Conditions and Privacy Policy'); return false; }">

            <textarea placeholder="Category Name" spellcheck="false" class="content" required></textarea>

            <textarea placeholder="Category Description" spellcheck="false" class="description" required></textarea>

            <div class="options">
              <p>Optional Attachment</p>
              <ul class="list">
                <li><img src="images/more.png" alt="gallery"></li>
              </ul>
            </div>
            <button>Post</button>
          </form>

        </section>
        <section class="audience">
          <header>
            <div class="arrow-back"><i class="fas fa-arrow-left"></i></div>
            <p>Select Category</p>
          </header>
          <div class="content">
            <p>Which category are you referring to? </p>
            <span>Your idea will show up in University Main page.</span>
          </div>
          <ul class="list">
            <li>
              <div class="column">
                <div><img src="images/logo_suggest.png" width="60" alt="suggest"></i></div>
                <div class="details">
                  <p>Suggestion</p>
                  <span>Give your idea about the subject</span>
                </div>
              </div>
              <div class="radio"></div>
            </li>
            <li class="active">
              <div class="column">
                <div><img src="images/logo_complain.png" width="60" alt="complain"></i></div>
                <div class="details">
                  <p>Complaining</p>
                  <span>Tell us about your inconveniences</span>
                </div>
              </div>
              <div class="radio"></div>
            </li>
            <li>
              <div class="column">
                <div><img src="images/logo_month_april.png" width="60" alt="april"></i></div>
                <div class="details">
                  <p>Library</p>
                  <span>April's Subject</span>
                </div>
              </div>
              <div class="radio"></div>
            </li>
            <li>
              <div class="column">
                <div><img src="images/logo_month_may.png" width="60" alt="may"></i></div>
                <div class="details">
                  <p>Education</p>
                  <span>May's Subject</span>
                </div>
              </div>
              <div class="radio"></div>
            </li>
            <li>
              <div class="column">
                <div><img src="images/logo_month_june.png" width="60" alt="june"></i></div>
                <div class="details">
                  <p>Garden</p>
                  <span>June's Subject</span>
                </div>
              </div>
              <div class="radio"></div>
            </li>
          </ul>
        </section>


      </div>
    </div>

    <script>
      const container = document.querySelector(".container"),
      privacy = container.querySelector(".post .privacy"),
      arrowBack = container.querySelector(".audience .arrow-back");

      privacy.addEventListener("click", () => {
        container.classList.add("active");
      });

      arrowBack.addEventListener("click", () => {
        container.classList.remove("active");
      });


      /* When the user clicks on the button,
      toggle between hiding and showing the dropdown content */
      function myFilter() {
        document.getElementById("myDropdown").classList.toggle("show");
      }

      // Close the dropdown if the user clicks outside of it
      window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
          var dropdowns = document.getElementsByClassName("dropdown-content");
          var i;
          for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
              openDropdown.classList.remove('show');
            }
          }
        }
      }

      function openForm() {
        document.getElementById("myForm").style.display = "block";
      }

      function closeForm() {
        document.getElementById("myForm").style.display = "none";
      }

    </script>


  </body>
</html>
