@extends('website.master')
@section('title', 'Trainer Home')

@section('body')


    <!-- Timetable Area -->
    <div class="timetable-area timetable-area-bg ptb-70">
        <div class="container">
            <div class="section-title text-center mb-45">
                <span>TIMETABLE</span>
                <h2 class="m-auto">Classes</h2>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="timetable-table-area">
                        <div class="timetable-table table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>My Schedule Classes</th>

                                </tr>
                                </thead>
                                <tbody>
                                @forelse($gymClasses as $gymClass)
                                <tr>
                                    <td class="bg-color">
                                        <div class="tbody-content">
                                            <div class="content">
                                                <h3>{{ $gymClass->name }}</h3>
                                                <span>{{ \Carbon\Carbon::parse($gymClass->class_time)->format('j M Y') }} ({{ \Carbon\Carbon::parse($gymClass->class_time)->format('h:i A') }} - {{ \Carbon\Carbon::parse($gymClass->end_time)->format('h:i A') }})</span>
                                                <h4><i class="flaticon-user"></i> {{ $gymClass->currentBookings() }}/{{ $gymClass->capacity }}</h4>
                                            </div>
                                        </div>
                                    </td>

                                </tr>

                                @empty
                                    <tr>
                                        <td colspan="3">No classes scheduled.</td>
                                    </tr>
                                @endforelse


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Timetable Area End -->


@endsection

