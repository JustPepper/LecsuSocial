@extends('layouts.app')
    
    @section('content')         
        @include('partials.asideLeft')
        <main role="main">
            <!-- Content tabs -->
            <div class="tabs flex">
                <div tab="#tab1" class="tab rd tab-active">Interacción</div>
                <div tab="#tab2" class="tab rd">Estoy Leyendo <small>34</small></div>
                <div tab="#tab3" class="tab rd">Voy a Leer <small>5</small></div>
                <div tab="#tab4" class="tab rd">Ya Leí <small>3</small></div>
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

                <div id="tab3" class="ct ct-books">
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