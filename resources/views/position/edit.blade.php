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
                <a href="{{ url('position') }}" class="btn btn-outline-secondary">
                    <i class="menu-icon fa fa-mail-reply-all"></i> <strong class="card-title">Back</strong>
                </a>
            </div>
            <div class="card-body">
                <!-- Credit Card -->
                <div id="pay-invoice">
                    <div class="card-body">
                        <form action="{{ url("position/$position->id") }}" method="post" novalidate="novalidate">
                            @method('patch')
                            @csrf
                            <div class="form-group">
                                <label for="name_position" class="control-label mb-1">Name Position</label>
                                <input id="name_position" name="name_position" type="text" class="form-control"
                                    value="{{ $position->name_position }}">
                                @if ($errors->has('name_position'))
                                    <span class=" text-danger">{{ $errors->first('name_position') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="departement_id" class="control-label mb-1">Departement</label>
                                <select class="form-control" name="departement_id" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    @foreach ($departement as $dept)
                                        <option value="{{ $dept->id }}"
                                            {{ $dept->id == $position->departement_id ? 'selected' : '' }}>
                                            {{ $dept->name_departement }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('departement_id'))
                                    <span class="text-danger">{{ $errors->first('departement_id') }}</span>
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
