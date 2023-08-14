<!DOCTYPE html>
<html>
<head>
    <title>Files in S3 Bucket</title>
</head>
<body>
<div>
    <span>Menu: <span>
    <a href="upload">SUBIR</a>|
    <a href="list-files">VER ARCHIVOS</a>
</div>
<br/>

<h2>List of Files in S3 Bucket</h2>

<div>Se lista el contenido de la carpeta files</div>

<ul>
    @foreach($fileUrls as $file => $url)
        <li>
            {{ $file }} - 
            <a href="{{ route('signed-url', ['filename' => $file]) }}" target="_blank">View File</a>
        </li>
    @endforeach
</ul>

</body>
</html>

