<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="./css/index.css" />
    <style>
      body {
        background-image: url('img/campus.jpg');
        background-size: cover; 
        background-repeat: no-repeat;  
      
      }
    </style>
  </head>
  <body>
   
  
  <main>
  <div style="display: flex; justify-content: center; align-items: center; text-align: right; flex-direction: row;">
  <!-- <img style="width: 10%;padding-top:20px" src="images/SoranLogo.png" alt="soranlogo"> -->

  <div style="padding: 0 10px">
    <h3>حکومەتی هەرێمی کوردستان</h3>
    <h3>سه‌رۆکایه‌تی ئه‌نجوومه‌نی وه‌زیران</h3>
    <h3>وه‌زاره‌تی خوێندنی باڵاو توێژینه‌وه‌ی زانستی</h3>
    <h3>زانکۆی سۆران</h3>
  </div>
  <img style="width: 10%;padding-top:20px" src="images/SoranLogo.png" alt="soranlogo">
</div>

  <div style="background-color: rgba(240, 240, 240, 0.7);" class="form">
    <h2>فۆڕمی چوونەژوورەوەی قوتابی </h2>
    <form action="login.inc.php" method="POST">
      <input 
        type="number"
        id="student_id"
        name="code"
        placeholder="بەکارهێنەر"
        required
      />
      <input 
        type="password"
        name="passcode"
        id="student_serial"
        placeholder=" وشەی تێپەر"
        required
      />
      <!-- <div class="g-recaptcha" data-sitekey="6LdtVkkoAAAAAKuBsyePlxYop4kH1ADKNniZ9GOk"></div> -->
      <button type="submit" name="login" class="btn">چوونەژوورەوە</button>
    </form>
  </div>
</main>


    <footer id="footer">
    
      <p>Copyright - 2023 | Developed By <a href="https://www.facebook.com/Leaderpeshawa" target="_blank">Peshawa</a> &<a target="_blank" href="https://www.facebook.com/itszaid.1"> Zaid</a> | Testing And Maintaining by <a  href="https://www.facebook.com/shad.asadiq.3/">Shad</a> & <a target="_blank" href="#">Mohammed</a></p>
    </footer>
  </body>
</html>
