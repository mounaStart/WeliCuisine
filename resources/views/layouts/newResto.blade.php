@include('layouts.script')
@extends('layouts.admin')

@section('content')

<header>
    <div class="container-fluid">
        <br>
        <h1 style="  text-align: left;">Inscrivez votre restaurant sur Diamwely</h1>
        <hr>
        <div class="row">
            <div class="col-12 col-lg-5 order-lg-1">
                <br><br>
                <p>Augmentez vos revenus, dotez-vous d’une&nbsp;<strong>meilleure visibilité</strong>&nbsp;
                    et fidélisez vos clients en rejoignant nos 80 000 restaurants partenaires déjà réservables sur
                    Diamwely,
                    la première plateforme de recherche et de réservation de restaurants en Europe, Australie et
                    Amérique latine.
                </p>
                <p>Testez Diamwely Manager, notre logiciel de réservation et de gestion de tables,
                    &nbsp;<strong>sans engagement de durée</strong>.&nbsp;Visibilité et inscription gratuite.
                    Facturation à l'utilisation&nbsp;:
                    les commissions sont basées sur le nombre de couverts réservés et honorés.
                </p>
                <div class="field field--name-image field--type-image
                    field--label-hidden field__item" style=""> <img width="400" height="277"
                                    src="https://cdn.theforkmanager.com/static/styles/lp_image_form/public/2020-01/increase-your-table-occupancy-rate_1.jpg?itok=cnXXWRVp"
                                    width="700" height="377" alt="Rejoignez Diamwely" class="image-style-lp-image-form">
                </div>
            </div>
            <div class="col-12 col-lg-7 order-lg-2 col-form">
                <br><br>
                <form class="form-registration form-registration-lp-v2" data-drupal-selector="multi-step-one-lp-register-form" action="{{ url('/register/agentr') }}" method="post" id="multi-step-one-lp-register-form" accept-charset="UTF-8"
                    enctype="multipart/form-data">
                    @csrf
                        <fieldset  class="js-form-item js-form-type-textfield form-type-textfield js-form-item-name form-item-name form-group">
                            <input autocomplete="off" data-drupal-selector="form-5szjpqjrvoryyz-ysfjzfay8zgqs4orvkvg2-yfv3os"
                                type="hidden" name="form_build_id" value="form-5szjPQjRvOryyz-YsfjZfaY8zgQS4ORVkvg2_Yfv3os"
                                class="form-control">
                            <input data-drupal-selector="edit-multi-step-one-lp-register-form" type="hidden" name="form_id"
                                value="multi_step_one_lp_register_form" class="form-control">
                        <div class="row align-items-end">
                            <div class="col-md-6">
                                    <label class="form--field__name--label js-form-required form-required" for="edit-name">Quel est le nom de votre restaurant ?</label>
                                    <input placeholder="" class="form--field__name required form-control" data-drupal-selector="edit-name" type="text" id="edit-name" name="nomR" value="" size="60" maxlength="128" required="required" aria-required="true">
                            </div>
                            <div class="col-md-6">
                                    <label class="form--field__address--label js-form-required form-required"for="edit-address">Et sonadresse ?</label>
                                    <input class="form--field__address address-autocomplete form-autocomplete required form-control ui-autocomplete-input" placeholder="Rue, code postal, ville" data-drupal-selector="edit-address" data-autocomplete-path="/fr-fr/autocomplete/address" type="text" id="edit-address" name="addresse" value="" size="60" maxlength="128" required="required" aria-required="true" autocomplete="off">
                                    <input data-drupal-selector="edit-address-id" values="" type="hidden" name="address_id"value="" class="form-control">
                            </div>
                        </div>
                        <div class="row align-items-end">
                            <div class="col-md-6">
                                <label for="edit-first-name" class="js-form-required form-required">Prénom</label>
                                <input class="form--field__first-name required form-control"data-drupal-selector="edit-first-name" type="text" id="edit-first-name"name="prenom" value="" size="60" maxlength="128" required="required"aria-required="true">
                            </div>
                            <div class="col-md-6">
                                <label for="edit-last-name" class="js-form-required form-required">Nom</label>
                                <input class="form--field__last-name required form-control"data-drupal-selector="edit-last-name" type="text" id="edit-last-name" name="nom"value="" size="60" maxlength="128" required="required" aria-required="true">
                            </div>
                        </div>
                        <div class="row align-items-end">
                            <div class="col-md-6">
                                <label for="edit-email" class="js-form-required form-required">Adresse e-mail</label>
                                <input class="form--field__email form-email required form-control" data-drupal-selector="edit-email" type="email" id="edit-email" name="email" value=""size="60" maxlength="254" required="required" aria-required="true">
                            </div>
                            <div class="col-md-6">
                                <label for="edit-password" class="js-form-required form-required">Mot de passe</label>
                                <input class="form--field__password form-password required form-control" data-drupal-selector="edit-email" type="password" id="edit-password" name="password"value="" size="60" maxlength="254" required="required" aria-required="true">
                            </div>
                            <div class="col-md-3 col-md-auto col-md-phone-code">
                                <label for="edit-phone-country-code" class="js-form-required form-required">Numéro de téléphone</label>
                                <select class="form--field__phone-country-code form-select required form-control" data-drupal-selector="edit-phone-country-code" id="edit-phone-country-code" name="phone_country_code" required="required" aria-required="true">
                                    <option value="" selected="selected">Indicatif</option>
                                    <option value="MR">MR +222</option>
                                    <option value="SN">SN +221</option>
                                </select>
                            </div>
                            <div class="col-md-5 col-md-auto col-md-phone">
                                <input class="form--field__phone required form-control" data-drupal-selector="edit-phone" type="number" id="edit-phone" name="phone" step="1" min="1" value="" size="60" maxlength="128" required="required" aria-required="true">
                            </div>
                            <div class="col-md-4">
                                <label for="edit-sexe" class="js-form-required form-required">Sexe</label>
                                <select id="edit-sexe" class="form--field__sexe form-sexe required form-control" data-drupal-selector="edit-sexe" type="text" id="edit-sexe" name="sexe" value="" required="required" aria-required="true">
                                    <option value="F">Femme</option>
                                    <option value="H">Homme</option>
                                </select>
                            </div>
                        </div>
                            <div class="js-form-item js-form-type-checkbox checkbox form-check js-form-item-accept-receive-communication form-item-accept-receive-communication">
                                <input data-drupal-selector="edit-accept-receive-communication" type="checkbox"
                                    id="edit-accept-receive-communication" name="accept_receive_communication" value="1"
                                    class="form-checkbox form-check-input">
                                <label class="form-check-label" for="edit-accept-receive-communication"> Je ne souhaite pas recevoir de communications de DiamwelResyo par e-mail/SMS.</label>
                            </div>
                        <div data-drupal-selector="edit-actions" class="form-actions js-form-wrapper form-group" id="edit-actions">
                            <button class="form--submit form-registration--submit button js-form-submit form-submit is-disabled btn btn-primary" data-drupal-selector="edit-submit" type="submit" id="edit-submit" name="op"
                                value="INSCRIPTION">Ajouter mon restaurant</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>


        @endsection