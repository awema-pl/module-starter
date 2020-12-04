@extends('indigo-layout::installation')

@section('meta_title', _p('starter::pages.installation.meta_title', 'Installation starter') . ' - ' . config('app.name'))
@section('meta_description', _p('starter::pages.installation.meta_description', 'Installation starter in application'))

@push('head')

@endpush

@section('title')
    <h2>{{ _p('starter::pages.installation.headline', 'Installation starter') }}</h2>
@endsection

@section('content')
    <form-builder disabled-dialog="" url="{{ route('starter.installation.index') }}" send-text="{{ _p('starter::pages.installation.send_text', 'Install') }}"
    edited>
        <div class="section">
            <ul>
                <li>
                    {{ _p('starter::pages.installation.will_be_execute_migrations', 'Will be execute package migrations') }}
                </li>
            </ul>
        </div>
    </form-builder>
@endsection
