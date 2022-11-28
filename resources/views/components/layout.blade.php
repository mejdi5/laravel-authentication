<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Auth</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="/style.css" />
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script> 
    </head>
    <body>
        @guest
        <div class="auth">
          <a href="/register">Register</a>
          <a href="/login">Login</a>
        </div>
        @endguest
        @auth 
        <div>
            <form action="/logout" method="POST">
                @csrf
                <button>Log Out</button>
            </form>
        </div>
        @endauth
        @if (session()->has('success'))
         <span class="flash-message" x-data="{show:true}" x-init="setTimeout(() => show = false, 3000)" x-show="show">
            {{session()->get('success')}}
        </span>
        @endif;
        {{$slot}}
    </body>
</html>
