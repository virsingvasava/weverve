@extends('layouts.admin_app')
@section('title', 'Employee - Create')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Employees</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">Create</li>
                    <li class="breadcrumb-item active"><a href="{{ route('admin.employee.index') }}">Employees List</a></li>
                </ol>
            </nav>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-12 mt-3 mb-4">
                    <div class="form-group">
                        <div class="col p-0">
                            <a href="{{ route('admin.employee.index') }}" class="btn btn-primary btn-sm"
                                data-repeater-create="" type="button">
                                <span><i class="ri-arrow-left-circle-fill"></i></span>
                                <span class="invoice-repeat-btn">Back</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card recent-sales overflow-auto">
                        <form action="{{ route('admin.employee.update') }}" method="post" id="employee_edit"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $employee_edit->id }}">
                            <div class="card-body">
                                <h5 class="card-title">Create <span>| Employee</span></h5>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <select
                                                class="form-select custom-select @error('company_id') is-invalid @enderror"
                                                name="company_id">
                                                <option value="">Choose Company</option>
                                                @if (!empty($companyArr) && count($companyArr) > 0)
                                                    @foreach ($companyArr as $key => $value)
                                                        <option value="{{ $value->id }}"
                                                            {{ $value->id == $employee_edit->company_id ? 'selected' : '' }}>
                                                            {{ $value->name }}
                                                        </option>
                                                    @endforeach
                                                @else
                                                @endif
                                            </select>
                                            @error('company_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" class="form-control" name="first_name"
                                                placeholder="Enter First Name" value="{{ $employee_edit->first_name }}">
                                            @error('first_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" name="last_name"
                                                placeholder="Enter Last Name" value="{{ $employee_edit->last_name }}">
                                            @error('last_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" class="form-control" name="email"
                                                placeholder="Enter Email" value="{{ $employee_edit->email }}">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input type="text" class="form-control" name="phone_number"
                                                placeholder="Phone Number" value="{{ $employee_edit->phone_number }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control custom-select" name="status">
                                                <option value="">Select Status</option>
                                                <option @if ($employee_edit->status == 1) selected="selected" @endif
                                                    value="1">Active</option>
                                                <option @if ($employee_edit->status == 0) selected="selected" @endif
                                                    value="0">InActive</option>
                                            </select>
                                            @error('status')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="card-footer">
                                        <button type="submit"
                                            class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm loader_class">Submit</button>
                                        <a href="{{ route('admin.company.index') }}"
                                            class="d-none d-sm-inline-block btn btn-sm btn-danger btn_loader">Cancel</a>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
            </div>
        </section>
    </main>
@endsection
