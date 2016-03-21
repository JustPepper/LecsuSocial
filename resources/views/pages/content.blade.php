@extends('layouts.app')
	
	@section('content')
        <div class="lecsu-content">
    		    <div class="main-item">
                <div class="main-item-title">
                    <h1 class="">Lo nuevo</h1>
                    <a href="#" class="zoom-content"><svg><use xlink:href="#lens" /></svg></a>
                </div> 
                <div class="main-item-slider">
                    @foreach($contents as $content)      
                        <div class="book">
                            <div class="book-cover" style="background-image: url({{ $content->cover }});">
                                <div class="book-hover">
                                    <a href="#"><svg><use xlink:href="#info" /></svg>Detalles</a>
                                    <form action="">
                                        <button><svg><use xlink:href="#bookmark" /></svg>Quiero leer</button>
                                    </form>
                                    <a href="#"><svg><use xlink:href="#community" /></svg>Foro</a>
                                    <a href="#"><svg><use xlink:href="#content" /></svg>Obtener</a>
                                </div>
                            </div>
                            <h1 class="book-name">{{ $content->name }}</h1>
                            <small class="book-author">por <a href="#">{{ $content->author }}</a></small>
                            <h2 class="book-price">{{ $content->price }} Creditos</h2>
                            <div class="book-info">
                                <div class="info-content">
                                    <h2>DESCRIPCIÓN</h2>
                                    <p>{{ $content->description }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div> 
            </div>
            <div class="main-item">
                <div class="main-item-title">
                    <h1 class="">Revistas</h1>
                    <a href="#" class="zoom-content"><svg><use xlink:href="#lens" /></svg></a>
                </div> 
                <div class="main-item-slider">
                    @foreach($contents->where('type', 'Revista') as $content)      
                        <div class="book">
                            <div class="book-cover" style="background-image: url({{ $content->cover }});">
                                <div class="book-hover">
                                    <a href="#"><svg><use xlink:href="#info" /></svg>Detalles</a>
                                    <form action="">
                                        <button><svg><use xlink:href="#bookmark" /></svg>Quiero leer</button>
                                    </form>
                                    <a href="#"><svg><use xlink:href="#community" /></svg>Foro</a>
                                    <a href="#"><svg><use xlink:href="#content" /></svg>Obtener</a>
                                </div>
                            </div>
                            <h1 class="book-name">{{ $content->name }}</h1>
                            <small class="book-author">por <a href="#">{{ $content->author }}</a></small>
                            <h2 class="book-price">{{ $content->price }} Creditos</h2>
                            <div class="book-info">
                                <div class="info-content">
                                    <h2>DESCRIPCIÓN</h2>
                                    <p>{{ $content->description }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div> 
            </div>
        </div>
	@endsection

	@section('script')
    <script src="//cdn.jsdelivr.net/jquery.slick/1.5.9/slick.min.js"></script>
    <script>
        $('.main-item-slider').slick({
          infinite: false,
          centerMode: false,
          speed: 300,
          slidesToShow: 5,
          slidesToScroll: 1,
          variableWidth: false,
          prevArrow: '<button type="button" class="slick-prev"><svg><use xlink:href="#prev" /></svg></button>',
          nextArrow: '<button type="button" class="slick-next"><svg><use xlink:href="#next" /></svg></button>',
          responsive: [
            {
              breakpoint: 1024,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: true
              }
            },
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 2
              }
            },
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
          ]
        });
    </script>
@endsection