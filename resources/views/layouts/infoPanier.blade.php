@extends('layouts.admin')

@section('content')
<div class="container"><br>
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
				<!-- Initialisation du total général à 0 -->
				

				<!-- On parcourt les produits du panier en session : session('basket') -->
			

					<!-- On incrémente le total général par le total de chaque produit du panier -->
					
					<tr>
						<td>llll</td>
						<td>
							<strong><a href="" title="Afficher le produit" >ppp</a></strong>
						</td>
						<td>llll $</td>
						<td>
							<!-- Le formulaire de mise à jour de la quantité -->
							<form method="POST" action="" class="form-inline d-inline-block" >
							{{ csrf_field() }}
								<input type="number" name="quantity" placeholder="Quantité ?" value="" 
                                class="form-control mr-2" style="width: 80px" >
								<input type="submit" class="btn btn-primary" value="Actualiser" />
							</form>
						</td>
						<td>
							<!-- Le total du produit = prix * quantité -->
							mpll $
						</td>
						<td>
							<!-- Le Lien pour retirer un produit du panier -->
							<a href="" class="btn btn-outline-danger" title="Retirer le produit du panier" >Retirer</a>
						</td>
					</tr>
				
				<tr colspan="2" >
					<td colspan="4" >Total général</td>
					<td colspan="2">
						<!-- On affiche total général -->
						<strong>222 $</strong>
					</td>
				</tr>
			</tbody>

		</table>
	</div>

	<!-- Lien pour vider le panier -->
	<a class="btn btn-danger" href="#" title="Retirer tous les produits du panier" >Vider le panier</a>

	
	<div class="alert alert-info">Aucun produit au panier</div>
	

</div>
@endsection