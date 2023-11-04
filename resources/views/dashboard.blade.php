@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
  <div class="content">
      <div class="buttons_container" style="display: flex; flex-direction: column; width: 100%; height: 100%; justify-content: center; align-items: center;">
          <a href="{{route("populateDB")}}">
              <button type="button" title="{{ __('Populate DB') }}" class="btn btn-primary add-button">
                  <i class="material-icons">add_circle_outline</i>{{ __('Populate DB') }}
              </button>
          </a>
          <a href="{{route("generateQRCodes")}}">
              <button type="button" title="{{ __('Generate Attendees QRCode Page') }}" class="btn btn-primary add-button">
                <i class="material-icons">add_circle_outline</i>{{ __('Generate Attendees QRCode Page') }}
              </button>
          </a>
          <a href="{{route("scanner")}}">
              <button type="button" title="{{ __('Scan QRCodes') }}" class="btn btn-primary add-button" style="display: flex; flex-direction: row; align-items: center">
                  <span class="material-symbols-outlined">qr_code_scanner</span>{{ __('Scan QRCodes') }}
              </button>
          </a>
      </div>
  </div>
@endsection
