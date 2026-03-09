@extends('flute::layouts.app')

@section('title', __('fluteusers.title'))

@push('content')
    <section class="container">
        <div class="col-md-12">
            <x-legend title="{{ __('fluteusers.title') }}" description="{{ __('fluteusers.description') }}" />

            <x-card withoutPadding>
                @yoyo('users-table')
            </x-card>
        </div>
    </section>
@endpush