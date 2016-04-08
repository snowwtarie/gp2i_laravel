@extends('layouts.app')

@section('content')
    <h1>Liste des salles</h1>
    <hr />
    <div class="row" style="margin: 20px;">
        <div class="col-sm-offset-3">
            {!! Form::open(array('class' => 'form-inline', 'url' => route('salles.store'))) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nom de la salle') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    {!! Form::hidden('user_id', Auth::id()) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Ajouter salle', ['class' => 'btn btn-success']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
    <table class='table'>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Date création</th>
                <th>Gérant</th>
            </tr>
        </thead>
        <tbody>
        @foreach($salles as $salle)
            <tr>
                <td>{{ $salle->name }}</td>
                <td>{{ $salle->created_at }}</td>
                <td>{{ $salle->user->name }}
                <td><a href="{{ route('salles.show', $salle->id) }}" class="btn btn-primary">Afficher salle</a></td>
                <td>
                    {!! Form::open(array('url' => route('salles.destroy', $salle->id))) !!}
                        {!! Form::hidden('_method', 'DELETE') !!}
                        {!! Form::submit('Supprimer', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
