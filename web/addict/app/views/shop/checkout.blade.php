@include('../header')
<div id="container-padding">
</div>
<style>
#shop-welcome{

}
#shop-welcome p{
	max-width:700px;
	margin-bottom:10px;
}

#shop-item-container
{
	
}

#shop-item-container .item-box #item-header
{
	height:50px;
	background-color:rgb(139, 134, 134)
	
}
#shop-item-container .item-box #item-header .item-info
{
	line-height:45px;
	font-size:16px;
}
#shop-item-container .item-box
{
	width:100%;
	height:auto;
	border: solid 1px #ccc;
	margin-bottom:20px;
}

#shop-item-container .item-box .item-wrapper
{
	padding:10px 0;
	border-bottom: dotted 1px #ccc;
}
#shop-item-container .item-box .item-wrapper .items
{
	line-height:35px;
}

.addminus
{
	font-size:11px;
}
.quantity
{
	max-width:35px;
	display:inline-block;
}
</style>
<script>
$('#hideme').hide();
$('#showme').show();
$( "#rightnav-container" ).animate({
	right: "-300px",
}, 0, function() {
	// Animation complete.
});
		
$( "#showme, #hideme" ).animate({
	right: "0",
}, 0, function() {
	// Animation complete.
});
		

</script>
<div class="container" id="main-container">
	<div id="shop-welcome">
		<h1>MU Philippines Online Shopping</h1>
		<p>Mu Philippines is a free to play MMORPG. But in case you want to purchases coins and some items, you may use this page.</p>
		<p>All payments will be used in maintaining our server such as electricity, internet connection, dedicated server payments, GMs and administrator payments (ofcourse we got bills to pay).</p>
		<p>All payments are non refundable and you agree to our terms and services</p>
		<h3>Please review the details below before proceeding. All transaction beyond this is final</h3>
	</div>
	
	<div id="shop-item-container">
		<div class="item-box">
			<div class="row" id="item-header">
				<div class="col-md-2 item-info">Product Name</div>
				<div class="col-md-4 item-info">Product Description</div>
				<div class="col-md-2 item-info">Price</div>
				<div class="col-md-2 item-info">Quantity</div>
				<div class="col-md-1 item-info">Total</div>
				<div class="col-md-1 item-info">Add/Remove</div>
			</div>
			<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
			<input type="hidden" name="cmd" value="_cart">
			<input type="hidden" name="upload" value="1">
			<input type="hidden" name="business" value="hunks25@gmail.com">
			@if(empty($shoppingitems))
			<h1>Your shopping cart is empty!</h1>
			<p> Add item <a href="{{ URL::to('/') }}/shop">here</a>
			@else
			@foreach($shoppingitems as $key => $item)
			
			<div class="row item-wrapper" id="{{$item->id}}-{{$itemid[$key]}}" price="{{$item->itemprice }}">
				<div class="col-md-2 items">{{$item->itemlist}}</div>
				<div class="col-md-4 items">{{$item->itemdescription}}</div>
				<div class="col-md-2 items">{{number_format($item->itemprice)}} PHP</div>
				<div class="col-md-2 items">
					<input class="form-control quantity" type="text" value="{{$itemcount[$key]}}"> 
					<a href="javascript:void(0)"><span class="glyphicon glyphicon-plus addminus addme">&nbsp;</span></a>
					<a href="javascript:void(0)"><span class="glyphicon glyphicon-minus addminus minusme">&nbsp;</span></a>
				</div>
				<div class="col-md-1 items totalpice">{{$itemprice[$key]}}</div>
				<div class="col-md-1 buttons">
					<a href="javascript:void(0)" class="removeme" id="cart-{{$itemid[$key]}}">Remove</a>
					<span style="display:none;" id="showme{{$itemid[$key]}}">Removing.. <img src="{{ URL::to('/') }}/img/loading-spin.svg"></span>
				</div>
				<input type="hidden" id="item_name_{{$item->id}}" name="item_name_{{$key+1}}" value="{{$item->itemlist}}">
				<input type="hidden" id="amount_{{$item->id}}" name="amount_{{$key+1}}" value="{{$item->itemprice}}">
				<input type="hidden" id="quantity_{{$item->id}}" name="quantity_{{$key+1}}" value="{{$itemcount[$key]}}">
			</div>
			@endforeach
			@endif
			<input type="hidden" name="notify_url" value="{{ URL::to('/') }}/shop/my_ipn">
			<input type="hidden" name="return" value="{{ URL::to('/') }}/shop/checkout/complete">
			<input type="hidden" name="rm" value="2">
			<input type="hidden" name="cbt" value="Return to store">
			<input type="hidden" name="cancel_return" value="{{ URL::to('/') }}/shop/checkout/cancel">
			<input type="hidden" name="lc" value="PH">
			<input type="hidden" name="currency_code" value="PHP">
			@if(!empty($shoppingitems))
			<div style="max-width:150px; text-align:right;margin:20px; float:right">
				<p>Checkout With</p>
				<input type="image" src="http://beta.cambridgesdachurch.co.uk/wp-content/uploads/2014/06/paypal-donate-21.png?w=300" style="width:100%">
			</div>
			@endif
			</form>
			<div style="clear:both"></div>
		</div>
	</div>
</div>

<script>

$(function(){
	//add
	$(document).on('click', '.addme', function(){
		items = $(this);
		var itemid = items.parent().parent().parent().attr('id');
		var itemprice = items.parent().parent().parent().attr('price');
		var currentquantity = $('#'+itemid +'  .quantity').val();
		var totalquantity = parseInt(currentquantity) + 1;
		$('#'+itemid +'  .quantity').val(totalquantity);
		$('#quantity_' + itemid).val(totalquantity);
		var currenttotalprice = $('#'+itemid +'  .totalpice').text();
		$('#'+itemid +'  .totalpice').html(parseInt(currenttotalprice) + parseInt(itemprice));
		console.log(itemid);
		console.log(itemprice);
		console.log(totalquantity);
		
		if(currentquantity >= 0){
			$('#item_name_' + itemid).prop('disabled', false);
			$('#amount_' + itemid).prop('disabled', false);
			$('#quantity_' + itemid).prop('disabled', false);
		}else{
			$('#item_name_' + itemid).prop('disabled', true);
			$('#amount_' + itemid).prop('disabled', true);
			$('#quantity_' + itemid).prop('disabled', true);
		}
	});
	//minus
	$(document).on('click', '.minusme', function(){
		items = $(this);
		var itemid = items.parent().parent().parent().attr('id');
		var itemprice = items.parent().parent().parent().attr('price');
		var currentquantity = $('#'+itemid +'  .quantity').val();
		var totalquantity = parseInt(currentquantity) - 1;
		if(currentquantity > 1){
			$('#'+itemid +'  .quantity').val(totalquantity);
			$('#quantity_' + itemid).val(totalquantity);
			
			var currenttotalprice = $('#'+itemid +'  .totalpice').text();
			$('#'+itemid +'  .totalpice').html(parseInt(currenttotalprice) - parseInt(itemprice));
		}
		console.log(itemid);
		if(currentquantity >= 1){
			$('#item_name_' + itemid).prop('disabled', false);
			$('#amount_' + itemid).prop('disabled', false);
			$('#quantity_' + itemid).prop('disabled', false);
		}else{
			$('#item_name_' + itemid).prop('disabled', true);
			$('#amount_' + itemid).prop('disabled', true);
			$('#quantity_' + itemid).prop('disabled', true);
		}
	});
	
	/**
	*remove from cart
	*/
	
	$(document).on('click', '.removeme', function(e){
		var c = confirm('Really? Delete this item?');
		if(c == true){
			$(this).hide();
			var shopid = $(this).attr('id');
			shopid = shopid.replace('cart-', '');
			$('#showme'+shopid).show();
			console.log(shopid);
			var data = {
				cartnumber: shopid,
			}
			$.ajax({
				type: 'DELETE',
				url: '/shop/delete',
				data: data,
				success: function(data){
					if(data == 1){
						alert('Delete Successful!');
						location.reload();
					}else{
						
					}
				}
			});
		}else{
			
		}
		e.preventDefault();
	})
});
</script>
@include('footer')
@include('modal')
</body>
</html>