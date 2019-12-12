{% extends 'template/dashboard.volt' %}

{% block title %}Dashboard{% endblock %}

{% block body %}
<div class="row" >
    <div class="col-xl-6 col-lg-6">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Pemasukan</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <canvas height="100" id="myPieChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-lg-6">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Pengeluaran</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <canvas height="100" id="myPieChart-debit"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card shadow mb-4" style="max-width: 18rem;">
            <div class="card-header">Saldo</div>
            <div class="card-body">
                <h5 class="card-title">IDR {{ keuangan }}</h5>
            </div>
        </div>
    </div>
</div>
{% endblock %}

{% block script %}
    <!-- Page level plugins -->
    <script src="/vendor/chart.js/Chart.min.js"></script>
{#    <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>#}

    <!-- Page level custom scripts -->
    <script src="/js/doughnut.js"></script>
    <script src="/js/doughnut-debit.js"></script>
{% endblock %}