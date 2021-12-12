
@extends('/layouts.admin')

@section('extra-meta')
<meta name="csrf-token" content="{{csrf_token()}}">
<link rel="stylesheet" href="/assets/assets/css/bootstrap.min.css">
@endsection

@section('content')
    @if(Cart::count() > 0 )
        <div class="container"><br>
            @if(session('success'))
            <div class="alert alert-success">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">x</span></button>
                {{session('success')}}
            </div>
            @endif
            @if(session('danger'))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">x</span></button>
                {{session('danger')}}
            </div>
            @endif
            <h1>Mon panier</h1>
            <div class=" shaddow mbs-3" >
                <table class="table table-bordered table-hover bg-white mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Image</th>
                            <th>Nom produit</th>
                            <th>Prix</th>
                            <th>Quantité</th>
                            <th>Total</th>
                            <th>Opérations</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(Cart::content() as $plat)
                            <tr>
                                <td><img src="{{asset('/storage/img/plats/'.$plat->model->photo)}}" alt="" width="62"
                                        height="62" class="img-responsive">
                                </td>
                                <td>
                                    <strong><a href="" title="Afficher le produit">{{ $plat->model->plats->Nom_Ligns
                                            }}</a></strong>
                                </td>
                                <td>{{$plat->model->plats->getPrice()}}  </td>
                                <td>
                                    <select style="width: 100px" id="qty" data-id="{{$plat->rowId}}" name="qty"
                                        class="custom-select">
                                        @for ($i =1 ;$i <= 10 ; $i++) 
                                            <option value="{{ $i }}" {{ $plat->qty == $i ? 'selected': ''}}>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </td>
                                <?php  $total_commande = $plat->model->plats->getPrice() ;?>
                                <td>{{  $plat->model->plats->Prix_Plat * $plat->qty }} MRU</td>
                                <td>
                                    <form method="POST" action="{{ route('cart.destroy',$plat->rowId) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger"
                                            title="Retirer le produit du panier">Retirer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                            <tr colspan="2">
                                <td colspan="4">Total général</td>
                                <td colspan="2">
                                    <!-- On affiche total général -->
                                    <strong>{{Cart::subtotal()}} MRU</strong>
                                </td>
                            </tr>
                    </tbody>
                </table>
            </div>
            <a class="btn btn-danger" href="{{route('vide.panier')}}" title="Retirer tous les produits du panier">Vider le
                panier</a>
            <br>
        </div>
        <div class=" container-fluid my-5 ">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card border-0 ">
                        <div class="card-header card-2">
                            <h1 class="card-text  mt-md-4 mb-2 space">Détail de la commande
                            </h1>
                            
                        </div>
                        <div class="card-body pt-0">
                            @foreach(Cart::content() as $plat)
                                <div class="row justify-content-between">
                                    <div class="col-auto col-md-7">
                                        <div class="media flex-column flex-sm-row">
                                            <img class=" img-fluid" src="{{asset('/storage/img/plats/'.$plat->model->photo)}}"
                                                width="62" height="62">
                                            <div class="media-body my-auto">
                                                <div class="row ">
                                                    <div class="col-auto">
                                                        <p class="mb-0"><b> {{ $plat->model->plats->Nom_Ligns }}</b></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" pl-0 flex-sm-col col-auto my-auto">
                                        <p class="boxed-1">{{ $plat->qty }}</p>
                                    </div>
                                    <div class=" pl-0 flex-sm-col col-auto my-auto ">
                                        <p><b>{{ $plat->model->plats->Prix_Plat }} MRU </b></p>
                                    </div>
                                </div>
                                <hr class="my-2">
                            @endforeach
                            <div class="row ">
                                <div class="col">
                                    <div class="row justify-content-between">
                                        <div class="col-4">
                                            <p class="mb-1"><b>Sous total</b></p>
                                        </div>
                                        <div class="flex-sm-col col-auto">
                                            <p class="mb-1"><b>{{ Cart::subtotal() }} MRU </b></p>
                                        </div>
                                    </div>
                                    <div class="row justify-content-between">
                                        <div class="col">
                                            <p class="mb-1"><b>Tax</b></p>
                                        </div>
                                        <div class="flex-sm-col col-auto">
                                            <p class="mb-1"><b>{{Cart::tax()}} MRU  </b></p>
                                        </div>
                                    </div>
                                    <div class="row justify-content-between">
                                        <div class="col-4">
                                            <p><b>Total</b></p>
                                        </div>
                                        <div class="flex-sm-col col-auto">
                                            <p class="mb-1"><b>{{Cart::total()}} MRU </b></p>
                                        </div>
                                    </div>
                                    <hr class="my-0">
                                </div>
                            </div>
                            <div class="row mb-5 mt-4 ">
                                <a href="{{route('chekout.index')}}" type="submit"
                                    class="btn btn-block btn-primary btn-lg"><span> <span id="checkout">Velider la commande</span>
                                        <span id="check-amt">({{getPrice(Cart::total())}}) </span> </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="container"><br>
            <br>
            <h2>Vous n'avez pas encore ajouter des produits dans votre panier</h2>
        </div>
    @endif
@endsection


@section('extra-js')

<!-- All JS Custom Plugins Link Here here -->
<script src="/assets/assets/js/vendor/modernizr-3.5.0.min.js"></script>
		<!-- Jquery, Popper, Bootstrap -->
		<script src="/assets/assets/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="/assets/assets/js/popper.min.js"></script>
        <script src="/assets/assets/js/bootstrap.min.js"></script>
<script>
    var selects = document.querySelectorAll('#qty');
    Array.from(selects).forEach((element) => {
        element.addEventListener('change', function () {
            var rowId = this.getAttribute('data-id');
            var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            fetch(
                `/panier/${rowId}`,
                {
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json, text-plain, */*',
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': token
                    },
                    method: 'PATCH',
                    body: JSON.stringify({
                        qty: this.value
                    })
                }
            ).then((data) => {
                console.log(data);
                location.reload();
            }).catch((error) => {
                console.log(error);
            })
        });
    });
</script>
@endsection