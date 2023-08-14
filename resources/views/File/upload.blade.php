<!DOCTYPE html>
<html>
<head>
    <title>Laravel S3 File Upload</title>
</head>
<body>
<div>
    <span>Menu: <span>
    <a href="upload">SUBIR</a>|
    <a href="list-files">VER ARCHIVOS</a>
</div>
<br/>

<h2>Upload to S3 Bucket</h2>

<div>Los archivos son subidos a la carpeta files</div>
<br/>
<form action="{{ route('file.upload.post') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file" required>
    <button type="submit">Upload</button>
</form>
</body>
</html>
