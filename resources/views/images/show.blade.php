@extends('layouts.app')

@section('content')
    Nom : {{$image->nom}} <br>
    <img src="{{ asset('img/'.$image->user_id.'/'.$image->picture) }}" alt="{{ $image->picture }}"><br>

    <a href="{{route('images.edit',$image)}}">Editer mon article</a>
    <a href="{{route('images.destroy',$image)}}" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">Supprimer mon image</a>
    <form id="delete-form" action="{{ route('images.destroy', $image) }}" method="POST" style="display:none;">{{ csrf_field() }}
        <input type="hidden" name="_method" value="delete">
    </form>
@endsection