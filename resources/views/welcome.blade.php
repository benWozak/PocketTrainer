<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/@mdi/font@3.x/css/materialdesignicons.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Righteous&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">

    </head>
    <body>
       <div id="app">
            <v-app>
                <v-toolbar color="grey darken-4" dark>
                    <v-toolbar-title class="animated fadeInLeft slower deep-orange--text text--accent-3">{{ config('app.name') }}</v-toolbar-title>
                    
                        <v-spacer></v-spacer>
                        <v-toolbar-items class="hidden-sm-and-down">
                            @if (Route::has('login'))
                                <div class="top-right">
                                    @auth
                                        <v-btn href="{{ url('/home') }}" class="animated fadeInRight delay-2s slower deep-orange--text text--accent-3" ripple flat>Home</v-btn>
                                    @else
                                        <v-btn href="{{ route('login') }}" class="animated fadeInRight delay-2s slower deep-orange--text text--accent-3" ripple flat>Login</v-btn>
                                    @if (Route::has('register'))
                                        <v-btn href="{{ route('register') }}" class="animated fadeInRight delay-2s slower deep-orange--text text--accent-3" ripple flat>Sign up</v-btn>
                                        @endif
                                    @endauth
                                </div>
                            @endif
                        </v-toolbar-items>
                        <v-menu class="hidden-md-and-up">
                            <v-toolbar-side-icon class="deep-orange--text text--accent-4" slot="activator"></v-toolbar-side-icon>
                            <v-list class="animated fadeInDown grey darken-4">
                            @if (Route::has('login'))
                                @auth
                                        <v-list-tile>
                                            <v-list-tile-content>
                                                <v-list-tile-title>
                                                    <v-btn href="{{ url('/home') }}" class="animated fadeIn slower deep-orange--text text--accent-3" flat>Home</v-btn>
                                                </v-list-tile-title>
                                            </v-list-tile-content>
                                        </v-list-tile>
                                    @else
                                        <v-list-tile>
                                            <v-list-tile-content>
                                                    <v-list-tile-title>
                                                        <a href="{{ route('login') }}" class="animated fadeIn slower deep-orange--text text--accent-3" flat>Login</a>
                                                    </v-list-tile-title>
                                            </v-list-tile-content>
                                        </v-list-tile> 
                                    @if (Route::has('register'))
                                        <v-list-tile>
                                            <v-list-tile-content>
                                                    <v-list-tile-title>
                                                        <a href="{{ route('register') }}" class="animated fadeIn slower deep-orange--text text--accent-3">Sign Up</a>
                                                    </v-list-tile-title>
                                            </v-list-tile-content>
                                        </v-list-tile>
                                    @endif
                                @endauth
                            @endif  
                            </v-list>
                        </v-menu>
                </v-toolbar>
    
                <v-content>
                    <section class="wrap">
                        <v-parallax src="{{ asset('assets/hero.jpg') }}" height="800">
                            <v-layout column align-center justify-center class="white--text">
                                {{--   display-3 text-center --}}
                                    <div class="animated fadeIn slower banner-text mb-2 white--text">PocketTrainer</div>
                                    <div class="animated fadeInLeft slower delay-2s subheading font-weight-bold display-3 white--text text--accent-2 mb-8 text-center">Achieve Your Fitness Goals</div>
                                    <v-btn class="animated fadeIn slower delay-3s mt-8" color="deep-orange accent-4" dark large href="{{ route('register') }}">
                                        Start Training
                                    </v-btn>

                            </v-layout>
                        </v-parallax>
                    </section>

                    <section>
                        <v-layout column wrap class="my-12 grey darken-4" align-center>
                            <v-flex xs12 sm4 class="my-4">
                                <div class="text-center">
                                    <h2 class="deep-orange--text text--accent-3">Keep Yourself on track to maximize your fitness goals</h2>
                                    <span class="subheading grey--text text--lighten-2">
                                        Cras facilisis mi vitae nunc
                                    </span>
                                </div>
                            </v-flex>
                                <v-flex xs12>
                                    <v-container grid-list-xl>
                                        <v-layout row wrap align-center>
                                        <v-flex xs12 md4>
                                            <v-card flat class="transparent">
                                            <v-card-text class="text-center">
                                                <v-icon x-large class="deep-orange--text text--accent-3">mdi-dumbbell</v-icon>
                                            </v-card-text>
                                            <v-card-title primary-title class="layout justify-center">
                                                <div class="headline deep-orange--text text--accent-3 text-center">Build your daily workout plan</div>
                                            </v-card-title>
                                            <v-card-text class="grey--text text--lighten-2">
                                                Cras facilisis mi vitae nunc lobortis pharetra. Nulla volutpat tincidunt ornare.
                                                Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                                                Nullam in aliquet odio. Aliquam eu est vitae tellus bibendum tincidunt. Suspendisse potenti.
                                            </v-card-text>
                                            </v-card>
                                        </v-flex>
                                        <v-flex xs12 md4>
                                            <v-card flat class="transparent">
                                            <v-card-text class="text-center">
                                                <v-icon x-large class="deep-orange--text text--accent-3">mdi-calendar-repeat</v-icon>
                                            </v-card-text>
                                            <v-card-title primary-title class="layout justify-center">
                                                <div class="headline deep-orange--text text--accent-3 text-center">Keep track of your weekly routine</div>
                                            </v-card-title>
                                            <v-card-text class="grey--text text--lighten-2">
                                                Cras facilisis mi vitae nunc lobortis pharetra. Nulla volutpat tincidunt ornare.
                                                Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                                                Nullam in aliquet odio. Aliquam eu est vitae tellus bibendum tincidunt. Suspendisse potenti.
                                            </v-card-text>
                                            </v-card>
                                        </v-flex>
                                        <v-flex xs12 md4>
                                            <v-card flat class="transparent">
                                            <v-card-text class="text-center">
                                                <v-icon x-large class="deep-orange--text text--accent-3">mdi-watch-import-variant</v-icon>
                                            </v-card-text>
                                            <v-card-title primary-title class="layout justify-center">
                                                <div class="headline deep-orange--text text--accent-3 text-center">Track your progress</div>
                                            </v-card-title>
                                            <v-card-text class="grey--text text--lighten-2">
                                                Cras facilisis mi vitae nunc lobortis pharetra. Nulla volutpat tincidunt ornare.
                                                Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                                                Nullam in aliquet odio. Aliquam eu est vitae tellus bibendum tincidunt. Suspendisse potenti.
                                            </v-card-text>
                                            </v-card>
                                        </v-flex>
                                        </v-layout>
                                    </v-container>
                                </v-flex>
                            </v-layout>
                        </section>

                        
                        <section>
                            <v-parallax src="assets/hero.jpg" height="380">
                                <v-layout column align-center justify-center>
                                    <div class="headline white--text grey--text text--lighten-2 mb-4 text-center">Consistency has never been easier</div>
                                    <em>Kick-start your gym plan</em>
                                    <v-btn class="mt-12" color="deep-orange accent-4" dark large href="{{ route('register') }}">
                                        Get Started
                                    </v-btn>
                                </v-layout>
                            </v-parallax>
                        </section>


                        <v-footer color="grey darken-4" dark height="100">
                            <v-layout column align-center justify-center>
                                <div class="headline white--text mb-4 text-center">Contact Me</div>
                                    <v-layout row wrap>
                                        <v-flex>
                                            <v-btn href="https://www.linkedin.com/in/ben-wozak/" ripple flat>
                                                <v-icon x-large class="deep-orange--text text--accent-3" >mdi-linkedin-box</v-icon>
                                            </v-btn>
                                            <v-btn href="https://github.com/benWozak" ripple flat>
                                                <v-icon x-large class="deep-orange--text text--accent-3" >mdi-github-circle</v-icon>
                                            </v-btn>
                                            <v-btn href="benwozak@gmail.com" ripple flat>
                                                <v-icon x-large class="deep-orange--text text--accent-3" >mdi-at</v-icon>
                                            </v-btn>        
                                        </v-flex>
                                    </v-layout>
                            </v-layout>
                        </v-footer>

                </v-content>
            </v-app>
       </div>

       <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
