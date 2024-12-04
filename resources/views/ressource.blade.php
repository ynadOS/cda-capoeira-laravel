<!DOCTYPE html>
<html>
<head>
   <title>MyBlog</title>
</head>
<body>
   <h1>@foreach ($ressources as $ressource) 
    {{$ressource->title}}
   
   @endforeach</h1>
</body>
</html>