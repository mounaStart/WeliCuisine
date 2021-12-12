<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Chat</title>
        <!-- <link rel="stylesheet" href="./css/app.css" class=""> -->
        <style>
            
* {
  margin:0;
  padding:0;
  box-sizing: border-box;
}
body{
  background-color: #EEE;

}
input, button{
  appearance: none;
  border: none;
  outline: none;
  background: none;
}
input{
  display: block;
  width: 100%;
  background-color: #FFF;
  padding: 20px 16px;
  font-size: 18px;
  color: #888;

}
.app{
  display: flex;
  flex-direction: column;
  height: 80vh;
}
header{
  display: flex;
  padding-top: 10px;
  padding-bottom: 30px;
  background: #F9F9F9;
 
  align-items:center;
  justify-content: flex-end;
  flex-direction: column;
  box-shadow: 0px 6px 12px rgba(0,0,0,0.15);
  padding-left: 16px;
  padding-right: 16px;
}
#username{
  border-radius: 8px;
  transition: 0.4s;
  text-align: center;
}

#username:focus{
box-shadow: 0px 6px 12px rgb(0,0,0,0.25);
}

#messages {
  flex: 1 1 0%;
  overflow: scroll;
  padding: 16px;
}
.message {
  display: block;
  width: 100%;
  border-radius: 99px;
  background-color: #FFF;
  padding: 8px 16px;
  box-shadow: 0px , 6px 12px rgb(0,0,0,0.25);
  font-weight: 400;
  margin-bottom: 16px ;
}
.message strong{
  color: #8C38FF;
  font-weight: 600;
}

#message_form{
  display: flex;
}
#message_input{
  flex: 1 1 0%;
}
#message_send{
  appearance: none;
  background-color: #8C38FF;
  padding: 4px 8px;
  color: #FFF;
  text-transform: uppercase;
}
        </style>
</head>
<body>
@extends('/layouts.admin')
@section('content')<br>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-6">
      <div class="app">
        <header>
          @if(Auth::user())
            <input type="text" value="Bonjour {{Auth::user()->Prenom_Client}} {{Auth::user()->name}}" disabled name="username"id="username"placeholder="entrez votre nom">
           @else
           <input type="text" value="" disabled name="username"id="username"placeholder="entrez votre nom">
         
          @endif
        </header>
        <div id="messages"></div>
        <form  id="message_form">
          <input type="text" name="message" id="message_input"placeholder="votre messae">
          <button type="submit" id="message_send">Envoyer message</button>
        </form>
      </div><BR><br>
    </div>
    </div>
</div>
<script src="./js/app.js"></script>
@endsection
