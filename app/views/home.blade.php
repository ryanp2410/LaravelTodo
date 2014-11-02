@extends('layouts.main')

@section('content')
	<h1>Your Items <small>(<a href="{{ URL::route('new') }}">New task</a></small>)</h1>

	<ul>
		@foreach ($items as $item)
			<li>
				{{ Form::open(array('url' => ' ')) }}	
						<input type="checkbox"  
						onClick="this.form.submit()"
						{{ $item->done ? 'checked' : '' }}>
						
						<input type="hidden" name="id" value="{{ $item->id }}">

						{{ e($item->name) }} <small>(<a href="{{ URL::route('delete', $item->id) }}">x</a>)</small>

				{{ Form::close() }}
			</li>
		@endforeach
	</ul>
@stop