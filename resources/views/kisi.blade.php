
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>kişi</title>
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
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="row">
<div class="col-4">

    @csrf
    <label for="ad">Ad</label>
    <input class="form-control" type="text" id="ad" name="ad">
    <label for="soyad">Soyad</label>
    <input class="form-control" type="text" id="soyad" name="soyad">
    <label for="tc">Tc</label>
    <input class="form-control" type="text" id="tc" name="tc">
    <label for="tel">Tel</label>
    <input class="form-control" type="text" id="tel" name="tel">
    <input class="btn btn-dark" type="submit" id="kaydet" value="kaydet">

</div>
            <div class="col-8">
<table class="table table-striped col-6" id="kisiler">
    <thead>
    <tr>
        <th>Adı</th>
        <th>Soyadı</th>
        <th>Tc kimlik no</th>
        <th>Tel no</th>
        <th>Sil</th>
        <th>Güncelle</th>
        <th>Adres</th>
    </tr>
    </thead>
    <tbody>
    @foreach($kayit AS $value)
        <tr id="{{ $value->tc}}">
            <td>{{ $value->ad }}</td>
            <td>{{ $value->soyad }}</td>
            <td>{{ $value->tc}}</td>
            <td>{{ $value->tel }}</td>
            <td><button type="button" class="btn btn-dark" onclick="kisiSil('{{ $value->tc}}')">X</button> </td>
            <td><a class="btn btn-dark"  href="{{ route('guncellen')."/".$value->tc  }}">güncelle</a></td>
            <td><a class="btn btn-dark" href="{{route('adres')."/".$value->tc }}">Adres ekle</a></td>
        </tr>
    @endforeach
    </tbody>
</table></div>
            </div>
        </div>
    </div>
</div>
    </body>


<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script >


    function kisiSil(tc) {
        $.ajax({
            type: "GET",
            url: "{{ route('veriSil') }}" +"/" +tc,
            success: function(msg) {
                if(msg) {
                    $("#" + tc).remove();
                }else{
                    alert("silinemedi");
                }
            }
        });
    }
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('input[name=_token]').val()
            }
        })
        $('#kaydet').on('click', function(){

            let data = {
                ad: $('#ad').val(),
                soyad: $('#soyad').val(),
                tc: $('#tc').val(),
                tel: $('#tel').val()
            }
            let errorMsg = "";
            if(data.ad == "") errorMsg += "- Ad alanı boş bırakılamaz.\n";
            if(data.soyad == "") errorMsg += "- Soyad alanı boş bırakılamaz.\n";
            if(data.tc.length != 11) errorMsg += "- Hatalı TC formatı.\n";
            if(data.tel.length != 11) errorMsg += "- Hatalı telefon numarası formatı.\n";
            if(errorMsg != "") return alert(errorMsg);
            $.ajax({
                type: 'POST'
                ,url: '{{route('formKaydet')}}'
                ,data : data
                ,success: function(msg){
                    $('#kisiler tbody').append(
                        '<tr id="' + msg.tc + '">' +
                            '<td>' +msg.ad+ '</td>' +
                            '<td>'+msg.soyad+'</td> ' +
                            '<td>'+msg.tc+'</td>' +
                            '<td>'+msg.tel+'</td>' +
                            '<td><button class="btn btn-dark" onclick="kisiSil(' + msg.tc +')">X</button></td>' +
                            '<td><a class="btn btn-dark" href="{{ route('guncellen') }}/' + msg.tc +'">güncelle</a></td> ' +
                            '<td><a class="btn btn-dark" href="{{ route('adres') }}/' + msg.tc +'">adres ekle</a></td> ' +
                        '</tr>'
                    )
                }
            })

        })
    })
</script>

</html>
