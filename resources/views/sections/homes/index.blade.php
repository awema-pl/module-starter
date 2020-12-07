@extends('indigo-layout::main')

@section('meta_title', config('app.name'))
@section('meta_description', config('app.name') . ' system')

@push('head')

@endpush

@section('title')
    Home
@endsection

@section('create_button')

@endsection

@section('content')
    <div class="grid">
        @foreach($dashboardWidgets as $widget)
            {!! $widget['view']->render() !!}
        @endforeach
    </div>
@endsection

@section('modals')

@endsection
