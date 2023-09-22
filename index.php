<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="./css/index.css" />
  </head>
  <body>
    <header id="main-header">
      <a href="index.php"><img src="img/university.png" id="logo" /></a>
      <h1 style="color:white" > Enrolment System (BETA Version)</h1>
      <nav>
        <ul>
          <li>
            <a
              href="index.php"
              style="border-bottom: 2px solid rgb(237, 234, 10)"
              >سەرەکی</a
            >
          </li>
          <li style="display: none">
            <a href="help.php">فێرکاری خۆتۆمارکردن</a>
          </li>
          <li><a href="contact.php">پەیوەندیمان پێوەبکە</a></li>
        </ul>
      </nav>
      <a href="#side-drawer" class="menu-btn">
        <span></span>
        <span></span>
        <span></span>
      </a>
    </header>
    <aside id="side-drawer">
      <header>
        <a href="#" class="menu-btn">
          <span></span>
          <span></span>
          <span></span>
        </a>
      </header>
      <nav>
        <ul>
          <li>
            <a
              href="index.php"
              style="border-bottom: 2px solid rgb(237, 234, 10)"
              >سەرەکی</a
            >
          </li>
          <li style="display: none">
            <a href="help.php">فێرکاری خۆتۆمارکردن</a>
          </li>
          <li><a href="contact.php">پەیوەندیکردن</a></li>
        </ul>
      </nav>
    </aside>

    <main>
      <div class="form">
        <h2>فۆڕمی چوونەژوورەوەی قوتابی </h2>
        <h2> ( ڤێرژنی بێتا)</h2>
        <form action="login.inc.php" method="POST">
          <input
            type="number"
            id="student_id"
            name="code"
            placeholder="کۆدی قوتابی"
            required
          />
          <input
            type="password"
            name="passcode"
            id="student_serial"
            placeholder="سڕیال کۆدی قوتابی"
            required
          />
          <button type="submit" name="login" class="btn">چوونەژوورەوە</button>
        </form>
      </div>
    </main>

    <footer id="footer">
      <p>Copyright - 2023 | Developed By <a href="">Peshawa & Zaid</a> | Testing And Maintaining by <a href="">Shad & mohammed Qasm</a></p>
    </footer>
  </body>
</html>
