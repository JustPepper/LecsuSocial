<aside class="aside-right">
    <!-- Currently reading -->
    <div class="asd-item rd currently-reading">
        <div class="reading-hover" style="background-image: url('img/book1.jpg');">
            <a href="">Continuar leyendo</a>
        </div>
    </div>                
    <!-- Ask for content -->
    <div class="asd-item rd">
        <h1 class="asd-title">¿NO ENCUENTRAS LO QUE QUIERES LEER?</h1>
        <p class="asd-text flex">Invita al autor a subir su contenido a LECSU.</p>
        <div class="asd-item-input flex">
            <form action="">
                <label for="type">
                    <select name="" id="type">
                        <option disabled selected>¿Qué tipo de contenido es?</option>
                        <option value="">Revista</option>
                        <option value="">Periódico</option>
                        <option value="">Libro</option>
                    </select>
                    <svg><use xlink:href="#down" /></svg>
                </label>
                <input type="mail" placeholder="Correo">
                <button>Enviar</button>
            </form>
        </div>
    </div>

    <!-- Search -->
    <div class="asd-item rd">
        <h1 class="asd-title">Buscar amigo en Lecsu</h1>
        <div class="asd-item-input flex">
            {!! Form::open(array('route' => 'searchUsers', 'method' => 'GET')) !!}
                <input type="text" name="keyword" placeholder="Correo electrónico">
                <button class="btn btn-blue">Buscar</button>
            {!! Form::close() !!}
        </div>
    </div>
</aside>