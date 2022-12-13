<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Welcome Page</title>
  </head>
  <body>
    <div class="container_fluid pt-3" style="height: 90px; background-color:#007bff">
        <h1 class="text-center text-white"> Excel File Parser</h1>
    </div>
    @if(Session::has('message'))
        <h4 class="text-success text-center">{{ Session::get('message') }}</h4>
    @elseif (Session::has('error'))
        <h4 class="text-danger text-center">{{ Session::get('error') }}</h4>
    @endif
    <div class="card p-5 mx-auto my-5" style="width:40%">
        <h6 class="text-info text-center mb-5"> only .xlsx file is supported</h6>
        <form class="form-inline" action="{{route('parseFile')}}" method="POST" enctype="multipart/form-data">
            @csrf
              <input type="file" name="file" class="form-control border-0" id="inputPassword2" placeholder="choose file" required>
            <button type="submit" class="btn btn-primary mb-2">Upload</button>
          </form>
    </div>
    <button class="m-auto d-block mt-4 btn btn-primary"><a href="{{route('files')}}" class="text-white">View Files</a></button>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
