<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>{{ $content->title }}</title>
        <meta name="description" content="">
        <meta name="csrf_token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, minimal-ui">
        <meta name="apple-mobile-web-app-capable" content="yes">

        <link rel="stylesheet" href="/css/reader_wrapper.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Domine|Josefin+Sans:700,300">

        <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="/js/libs/zip.min.js"></script>

        <script>
            "use strict";


            $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('[name="csrf_token"]').attr('content')
              }
            });

            document.onreadystatechange = function () {
              if (document.readyState == "complete") {
                window.reader = ePubReader("{{ $content->file }}");

                /* Save last read */
                reader.book.on('renderer:locationChanged', function(locationCfi){
                $.post('/api/reading', { id: "{{ $content->id }}", epubcfi:  locationCfi}, function(data){
                  console.log(data);
                  });
                });

                @if($last_read)
                  reader.book.goto('{{ $last_read->epubcfi }}');
                @endif

              }
            }

        </script>
        <!-- Render -->
        <script src="/js/epub.min.js"></script>

        <!-- Hooks -->
        <script src="/js/hooks.min.js"></script>

        <!-- Reader -->
        <script src="/js/reader.min.js"></script>
    </head>
    <body>

      <svg style="display: none;">
        <symbol viewBox="0 0 20 20" id="left">
          <path d="M14 20c0.128 0 0.256-0.049 0.354-0.146 0.195-0.195 0.195-0.512 0-0.707l-8.646-8.646 8.646-8.646c0.195-0.195 0.195-0.512 0-0.707s-0.512-0.195-0.707 0l-9 9c-0.195 0.195-0.195 0.512 0 0.707l9 9c0.098 0.098 0.226 0.146 0.354 0.146z"></path>
        </symbol>
        <symbol viewBox="0 0 20 20" id="right">
          <path d="M5 20c-0.128 0-0.256-0.049-0.354-0.146-0.195-0.195-0.195-0.512 0-0.707l8.646-8.646-8.646-8.646c-0.195-0.195-0.195-0.512 0-0.707s0.512-0.195 0.707 0l9 9c0.195 0.195 0.195 0.512 0 0.707l-9 9c-0.098 0.098-0.226 0.146-0.354 0.146z"></path>
        </symbol>
        <symbol viewBox="0 0 32 32" id="bookmark">
          <path d="M15.476 19.461l-8.451 8.501v-22.924h16.951v22.924l-8.5-8.501z"></path>
        </symbol>
        <symbol viewBox="0 0 24 24" id="content">
          <path d="M3 6h18v2.016h-18v-2.016zM3 12.984v-1.969h18v1.969h-18zM3 18v-2.016h18v2.016h-18z"></path>
        </symbol>
        <symbol viewBox="0 0 24 24" id="settings">
          <path d="M12 15.516q1.453 0 2.484-1.031t1.031-2.484-1.031-2.484-2.484-1.031-2.484 1.031-1.031 2.484 1.031 2.484 2.484 1.031zM19.453 12.984l2.109 1.641q0.328 0.234 0.094 0.656l-2.016 3.469q-0.188 0.328-0.609 0.188l-2.484-0.984q-0.984 0.703-1.688 0.984l-0.375 2.625q-0.094 0.422-0.469 0.422h-4.031q-0.375 0-0.469-0.422l-0.375-2.625q-0.891-0.375-1.688-0.984l-2.484 0.984q-0.422 0.141-0.609-0.188l-2.016-3.469q-0.234-0.422 0.094-0.656l2.109-1.641q-0.047-0.328-0.047-0.984t0.047-0.984l-2.109-1.641q-0.328-0.234-0.094-0.656l2.016-3.469q0.188-0.328 0.609-0.188l2.484 0.984q0.984-0.703 1.688-0.984l0.375-2.625q0.094-0.422 0.469-0.422h4.031q0.375 0 0.469 0.422l0.375 2.625q0.891 0.375 1.688 0.984l2.484-0.984q0.422-0.141 0.609 0.188l2.016 3.469q0.234 0.422-0.094 0.656l-2.109 1.641q0.047 0.328 0.047 0.984t-0.047 0.984z"></path>
        </symbol>
      </svg>

      <div id="tocView" class="view">
      </div>

      <div id="main">
        <div id="titlebar">
          <div id="title-controls">
            <div class="item">
              <a href="#tocView"><svg><use xlink:href="#content" /></svg></a>
            </div>
            <a href="{{ route('content') }}">Contenido</a>
          </div>

        </div>

        <div id="divider"></div>
        <div id="viewer"></div>

        <div class="controls">
            <div class="arrows">
              <div id="prev" class="arrow">
                <svg><use xlink:href="#left" /></svg>
              </div>
              <div id="next" class="arrow">
                <svg><use xlink:href="#right" /></svg>
              </div>
            </div>
        </div>

        <div id="loader"><img src="/img/loader.gif"></div>
      </div>
    
    </body>
    <script src="/js/app.min.js"></script>
    <script>

    </script>
</html>
