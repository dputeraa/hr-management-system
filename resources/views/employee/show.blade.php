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
                <a href="{{ url('employee') }}" class="btn btn-outline-secondary">
                    <i class="menu-icon fa fa-mail-reply-all"></i> <strong class="card-title">Back</strong>
                </a>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <!-- Credit Card -->
                            <div id="pay-invoice">
                                <div class="card-body">
                                    <form action="{{ url('employee') }}" method="post" novalidate="novalidate">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name" class="control-label mb-1">Name</label>
                                            <input id="name" name="name" type="text" class="form-control"
                                                value="{{ $employeedetail->employee->user->name }}" readonly>
                                            @if ($errors->has('name'))
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="gender" class="control-label mb-1">Gender</label>
                                            <input id="phone" name="phone" type="text" class="form-control"
                                                value="{{ $employeedetail->employee->gender }}" readonly>
                                            {{-- <div class="col col-md-9">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="gender"
                                                        id="inlineRadio1" disabled value="Male"
                                                        {{ $employeedetail->employee->gender == 'Male' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="inlineRadio1">Male</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="gender"
                                                        id="inlineRadio2" disabled value="Femail"
                                                        {{ $employeedetail->employee->gender == 'Femail' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="inlineRadio2">Femail</label>
                                                </div>
                                            </div> --}}
                                        </div>
                                        <div class="form-group">
                                            <label for="hire_date" class="control-label mb-1">Hire Date</label>
                                            <input id="hire_date" name="hire_date" type="text" class="form-control"
                                                value="{{ $employeedetail->employee->hire_date }}" readonly>
                                            @if ($errors->has('hire_date'))
                                                <span class="text-danger">{{ $errors->first('hire_date') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="birth_date" class="control-label mb-1">Birth Date</label>
                                            <input id="birth_date" name="birth_date" type="date" class="form-control"
                                                value="{{ $employeedetail->employee->birth_date }}" readonly>
                                            @if ($errors->has('birth_date'))
                                                <span class="text-danger">{{ $errors->first('birth_date') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="position_id" class="control-label mb-1">Position</label>
                                            <input id="phone" name="phone" type="text" class="form-control"
                                                value="{{ $employeedetail->employee->position->name_position }}" readonly>
                                            {{-- <select class="form-control" name="position_id"
                                                aria-label="Default select example">
                                                <option selected>Open this select menu</option>
                                                @foreach ($position as $pos)
                                                    <option value="{{ $pos->id }}"
                                                        {{ $pos->id == $employeedetail->employee->position_id ? 'selected' : '' }}>
                                                        {{ $pos->name_position }}
                                                    </option>
                                                @endforeach
                                            </select> --}}
                                            @if ($errors->has('position_id'))
                                                <span class="text-danger">{{ $errors->first('position_id') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="salery" class="control-label mb-1">Salery</label>
                                            <input id="salery" name="salery" type="number" class="form-control"
                                                value="{{ $employeedetail->employee->salery }}" readonly>
                                            @if ($errors->has('salery'))
                                                <span class="text-danger">{{ $errors->first('salery') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="phone" class="control-label mb-1">Phone</label>
                                            <input id="phone" name="phone" type="text" class="form-control"
                                                value="{{ $employeedetail->employee->phone }}" readonly>
                                            @if ($errors->has('phone'))
                                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                                            @endif
                                        </div>
                                </div>
                            </div>

                        </div>
                    </div> <!-- .card -->

                </div>
                <!--/.col-->

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <!-- Credit Card -->
                            <div id="pay-invoice">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="education" class="control-label mb-1">Education</label>
                                        <input id="education" name="education" type="text" class="form-control"
                                            value="{{ $employeedetail->education }}" readonly>
                                        @if ($errors->has('education'))
                                            <span class="text-danger">{{ $errors->first('education') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="experience" class="control-label mb-1">Experience</label>
                                        <input id="experience" name="experience" type="text" class="form-control"
                                            value="{{ $employeedetail->experience }}" readonly>
                                        @if ($errors->has('experience'))
                                            <span class="text-danger">{{ $errors->first('experience') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="skill" class="control-label mb-1">Skill</label>
                                        <input id="skill" name="skill" type="text" class="form-control"
                                            value="{{ $employeedetail->skill }}" readonly>
                                        @if ($errors->has('skill'))
                                            <span class="text-danger">{{ $errors->first('skill') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="certification" class="control-label mb-1">Certification</label>
                                        <input id="certification" name="certification" type="text"
                                            class="form-control" value="{{ $employeedetail->certification }}" readonly>
                                        @if ($errors->has('certification'))
                                            <span class="text-danger">{{ $errors->first('certification') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="control-label mb-1">Email</label>
                                        <input id="email" name="email" type="email" class="form-control"
                                            value="{{ $employeedetail->employee->user->email }}" readonly>
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="control-label mb-1">Password</label>
                                        <input id="password" name="password" type="password" class="form-control"
                                            value="{{ $employeedetail->employee->user->password }}" readonly>
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> <!-- .card -->
                </div>
            </div>
        </div> <!-- .card -->

    </div>
@endsection
