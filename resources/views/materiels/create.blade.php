@extends('layouts.app')

@section('content')
    <h1>Ajouter matériel</h1><hr />
    <div class="row">
        {!! Form::open(array('url' => route('materiels.store'))) !!}
            <div class="col-sm-3">
                <h2>Détails matériel</h2>
                <div class="form-group">
                    {!! Form::label('name', 'Nom matériel') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('serial_number', 'Numéro de série') !!}
                    {!! Form::text('serial_number', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('bought', 'Date d\'achat') !!}
                    {!! Form::date('bought', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('price', 'Prix d\'achat') !!}
                    {!! Form::number('price', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('salle_id', 'Salle') !!}
                    {!! Form::select('salle_id', $salles->lists('name', 'id'), $salles->where('name', 'Stock')->first()->name, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('type_materiel_id', 'Type de matériel') !!}
                    {!! Form::select('type_materiel_id', $type_materiels->lists('name', 'id'), null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-sm-9">
                <h2>Caractéristiques</h2>
                {!! Form::open(array('url' => route('caracteristiques.store'))) !!}
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Type</th>
                            <th>Nom</th>
                            <th>Valeur</th>
                        </tr>
                    </thead>
                    <tbody id="caracs">
                        <tr>
                            <td></td>
                            <td>{!! Form::text('type_carac', null, ['placeholder' => 'Type caractéristique', 'id' => 'type_carac']) !!}</td>
                            <td>{!! Form::text('name_carac', null, ['placeholder' => 'Nom', 'id' => 'name_carac']) !!}</td>
                            <td>{!! Form::text('value', null, ['placeholder' => 'Valeur', 'id' => 'value']) !!}</td>
                            <td><button type="button" id="add_carac" class="btn btn-primary">Ajouter</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            {!! Form::submit('Ajouter matériel', ['class' => 'btn btn-success form-control']) !!}
        {!! Form::close() !!}
    </div>
@stop

@section('scripts')
    <script>
        $(document).ready(function() {
            var n = 0;
            $('#add_carac').on('click', function(e) {
                e.preventDefault();
                var nom = $('#name_carac').val();
                var value = $('#value').val();
                var type = $('#type_carac').val();

                var delBtn = '<button type="button" class="btn btn-danger delBtn">Supprimer</button>';

                $('#caracs').append('<tr><td>'+n+'</td><td>'+type+'</td><td>'+nom+'</td><td>'+value+'</td><td>'+delBtn+'</td></tr>');

                $.ajax({
                    url: '{{ route('type.store') }}',
                    type: 'post',
                    data: {'name': type},
                    success: function(data) {
                        $.ajax({
                            url: '{{ route('caracteristiques.store') }}',
                            type: 'post',
                            data: {'name': nom, 'value': value, 'type_materiel_id': data}
                        });
                    }
                });

                n++;
            })

            $('#caracs').on('click', 'button', function() {
                if($(this).hasClass('delBtn')) {
                    $(this).parent().parent().remove();
                }
            })
        });

    </script>
@stop
