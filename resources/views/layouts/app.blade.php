<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8 ">
<!-- MAPA -->
{{-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDhu-orOCU7_qwFx5zr-M4nnGbWrue0PJI" type="text/javascript"></script> --}}
<!-- Styles -->
{!! Html::style('assets/bootstrap.min.css') !!}
{!! Html::style('assets/css/style.css') !!}
{!! Html::style('assets/css/flex.css') !!}
{!! Html::style('assets/css/media-width.css') !!}
{!! Html::style('https://fonts.googleapis.com/css?family=Lobster') !!}

@stack('styles')

    <title>Hexor - @yield('title')</title>
</head>
<body>
<header>
    <div class="logo-wrapper">
        <h1 id="logo">Welcome to <em class="yw">Hexxor</em></h1>
    </div>
{{-- CAROUSEL --}}
@include('partials.carousel')
{{-- END --}}
<section>       
<!-- NAVBAR -->
<nav id="main" class="top">            
    <ul>                    
        <li>
            <a data-toggle="modal" href="#kontaktModal" id="kontaktM">Kontakt</a>
        </li>
        <li>
            <a href="#main">Products</a>
                <ul>
                @if(count($categories) > 0)
                    @foreach ($categories as $category)
                        <li class="category">
                            <a href="{{ route('kategorije.show', $category->slug) }}#main">{{ $category->name }}</a>
                            
                        {{-- DELETE CATEGORY --}}
                            @if(Auth::check())
                                @include('partials.forms.delete', ['route' => 'categories.destroy', 'id' => $category->id])                                  
                            @endif
                        </li>
                    @endforeach
                @endif
                
                @if(Auth::check())
                    <li>
                        {!! Form::open(['route' => 'categories.store']) !!}
                        {!! Form::text('name', null, ['style' => 'width:100%']) !!}
                    </li>
                    <li>
                        {!! Form::submit('Dodaj Kategoriju', ['class' => 'btn-xs btn-danger']) !!}
                        {!! Form::close() !!}
                    </li>                
                @endif
                </ul>
        </li>
        <li class="shopingwrapper"><a href="{{ route('item.showCart') }}"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span><span id="shopcircle" class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : null }}</span></a></li>
    </ul>                       
</nav>
    @yield('content')           
@include('partials.modals.contact')
@include('partials.modals.cart')

</body>
<!-- SCRIPTS -->
{!! Html::script('assets/jquery-1.12.0.min.js') !!}
{!! Html::script('assets/index.js') !!}
{!! Html::script('assets/bootstrap/js/bootstrap.min.js') !!}
{!! Html::script('assets/js/cart.js') !!}
@stack('scripts')

</html>