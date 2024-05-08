<?php
if(isset($_SESSION['login'])) {
  $defaultName = $_SESSION['login'];
} else {
  $defaultName = "Vendég";
}
?>

<!DOCTYPE html>
  <head>
    <script>
        function validateEmail() {
            var email = document.getElementById("email").value;
            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                alert("Adj meg egy létező e-mailt.");
                return false;
            }
            return true;
        }
    </script>
    <style>
        #message {
            width: 100%;
            height: 150px;
            resize: none;
        }
        .text{
          font-weight: bold;
        }
    </style>
  </head>
  <body style="color: black;" class="text">
    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-md-6 text-center">
          <h1><strong>Kapcsolat ürlap</strong></h1>
          <form action="?oldal=feldolgozas" method="post">
              <label for="name">Név:</label>
              <input type="text" id="name" name="name" value="<?php echo $defaultName; ?>" readonly required><br>

              <label for="email">Email:</label>
              <input type="email" id="email" name="email" required><br>

              <label for="message">Üzenet:</label>
              <textarea id="message" name="message" rows="4" required></textarea><br>

              <input type="submit" value="Submit">
          </form>
        </div>
      </div>
    </div>
</body>
</html>