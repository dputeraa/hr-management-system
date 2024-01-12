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
                <a href="{{ url('leave') }}" class="btn btn-outline-secondary">
                    <i class="menu-icon fa fa-mail-reply-all"></i> <strong class="card-title">Back</strong>
                </a>
            </div>
            <div class="card-body">
                <!-- Credit Card -->
                <div id="pay-invoice">
                    <div class="card-body">
                        <form action="{{ url("leave/$leave->id") }}" method="post" novalidate="novalidate">
                            @method('patch')
                            @csrf
                            <div class="form-group">
                                <label for="employee_id" class="control-label mb-1">Name</label>
                                <select class="form-control" name="employee_id" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    @foreach ($employee as $empl)
                                        <option value="{{ $empl->id }}"
                                            {{ $empl->id == $leave->employee_id ? 'selected' : '' }}>
                                            {{ $empl->user->name . ' - ' . $empl->position->name_position }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('employee_id'))
                                    <span class="text-danger">{{ $errors->first('employee_id') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="leave_type" class="control-label mb-1">Leave Type</label>
                                <select class="form-control" name="leave_type" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <option value="Annual Leave"
                                        {{ $leave->leave_type == 'Annual Leave' ? 'selected' : '' }}>Annual Leave
                                    </option>
                                    <option value="Sick Leave" {{ $leave->leave_type == 'Sick Leave' ? 'selected' : '' }}>
                                        Sick Leave
                                    </option>
                                    <option value="Paternity Leave"
                                        {{ $leave->leave_type == 'Paternity Leave' ? 'selected' : '' }}>Paternity Leave
                                    </option>
                                </select>
                                @if ($errors->has('leave_type'))
                                    <span class="text-danger">{{ $errors->first('leave_type') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="start_date" class="control-label mb-1">Start Date</label>
                                <input id="start_date" name="start_date" type="date" class="form-control"
                                    value="{{ $leave->start_date }}">
                                @if ($errors->has('start_date'))
                                    <span class="text-danger">{{ $errors->first('start_date') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="end_date" class="control-label mb-1">End Date</label>
                                <input id="end_date" name="end_date" type="date" class="form-control"
                                    value="{{ $leave->end_date }}">
                                @if ($errors->has('end_date'))
                                    <span class="text-danger">{{ $errors->first('end_date') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="status" class="control-label mb-1">Status</label>
                                <select class="form-control" name="status" aria-label="Default select example">
                                    <option value="Pending" {{ $leave->status == 'Pending' ? 'selected' : '' }}>Pending
                                    </option>
                                    <option value="Approved" {{ $leave->status == 'Approved' ? 'selected' : '' }}>Approved
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
