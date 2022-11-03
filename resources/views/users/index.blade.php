<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Prueba</title>
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/app.js"></script>
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>


    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">

<div class="container form-signin w-100 m-auto">
  <form method="post" id="form-primero">
    @csrf
    <h1 class="h3 mb-3 fw-normal">Primer Punto</h1>

    <div class="form-floating">
      <input name="primero" type="text" class="form-control" id="floatingInput" placeholder="1,2,3 ejemplo">
      <label for="floatingInput">Digita segun ejemplo</label>
    </div>

    <button id="enviar_primero" class="w-100 btn btn-lg btn-primary" type="button">enviar</button>
  </form>
  <div class="resultado_primero alert alert-info" role="alert">
    <strong>Resultado:</strong>
  </div>
</div>
<br>
<br>
<div class="container form-signin w-100 m-auto">
  <form method="post" id="form-segundo">
    @csrf
    <h1 class="h3 mb-3 fw-normal">Segundo Punto</h1>

    <div class="form-floating">
      <input name="ini" type="text" class="form-control" id="floatingInput" placeholder="solo numeros">
      <label for="floatingInput">Digita Inicio</label>
    </div>
    <div class="form-floating">
      <input name="fin" type="text" class="form-control" id="floatingInput" placeholder="solo numeros">
      <label for="floatingInput">Digita Fin</label>
    </div>

    <button id="enviar_segundo" class="w-100 btn btn-lg btn-primary" type="button">enviar</button>
  </form>
  <div class="resultado_segundo alert alert-info" role="alert">
    <strong>Resultado:</strong>
  </div>
</div>
<br>
<br>
<div class="container form-signin w-100 m-auto">
  <form method="post" id="form-tercero">
    @csrf
    <h1 class="h3 mb-3 fw-normal">Tercer Punto</h1>

    <div class="form-floating">
      <input name="hora" type="text" class="form-control" id="floatingInput" placeholder="Formato hh:mm">
      <label for="floatingInput">Digita Hora</label>
    </div>

    <button id="enviar_tercero" class="w-100 btn btn-lg btn-primary" type="button">enviar</button>
  </form>
  <div class="resultado_tercero alert alert-info" role="alert">
    <strong>Resultado:</strong>
  </div>
</div>
<script>
    $(document).ready(function(e){
      $("#enviar_primero").click(function(){
        // alert($('input[name=_token]').val());
        // var form = $('#form-capacitacion')[1];
        // var data = new FormData(form);
        var data = $( "#form-primero" ).serialize();
        $.post("/primero",data,function(response, status){
          var resp = JSON.parse(response);
          if (resp.status=="success") {
            $(".resultado_primero").html('<strong>Resultado:</strong>'+resp.message);
          }
        });
      });
      $("#enviar_segundo").click(function(){
        // alert($('input[name=_token]').val());
        // var form = $('#form-capacitacion')[1];
        // var data = new FormData(form);
        var data = $( "#form-segundo" ).serialize();
        $.post("/segundo",data,function(response, status){
          var resp = JSON.parse(response);
          if (resp.status=="success") {
            $(".resultado_segundo").html('<strong>Resultado:</strong>'+resp.message);
          }
        });
      });
      $("#enviar_tercero").click(function(){
        // alert($('input[name=_token]').val());
        // var form = $('#form-capacitacion')[1];
        // var data = new FormData(form);
        var data = $( "#form-tercero" ).serialize();
        $.post("/tercero",data,function(response, status){
          var resp = JSON.parse(response);
          if (resp.status=="success") {
            $(".resultado_tercero").html('<strong>Resultado:</strong>'+resp.message);
          }
        });
      });
    });
  </script>

  </body>
</html>
