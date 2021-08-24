@component('mail::message')
# Introduction
<b> Mail de Mr/Mme/Mlle</b> <h3>{{ $data['name']}} </h3><br>
<b>Sujet du mail:</b> <h3>{{ $data['subject']}}</h3> <br>
<b>Contenu:</b> <h3> {{ $data['message']}}</h3> <br>
<h3>Lien vers le site avec le bouton ci-dessous:</h3>
@component('mail::button', ['url' => $url])
cliquer ici 
@endcomponent

Mail bien recu<br>
{{ config('app.name') }}
@endcomponent
