<div class="row">
    <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
    <div class="col-sm-7">
        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name"
                   type="text" placeholder="{{ __('Name') }}" value="{{ isset($client) ? $client->name : old('name') }}"
                   required="true" aria-required="true"/>
            @if ($errors->has('name'))
                <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
            @endif
        </div>
    </div>
</div>
@if (!isset($client))
    <div class="row">
        <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
        <div class="col-sm-7">
            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                       id="input-email" type="email" placeholder="{{ __('Email') }}" value="{{ old('email') }}"
                       required/>
                @if ($errors->has('email'))
                    <span id="email-error" class="error text-danger"
                          for="input-email">{{ $errors->first('email') }}</span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <label class="col-sm-2 col-form-label" for="input-cpf">{{ __('CPF') }}</label>
        <div class="col-sm-7">
            <div class="form-group{{ $errors->has('cpf') ? ' has-danger' : '' }}">
                <input class="form-control{{ $errors->has('cpf') ? ' is-invalid' : '' }}" name="cpf"
                       id="input-cpf" type="cpf" placeholder="{{ __('CPF') }}" value="" required/>
                @if ($errors->has('cpf'))
                    <span id="cpf-error" class="error text-danger"
                          for="input-cpf">{{ $errors->first('cpf') }}</span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <label class="col-sm-2 col-form-label" for="input-phone">{{ __('Phone') }}</label>
        <div class="col-sm-7">
            <div class="form-group">
                <input class="form-control" name="phone" id="input-phone"
                       type="cpf" placeholder="{{ __('Phone') }}" value="" required/>
                @if ($errors->has('phone'))
                    <span id="phone-error" class="error text-danger"
                          for="input-phone">{{ $errors->first('phone') }}</span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <label class="col-sm-2 col-form-label" for="input-street">{{ __('Street') }}</label>
        <div class="col-sm-7">
            <div class="form-group">
                <input class="form-control" name="street" id="input-street"
                       type="cpf" placeholder="{{ __('Street') }}" value="" required/>
                @if ($errors->has('street'))
                    <span id="street-error" class="error text-danger"
                          for="input-street">{{ $errors->first('street') }}</span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <label class="col-sm-2 col-form-label" for="input-district">{{ __('District') }}</label>
        <div class="col-sm-7">
            <div class="form-group">
                <input class="form-control" name="district" id="input-district"
                       type="cpf" placeholder="{{ __('District') }}" value="" required/>
                @if ($errors->has('district'))
                    <span id="district-error" class="error text-danger"
                          for="input-district">{{ $errors->first('district') }}</span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <label class="col-sm-2 col-form-label" for="input-city">{{ __('City') }}</label>
        <div class="col-sm-7">
            <div class="form-group">
                <input class="form-control" name="city" id="input-city"
                       type="cpf" placeholder="{{ __('City') }}" value="" required/>
                @if ($errors->has('city'))
                    <span id="city-error" class="error text-danger"
                          for="input-city">{{ $errors->first('city') }}</span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <label class="col-sm-2 col-form-label" for="input-state">{{ __('State') }}</label>
        <div class="col-sm-7">
            <div class="form-group">
                <input class="form-control" name="state" id="input-state"
                       type="cpf" placeholder="{{ __('State') }}" value="" required/>
                @if ($errors->has('state'))
                    <span id="state-error" class="error text-danger"
                          for="input-state">{{ $errors->first('state') }}</span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <label class="col-sm-2 col-form-label" for="input-country">{{ __('Country') }}</label>
        <div class="col-sm-7">
            <div class="form-group">
                <input class="form-control" name="country" id="input-country"
                       type="cpf" placeholder="{{ __('Country') }}" value="" required/>
                @if ($errors->has('country'))
                    <span id="country-error" class="error text-danger"
                          for="input-country">{{ $errors->first('country') }}</span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <label class="col-sm-2 col-form-label" for="input-zip_code">{{ __('Zip Code') }}</label>
        <div class="col-sm-7">
            <div class="form-group">
                <input class="form-control" name="zip_code" id="input-zip_code"
                       type="text" placeholder="{{ __('Zip Code') }}" value="" required/>
                @if ($errors->has('zip_code'))
                    <span id="zip_code-error" class="error text-danger"
                          for="input-zip_code">{{ $errors->first('zip_code') }}</span>
                @endif
            </div>
        </div>
    </div>
@endif
