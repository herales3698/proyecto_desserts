<!DOCTYPE html>
<html lang="en">
<head>
    <title>INICIO</title>
    <link rel="stylesheet" href="{{ asset('css/home.css')}}">
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
</head>
<body>
    @extends('layouts.app')

    @section('content')
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <div class="container">
        <section class="texto">
            <h1 class="tittle-home">DESSERTS</h1>
        <P class="p-home">¡Somos un programa diseñado para ayudarte a crear tus propios postres y organizarlos en categorías a tu gusto!

            Nuestra plataforma te proporcionará un menú intuitivo que te ayudará a encontrar rápidamente lo que necesitas.para crear deliciosos postres.
            
            ¡Lo mejor de todo es que eres libre de utilizar este software a tu antojo! Siéntete libre de experimentar, añadir  y personalizar tus categorías según tus preferencias. Estamos aquí para facilitar tu experiencia en el mundo de los postres.
            
            No dudes en explorar todas las funcionalidades que ofrecemos y ¡diviértete creando tus propias creaciones dulces!
        </P>
        </section>
        
        <section class="imagenes">


            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active" class="imagen1">
                    <img src="https://www.levapan.com/wp-content/uploads/2022/12/Postres_para_estas_festividades.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item" class="imagen2">
                    <img src="https://www.elespectador.com/resizer/U9A_I1wTh1bLFhldZ2tDzLMu35I=/525x350/filters:quality(60):format(jpeg)/cloudfront-us-east-1.images.arcpublishing.com/elespectador/4GSSJF6WDRF3LAANCXFH3UZEPM.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item" class="imagen3">
                    <img src="https://www.eltiempo.com/files/article_main_1200/uploads/2023/03/14/641110fa4e5d7.png" class="d-block w-100" alt="...">
                  </div>
                </div>
              </div>
            </div>
        </section>

    </div>
    @endsection
</body>
</html>