<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>{{ $content->name }}</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <meta name="apple-mobile-web-app-capable" content="yes">

        <link rel="icon" type="img/png" href="/favicon.png">

        <link rel="stylesheet" href="/css/reader.css">
        
        <script src="/js/libs/jquery-1.12.0.min.js"></script>

        <script src="/js/build/libs/zip.min.js"></script>

        <script>
            "use strict";

            document.onreadystatechange = function () {
              if (document.readyState == "complete") {
                window.reader = ePubReader("/content/narnia.epub");
                /* GO TO */ 
                //reader.book.goto('epubcfi(/6/16[LCDN1__1_.xhtml]!4/132/1:79)');
              }
            };

        </script>

        <!-- Render -->
        <script src="/js/build/epub.min.js"></script>

        <!-- Hooks -->
        <script src="/js/build/hooks.js"></script>

        <!-- Reader -->
        <script src="/js/build/reader.js"></script>
        

      
    </head>
    <body style="background: #95a5a6;">
      <svg style="display: none;">
        <symbol viewBox="0 0 20 20" id="left">
          <path d="M14 20c0.128 0 0.256-0.049 0.354-0.146 0.195-0.195 0.195-0.512 0-0.707l-8.646-8.646 8.646-8.646c0.195-0.195 0.195-0.512 0-0.707s-0.512-0.195-0.707 0l-9 9c-0.195 0.195-0.195 0.512 0 0.707l9 9c0.098 0.098 0.226 0.146 0.354 0.146z"></path>
        </symbol>
        <symbol viewBox="0 0 20 20" id="right">
          <path d="M5 20c-0.128 0-0.256-0.049-0.354-0.146-0.195-0.195-0.195-0.512 0-0.707l8.646-8.646-8.646-8.646c-0.195-0.195-0.195-0.512 0-0.707s0.512-0.195 0.707 0l9 9c0.195 0.195 0.195 0.512 0 0.707l-9 9c-0.098 0.098-0.226 0.146-0.354 0.146z"></path>
        </symbol>
      </svg>
      <div class="controls">
        <div class="arrows">
          <div id="prev">
              <svg><use xlink:href="#left"></svg>
          </div>
          <div id="next">
              <svg><use xlink:href="#right"></svg>
          </div>
        </div>
      </div>
        <div class="wrapper">
          <div id="reader">
            <div id="viewer"></div>
          </div>
        </div>

        <div id="bookmarksView" class="view">
          <ul id="bookmarks"></ul>
        </div>

    </body>
</html>
