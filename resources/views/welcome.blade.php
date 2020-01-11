@extends('layouts.app')

@section('content')
    <div>
        <div class="md-layout">
            <div class="md-layout-item md-size-100 mx-auto text-center">
                <h2 class="title">{{ __('welcome.title') }}</h2>
                <h5 class="description">
                    {{ __('welcome.subtitle') }}
                </h5>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script>

    </script>
@endpush

