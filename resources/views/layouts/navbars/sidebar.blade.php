<div class="sidebar" data-color="adapti" data-background-color="white"
     data-image="{{ asset('material') }}/img/sidebar-1.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
        <span class="simple-text logo-normal">
            {{ config('app.name') }} cms
        </span>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="material-icons">dashboard</i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>

            <!-- Relacionados ao Administrador e o Moderador, deixar sempre por ultimo -->
            @if (Auth::user()->access_level <= 1)
                <li
                    class="nav-item {{ $activePage == 'user-management' || $activePage == 'log-list' ? ' active' : '' }}">
                    <a class="nav-link" data-toggle="collapse" href="#admin-collapse" aria-expanded="true">
                        <i><span class="material-icons">admin_panel_settings</span></i>
                        <p>{{ __('Administrative') }}
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse show" id="admin-collapse">
                        <ul class="nav">
                            <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
                                <a class="nav-link" href="{{ route('user.index') }}">
                                    <i class="sidebar-mini"><span class="material-icons">supervisor_account</span></i>
                                    <span class="sidebar-normal"> {{ __('Users') }} </span>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav">
                            <li class="nav-item{{ $activePage == 'coffeeBreak-management' ? ' active' : '' }}">
                                <a class="nav-link" href="{{ route('coffeeBreak.index') }}">
                                    <i class="sidebar-mini"><span class="material-icons">coffee</span></i>
                                    <span class="sidebar-normal"> {{ __('Coffee Breaks') }} </span>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav">
                            <li class="nav-item{{ $activePage == 'eventTicketCoffeeBreak-management' ? ' active' : '' }}">
                                <a class="nav-link" href="{{ route('eventTicketCoffeeBreak.index') }}">
                                    <i class="sidebar-mini"><span class="material-icons">emoji_food_beverage</span></i>
                                    <span class="sidebar-normal"> {{ __('Coffee Breaks To Event Tickets') }} </span>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav">
                            <li class="nav-item{{ $activePage == 'attendee-management' ? ' active' : '' }}">
                                <a class="nav-link" href="{{ route('attendee.index') }}">
                                    <i class="sidebar-mini"><span class="material-icons">groups</span></i>
                                    <span class="sidebar-normal"> {{ __('Attendees') }} </span>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav">
                            <li class="nav-item{{ $activePage == 'attendeeCoffeeBreak-management' ? ' active' : '' }}">
                                <a class="nav-link" href="{{ route('attendeeCoffeeBreak.index') }}">
                                    <i class="sidebar-mini"><span class="material-icons">coffee</span></i>
                                    <span class="sidebar-normal"> {{ __("Attendees' Coffee Breaks") }} </span>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav">
                            <li class="nav-item{{ $activePage == 'log-list' ? ' active' : '' }}">
                                <a class="nav-link" href="{{ route('log.index') }}">
                                    <i class="sidebar-mini"><span class="material-icons">history</span></i>
                                    <span class="sidebar-normal"> {{ __('LogsText') }} </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endif

        <!-- Botão inferior -->
            {{-- <li class="nav-item active-pro{{ $activePage == 'upgrade' ? ' active' : '' }}">
                <a class="nav-link text-white bg-danger" href="#">
                    <i class="material-icons text-white">unarchive</i>
                    <p>{{ __('Upgrade to PRO') }}</p>
                </a>
            </li> --}}
        </ul>
    </div>
</div>
