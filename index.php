<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
      integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <style>
      body {
  font-family: "Open Sans", sans-serif;
  margin: 0;
  padding: 0;
  background-color: #364150;
  min-height: 100vh;
  display: flex;
  flex-direction: column;
}

a {
  text-decoration: none;
}

#main-header {
  height: 5rem;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 0 5%;
}

#logo {
  width: 4rem;
  height: 4rem;
}

.menu-btn {
  width: 3rem;
  height: 3rem;
  display: flex;
  flex-direction: column;
  justify-content: space-around;
  display: none;
}

.menu-btn span {
  width: 100%;
  height: 3px;
  background-color: white;
}

#main-header ul {
  list-style: none;
  display: flex;
  margin: 0;
  padding: 0;
}

#main-header li {
  margin: 0 1rem;
}

#main-header nav a {
  color: rgb(255, 225, 0);
  font-size: 1.25rem;
}

#main-header nav a:hover {
  color: rgb(255, 166, 0);
}

#side-drawer {
  width: 100%;
  height: 100%;
  background-color: rgb(29, 26, 27);
  position: fixed;
  top: 0;
  left: 0;
  display: none;
}

#side-drawer:target {
  display: block;
}

#side-drawer header {
  height: 5rem;
  display: flex;
  justify-content: flex-end;
  align-items: center;
  padding: 0 5%;
}

#side-drawer ul {
  list-style: none;
  margin: 0;
  padding: 4rem 1rem;
  display: flex;
  flex-direction: column;
  align-items: center;
}

#side-drawer li {
  margin: 1rem 0;
}

#side-drawer a {
  color: rgb(253, 239, 213);
  font-size: 2rem;
}

.form {
  margin: 9rem auto 0 auto;
  width: 18%;
  height: 35%;
  padding: 4rem 3.125rem 4.5rem 3.125rem;
  border-radius: 10px;
  background-color: #f5f5f5;
}

.form h2 {
  font-size: x-large;
  text-align: center;
  color: #32c5d2;
}

.form form {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  gap: 0.8rem;
  flex-wrap: nowrap;
}

.form form input {
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  text-align: right;
  width: 85%;
  margin: 0;
}

.form form input:focus {
  border-color: #86b7fe;
  box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
  outline: none;
  transform: scale(1.01);
}

.form form input::placeholder {
  text-align: right;
  font-size: 16px;
  font-weight: 400;
}

input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  appearance: none;
}

input[type="number"] {
  -moz-appearance: textfield;
}

.btn {
  background-color: #0d6efd;
  color: #fff;
  font-family: "Roboto", sans-serif;
  font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue",
    "Noto Sans", "Liberation Sans", Arial, sans-serif, "Apple Color Emoji",
    "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
  border-radius: 6px;
  padding: 0.3rem 1.5rem 0.8rem 1.5rem;
  width: 50%;
  margin: 0 auto;
  display: flex;
  align-items: center;
  justify-content: center;
  border: none;
  cursor: pointer;
  transition: 0.5s;
  letter-spacing: 3px;
  font-size: 1rem;
  font-weight: 400;
  box-sizing: border-box;
  font-stretch: 100%;
  font-style: normal;
  font-weight: 400;
  text-align: center;
  letter-spacing: normal;
}

i {
  position: absolute;
  left: 42.5%;
  cursor: pointer;
  font-size: 1rem;
}

.btn:hover {
  background-color: #113c7d;
}

#footer {
  margin-top: auto;
  width: 100%;
  height: fit-content;
  background: black;
  text-align: center;
}

#footer p {
  color: white;
}

#footer p a {
  color: #1e9ff2;
}

@media (max-width: 600px) {
  #main-header nav {
    display: none;
  }

  .menu-btn {
    display: flex;
  }

  .form {
    margin: 6rem auto 0 auto;
    width: 60%;
    height: 35%;
    padding: 4rem 3.125rem 4.5rem 3.125rem;
  }

  .form form input {
    width: 100%;
    margin: 0;
  }

  i{
    left: 21%;
  }

  .btn {
    padding: 0.3rem 1.5rem 0.8rem 1.5rem;
    width: 60%;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: center;
  }
}
@media (min-width: 600px) {
  #main-header nav {
    display: none;
  }

  .menu-btn {
    display: flex;
  }

  .form {
    margin: 6rem auto 0 auto;
    width: 45%;
  }

  .form form input {
    width: 70%;
  }

  i{
    left: 35%;
  }

  .btn {
    width: 45%;
  }
}
@media (min-width: 768px) {
  #main-header nav {
    display: none;
  }

  .menu-btn {
    display: flex;
  }

  .form {
    width: 34%;
  }

  .form form input {
    width: 80%;
  }

  i{
    left: 37%;
  }

  .btn {
    width: 50%;
  }
}

@media (min-width: 900px) {
  .form {
    width: 30%;
  }

  .form form input {
    width: 80%;
  }
  i{
    left: 38%;
  }
  .btn {
    width: 50%;
  }
}

@media (min-width: 992px) {
  #main-header nav {
    display: block;
  }

  .menu-btn {
    display: none;
  }

  .form {
    width: 30%;
  }

  .form form input {
    width: 70%;
    margin: 0;
  }
  i{
    left: 40%;
  }
  .btn {
    width: 40%;
  }
}

@media (min-width: 1200px) {
  #main-header nav {
    display: block;
  }

  .menu-btn {
    display: none;
  }

  .form {
    width: 20%;
  }

  .form form input {
    width: 75%;
  }

  i{
    left: 43%;
  }

  .btn {
    width: 50%;
  }
}

    </style>
  </head>
  <body>
    <header id="main-header">
      <a href="index.php"><img src="img/university.png" id="logo" /></a>
      <nav style="display: none;">
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
      <a href="#side-drawer" style="display: none;" class="menu-btn">
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

        <div style="text-align: center;">
          <img src="img/university.png" id="logo" />
        </div>
        <h2>فۆڕمی چوونەژوورەوەی قوتابی</h2>
        
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
          <i class="fa-regular fa-eye-slash"></i>
          <button type="submit" name="login" class="btn">چوونەژوورەوە</button>
        </form>
      </div>
    </main>

    <footer id="footer">
      <p>
        Copyright - 2023 | Developed By <a href="https://www.facebook.com/Leaderpeshawa">Peshawa </a> & <a href="https://t.me/zaidkurdi">Zaid</a>  | Testing
        and maintenance by <a href="https://t.me/Shadarf779">Shad</a> & <a href="https://t.me/m_475">Mohammed Qasm</a>
      </p>
    </footer>
    <script>
      const eyeIcon = document.querySelector(".fa-eye-slash");
      const input = document.getElementById("student_serial");

      eyeIcon.addEventListener("click", () => {
        if (input.type === "password") {
          input.type = "text";
          eyeIcon.classList.replace("fa-eye-slash", "fa-eye");
        } else {
          input.type = "password";
          eyeIcon.classList.replace("fa-eye", "fa-eye-slash");
        }
      });
    </script>
  </body>
</html>
