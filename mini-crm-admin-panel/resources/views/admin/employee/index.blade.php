@extends('layouts.admin_app')
@section('title', 'Employees')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Users</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">List of</li>
                    <li class="breadcrumb-item active">Employees</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-12 mt-3 mb-4">
                    <div class="form-group">
                        <div class="col p-0">
                            <a href="{{ route('admin.employee.create') }}" class="btn btn-primary btn-sm"
                                data-repeater-create="" type="button">
                                <i class="bx bx-plus"></i>
                                <span class="invoice-repeat-btn">Add New</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card recent-sales overflow-auto">
                        <div class="filter" style="display:none">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                </li>
                                <li><a class="dropdown-item" href="#">Today</a></li>
                                <li><a class="dropdown-item" href="#">This Month</a></li>
                                <li><a class="dropdown-item" href="#">This Year</a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">List of <span>| Users</span></h5>
                            <table class="table table-borderless datatable">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Phone number</th>
                                        <th>Company Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($employeeArr) && count($employeeArr) > 0)
                                        @foreach ($employeeArr as $key => $value)
                                            @php
                                                $companyName = App\Models\Company::where('id',$value->company_id)->first();
                                            @endphp
                                            <tr>
                                                <td>#{{ $key + 1 }}</td>
                                                <td>{{ ucfirst($value->first_name) }}</td>
                                                <td>{{ ucfirst($value->last_name) }}</td>
                                                <td>{{ $value->email }}</td>
                                                <td>{{ $value->phone_number }}</td>
                                                <td>
                                                    @if (!empty($companyName->name))
                                                        {{$companyName->name}}
                                                    @else
                                                        <span>--</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-between py-50">
                                                        <div class="custom-control custom-switch custom-switch-glow">
                                                            <input type="checkbox" data-id="{{ $value->id }}"
                                                                name="status" class="js-switch-employee"
                                                                {{ $value->status == 1 ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center">

                                                    <a href="{{route('admin.employee.view',$value->id)}}" class="btn icon_loader btn-sm btn-info"><i class="ri-eye-fill"></i>
                                                    </a>
                                                    <a href="{{route('admin.employee.edit',$value->id)}}" class="btn icon_loader btn-sm btn-primary"><i class="ri-edit-box-fill"></i>
                                                    </a>
                                                    <a href="javascript:void(0)" class="btn btn-sm btn-danger delete_button_employee" data-id="{{$value->id}}"><i class="ri-delete-bin-6-fill"></i></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="10">No Employee Found.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Popup modal for Delete start -->
    <div class="modal fade" id="employeeDeleteModel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Are You sure ?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure to Delete Employee?
                </div>
                <form method="post" action="{{ route('admin.employee.delete') }}" id="form_delete">
                    @csrf
                    <input type="hidden" name="id" class="page_id">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger form_submit btn_loader">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- delete modal Modal start-->

    
@endsection
