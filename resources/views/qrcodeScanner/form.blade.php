<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Coffee Break</title>
</head>

<body>
    <div id="mainContainer">
        <div id="coffeeBreaks">
            @foreach($attendeeCoffeeBreaks as $attendeeCoffeeBreak)
                <p class={{$attendeeCoffeeBreak->is_available ? 'available' : 'notAvailable'}}>
                    {{$attendeeCoffeeBreak->event_coffeeBreak->coffeeBreak->name}}
                </p>
            @endforeach
        </div>

        <form id="coffeeBreakForm" method="POST" action="{{route("updateAvailability")}}">
            @csrf
            @method("POST")

            <label for="attendee_id">Attendee UUID</label>
            <input id="attendee_id" readonly value="{{$attendeeCoffeeBreaks[0]->attendee_uuid}}">

            <label for="attendee_name">Attendee Name</label>
            <input id="attendee_name" readonly value="{{$attendeeCoffeeBreaks[0]->attendee->name}}">

            <label for="attendee_coffeeBreak">Attendee's Coffee Breaks</label>
            <select id="attendee_coffeeBreak" name="id" required onchange="changeEventFields(this)">
                <option value="" disabled selected hidden>Escolha o coffee break</option>
                @foreach($attendeeCoffeeBreaks as $attendeeCoffeeBreak)
                    <option value="{{$attendeeCoffeeBreak->id}}"
                            data-isavailable="{{$attendeeCoffeeBreak->is_available}}">
                        {{$attendeeCoffeeBreak->event_coffeeBreak->coffeeBreak->name}}
                    </option>
                @endforeach
            </select>

            <label for="is_available">Is available?</label>
            <select id="is_available" name="is_available" disabled required>
                <option value="" disabled selected hidden></option>
                <option value="1">Sim</option>
                <option value="0">Não</option>
            </select>

            <div id="buttonsContainer">
                <button type="submit">Submit</button>
                <a href="{{route("scanner")}}">Cancel</a>
            </div>
        </form>
    </div>

    <script>
        function changeEventFields(eventSelector){
            let isAvailable = eventSelector.options[eventSelector.selectedIndex].getAttribute("data-isavailable");

            document.getElementById("is_available").disabled = false;
            document.getElementById("is_available").value = "" + isAvailable;
        }
    </script>
</body>

<style>
    #mainContainer{
        display: flex;
        flex-direction: column;

        width: 100%;
        min-height: 100vh;

        justify-content: center;
        align-items: center;
    }

    #coffeeBreaks{
        display: flex;
        flex-direction: column;

        width: 80%;
        height: min-content;

        justify-content: center;

        margin-bottom: 5%;
    }

    #coffeeBreaks p{
        margin: 0;
    }

    #coffeeBreakForm{
        width: 80%;
        height: min-content;

        display: flex;
        flex-direction: column;
        justify-content: space-evenly;
    }

    #buttonsContainer{
        width: 100%;

        display: flex;
        flex-direction: row-reverse;

        justify-content: space-between;
        align-items: center;
    }

    .available{
        background-color: green;
    }

    .notAvailable{
        background-color: red;
    }
</style>

</html>
