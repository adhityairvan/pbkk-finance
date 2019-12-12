{% extends 'template/dashboard.volt' %}

{% block title %}
Home
{% endblock %}

{% block body %}
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<!-- Content Row -->
<div class="d-sm-flex align-items-center justify-content-between mb-2 offset-11">
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Bulan
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
            <button class="dropdown-item" type="button">Januari</button>
            <button class="dropdown-item" type="button">Februari</button>
            <button class="dropdown-item" type="button">Maret</button>
            <button class="dropdown-item" type="button">April</button>
            <button class="dropdown-item" type="button">Mei</button>
            <button class="dropdown-item" type="button">Juni</button>
            <button class="dropdown-item" type="button">Juli</button>
            <button class="dropdown-item" type="button">Agustus</button>
            <button class="dropdown-item" type="button">September</button>
            <button class="dropdown-item" type="button">Oktober</button>
            <button class="dropdown-item" type="button">November</button>
            <button class="dropdown-item" type="button">Desember</button>
        </div>
    </div>
</div>

<!-- Content Row -->

<div class="row">
    <!-- Pie Chart -->
    <div class="col-xl-6 col-lg-6">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Pemasukan</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                </div>
                <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Gaji
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Tunjangan
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-info"></i> dll..
                    </span>
                </div>
            </div>
        </div>
    </div>
    <!-- Pie Chart -->
    <div class="col-xl-6 col-lg-6">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Pengeluaran</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart2"></canvas>
                </div>
                <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Internet
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Listrik
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-info"></i> dll..
                    </span>
                </div>
            </div>
        </div>
    </div>

</div>
{% endblock %}

{% block modal %}
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Are you sure you want to logout?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>
{% endblock %}

{% block script %}
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>
{% endblock %}