@extends('layouts.app')

@section('title', $category->name)

@section('content')
    
    <h4>{{ strtoupper($category->name) }}
    @foreach($category->subcats as $subcat)
        <a href="{{ route('kategorije.potkategorije.show', [$category->slug, $subcat->slug]) }}#main">&gt;&nbsp;{{ $subcat->name }}</a>
    @endforeach
    <br></h4>
    @if(Auth::check())
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createItem">
            Napravi Predmet Za Ovu Kategoriju
        </button>
    @endif

    <h5>{{ $items->links() }}</h5>


{{-- MODAL --}}
<div id="createItem" class="modal">
<div class="modal-content">
    <div class="modal-header">
        <h4>Napravi Predmet</h4>
        <button class="close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body">            
        {!! Form::open(['files' => true, 'class' => 'form-horizontal', 'role' => 'form', 'route' => ['items.store']]) !!}
                @include('partials.forms.createUpdate', ['submitButton' => 'Napravi'])
        {!! Form::close() !!}
    </div>
</div>
</div>

<div class="site-wrap">
@foreach($items as $item)
    <div class="flex-item" id="{{ $item->name }}">
        <div class="img-wrapper">
            {!! Html::image('storage/andor/'.$item->img, $item->name, ['class' => 'imgItem', 'data-toggle' => 'modal', 'data-target' => '#item-modal'.$item->id]) !!}
            <div class="shopdiv">
                <div class="shophead">                    
                    <h4>{{ $item->name }}</h4>
                </div>
                <div class="shopbody">                    
                    @include('partials.modals.item')
                    @include('partials.ponuda')
                    <div class="price-tag">
                        <span>
                            <h4 id="{{ $item->name }}">{{ $item->price }}</h4>
                        </span>
                    </div>
                </div>
                    
                @if(Auth::check())                         
                    <a class="btn-sm btn-default" data-toggle="modal" href="#updateItem{{ $item->id }}">Izmeni</a>
                    {{--MODAL--}}
                    <div id="updateItem{{ $item->id }}" class="modal">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>Izmeni Predmet</h4>
                            <button class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">            
                            {!! Form::model( $item, ['files' => true, 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PUT', 'route' => ['items.update', $item->id]]) !!}
                                    @include('partials.forms.createUpdate', ['submitButton' => 'Unesi izmene'])
                            {!! Form::close() !!}
                        </div>
                    </div>
                    </div>
                    @include('partials.forms.delete', ['route' => 'items.destroy', 'id' => $item->id])
                @else
                    <a href="{{ route('item.addToCart', $item) }}#{{ $item->name }}" class="btn btn-success myShoppingCart"></a>
                @endif
                <button type="button" class="btn btn-danger">{{ $item->sifra }}</button>
            </div>
        </div>
    </div>
@endforeach
</div>

@endsection
