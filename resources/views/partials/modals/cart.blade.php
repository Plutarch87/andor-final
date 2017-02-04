<div class="modal" id="cart">    
    <div class="modal-content">        
        <div class="list-group" id="cartModal">
            
        </div>    
    </div>
</div>
<div class="modal" id="checkout">    
    <div class="modal-content">        
        <div class="list-group" id="chck">
            <div class="modal-header">
                <h1>Vasi Podaci<span class="pull-right close" onclick="AjaxRequests.closeCart();">&times;</span></h1>
            </div>
            {{ Form::open(['action' => ['CartController@postCheckout'], 'role' => 'form', 'id' => 'checkout-form']) }}
		        {{ Form::token() }}
                @include('partials.forms.order')
            {{ Form::close() }}
        </div>    
    </div>
</div>
