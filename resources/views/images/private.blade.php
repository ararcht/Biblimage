@extends('layouts.app')

@section('title')
    Mes images
@endsection

@section('content')


    <div class="container">

        <div class="row" >


            @foreach($images as $element)

                <div class="col-md-4" style="display:flex;">
                    <div class="thumbnail">

                        <img style="max-width: 100%; height: auto;" class="img-thumbnail rounded" id="img_{{$element->user_id}}_{{$element->nom}}" src="{{ asset('img/'.$element->user_id.'/'.$element->picture) }}" alt="{{ $element->picture }}">
                        <div class="caption">
                            <p>{{$element->nom }}</p>
                            <a href="{{route('images.edit',$element)}}"><button type="button" class="btn btn-xs" style="color: white;">Editer mon image</button></a>

                            <a href="{{route('images.destroy', $element)}}" onclick="event.preventDefault(); document.getElementById('delete-form_{{$element->user_id}}_{{$element->nom}}').submit();">
                                <button type="button" class="btn btn-xs" style="color: white;">Supprimer l'image</button>
                            </a>
                            <form id="delete-form_{{$element->user_id}}_{{$element->nom}}" action="{{ route('images.destroy', $element) }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">
                            </form>
                        </div>

                    </div>
                </div>

            @endforeach

        </div>
    </div>
@endsection