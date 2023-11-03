<div class="row">
    <label class="col-sm-2 col-form-label" for="select-symplaEvents">{{ __('Sympla Events') }}</label>
    <div class="col-sm-7">
        <div class="form-group">
            <select class="form-control" id="select-symplaEvents" required onchange="changeEventFields(this)">
                <option value="" disabled selected hidden>Escolha o evento para esta conexão</option>
                @foreach($events as $event)
                    <option {{(isset($event_Ticket_CoffeeBreak) ? $event_Ticket_CoffeeBreak->eventID : old('eventID')) == $event->id ? 'selected' : ''}}
                            data-eventid="{{$event->id}}" data-eventname="{{$event->name}}"> {{$event->name}} </option>
                @endforeach
            </select>
        </div>
    </div>
</div>

<div class="row">
    <label class="col-sm-2 col-form-label">{{ __('Event ID') }}</label>
    <div class="col-sm-7">
        <div class="form-group{{ $errors->has('eventID') ? ' has-danger' : '' }}">
            <input class="form-control{{ $errors->has('eventID') ? ' is-invalid' : '' }}" name="eventID" id="input-eventID"
                   type="text" placeholder="{{ __('eventID') }}" value="{{ isset($event_Ticket_CoffeeBreak) ? $event_Ticket_CoffeeBreak->eventID : old('eventID') }}"
                   required="true" aria-required="true" readonly/>
            @if ($errors->has('eventID'))
                <span id="eventID-error" class="error text-danger" for="input-eventID">{{ $errors->first('eventID') }}</span>
            @endif
        </div>
    </div>
</div>

<div class="row">
    <label class="col-sm-2 col-form-label">{{ __('Event Name') }}</label>
    <div class="col-sm-7">
        <div class="form-group{{ $errors->has('event_name') ? ' has-danger' : '' }}">
            <input class="form-control{{ $errors->has('event_name') ? ' is-invalid' : '' }}" name="event_name" id="input-event_name"
                   type="text" placeholder="{{ __('event_name') }}" value="{{ isset($event_Ticket_CoffeeBreak) ? $event_Ticket_CoffeeBreak->event_name : old('event_name') }}"
                   required="true" aria-required="true" readonly/>
            @if ($errors->has('event_name'))
                <span id="event_name-error" class="error text-danger" for="input-event_name">{{ $errors->first('event_name') }}</span>
            @endif
        </div>
    </div>
</div>

<div class="row">
    <label class="col-sm-2 col-form-label">{{ __('Ticket Name') }}</label>
    <div class="col-sm-7">
        <div class="form-group{{ $errors->has('ticket_name') ? ' has-danger' : '' }}">
            <input class="form-control{{ $errors->has('ticket_name') ? ' is-invalid' : '' }}" name="ticket_name" id="input-ticket_name"
                   type="text" placeholder="{{ __('ticket_name') }}" value="{{ isset($event_Ticket_CoffeeBreak) ? $event_Ticket_CoffeeBreak->ticket_name : old('ticket_name') }}"
                   required="true" aria-required="true"/>
            @if ($errors->has('ticket_name'))
                <span id="ticket_name-error" class="error text-danger" for="input-ticket_name">{{ $errors->first('ticket_name') }}</span>
            @endif
        </div>
    </div>
</div>

<div class="row">
    <label class="col-sm-2 col-form-label" for="select-coffee_break_id">{{ __('Coffee Break') }}</label>
    <div class="col-sm-7">
        <div class="form-group{{ $errors->has('coffee_break_id') ? ' has-danger' : '' }}">
            <select class="form-control{{ $errors->has('coffee_break_id') ? ' is-invalid' : '' }}" name="coffee_break_id" id="select-coffee_break_id" required>
                <option value="" disabled selected hidden>Escolha o Coffee Break para este ingresso</option>
                @foreach($coffeeBreaks as $coffeeBreak)
                    <option {{(isset($event_Ticket_CoffeeBreak) ? $event_Ticket_CoffeeBreak->coffee_break_id : old('coffee_break_id')) == $coffeeBreak->id ? 'selected' : ''}}
                            value="{{$coffeeBreak->id}}"> {{$coffeeBreak->name}} </option>
                @endforeach
            </select>
            @if ($errors->has('coffee_break_id'))
                <span id="coffee_break_id-error" class="error text-danger" for="select-coffee_break_id">{{ $errors->first('coffee_break_id') }}</span>
            @endif
        </div>
    </div>
</div>
