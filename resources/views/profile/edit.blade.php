@extends('templates.default')

@section('stylesheets')
	{!! Html::style('css/select2.min.css') !!}
@endsection


@section('content')
	Edit page
@endsection



@section('scripts')
	{!! Html::script('js/select2.min.js') !!}
	<script type="text/javascript">
		$('.select2-multi').select2();
	</script>
@endsection

