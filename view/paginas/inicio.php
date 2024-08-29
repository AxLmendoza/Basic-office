<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Quicksand:wght@300..700&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">

    <title>AREESC Inicio</title>
    <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/stylelogin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />                                 
    <link rel="icon" href="img/iconoareescpestaña.svg">
</head>

<body>
  
  <main>
    <div class="box">

      <div class="inner-box">
        <div class="forms-wrap">
          <form class ="p-5 bg-light" method="post">
              <div class="logo">
                <img src="img/iconoareescpestaña.svg" alt="easyclass" />
                <h1>AREESC</h1>
              </div>

            <div class="actual-form">

              <h3>Ingresa tus datos</h3>

              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-envelope fa-lg"></i></span>
                <input type="email" class="form-control p-3" placeholder="Correo Electronico" id="email" name="ingresoEmail" required>
              </div>

              <div class="input-group mb-5">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-key fa-lg"></i></span>
                <input type="password" class="form-control p-3" placeholder="Contraseña" id="pwd" name="ingresoPassword" required>
              </div>

              <?php 
                $ingreso = new ControladorFormularios();
                $ingreso -> ctrIngreso();
              ?>

              <input type="submit" value="Iniciar Sesión" class="sign-btn" />
            </div>
          </form>

          <form action="index.php?paginas=inicio" autocomplete="off" class="sign-up-form">
            <div class="logo">
              <img src="img/iconoareescpestaña.svg" alt="easyclass" />
              <h1>AREESC</h1>
            </div>

            <div class="actual-form">
              <!-- Formulario adicional si es necesario -->
            </div>
        </div>
        </form>
      </div>

      <div class="carousel">
        <div class="images-wrapper">
          <img src="img/loginimg1.svg" class="image img-1 show" alt="" />
          <img src="img/loginimg2.svg" class="image img-2" alt="" />
          <img src="img/loginimg3.svg" class="image img-3" alt="" />
        </div>

        <div class="text-slider">
          <div class="text-wrap">
            <div class="text-group texto-wrapper">
              <h2>Sistema Paperleft</h2>
              <h2>Gestión de documentos</h2>
              <h2>De manera dinámica</h2>
            </div>
          </div>

          <div class="bullets">
            <span class="active" data-value="1"></span>
            <span data-value="2"></span>
            <span data-value="3"></span>
          </div>
        </div>
      </div>
    </div>
    </div>
  </main>

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/d3004808ad.js" crossorigin="anonymous"></script>

<!-- Custom JavaScript -->
<script>
const inputs = document.querySelectorAll(".input-field");
const toggle_btn = document.querySelectorAll(".toggle");
const main = document.querySelector("main");
const bullets = document.querySelectorAll(".bullets span");
const images = document.querySelectorAll(".image");

toggle_btn.forEach((btn) => {
  btn.addEventListener("click", () => {
    main.classList.toggle("sign-up-mode");
  });
});

function moveSlider() {
  let index = this.dataset.value;

  let currentImage = document.querySelector(`.img-${index}`);
  images.forEach((img) => img.classList.remove("show"));
  currentImage.classList.add("show");

  const textSlider = document.querySelector(".text-group");
  textSlider.style.transform = `translateY(${-(index - 1) * 3}rem)`;

  bullets.forEach((bull) => bull.classList.remove("active"));
  this.classList.add("active");
}

bullets.forEach((bullet) => {
  bullet.addEventListener("click", moveSlider);
});
</script>

</body>
</html>
