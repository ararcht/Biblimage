@extends('layouts.app')

@section('title')
    Fil d'actualité
@endsection

@section('content')

    <style>

    </style>

<div class="container">

    <div class="row" >

        <div class="dropdown" style="padding: 15px">
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Trier
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a href="/images?tri=date">Par date</a></li>
                <li><a href="/images?tri=NomA">Par nom A-Z</a></li>
                <li><a href="/images?tri=NomZ">Par nom Z-A</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="/images">Par défaut </a></li>
            </ul>
        </div>
        <div class="flex-container" style="display: -webkit-flex;
             display: flex;
             -webkit-flex-flow: row wrap;
             flex-flow: row wrap;">
            @foreach($images as $element)

                <div class="col-md-4" style="-webkit-flex: 1 0 300px;
            flex: 1 0 300px;">
                    <div class="thumbnail">

                        <img style="display: block;width: 100%;height: auto;" class="img-thumbnail rounded img-responsive" src="{{ asset('img/'.$element->user_id.'/'.$element->picture) }}" alt="{{ $element->picture }}">
                        <div class="caption">
                            <p>{{$element->nom }}</p>
                        </div>

                    </div>
                </div>

            @endforeach
        </div>
    </div>
</div>
@endsection