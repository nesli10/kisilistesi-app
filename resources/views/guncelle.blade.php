<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>güncelleme</title>
    <!-- CSS only -->
    <link href="{{asset("css/ornek.css")}}"rel="stylesheet"type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
    body{
        background: rgba(0,0,230,0.1);
    }

</style>
<body>

<form action="{{ route('guncelle') }}" method="POST">
    @csrf
    <label for="ad">Ad</label>
    <input class="form-control" type="text" name="ad" value="{{$guncelle->ad}}">
    <label for="soyad">Soyad</label>
    <input class="form-control" type="text" name="soyad" value="{{$guncelle->soyad}}">
    <input class="form-control" type="hidden" name="tc" value="{{$guncelle->tc}}">
    <label for="tel">Tel</label>
    <input class="form-control" type="text" name="tel" value="{{$guncelle->tel}}">
    <input class="btn btn-dark" type="submit" value="güncelle">
</form>


</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</html>
