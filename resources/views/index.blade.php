@extends('layouts.app')

@section('title', 'Dobro dosli u Hexor')

@section('sidebar')
    @parent
@show

@section('content')

<div class="pagination-wrapper">

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
        <div class="name-tag">            
            <label title="{{ $item->name }}">{{ $item->name }}</label>
        </div>
        <div class="fix">        
        <div class="img-wrapper">
            {!! Html::image('storage/andor/'.$item->img, $item->name, ['class' => 'imgItem', 'data-toggle' => 'modal', 'data-target' => '#item-modal'.$item->id]) !!}
        </div>
            <div class="price-tag">            
                {{ $item->price }}
            </div>
        </div>
        @include('partials.modals.item')            
        @include('partials.ponuda')
        
        <div class="item-footer clearfix">
            <span class="sifra">{{ $item->sifra }}</span>                           
            @if(Auth::check())                
                @include('partials.forms.delete', ['route' => 'items.destroy', 'id' => $item->id])
            @else
            <span class="buy-btn myShoppingCart" id="{{ $item->id }}" onclick="AjaxRequests.add(this.id);">Kupi</span>
            @endif
        </div>
       
    </div>
@endforeach
</div>
</div>

@endsection
</div>