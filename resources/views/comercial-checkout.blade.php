@extends('layouts.comercial-frontend')

@section('title')
    Checkout
@endsection

@section('content')
    <!--main area-->
	<main id="main" class="main-site">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="#" class="link">home</a></li>
					<li class="item-link"><span>login</span></li>
				</ul>
			</div>
			<div class=" main-content-area">
				<div class="wrap-address-billing">
					<h3 class="box-title">Billing Address</h3>
					<form action="#" method="POST" name="frm-billing">
						<p class="row-in-form">
							<label for="fname">first name<span>*</span></label>
							<input id="fname" type="text" name="firstname" value="{{ $user->firstname }}" placeholder="Your name">
						</p>
						<p class="row-in-form">
							<label for="lname">last name<span>*</span></label>
							<input id="lname" type="text" name="lastname" value="{{ $user->lastname }}" placeholder="Your last name">
						</p>
						<p class="row-in-form">
							<label for="email">Email Addreess:</label>
							<input id="email" type="email" name="email" value="{{ $user->email }}" placeholder="Type your email">
						</p>
						<p class="row-in-form">
							<label for="phone">Phone number<span>*</span></label>
							<input id="phone" type="number" name="phone" value="{{ $user->phone }}" placeholder="10 digits format">
						</p>
						<p class="row-in-form">
							<label for="add">Address:</label>
							<input id="add" type="text" name="adress" value="{{ $user->adress }}" placeholder="Street at apartment number">
						</p>
						<p class="row-in-form">
							<label for="country">Country<span>*</span></label>
							<input id="country" type="text" name="country" value="{{ $user->country }}" placeholder="United States">
						</p>
						<p class="row-in-form">
							<label for="zip-code">Postcode / ZIP:</label>
							<input id="zip-code" type="number" name="postcode" value="{{ $user->postcode }}" placeholder="Your postal code">
						</p>
						<p class="row-in-form">
							<label for="city">Town / City<span>*</span></label>
							<input id="city" type="text" name="city" value="{{ $user->city }}" placeholder="City name">
						</p>
						{{-- <p class="row-in-form fill-wife">
							<label class="checkbox-field">
								<input name="create-account" id="create-account" value="forever" type="checkbox">
								<span>Create an account?</span>
							</label>
							<label class="checkbox-field">
								<input name="different-add" id="different-add" value="forever" type="checkbox">
								<span>Ship to a different address?</span>
							</label>
						</p> --}}
					</form>
				</div>
				<div class="summary summary-checkout">
					<div class="summary-item payment-method">
						<h4 class="title-box">Payment Method</h4>
						<p class="summary-info"><span class="title">Check / Money order</span></p>
						<p class="summary-info"><span class="title">Credit Cart (saved)</span></p>
						{{-- <div class="choose-payment-methods">
							<label class="payment-method">
								<input name="payment-method" id="payment-method-bank" value="bank" type="radio">
								<span>Direct Bank Transder</span>
								<span class="payment-desc">But the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable</span>
							</label>
							<label class="payment-method">
								<input name="payment-method" id="payment-method-visa" value="visa" type="radio">
								<span>visa</span>
								<span class="payment-desc">There are many variations of passages of Lorem Ipsum available</span>
							</label>
							<label class="payment-method">
								<input name="payment-method" id="payment-method-paypal" value="paypal" type="radio">
								<span>Paypal</span>
								<span class="payment-desc">You can pay with your credit</span>
								<span class="payment-desc">card if you don't have a paypal account</span>
							</label>
						</div> --}}
                        {{-- @foreach ($cart as $carts)

                        <p>{{ $carts->product->name}}</p>
                        @endforeach --}}
                        {{-- @dd($carts) --}}
                        @php
                            $total = 0
                        @endphp
                        @foreach ($cart as $carts)
                        @php
                            // $product = App\Models\Product::find($carts->id);
                            $total = $total + $carts->product->price * $carts->prod_qty
                        @endphp
                            {{-- <p>{{ $carts->product->price }}</p> --}}
                        @endforeach
						<p class="summary-info grand-total"><span>Grand Total</span> <span class="grand-total-price">Rp. {{ $total }}</span></p>
						<a href="{{ route('order-payment') }}" class="btn btn-medium"
                            onclick="event.preventDefault();
                            document.getElementById('order-payment').submit();"
                            >Place Order In COD
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                            <input type="hidden" name="" value="{{ $total }}">
                            <input type="hidden" name="" value="{{ $user->id }}">
                            <input type="hidden" name="" value="{{ $total }}">
                            <input type="hidden" name="" value="{{ $total }}">
                        </form>
                            <hr>
                        <button class="btn btn-medium" id="pay-button">Bayar Dengan Mid-Trans</button>

                        <script type="text/javascript"
                        src="https://app.sandbox.midtrans.com/snap/snap.js"
                        data-client-key="SB-Mid-client-ENZ7pixlAw-XO53s"></script>
                        <script type="text/javascript">
                            var payButton = document.getElementById('pay-button');
                            payButton.addEventListener('click', function () {
                                snap.pay('<?=$snapToken ?>');
                            });

                            snap.pay('<?=$snapToken ?>', {
                            onSuccess: function(result){console.log('success');console.log(result);},
                            onPending: function(result){console.log('pending');console.log(result);},
                            onError: function(result){console.log('error');console.log(result);},
                            onClose: function(){console.log('customer closed the popup without finishing the payment');}
                            })
                        </script>
                    </div>
					{{-- <div class="summary-item shipping-method">
						<h4 class="title-box f-title">Shipping method</h4>
						<p class="summary-info"><span class="title">Flat Rate</span></p>
						<p class="summary-info"><span class="title">Fixed $50.00</span></p>
						<h4 class="title-box">Discount Codes</h4>
						<p class="row-in-form">
							<label for="coupon-code">Enter Your Coupon code:</label>
							<input id="coupon-code" type="text" name="coupon-code" value="" placeholder="">
						</p>
						<a href="#" class="btn btn-small">Apply</a>
					</div> --}}
				</div>

				{{-- <div class="wrap-show-advance-info-box style-1 box-in-site">
					<h3 class="title-box">Most Viewed Products</h3>
					<div class="wrap-products">
						<div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="assets/images/products/digital_04.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="group-flash">
										<span class="flash-item new-label">new</span>
									</div>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
									<div class="wrap-price"><span class="product-price">$250.00</span></div>
								</div>
							</div>

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="assets/images/products/digital_17.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="group-flash">
										<span class="flash-item sale-label">sale</span>
									</div>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
									<div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
								</div>
							</div>

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="assets/images/products/digital_15.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="group-flash">
										<span class="flash-item new-label">new</span>
										<span class="flash-item sale-label">sale</span>
									</div>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
									<div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
								</div>
							</div>

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="assets/images/products/digital_01.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="group-flash">
										<span class="flash-item bestseller-label">Bestseller</span>
									</div>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
									<div class="wrap-price"><span class="product-price">$250.00</span></div>
								</div>
							</div>

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="assets/images/products/digital_21.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
									<div class="wrap-price"><span class="product-price">$250.00</span></div>
								</div>
							</div>

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="assets/images/products/digital_03.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="group-flash">
										<span class="flash-item sale-label">sale</span>
									</div>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
									<div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
								</div>
							</div>

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="assets/images/products/digital_04.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="group-flash">
										<span class="flash-item new-label">new</span>
									</div>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
									<div class="wrap-price"><span class="product-price">$250.00</span></div>
								</div>
							</div>

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="assets/images/products/digital_05.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="group-flash">
										<span class="flash-item bestseller-label">Bestseller</span>
									</div>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
									<div class="wrap-price"><span class="product-price">$250.00</span></div>
								</div>
							</div>
						</div>
					</div><!--End wrap-products-->
				</div> --}}

			</div><!--end main content area-->
		</div><!--end container-->

	</main>
	<!--main area-->
@endsection
