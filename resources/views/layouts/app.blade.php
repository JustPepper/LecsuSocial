<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>LECSU - @yield('title')</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <meta name="csrf_token" content="{{ csrf_token() }}">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link rel="icon" type="img/png" href="/favicon.png">
        
        <!-- Picture Pollyfill -->
        <script>
            // Picture element HTML5 shiv
            document.createElement( "picture" );
        </script>
        <script src="/js/libs/picturefill.min.js" async></script>
        
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,600|Roboto:400,300,500,700|Oxygen:400,700,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="/css/main.css">

    </head>
    <body>

        @include('partials.svg')

        <!-- Header -->
        <header>
            <div class="wrapper flex">
                <a href="{{ url('/') }}" class="home-url">
                    <picture class="hdr-logo">
                        <source media="(min-width: 600px)" srcset="/img/lecsu-logo.svg">
                        <img alt="LECSU : Lectura sustentable" src="/img/lescu-logo-small.svg" height="100%">
                    </picture>
                </a>
                @if(Auth::user())
                    <div class="hdr-menu">
                        <nav>
                            <ul>
                                <li><a href="{{ route('profile', strtolower(Auth::user()->alias)) }}">Perfil</a></li>
                                <li><a href="{{ route('community') }}">Comunidad</a></li>
                                <li><a href="{{ route('content') }}">Contenido</a></li>
                                <li><a href="foros.html">Foros <small>0</small></a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="hdr-nav flex">
                    <div class="header-user flex">
                        <div class="hdr-nav-username">{{ Auth::user()->alias }}</div>
                        <div class="hdr-nav-icon"><svg><use xlink:href="#down" /></svg></div>
                        <div class="small-image medium-image" v-bind:style="{ backgroundImage: 'url(' + photo + ')' }"></div>
                        <nav>
                            <ul>
                                <li><a href="#"><svg><use xlink:href="#user" /></svg>Cuenta</a></li>
                                <li><a href="#"><svg><use xlink:href="#settings" /></svg>Configuración</a></li>
                                <li><a href="#"><svg><use xlink:href="#earth" /></svg>Lenguaje</a></li>
                                <li><a href="{{ route('logout') }}"><svg><use xlink:href="#logout" /></svg>Cerrar sesión</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="line"></div>
                    <div class="hdr-nav-notifications">
                        <svg><use xlink:href="#alert" /></svg>
                        <small>2</small>
                        <div class="notifications rd">
                            <h1>Notificaciones</h1>
                            <ul>
                                <li><a href="">
                                    <div class="small-image"
                                    style="background-image: url('img/photo2.jpg');" 
                                    ></div>
                                    <div class="not-text">
                                        <small>Beatrice Khan ha empezado a seguirte.</small>
                                        <time>Hace 5 horas</time>
                                    </div>
                                </a></li>
                                <li><a href="">
                                    <div class="small-image"
                                    style="background-image: url('img/photo3.jpg');" 
                                    ></div>
                                    <div class="not-text">
                                        <small>John Doe ha comentado tu estado.</small>
                                        <time>Hace 5 horas</time>
                                    </div>
                                </a></li>
                                <li><a href="">
                                    <div class="small-image"
                                    style="background-image: url('img/logo_editorial-norma.jpg');" 
                                    ></div>
                                    <div class="not-text">
                                        <small>Editorial Norma ha añadido nuevo contenido.</small>
                                        <time>Hace 12 horas</time>
                                    </div>
                                </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="line"></div>
                    <div class="hdr-nav-credits">
                        <svg><use xlink:href="#coin" /></svg>
                        <small>{{ Auth::user()->creditos }}</small>
                    </div>
                    </div>
                @endif
            </div>
        </header>
    
        <!-- Main Content -->
        <div class="wrapper site flex">
            @yield('login')
            @yield('content')
        </div>

        <!-- Template -->
        <template id="ajax-form">
            <button v-bind:class="class" v-on:click="onClick">@{{ number }}  Me gusta</button>
        </template>

        <script src="/js/libs/jquery-1.12.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.17/vue.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/0.7.0/vue-resource.min.js"></script>
        <script src="/js/main.js"></script>
        @yield('script')
    </body>
</html>
