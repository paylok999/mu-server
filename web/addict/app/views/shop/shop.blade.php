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
	</div>
	
	<div id="shop-item-container">
		<div class="item-box">
			<div class="row" id="item-header">
				<div class="col-md-2 item-info">Product Name</div>
				<div class="col-md-5 item-info">Product Description</div>
				<div class="col-md-2 item-info">Price</div>
				<div class="col-md-2 item-info">Quantity</div>
				<div class="col-md-1 item-info">Total</div>
				<!--<div class="col-md-1 item-info">Add/Remove</div>-->
			</div>
			<form action="/shop" method="post">
			@foreach($shoppingitems as $key => $item)
			<div class="row item-wrapper" id="{{$item->id}}" price="{{$item->itemprice }}">
				<div class="col-md-2 items">{{$item->itemlist}}</div>
				<div class="col-md-5 items">{{$item->itemdescription}}</div>
				@if($item->active == 1)
				<div class="col-md-2 items">{{number_format($item->itemprice)}} PHP</div>
				@else
				<div class="col-md-2 items">SOON!</div>
				@endif
				
				<div class="col-md-2 items">
				@if($item->active == 1)
					<input class="form-control quantity" type="text" value="0"> 
					<a href="javascript:void(0)"><span class="glyphicon glyphicon-plus addminus addme">&nbsp;</span></a>
					<a href="javascript:void(0)"><span class="glyphicon glyphicon-minus addminus minusme">&nbsp;</span></a>
				@endif
				</div>
				<input type="hidden" class="cartnumber" name="cartnumber[{{$item->id}}]" value="{{$item->id}}">
				<input type="hidden" class="cartcount" name="cartcount[{{$item->id}}]">
				<div class="col-md-1 items totalpice">@if($item->active == 1) 0 @endif</div>
			</div>
			@endforeach
			<div style="max-width:150px; text-align:right;margin:20px; float:right">
				<button class="btn btn-primary">Continue to Checkout</button>
			</div>
			</div>
			</form>
			<div style="clear:both"></div>
		</div>
	</div>
</div>

<script>
var cartnumber;

$(function(){
	//add
	$(document).on('click', '.addme', function(){
		items = $(this);
		var itemid = items.parent().parent().parent().attr('id');
		var itemprice = items.parent().parent().parent().attr('price');
		var currentquantity = $('#'+itemid +'  .quantity').val();
		var totalquantity = parseInt(currentquantity) + 1;
		$('#'+itemid +'  .quantity').val(totalquantity);
		$('#'+itemid +'  .cartcount').val(totalquantity);
		
		var currenttotalprice = $('#'+itemid +'  .totalpice').text();
		$('#'+itemid +'  .totalpice').html(parseInt(currenttotalprice) + parseInt(itemprice));
		console.log(itemid);
		//console.log(itemprice);
		//console.log(totalquantity);
		
	});
	//minus
	$(document).on('click', '.minusme', function(){
		items = $(this);
		var itemid = items.parent().parent().parent().attr('id');
		var itemprice = items.parent().parent().parent().attr('price');
		var currentquantity = $('#'+itemid +'  .quantity').val();
		var totalquantity = parseInt(currentquantity) - 1;
		if(currentquantity >=1){
			$('#'+itemid +'  .quantity').val(totalquantity);
			$('#'+itemid +'  .cartnumber').val(totalquantity);
			$('#'+itemid +'  .cartcount').val(totalquantity);
			var currenttotalprice = $('#'+itemid +'  .totalpice').text();
			$('#'+itemid +'  .totalpice').html(parseInt(currenttotalprice) - parseInt(itemprice));
		}
		console.log(itemid);
	});
	
	
	
});
</script>

@include('footer')
@include('modal')
</body>
</html>