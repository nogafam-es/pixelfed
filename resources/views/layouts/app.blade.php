<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="mobile-web-app-capable" content="yes">

    <title>{{ $title ?? config('app.name', 'Laravel') }}</title>
    <link rel="manifest" href="/manifest.json">

    <meta property="og:site_name" content="{{ config('app.name', 'pixelfed') }}">
    <meta property="og:title" content="{{ $title ?? config('app.name', 'pixelfed') }}">
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{request()->url()}}">
    @stack('meta')

    <meta name="medium" content="image">
    <meta name="theme-color" content="#10c5f8">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="shortcut icon" type="image/png" href="/img/favicon.png?v=2">
    <link rel="canonical" href="{{request()->url()}}">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" data-stylesheet="light">
    @stack('styles')

</head>
<body class="{{Auth::check()?'loggedIn':''}}">
    @include('layouts.partial.nav')
    <main id="content">
        @yield('content')
    </main>
    @include('layouts.partial.footer')
    <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
    <script type="text/javascript" src="{{ mix('js/components.js') }}"></script>
    @stack('scripts')
    @if(Auth::check())
  <div class="d-block d-sm-none fixed-bottom">
    <div class="float-right m-3">
      <button class="bg-primary rounded-circle text-white box-shadow border-0" data-toggle="modal" data-target="#composeModal" style="width:60px;height: 60px;"><i class="fas fa-plus fa-2x mb-0"></i></button>
    </div>
  </div>
    <div class="modal" tabindex="-1" role="dialog" id="composeModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          @include('timeline.partial.new-form')
        </div>
      </div>
    </div>
    @endif
</body>
</html>
