EPUBJS.Hooks.register("beforeChapterDisplay").endnotes = function(callback, renderer){

		EPUBJS.core.addCss("/css/reader.css", false, renderer.render.document.head);
		EPUBJS.core.addCss("https://fonts.googleapis.com/css?family=Domine:400,700|Ubuntu:400,300", false, renderer.render.document.head);

		if(callback) callback();

}