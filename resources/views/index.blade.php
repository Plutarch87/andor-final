@extends('layouts.app')

@section('title', 'Dobro dosli u Hexor')

@section('sidebar')
    @parent
@show

@section('content')

<div class="row">

@if(Session::has('success'))
    <div class="alert alert-success col-lg-8 col-md-6 fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>{{ Session::get('success') }}</strong>
    </div>
@endif    

<h5>{{ $items->links() }}</h5>

</div>

<div class="site-wrap">            
@foreach($items as $item)    
    <div class="flex-item" id="{{ $item->name }}">             
        <div class="img-wrapper">
            {!! Html::image('storage/andor/'.$item->img, $item->name, ['class' => 'imgItem', 'data-toggle' => 'modal', 'data-target' => '#item-modal'.$item->id]) !!}
            

                <div class="price-tag">            
                    {{ $item->price }}
                </div>
                <div class="name-tag">            
                    {{ $item->name }}
                </div>
                @include('partials.modals.item')            
                @include('partials.ponuda') 

        </div>
                <span class="sifra">{{ $item->sifra }}</span>                           
                @if(Auth::check())                
                    @include('partials.forms.delete', ['route' => 'items.destroy', 'id' => $item->id])
                @else
                    <button class="buy-btn"><a href="{{ route('item.addToCart', $item) }}#{{ $item->name }}" class="myShoppingCart">Kupi</a></button>
                @endif        
    </div>
@endforeach
</div>    
{{ $items->links() }}
</div>

@endsection
</div>