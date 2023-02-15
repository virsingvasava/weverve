@extends('layouts.admin_app')
@section('title', 'Employees - View')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Employees</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">View</li>
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
                        <div class="card-body">
                            <h5 class="card-title">View <span>| Employee Details</span></h5>
                            <table class="table table-bordered table-striped">
                                @php
                                    $companyName = App\Models\Company::where('id', $employee_view->company_id)->first();
                                @endphp
                                <tbody>
                                    <tr>
                                        <th>First Name</th>
                                        <td>{{ $employee_view->first_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Last Name</th>
                                        <td>{{ $employee_view->last_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $employee_view->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone Number</th>
                                        <td>{{ $employee_view->phone_number }}</td>
                                    </tr>
                                    <tr>
                                        <th>Company Name</th>
                                        <td>
                                            @if (!empty($companyName->name))
                                                {{ $companyName->name }}
                                            @else
                                                <span>--</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>
                                            @if ($employee_view->status == 1)
                                                <span style="color:green;">Active</span>
                                            @else
                                                <span style="color:red;">InActive</span>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
