var AjaxRequests = {
    items: new Array, 

    delete: function(id) {
        var items = AjaxRequests.items;
        $.ajax({
            type: 'POST',
            url: 'reduce-all/' + id,
            success: function(data){
                $('#shopcircle').html(data.totalQty);
                $('#cart p.qty span').html(data.totalQty);
                $('#cart p.prc span').html(data.totalPrice);
                if(! data.items[parseInt(id)]) {
                    $('li.'+ id).remove();
                }
                if(data.totalQty == 0){
                    $('#shopcircle').hide();
                    $('#cart .modal-content').html('<a class="list-group-item" onclick="AjaxRequests.closeCart();">Nemate predmeta u korpi<span class="pull-right close">&times;</span></a>');
                    $('span.close').click(function(){
                        $('#cart').toggle();
                    })
                } 
            }
        });
    },

    reduce: function(id) {
        var items = AjaxRequests.items;

        $.ajax({
            type: 'POST',
            url: 'reduce-one/' + id,
            success: function(data) {
                $('#shopcircle').html(data.totalQty);
                $('#cart p.qty span').html(data.totalQty);
                $('#cart p.prc span').html(data.totalPrice);
                if(! data.items[parseInt(id)]) {
                    $('li.'+ id).remove();
                } else {
                    $('#smQty-'+ id).html(data.items[parseInt(id)]['qty']);
                }
                if(data.totalQty == 0){
                    $(this).parent('li').remove();
                    $('#shopcircle').hide();
                    $('#cart .modal-content').html('<a class="list-group-item" onclick="AjaxRequests.closeCart();">Nemate predmeta u korpi<span class="pull-right close">&times;</span></a>');
                    $('span.close').click(function(){
                        $('#cart').toggle();
                    })
                } 
            }
        });
    },

    add: function(id) {
        var items = AjaxRequests.items;
        $.ajax({
            type: 'post',
            url: 'add-to-cart/' + id,
            success: function(data){
                AjaxRequests.setDataCart(data);
            }
        })

        if($('#cart').css('display', 'block')){
            $('.close').click(function(){
                $('#cart').hide();
            })
        } 
    },

    getDataForCart: function() {
        $.ajax({
            type: 'get',
            url: 'shopping-cart',
            success: function(data)
            {
                AjaxRequests.setDataCart(data);
                $('#cart').fadeIn();
            }
        })
    },

    checkoutGet: function() {
        $('#cart').fadeOut();
        $.ajax({
            type: 'GET',
            url: 'checkout',
            success: function() {
                $('#checkout').fadeIn();
                $('#checkout .modal-content').html($('#chck').html());
                $('span.close').click(function(){
                    $('#checkout').fadeOut();
                })
            }
        })
    },

    checkoutPost: function() {
        e.preventDefault();
        $('#shopcircle').show();
        $.get($(this).attr('href'), function(data){
            $('#shopcircle').html(data.totalQty);
        });
    },

    closeCart: function() {
        $('#cart').fadeOut();
    },

    setDataCart: function(data) {
        var items = AjaxRequests.items;
         if(data.totalQty == undefined || data.totalQty == 0){
            $('#cart .modal-content').html('<a class="list-group-item" onclick="AjaxRequests.closeCart();">Nemate predmeta u korpi<span class="pull-right close">&times;</span></a>');
        } else {
            $('#shopcircle').html(data.totalQty);
            $('#cart p.qty span').html(data.totalQty);
            $('#cart p.prc span').html(data.totalPrice);

            var close = '<div class="modal-header">Korpa<span class="pull-right close" onclick="AjaxRequests.closeCart();">&times;</span></div>';
            var total = '<div class="modal-footer">' +
                        '<p class="qty">Ukupno predmeta: <span>' + data.totalQty + '</span></p>' +
                        '<p class="prc">Ukupna cena: <span>' + data.totalPrice + '</span></p>' +
                        '</div>';
            var btn = '<button onclick="AjaxRequests.checkoutGet();" class="btn btn-default checkout">NARUCI</button>';
            $.each(data.items, function(k, v){
                items += '<li class="list-group-item '+ k +'"><span class="badge pull-left">Kol: <span id="smQty-'+ k +'">' + v.qty + '</span></span>' +
                        '<a onclick="AjaxRequests.reduce('+k+');" class="badge reduce pull-left btn">&minus;</a>' +
                        '<a onclick="AjaxRequests.add('+k+');" class="badge add pull-left btn">&plus;</a>' + 
                        v.item.name + 
                        '<a class="remove pull-right" onclick="AjaxRequests.delete('+k+');" href="#">&nbsp;&nbsp;<strong> &times;</strong></a>' +
                        '<span class="label label-success pull-right">' + v.price + '</span>' +
                        '</li>';
            })
        
            $('#cart .modal-content').html(close + items + total + btn);
        }
    },
}

$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }); 
})