@extends('layouts.admin_app')
@section('title', 'Company - View')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Companies</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">View</li>
                    <li class="breadcrumb-item active"><a href="{{ route('admin.company.index') }}">Companies List</a></li>
                </ol>
            </nav>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-12 mt-3 mb-4">
                    <div class="form-group">
                        <div class="col p-0">
                            <a href="{{ route('admin.company.index') }}" class="btn btn-primary btn-sm"
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
                            <h5 class="card-title">View <span>| Company Details</span></h5>
                            <table class="table table-bordered table-striped">
                                <tbody>
                                    <tr>
                                        <th>Name</th>
                                        <td>{{ $company_view->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $company_view->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Website</th>
                                        <td>{{ $company_view->website }}</td>
                                    </tr>
                                    <tr>
                                        <th>Logo</th>
                                        <td>
                                            @if ($company_view->logo_picture != '' && file_exists(public_path('company_logo/' . $company_view->logo_picture)))
                                                <img src="{{ asset('company_logo/' . $company_view->logo_picture) }}"
                                                    style="height: 80px; width: 80px;" alt="Logo Picture"
                                                    class="img-circle elevation-2" />
                                            @else
                                                <img src="{{ asset('company_logo/avatar.jpg') }}" alt="Logo Picture"
                                                    style="height: 80px; width: auto;" class="img-circle elevation-2" />
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>Status</th>
                                        <td>
                                            @if ($company_view->status == 1)
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
