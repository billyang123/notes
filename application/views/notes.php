<!DOCTYPE html>
<html lang="en-gb" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Animation component - UIkit tests</title>
        <link rel="stylesheet" type="text/css" href="/~apple/public/app.css">
        <script type="text/javascript" src="/~apple/public/app.js"></script>
        
         <!-- Codemirror and marked dependencies -->
        <link rel="stylesheet" href="/~apple/public/vendor/codemirror/lib/codemirror.css">
        <script src="/~apple/public/vendor/codemirror/lib/codemirror.js"></script>
        <script src="/~apple/public/vendor/codemirror/mode/markdown/markdown.js"></script>
        <script src="/~apple/public/vendor/codemirror/addon/mode/overlay.js"></script>
        <script src="/~apple/public/vendor/codemirror/mode/xml/xml.js"></script>
        <script src="/~apple/public/vendor/codemirror/mode/gfm/gfm.js"></script>
        <script src="/~apple/public/vendor/marked.js"></script>
        <!-- Markdown Area JavaScript and CSS -->
        <script src="/~apple/public/dist/markdownarea.js"></script>
    </head>
    <body>
        <div class="uk-container uk-container-center">
        	<h2>Create a news item</h2>
			<form action="/~apple/index.php/notes/create" method="post">

			 	<label for="title" >Title</label> 
			  	<input type="input" name="title" /><br />
	            <textarea data-uk-markdownarea="{maxsplitsize:600}" name="content">#Heading

	                Lorem ipsum dolor sit **amet**, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. [This is a link](#)

	                * Item
	                * Item
	                * Item

	                ## Heading

	                Ut enim ad *minim* veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.

	                <a href="#">HTML syntax highlightning</a>

	                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
	            </textarea>
	             <input type="submit" name="submit" class="uk-button" value="Create news item" /> 
			</form>
        </div>
    </body>
</html>