@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Full Width Card Example -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Wellcome to Agris Invest
                            </div>
                            <p class="mb-0">Calculate price soil using Fuzzy Tsukamoto method and soil fertility using Fuzzy Sugeno method.</p>
                            <a href="{{ url('/') }}" class="btn btn-info mt-2">View Details</a>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-info-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Manajemen Informasi Lahan Card -->
    <div class="row mb-4">
        <div class="col-xl-6 col-md-6">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Manajemen Informasi Lahan
                            </div>
                            <p class="mb-0">Manage and view land information details here.</p>
                            <a href="{{ route('lahan.index') }}" class="btn btn-primary mt-2">Go to Land Management</a>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Fuzzy Tsukamoto Perhitungan Harga --}}
        <div class="col-xl-6 col-md-6">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Perhitungan Harga Lahan per Hektar
                            </div>
                            <p class="mb-0">Calculate land price per hectare using Fuzzy Tsukamoto method.</p>
                            <a href="{{ route('harga.index') }}" class="btn btn-success mt-2">Perform Calculation</a>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calculator fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Documentation Card -->
    <div class="row mb-4">
        <div class="col-xl-6 col-md-6">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Dokumentasi
                            </div>
                            <p class="mb-0">Access the detailed documentation for soil fertility calculations.</p>
                            <a href="https://jim.usk.ac.id/JFP/article/download/27956/13089" class="btn btn-info mt-2" target="_blank">View Documentation</a>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-landmark fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <!-- Fuzzy Sugeno Perhitungan Kesuburan -->
    <div class="col-xl-6 col-md-6">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Perhitungan Kesuburan
                        </div>
                        <p class="mb-0">Calculate soil fertility using Fuzzy Sugeno method.</p>
                        <a href="{{ route('kesuburan.index') }}" class="btn btn-warning mt-2">Perform Calculation</a>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-leaf fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

</div>
@endsection
