<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PocketTrainer') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@3.x/css/materialdesignicons.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <v-app>
            <div class="hide-overflow" style="position: relative;">
                <v-toolbar absolute color="teal darken-4" dark scroll-off-screen scroll-target="#scrolling-techniques">
                    {{-- <v-toolbar-side-icon></v-toolbar-side-icon> --}}
                    <v-toolbar-title>
                        @if (Route::has('login'))
                            @auth
                                Let's do this {{ Auth::user()->name }}!</v-toolbar-title>
                        @else
                                {{ config('app.name', 'PocketTrainer') }}
                            @endauth
                        @endif
                    <v-spacer></v-spacer>

                    <!-- Authentication Links -->
                    @guest
                        <v-btn href="{{ route('login') }}" ripple flat>{{ __('Login') }}</v-btn>
                        @if (Route::has('register'))
                            <v-btn href="{{ route('register') }}" ripple flat>{{ __('Register') }}</v-btn>
                        @endif
                    @else
                    
                    <v-btn icon>
                        <v-icon>mdi-dumbbell</v-icon>
                    </v-btn>
            
                    <v-btn icon>
                        <v-icon>mdi-calendar-repeat</v-icon>
                    </v-btn>
                    
                    <v-menu bottom left>
                        <template v-slot:activator="{ on }">
                            <v-btn icon v-on="on">
                                <v-icon>mdi-account-heart</v-icon>
                            </v-btn>
                        </template>
                        <v-list>
                            <v-list-tile>
                                <v-list-tile-title>
                                    Profile
                                </v-list-tile-title>
                            </v-list-tile>
                            <v-list-tile>
                                <v-list-tile-title>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                     </a>
 
                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                         @csrf
                                     </form>
                                </v-list-tile-title>
                            </v-list-tile>
                        </v-list>
                        @endguest
                    </v-menu>
                    
                </v-toolbar>
                <div id="scrolling-techniques" class="scroll-y" style="max-height: 600px;">
                    <v-container class="main-container">
                        @yield('content')
                    </v-container>
                </div>
              </div>
        </v-app>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
