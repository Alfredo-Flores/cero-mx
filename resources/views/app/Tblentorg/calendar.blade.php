@extends('layouts.emplayout')

@section('content')
    <div class="md-layout text-center">
        <div
            class="md-layout-item md-size-66 md-medium-size-50 md-small-size-70 md-xsmall-size-100"
        >
            <md-card class="md-card-calendar">
                <md-card-content>
                    <div id="calendar"></div>
                </md-card-content>
            </md-card>
        </div>
    </div>
@endsection

@push('scripts')
    <script>

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: [ 'dayGrid' ]
            });

            calendar.render();
        });

    </script>
@endpush
