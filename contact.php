<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contanct Us</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/contact.css" />
  </head>
  <body>
    <header id="main-header">
      <a href="index.php"><img src="img/university.png" id="logo" /></a>
      <nav>
        <ul>
          <li><a href="index.php">سەرەکی</a></li>
          <li style="display: none">
            <a href="help.php">فێرکاری خۆ تۆمارکردن</a>
          </li>
          <li>
            <a
              href="contact.php"
              style="border-bottom: 2px solid rgb(237, 234, 10)"
              >پەیوەندیکردن</a
            >
          </li>
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
          <li><a href="index.php">سەرەکی</a></li>
          <li style="display: none">
            <a href="help.php">فێرکاری خۆ تۆمارکردن</a>
          </li>
          <li>
            <a
              href="contact.php"
              style="border-bottom: 2px solid rgb(237, 234, 10)"
              >پەیوەندیکردن</a
            >
          </li>
        </ul>
      </nav>
    </aside>

    <main>
      <h1>پەیوەندیکردن</h1>
      <section id="contact-form">
        <form action="">
          <input type="text" name="name" placeholder="ناوی تەواو" required />
          <input type="email" name="email" placeholder="ئیمێل" required />
          <input type="text" name="name" placeholder="ژمارەی موبایل" required />
          <input type="text" name="name" placeholder="بەش" required />
          <textarea
            name="message"
            rows="6"
            placeholder="نامە..."
            required
          ></textarea>
          <button type="submit">ناردن</button>
        </form>
      </section>

      <!---------------------------- Map ---------------------------->
      <section class="location">
        <h2>شوێنی زانکۆی سۆران</h2>
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d51200.949210694525!2d44.48764647035478!3d36.67307460432233!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x400428150b532259%3A0x86a9918b8b7c0286!2sSoran%20University!5e0!3m2!1sen!2siq!4v1695072890605!5m2!1sen!2siq"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
        ></iframe>
      </section>
    </main>

    <footer id="footer">
      <p>Copyright - 2023 | Developed By <a href="">Peshawa & Zaid</a></p>
    </footer>
  </body>
</html>
