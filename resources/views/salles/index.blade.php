@extends('layouts.app')

@section('content')
    <table class='table'>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Date création</th>
            </tr>
        </thead>
        <tbody>
        @foreach($salles as $salle)
            <tr>
                <td>{{ $salle->name }}</td>
                <td>{{ $salle->created_at }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
