@extends('layouts.app')

@section('content')
    <h1>{{ $salle->name }}</h1><hr />
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Nom</th>
                <th>N° série</th>
                <th>Date d'achat</th>
                <th>Prix</th>
                <th>Type de matériel</th>
            </tr>
        </thead>
        <tbody>
            @foreach($materiels as $materiel)
                <tr>
                    <td>{{ $materiel->name }}</td>
                    <td>{{ $materiel->serial_number }}</td>
                    <td>{{ $materiel->bought }}</td>
                    <td>{{ $materiel->price }}</td>
                    <td>{{ App\Type_materiels::where('id', $materiel->type_materiel_id)->first()->name }}</td>
                    <td><a href="{{ route('materiels.edit', $materiel->id) }}" class="btn btn-primary">Editer</a></td>
                    <td>
                        {!! Form::open(array('url' => route('materiels.destroy', $materiel->id))) !!}
                            {!! Form::hidden('_method', 'DELETE') !!}
                            {!! Form::submit('Supprimer', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
