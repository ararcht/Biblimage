@extends('layouts.app')

@section('content')
    <div class="col-md-6">
    <form action="{{ route('images.update', $image) }}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="put">
        Nom de l'image : <input type="text" name="nom" value="{{ $image->nom }}">
        <div style="padding-top: 8px; margin-bottom:5px;" >
            <INPUT type= "radio" name="statut" value="0" id="statut"> privé
            <INPUT type= "radio" name="statut" value="1" id="statut"> public
        </div>
        <input type="submit"  value="enregistrer">
    </form>
    </div>
@endsection