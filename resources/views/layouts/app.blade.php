<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PocketTrainer') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@3.x/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Righteous&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="animate.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <v-app>
            <div class="hide-overflow" style="position: relative;">
                <v-toolbar absolute color="grey darken-4" dark scroll-off-screen scroll-target="#scrolling-techniques">
                    {{-- <v-toolbar-side-icon></v-toolbar-side-icon> --}}
                    <v-toolbar-title class="deep-orange--text text--accent-3">
                        @if (Route::has('login'))
                            @auth
                                <router-link to="/home" class="deep-orange--text text--accent-3">Let's do this {{ Auth::user()->name }}!</router-link>
                        </v-toolbar-title>
                        @else
                                {{ config('app.name', 'PocketTrainer') }}
                            @endauth
                        @endif
                    <v-spacer></v-spacer>

                    <!-- Authentication Links -->
                    @guest
                        <v-btn class="deep-orange--text text--accent-3" href="{{ route('login') }}" ripple flat>{{ __('Login') }}</v-btn>
                        @if (Route::has('register'))
                            <v-btn class="deep-orange--text text--accent-3" href="{{ route('register') }}" ripple flat>{{ __('Register') }}</v-btn>
                        @endif
                    @else
                        
                    <v-btn to="/workout" icon>
                        <v-icon class="deep-orange--text text--accent-3">mdi-dumbbell</v-icon>
                    </v-btn>
            
                    <v-btn to="/schedule" icon>
                        <v-icon class="deep-orange--text text--accent-3">mdi-calendar-repeat</v-icon>
                    </v-btn>
                    
                    <v-menu bottom left>
                        <template v-slot:activator="{ on }">
                            <v-btn icon v-on="on">
                                <v-icon class="deep-orange--text text--accent-3">mdi-account-heart</v-icon>
                            </v-btn>
                        </template>
                        <v-list class="grey darken-4">
                            <v-list-tile>
                                <v-list-tile-title>
                                    <router-link to="/profile" class="deep-orange--text text--accent-4">Profile</router-link>
                                </v-list-tile-title>
                            </v-list-tile>
                            <v-list-tile>
                                <v-list-tile-title>
                                    <a class="deep-orange--text text--accent-4"
                                        href="{{ route('logout') }}"
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
