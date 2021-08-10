

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>adres</title>
    <!-- CSS only -->
    <link href="{{asset("css/ornek.css")}}" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
    body{
        background: rgba(0,0,230,0.1);
    }

</style>
<body>

<div class="container">
    <div class="row">
        <div class="col-6">
                @csrf
                <h5>Adres Ekle</h5>
                <label for="tc">Tc Kimlik no</label>
                <input class="form-control mt-1 mb-2" value="{{$tc}}" type="text" id="tc" disabled>
                <label for="adrestipi">Adres Tipi</label>
                <select class="form-control  mt-1 mb-2" name="adrestipi" id="adrestipi">
                    <option value="">Seçiniz</option>
                    @foreach($adrestip AS $deger)
                        <option value="{{ $deger->adrestipid}}">{{ $deger->adrestip }}</option>
                    @endforeach
                </select>
                <label for="adresaciklama">Adres Açıklama</label>
                <textarea class="form-control  mt-1 mb-2" id="adresaciklama" placeholder="Adres Giriniz"></textarea>
                <button class="btn btn-dark" id="adresekle">Adres Ekle</button>

        </div>
    </div>
</div>



<table class="table table-striped" id="adresler">
    <thead>
    <tr>
        <th>Tc</th>
        <th>adres id</th>
        <th>Adres Tipi</th>
        <th>adres açıklama</th>
    </tr>
    </thead>
    <tbody>
    @foreach($adres AS $value)
        <tr>
            <td>{{ $value->tc }}</td>
            <td>{{ $value->adresid }}</td>
            <td>{{ $value->adrestip }}</td>
            <td>{{ $value->adresaciklama}}</td>
        </tr>
    @endforeach
    </tbody>
</table>


</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


<script>
    $(document).ready(function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('input[name=_token]').val()
            }
        })

        $('#adresekle').on('click', function(){

            let data = {
                tc: $('#tc').val(),
                adresaciklama: $('#adresaciklama').val(),
                adrestipi: $('#adrestipi').val()
            }

            $.ajax({
                type: 'POST'
                ,url: '{{route('adresekle')}}'
                ,data : data
                ,success: function(msg){
                    $('#adresler tbody').append('<tr><td>' +msg.tc+ '</td><td>'+msg.adresid+'</td><td>'+msg.adrestip+'</td><td>'+msg.adresaciklama+'</td></tr>')
                }
            })

        })
    })
</script>
</html>
