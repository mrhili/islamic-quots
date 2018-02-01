@extends('layouts.form')
@section('card')
    @component('components.card')
        @slot('title')
            @lang('Inscription')
        @endslot
        <form method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}
            @include('partials.form-group', [
                'title' => @lang('Nom'),
                'type' => 'text',
                'name' => 'name',
                'required' => true,
                ])
            @include('partials.form-group', [
                'title' => @lang('Adresse email'),
                'type' => 'email',
                'name' => 'email',
                'required' => true,
                ])
            @include('partials.form-group', [
                'title' => @lang('Mot de passe'),
                'type' => 'password',
                'name' => 'password',
                'required' => true,
                ])
            @include('partials.form-group', [
                'title' => @lang('Confirmation du mot de passe'),
                'type' => 'password',
                'name' => 'password_confirmation',
                'required' => true,
                ])
            @component('components.button')
                @lang('Inscription')
            @endcomponent
        </form>
    @endcomponent
@endsection