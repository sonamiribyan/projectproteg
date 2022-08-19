<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
  <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo">
    menu
  </button>
  <button class="btn btn-primary" type="button">
   <a href="{{route('logout')}}" style="color:white" class="text-decoration-none">logout</a>  
  </button>
  </div>
</nav>
<div class="offcanvas offcanvas-start" id="demo">
  <div class="offcanvas-header">
    <h1 class="offcanvas-title">menu</h1>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
  </div>
  <div class="offcanvas-body">
    <ul class="list-unstyled">
    <li><a href="{{route('admin')}}" class="text-decoration-none"style="display:inline-block">admins</a></li>
    <li><a href="{{route('gallery')}}" class="text-decoration-none" style="display:inline-block">gallery</a></li>
    <li><a href="{{route('team')}}" class="text-decoration-none" style="display:inline-block">Our team</a></li>
    <li><a href="{{route('workProcess')}}" class="text-decoration-none" style="display:inline-block">workProcess</a></li>
    <li><a href="{{route('project')}}" class="text-decoration-none" style="display:inline-block">project</a></li>
    <li><a href="{{route('blog')}}" class="text-decoration-none" style="display:inline-block">blog</a></li>
  </ul>
  </div>
</div>
<div class="container">
@yield('content')
</div>
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>
</body>
</html>
