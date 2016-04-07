@extends('master')

@section('content')

@section('title', 'Salle')

<div class="container">

<h1 align="center">Menu salle du parc informatique de l'Imie</h1>

{!! Form::open() !!}

	<div class="form-group">
		{!! Form::label('name', 'Ajouter une salle : ') !!}
		{!! Form::text('name', null, ['class' => 'form-control']) !!}
	</div>

	{!! Form::submit('Envoyer', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}



<table class="table table-bordered">
	<thead>
		<tr>
			<th>Nom de la salle</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Salle 1</td>
			<td><button type="submit" class="btn btn-danger">Supprimer</button></td>
		</tr>
		<tr>
			<td>Salle 2</td>
			<td><button type="submit" class="btn btn-danger">Supprimer</button></td>
		</tr>
		<tr>
			<td>Salle 3</td>
			<td><button type="submit" class="btn btn-danger">Supprimer</button></td>
		</tr>
		<tr>
			<td>Salle 4</td>
			<td><button type="submit" class="btn btn-danger">Supprimer</button></td>
		</tr>
		<tr>
			<td>Salle 5</td>
			<td><button type="submit" class="btn btn-danger">Supprimer</button></td>
		</tr>
	</tbody>
</table>

</div>

@stop 	
