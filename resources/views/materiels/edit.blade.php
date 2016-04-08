@extends('layouts.app')

@section('content')
    <h1>Editer {{ $materiel->name }}</h1><hr />
    <div class="row">
        {!! Form::model($materiel, array('url' => route('materiels.update', $materiel->id))) !!}
            <div class="col-sm-3">
                {!! Form::hidden('_method', 'put') !!}
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
                        @foreach($caracteristiques as $carac)
                            <tr>
                                <td>{{ $carac->id }}</td>
                                <td></td>
                                <td>{{ $carac->name }}</td>
                                <td>{{ $carac->value }}</td>
                                <td><button type="button" class="btn btn-danger delBtn">Supprimer</button></td>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {!! Form::submit('Editer matériel', ['class' => 'btn btn-success form-control']) !!}
        {!! Form::close() !!}
    </div>
@stop

@section('scripts')
    <script>
        $(document).ready(function() {
            var test = 0;
            $('#add_carac').on('click', function(e) {
                e.preventDefault();
                var nom = $('#name_carac').val();
                var value = $('#value').val();
                var type = $('#type_carac').val();

                var delBtn = '<button type="button" class="btn btn-danger delBtn">Supprimer</button>';

                $.ajax({
                    url: '{{ route('type.store') }}',
                    type: 'post',
                    data: {'name': type},
                    success: function(data) {
                        $.ajax({
                            url: '{{ route('caracteristiques.store') }}',
                            type: 'post',
                            data: {'name': nom, 'value': value, 'type_materiel_id': data},
                            success: function(data) {
                                $('#caracs').append('<tr><td>'+data+'</td><td>'+type+'</td><td>'+nom+'</td><td>'+value+'</td><td>'+delBtn+'</td></tr>');
                            }
                        });
                    }
                });
            })

            $('#caracs').on('click', 'button', function() {
                if($(this).hasClass('delBtn')) {
                    var id = $(this).parent().parent().children();
                    $(this).parent().parent().remove();
                    // $.ajax({
                    //     url: 'route to carac destroy',
                    //     type: 'delete',
                    //     success: function() {
                    //
                    //     }
                    // })
                }
            })
        });

    </script>
@stop
