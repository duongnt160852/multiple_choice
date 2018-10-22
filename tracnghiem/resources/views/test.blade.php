@extends('admin.layout.index')
@section('content')
	<div>
		{!! $question->name !!}
	</div>
	<div>
		{!! $question->A !!}
	</div>
	<div>
		{!! $question->B !!}
	</div>
	<div>
		{!! $question->C !!}
	</div>
	<div>
		{!! $question->D !!}
	</div>
@endsection