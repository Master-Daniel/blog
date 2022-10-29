<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="js">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content=""/>
        <meta name="author" content=""/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>{{ config('app.name', 'Soft Delta') }}</title>
        <!-- StyleSheets  -->
        <link rel="stylesheet" href="{{ asset('assets/css/vendor.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/tagsinput.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/editors/tinymce.css') }}">
        <script src="{{ asset('assets/js/bundle.js') }}"></script>
        <script src="{{ asset('assets/js/scripts.js') }}"></script>
        <script src="{{ asset('assets/js/tagsinput.js') }}"></script>
        <script src="{{ asset('assets/js/libs/editors/tinymce.js') }}"></script>
        <style>
            #count{
                color:green;
                font-weight:bold;
                font-size:15px;
                font-family:arial;
                background-color:#D4FCF6;
                padding-left:5px;
            }
        </style>
    </head>
    <body class="nk-body bg-lighter npc-general has-sidebar ">
        <div class="nk-app-root">
            <div class="nk-main ">
                @yield('content')
            </div>
        </div>
        <div class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false" id="modal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                    <div class="modal-header">
                        <h5 id="value" class="modal-title">Modal Title</h5>
                    </div>
                    <div class="modal-body">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem similique earum necessitatibus nesciunt! Quia id expedita asperiores voluptatem odit quis fugit sapiente assumenda sunt voluptatibus atque facere autem, omnis explicabo.</p>
                    </div>
                    <div class="modal-footer bg-light">
                        <span class="sub-text">Modal Footer Text</span>
                    </div>
                </div>
            </div>
        </div>
        <audio id="myAudio">
            <source src="{{ asset('assets/notification_up.mp3') }}" type="audio/mp3">
        </audio>
        <script type="module" src="{{ asset('assets/js/custom/script.js') }}"></script>
    </body>
</html>
