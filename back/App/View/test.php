<!DOCTYPE html>
<html>
<head>
    <title>Upload your files</title>
</head>
<body>
<form enctype="multipart/form-data" action="/upload" method="POST">
    <p>Upload your file</p>
    <input type="file" name="uploaded_file"/><br>
    <input type="submit" value="Upload"/>
</form>
</body>
</html>