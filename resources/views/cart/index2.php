@extends('layouts.admin')

@section('content')

@foreach($cartItem as $item)
<div >
  {{  $totatl = $item->model->Prix_Plat * $item->qty }}
    
    
@endforeach
@if(Cart::count() > 0 )

<div class="container"><br>
   
@if(session('success'))
<div class="alert alert-success">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
{{session('success')}}

</div>
@endif
<h1>Mon panier</h1>
	<div class="table-responsive shadow mb-3">
		<table class="table table-bordered table-hover bg-white mb-0">
			<thead class="thead-dark" >
				<tr>
					<th>#</th>
					<th>Produit</th>
					<th>Prix</th>
					<th>Quantité</th>
					<th>Total</th>
					<th>Opérations</th>
				</tr>
			</thead>
			<tbody>
            @php $total = 0 @endphp
                @foreach(Cart::content() as $plat)
               
                <tr>
                @php $total +=$plat->model->Prix_Plat * $plat->quantity @endphp
					
						<td>{{$plat->model->photo_plat->plats->Id}}</td>
						<td>
							<strong><a href="" title="Afficher le produit" >{{ $plat->model->Nom_Plat }}</a></strong>
						</td>
						<td>{{$plat->model->Prix_Plat}} $</td>
						<td>
                            <select style="width: 100px" id="qty" data-id="{{$plat->rowId}}" name="qty" class="custom-select">
                                @for($i =1 ;$i <= 10 ; $i++)
                                <option value="$i">{{$i}}</option>
                                @endfor
</select>
<!--  -->
							<!-- Le formulaire de mise à jour de la quantité -->
							
						</td>
						<td>
							<!-- Le total du produit = prix * quantité -->
                           
                            {{ $plat->totdatl}}
							{{  $plat->model->Prix_Plat * $plat->qty }} $
						</td>
						<td>
                        
                        <form method="POST" action="{{ route('cart.destroy',$plat->rowId) }}">
                         @csrf  
                         @method('DELETE')
                         <button type="submit"   class="btn btn-outline-danger" title="Retirer le produit du panier" >Retirer</button>
                        </form>
							<!-- Le Lien pour retirer un produit du panier -->
						
						</td>
					</tr>
                @endforeach
				<!-- Initialisation du total général à 0 -->
				

				<!-- On parcourt les produits du panier en session : session('basket') -->
			

					<!-- On incrémente le total général par le total de chaque produit du panier -->
					
					
				
				<tr colspan="2" >
					<td colspan="4" >Total général</td>
					<td colspan="2">
						<!-- On affiche total général -->
						<strong>{{  Cart::subtotal()}} $</strong>
					</td>
				</tr>
			</tbody>

		</table>
	</div>

	<!-- Lien pour vider le panier -->
	<a class="btn btn-danger" href="{{route('vide.panier')}}" title="Retirer tous les produits du panier" >Vider le panier</a>

	
</div>
@else 
<div class="container"><br>
<br>
	
<h2>Vous n'avez pas encore ajouter des produits dans votre panier</h2>

</div>
@endif

@endsection



