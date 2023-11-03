<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;800&display=swap" rel="stylesheet">

    <title>Attendee Tags</title>
</head>
<body>
    @foreach($attendeesPages as $attendeesPage)
        <div class="sheet">
            @foreach($attendeesPage as $attendee)
                <div class="tag">
                    <div class="tagContainer">
                        <div class="QRCode">
                            {!! QrCode::format('svg')->errorCorrection('H')->generate($attendee->id) !!}
                        </div>
                        <div class="tagText">
                            <p>CONGRESSISTA</p>
                            <p class="attendeeName">{{$attendee->name}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
</body>
</html>

<style>
    * {
        margin: 0;
        padding: 0;
        border: none;
        box-sizing: border-box;
        outline: none !important;
    }

    .sheet{
        width: 21cm;
        height: 29.7cm;

        display: flex;
        flex-direction: row;
        flex-wrap: wrap;

        justify-content: space-evenly;
        align-items: center;
    }

    .tag{
        width: 5cm;
        height: 2cm;

        /*background-color: black;*/
        /*-webkit-print-color-adjust: exact;*/
    }

    .tagContainer{
        width: 100%;
        height: 100%;

        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;

        padding: 4%;
    }

    .QRCode{
        width: 35%;
        height: 100%;

        display: flex;
        justify-content: center;
        align-items: center;

        object-fit: contain;
    }

    .QRCode svg{
        width: 100%;
        height: 100%;
    }

    .tagText{
        width: 60%;
        height: 100%;

        display: flex;
        flex-direction: column;

        justify-content: space-between;

        text-transform: uppercase;

        color: #000;
        font-family: Inter, sans-serif;
        font-size: 0.25cm;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
    }

    .tagText p{
        margin: 0;
    }

    .attendeeName{
        font-weight: bold;
    }
</style>
