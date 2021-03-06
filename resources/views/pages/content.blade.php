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
                                    @if(!Auth::user()->isReading($content->id))
                                      {!! Form::open(array('route' => ['readLater', $content->id], 'method' => 'POST')) !!}
                                        <button><svg><use xlink:href="#add" /></svg>Quiero leer</button>
                                      {!! Form::close() !!}
                                    @endif
                                    <a href="#"><svg><use xlink:href="#info" /></svg>Detalles</a>
                                    <a href="#"><svg><use xlink:href="#community" /></svg>Foro</a>
                                    @if($content->price == 0)
                                      <a href="{{ route('reader', $content->slug) }}"><svg><use xlink:href="#content" /></svg>Leer</a>
                                    @else
                                      <a href="#"><svg><use xlink:href="#content" /></svg>Obtener</a>
                                    @endif
                                </div>
                            </div>
                            <h1 class="book-name">{{ $content->name }}</h1>
                            <small class="book-author">por <a href="#">{{ $content->author }}</a></small>
                            <h2 class="book-price">{{ $content->price }} Creditos</h2>
                        </div>
                    @endforeach
                </div> 
            </div>
        </div>
        <modal :show.sync="showModal"></modal>
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