@extends('layouts.app')

@section('content')

    <style>
        :required {
            border: 2px dotted orange;
        }
    </style>
    <form class="form-horizontal" action="{{ route('images.store') }}" method="post" enctype="multipart/form-data" runat="server">
        {{ csrf_field() }}
        <div class="form-group">
            <label class="control-label col-sm-2" for="nom">Nom de l'image</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nom" placeholder="Entrer un nom" name="nom" required="required">
            </div>
        </div>
        <div>
            <label for="image" class="control-label col-sm-2">Image</label>
        <input type="file" name="image" id="image" style="padding: 6px 10px 6px 6px" required="required">
            <img id="blah" class="center-block" style="height: 300px;"/>
        </div>
        <div>
            <label for="image" class="control-label col-sm-2">Statut de l'image</label>
            <div style="padding-top: 8px">
            <INPUT type= "radio" name="statut" value="0" id="statut"> privé
            <INPUT type= "radio" name="statut" value="1" id="statut"> public
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10" style="padding-top: 15px">
                <button type="submit" id="submit" class="btn btn-default" onclick="alert('Image ajoutée !');">
                    Valider</button>
            </div>
        </div>
    </form>
@endsection

<script type='text/javascript' src='//code.jquery.com/jquery-1.9.1.js'></script>
<script type='text/javascript'>//<![CDATA[
    $(window).load(function(){
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#image").change(function(){
            readURL(this);
        });
    });//]]>


</script>