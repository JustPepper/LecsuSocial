<aside> 
    <div class="aside-left">
        <!-- Profile picture -->
        <div class="profile-picture rd" v-bind:style="{ backgroundImage: 'url(' + photo + ')' }">
            <div class="change-photo">
                <div class="change-photo-upload">
                    <form action="{{ route('photo') }}" enctype="multipart/form-data" id="form-upload">
                        <label for="upload-photo" class="rd">
                            <input type="file" name="photo" id="upload-photo" v-on:change="onChange" v-el:imagen>
                            <svg><use xlink:href="#camera"></svg>
                        </label>
                    </form>
                </div>
            </div>
        </div>
        <div class="medium-wrapper">

            <!-- Profile name -->
            <div class="asd-item rd">
                <h1 class="user-name">{{ Auth::user()->alias }}</h1>
            </div>

            <!-- No code -->

            <div class="no-code">
                <a href="#">Obtén tu propio código para invitar personas a LECSU</a>
            </div>

            <!-- Followers, Network -->
            <div class="social flex">
                <div class="asd-item rd">
                    <a href="#" class="code">
                        <small>Siguiendo :</small>
                        <span>{{ count(Auth::user()->follows) }}</span>
                    </a>
                </div>
                <div class="asd-item rd">
                    <a class="code">
                        <small>Seguidores :</small>
                        <span>{{ count(Auth::user()->followers) }}</span>
                    </a>
                </div>
            </div>

        </div>
    </div>

    <!-- asd nav -->
    <nav class="asd-nav">
        <ul>
            <li class="asd-item">
                <a href="{{ route('content') }}" class="flex"><i><svg><use xlink:href="#content"></svg></i>CONTENIDOS</a>
            </li>
            <li class="asd-item">
                <a href="#" class="flex"><i><svg><use xlink:href="#plan"></svg></i>MIS DATOS / MI PLAN</a></li>
            <li class="asd-item">
                <a href="#" class="flex"><i><svg><use xlink:href="#referrals"></svg></i>REFERIDOS</a></li>
            </li>
            <li class="asd-item">
                <a href="#" class="flex"><i><svg><use xlink:href="#messages"></svg></i>MIS MENSAJES</a>
                <small>12</small>
            </li>
        </ul>
    </nav>
</aside>