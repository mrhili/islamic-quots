@extends('layouts.form')
@section('card')
    @component('components.card')
        @slot('title')
            @lang('Ajouter une catégorie')
        @endslot
        <form method="POST" action="{{ route('category.store') }}">
            {{ csrf_field() }}
            @include('partials.form-group', [
                'title' => @lang('Nom'),
                'type' => 'text',
                'name' => 'name',
                'required' => true,
                ])
            @component('components.button')
                @lang('Envoyer')
            @endcomponent
        </form>
    @endcomponent            
@endsection