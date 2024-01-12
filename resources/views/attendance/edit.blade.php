@extends('layout.app')

@section('content')
    @if (session()->has('error_message'))
        <div class="alert alert-danger">
            <!-- mencetak error message -->
            {{ session()->get('error_message') }}
        </div>
    @endif

    <div class="col-lg-14">
        <div class="card">
            <div class="card-header">
                <a href="{{ url('attendance') }}" class="btn btn-outline-secondary">
                    <i class="menu-icon fa fa-mail-reply-all"></i> <strong class="card-title">Back</strong>
                </a>
            </div>
            <div class="card-body">
                <!-- Credit Card -->
                <div id="pay-invoice">
                    <div class="card-body">
                        <form action="{{ url("attendance/$attendance->id") }}" method="post" novalidate="novalidate">
                            @method('patch')
                            @csrf
                            <div class="form-group">
                                <label for="employee_id" class="control-label mb-1">Name</label>
                                <select class="form-control" name="employee_id" aria-label="Default select example">
                                    @foreach ($employee as $empl)
                                        <option value="{{ $empl->id }}"
                                            {{ $empl->id == $attendance->employee_id ? 'selected' : '' }}>
                                            {{ $empl->user->name . ' - ' . $empl->position->name_position }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('employee_id'))
                                    <span class="text-danger">{{ $errors->first('employee_id') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="attendance_date" class="control-label mb-1">Attendance Date</label>
                                <input id="attendance_date" name="attendance_date" type="date" class="form-control"
                                    value="{{ $attendance->attendance_date }}">
                                @if ($errors->has('attendance_date'))
                                    <span class="text-danger">{{ $errors->first('attendance_date') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="status" class="control-label mb-1">Status</label>
                                <select class="form-control" name="status" aria-label="Default select example">
                                    <option value="Present" {{ $attendance->status == 'Present' ? 'selected' : '' }}>
                                        Present
                                    </option>
                                    <option value="Leave" {{ $attendance->status == 'Leave' ? 'selected' : '' }}>Leave
                                    </option>
                                    <option value="Off" {{ $attendance->status == 'Off' ? 'selected' : '' }}>Off
                                    </option>
                                    <option value="Sick" {{ $attendance->status == 'Sick' ? 'selected' : '' }}>Sick
                                    </option>
                                    <option value="Late" {{ $attendance->status == 'Late' ? 'selected' : '' }}>Late
                                    </option>
                                </select>
                                @if ($errors->has('status'))
                                    <span class="text-danger">{{ $errors->first('status') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                    <span id="payment-button-amount">Save</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div> <!-- .card -->

    </div>
    <!--/.col-->
@endsection
