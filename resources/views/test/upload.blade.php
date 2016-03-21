<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Upload content</title>
</head>
<body>
	{!! Form::open(array('url' => 'add-book', 'method' => 'POST')) !!}
		<label for="">Nombre</label>
		<input type="text" name="name" style="width: 500px;">
		<br>
		<br>
		<label for="">Autor</label>
		<input type="text" name="author" style="width: 500px;">
		<br>
		<br>
		<label for="">Fecha de lanzamiento</label>
		<input type="date" name="release_date" style="width: 500px;">
		<br>
		<br>
		<label for="">Cover</label>
		<input type="file" name="cover" style="width: 500px;">
		<br>
		<br>
		<label for="">Precio</label>
		<input type="text" name="price" value="0" style="width: 500px;">
		<br>
		<br>
		<label for="">Archivo</label>
		<input type="file" name="file" style="width: 500px;">
		<br>
		<br>
		<label for="">Descripción</label>
		<textarea name="description" style="width: 500px;"></textarea>
		<br>
		<br>
		<label for="">Tipo</label>
		<select name="type" style="width: 500px;">
			<option value="Revista">Revista</option>
			<option value="Libro" selected>Libro</option>
		</select>
		<br>
		<br>
		<button>Enviar</button>
	{!! Form::close() !!}
</body>
</html>