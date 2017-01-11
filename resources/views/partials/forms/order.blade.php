<div class="form-group">
	{{ Form::label('name', 'Ime i Prezime:') }}	
	{{ Form::text('name', null, ['id' => 'name', 'class' => 'form-control', 'required']) }}
</div>
<div class="form-group">
	{{ Form::label('mesto', 'Mesto:')}}
	{{ Form::text('mesto', null, ['id' => 'adresa', 'class' => 'form-control', 'required']) }}
</div>
<div class="form-group">
	{{ Form::label('adresa', 'Adresa:')}}
	{{ Form::text('adresa', null, ['id' => 'adresa', 'class' => 'form-control', 'required']) }}
</div>
<div class="form-group">
	{{ Form::label('napomena', 'Napomena:') }}
	{{ Form::textarea('napomena', null, ['id' => 'napomena', 'cols' => 20, 'rows' => 4, 'class' => 'form-control', 'placeholder' => 'Upisite dodatne informacije po potrebi']) }}
</div>

	{{ Form::submit('Naruci', ['onclick' => 'return confirm("Vasa narudzbina ce sada biti poslata")']) }}