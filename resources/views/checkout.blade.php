<!doctype html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>Checkout</title>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css' rel='stylesheet'>
        <link href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="{{url('css/checkout.css')}}">
        <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js'></script>
    </head>
    <body className='snippet-body'>
        <div class="card">
            <div class="card-top border-bottom text-center">
                <a href="#">Back to shop</a>
            </div>
            <div class="card-body">
                <div class="row upper">
                    <span class="header">Checkout</span>
                </div>
                <div class="row">
                    <div class="col-md-7">
                        <div class="left border">
                            <div class="row upper">
                                <span class="header">Payment Details</span>
                                <div class="icons">
                                    <img src="https://img.icons8.com/color/48/000000/visa.png"/>
                                    <img src="https://img.icons8.com/color/48/000000/mastercard-logo.png"/>
                                    <img src="https://img.icons8.com/color/48/000000/maestro.png"/>
                                </div>
                            </div>
                            <form action="{{ route('checkout.place.order') }}" method="POST" role="form">
                                @csrf
                                <div class="mb-3">
                                    <label for="fname" class="form-label">Customers Name:</label>
                                    <input class="form-control" name="fname" id="fname" placeholder="{{Auth::user()->fname}} {{Auth::user()->lname}}">
                                </div>
                                <div class="mb-3">
                                    <label for="house_no" class="form-label">House no:</label>
                                    <input class="form-control" name="house_no" id="house_no" placeholder="{{Auth::user()->house_no}}">
                                </div>
                                <div class="mb-3">
                                    <div class="col-4">
                                        <label for="postal_code">Postal Code:</label>
                                        <input class="form-control" for="postal_code" name="postal_code" name="postal_code" placeholder="{{Auth::user()->postal_code}}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="email">Email:</label>
                                        <input class="form-control" for="email" name="email" placeholder="{{Auth::user()->email}}">
                                    </div>
                                </div>
                            
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="right border">
                            <div class="header">Order Summary</div> 
                        @if(isset($cart_data))
                         @if(Cookie::get('shopping_cart'))
                         @foreach ($cart_data as $data)

                            <div class="row item">
                                <div class="col-4 align-self-center">
                                    <img class="img-fluid" src="{{url('/images/'.$data['item_image'])}}">
                                </div>
                                <div class="col-8">
                                    <div class="row"><b>Price: ${{$data['item_price']}}</b></div>
                                    <div class="row"> Name: {{ $data['item_name'] }}</div>
                                    <div class="row"> Quantity: {{ $data['item_quantity'] }}</div>
                                </div>
                            </div>
                        @endforeach
                            <hr>
                            <div class="row lower">
                                <div class="col text-left">Total Items:</div>
                                <div class="col text-right">{{$itemCount}}</div>
                            </div>
                            <div class="row lower">
                                <div class="col text-left">Subtotal</div>
                                <div class="col text-right">${{$grandTotal}}</div>
                            </div>
                            <div class="row lower">
                                <div class="col text-left">Delivery</div>
                                <div class="col text-right">Free</div>
                            </div>
                            <div class="row lower">
                                <div class="col text-left"><b>Total to pay</b></div>
                                <div class="col text-right"><b>${{$grandTotal}}</b></div>
                            </div>
                            <button type="submit" class="btn btn-primary">Place Order</button>
                        </div>
                    </div>
                    </form>
                    @endif
                    @endif
                </div>
            </div>

            <div>
            </div>
        </div>
    </body>
</html>