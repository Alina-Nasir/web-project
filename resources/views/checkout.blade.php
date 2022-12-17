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
                                <span class="header">Payment</span>
                                <div class="icons">
                                    <img src="https://img.icons8.com/color/48/000000/visa.png"/>
                                    <img src="https://img.icons8.com/color/48/000000/mastercard-logo.png"/>
                                    <img src="https://img.icons8.com/color/48/000000/maestro.png"/>
                                </div>
                            </div>
                            <form action="{{ route('checkout.place.order') }}" method="POST" role="form">
                            @csrf
                                <div class="mb-3">
                                    <label for="cardholder-name" class="form-label">Cardholder's Name:</label>
                                    <input class="form-control" name="cardholder-name" id="cardholder-name" placeholder="Faiz Kamal">
                                </div>
                                <div class="mb-3">
                                    <label for="card-nmbr" class="form-label">Card Number:</label>
                                    <input class="form-control" name="card-nmbr" id="card-nmbr" placeholder="0900 7860 1234 5678">
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <label for="expiry-date">Expiry date:</label>
                                        <input class="form-control" for="expiry-date" name="expiry-date" name="expiry-date" placeholder="YY/MM">
                                    </div>
                                    <div class="col-4">
                                        <label for="cvv">CVV:</label>
                                        <input class="form-control" for="cvv" name="cvv" name="cvv">
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="right border">
                            <div class="header">Order Summary</div>
                            <div class="row item">
                                <div class="col-4 align-self-center">
                                    <img class="img-fluid" src="https://xcdn.next.co.uk/common/items/default/default/itemimages/altitemzoom/407106s.jpg?im=Resize,width=364">
                                </div>
                                <div class="col-8">
                                    <div class="row"><b>$29.99</b></div>
                                    <div class="row text-muted">Knitted Polo Shirt</div>
                                    <div class="row">Qty:1</div>
                                </div>
                            </div>
                            <div class="row item">
                                <div class="col-4 align-self-center">
                                    <img class="img-fluid" src="https://xcdn.next.co.uk/common/items/default/default/itemimages/altitemzoom/407106s.jpg?im=Resize,width=364">
                                </div>
                                <div class="col-8">
                                    <div class="row"><b>$29.99</b></div>
                                    <div class="row text-muted">Knitted Polo Shirt</div>
                                    <div class="row">Qty:1</div>
                                </div>
                            </div>
                            <hr>
                            <div class="row lower">
                                <div class="col text-left">Subtotal</div>
                                <div class="col text-right">$ 59.98</div>
                            </div>
                            <div class="row lower">
                                <div class="col text-left">Delivery</div>
                                <div class="col text-right">Free</div>
                            </div>
                            <div class="row lower">
                                <div class="col text-left"><b>Total to pay</b></div>
                                <div class="col text-right"><b>$ 59.98</b></div>
                            </div>
                            <button type="submit" class="btn btn-primary">Place Order</button>
                        </div>
                    </div>
            </form>
                </div>
            </div>

            <div>
            </div>
        </div>
    </body>
</html>
