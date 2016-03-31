@extends('layouts.app')
    
    @section('content')         
        @include('partials.asideLeft')
        <main role="main">
            <!-- Content tabs -->
            <div class="tabs flex">
                <div tab="#tab1" class="tab rd tab-active">Interacción</div>
                <div tab="#tab2" class="tab rd">Estoy Leyendo</div>
                <div tab="#tab3" class="tab rd">Voy a Leer <small>{{ count(Auth::user()->wishlist()) }}</small></div>
                <div tab="#tab4" class="tab rd">Ya Leí</div>
            </div>
            
            <div class="content-tabs">
                <!-- Content -->
                <div id="tab1" class="ct ct-content ct-active">
                    <!-- Content Form -->
                    <div class="add-status">
                        {!! Form::open(array('route' => 'storeStatus', 'method' => 'post')) !!}
                            <div class="textarea">
                                <div class="small-image"
                                v-bind:style="{ backgroundImage: 'url(' + photo + ')' }" 
                                ></div>
                                <textarea name="body" placeholder="Escribir comentario"></textarea>
                            </div>
                            <div class="button">
                                <label for="type">
                                    <select name="type">
                                        <option value="estado" selected>Comentario</option>
                                        <option value="sueño">Sueño</option>
                                    </select>
                                    <svg><use xlink:href="#down" /></svg>
                                </label>
                                <button>Publicar</button>
                            </div> 
                        {!! Form::close() !!}
                    </div>

                    @include('partials.status')
                </div>

                <div id="tab2" class="ct ct-books">
                </div>

                <div id="tab3" class="ct ct-books">
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

                <div id="tab4" class="ct ct-books">
                    <!-- Book -->
                    <div class="book">
                        <div class="book-cover" style="background-image: url('img/book1.jpg');">
                            <div class="book-hover">
                                <a href="#">Continuar leyendo</a>
                            </div>
                        </div>
                        <h1 class="book-name">The Chronicles of Narnia</h1>
                        <small class="book-author">por <a href="#">C.S. Lewis</a></small>
                    </div>
                    <!-- Book -->
                    <div class="book">
                        <div class="book-cover" style="background-image: url('img/book2.jpg');">
                            <div class="book-hover">
                                <a href="#">Continuar leyendo</a>
                            </div>
                        </div>
                        <h1 class="book-name">The Lord of the Rings</h1>
                        <small class="book-author">por <a href="#">J.R.R Tolkien</a></small>
                    </div>
                    <!-- Book -->
                    <div class="book">
                        <div class="book-cover" style="background-image: url('img/book3.jpg');">
                            <div class="book-hover">
                                <a href="#">Continuar leyendo</a>
                            </div>
                        </div>
                        <h1 class="book-name">Sherlock Holmes</h1>
                        <small class="book-author">por <a href="#">Arthur Conan Doyle</a></small>
                    </div>
                </div>
            </div>
        </main>
        @include('partials.asideRight')         
    @endsection