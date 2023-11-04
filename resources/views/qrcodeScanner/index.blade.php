<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Scanner</title>
</head>

<body>
    <div id="container">
        <form id="searchForm" method="POST" action="{{route('getAttendeeCoffeeBreaks')}}" enctype="multipart/form-data">
            @csrf
            @method("POST")

            <label for="attendee_id">Attendee UUID</label>
            <input id="attendee_id" name="attendee_id">
            <button type="submit">Submit</button>
        </form>

        <div id="qrcodeScanner">
            <div id="qr-reader"></div>
        </div>
    </div>

    <script src="https://unpkg.com/html5-qrcode"></script>

    <script>
        function domReady(fn) {
            if (
                document.readyState === "complete" ||
                document.readyState === "interactive"
            ) {
                setTimeout(fn, 1000);
            } else {
                document.addEventListener("DOMContentLoaded", fn);
            }
        }

        domReady(function () {
            function onScanSuccess(decodeText, decodeResult) {
                document.getElementById("attendee_id").value = decodeText;
            }

            @if(Session::get('message') !== null)
                alert("{{Session::get('message')}}");
            @endif

            let htmlscanner = new Html5QrcodeScanner(
                "qr-reader",
                { fps: 10, qrbos: 250 }
            );
            htmlscanner.render(onScanSuccess);
        });
    </script>
</body>

<style>
    #container{
        width: 100%;
        height: 100vh;

        display: flex;
        flex-direction: column;

        justify-content: space-evenly;
        align-items: center;
    }

    #searchForm{
        width: 80%;
        height: min-content;

        display: flex;
        flex-direction: column;

        justify-content: space-evenly;
    }

    #html5-qrcode-anchor-scan-type-change {
        text-decoration: none !important;
        color: #1d9bf0;
    }

    video {
        width: 100% !important;
        border: 1px solid #b2b2b2 !important;
        border-radius: 0.25em;
    }
</style>

</html>
