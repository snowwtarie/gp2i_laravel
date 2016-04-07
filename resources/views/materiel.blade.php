@extends('master')

@section('content')

@section('title', 'Materiel')

<h1 align="center">Menu matériel du parc informatique de l'Imie</h1>

<div class="container">

{!! Form::open() !!}

	<h2>Ajouter un matériel :</h2>

	<div class="form-group">
		{!! Form::label('type', 'Type : ') !!}
		{!! Form::text('type', null, ['class' => 'form-control']) !!}
		{!! Form::label('marque', 'Marque : ') !!}
		{!! Form::text('marque', null, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('numserie', 'N° serie : ') !!}
		{!! Form::text('numserie', null, ['class' => 'form-control']) !!}
		{!! Form::label('salle', 'Salle : ') !!}
		{!! Form::text('salle', null, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('dateachat', 'Date d\'achat : ') !!}
		{!! Form::date('dateachat', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
		{!! Form::label('prixaxchat', 'Prix d\'achat : ') !!}
		{!! Form::number('prixachat', null, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('fonc', 'Fonctionnel : ') !!}
		{!! Form::checkbox('fonc', 'value', true) !!}
	</div>

	{!! Form::submit('Envoyer', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

</div>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>Nom du matériel</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Materiel 1</td>
			<td><button type="submit" class="btn btn-primary">Consulter</button>&nbsp;<button type="submit" class="btn btn-danger">Supprimer</button></td>
		</tr>
		<tr>
			<td>Materiel 2</td>
			<td><button type="submit" class="btn btn-primary">Consulter</button>&nbsp;<button type="submit" class="btn btn-danger">Supprimer</button></td>
		</tr>
		<tr>
			<td>Materiel 3</td>
			<td><button type="submit" class="btn btn-primary">Consulter</button>&nbsp;<button type="submit" class="btn btn-danger">Supprimer</button></td>
		</tr>
		<tr>
			<td>Materiel 4</td>
			<td><button type="submit" class="btn btn-primary">Consulter</button>&nbsp;<button type="submit" class="btn btn-danger">Supprimer</button></td>
		</tr>
		<tr>
			<td>Materiel 5</td>
			<td><button type="submit" class="btn btn-primary">Consulter</button>&nbsp;<button type="submit" class="btn btn-danger">Supprimer</button></td>
		</tr>
	</tbody>
</table>


@stop