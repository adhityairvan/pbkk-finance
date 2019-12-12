{% extends 'template/dashboard.volt' %}

{% block title %}Pengeluaran{% endblock %}

{% block body %}
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Pengeluaran</h1>
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
    <!-- Bubble Chart  -->
    <div class="col-xl-6 col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Pengeluaran</h6>
            </div>
            <div class="card-body">
                <div class="chart-bubble pt-4 pb-2">
                    <canvas id="myBubbleChart"></canvas>
                </div>

            </div>
        </div>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4 col-12">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Pengeluaran</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Kategori</th>
                        <th>Jumlah</th>
                        <th>Info</th>
                        <th>Manage</th>
                    </tr>
                    </thead>
                    <tbody>
                    {% for mutation in mutations %}
                        <tr>
                            <td>{{ mutation.getCreatedAt().toDateString() }}</td>
                            <td>{{ mutation.KategoriMutasi.nama_kategori }}</td>
                            <td>{{ mutation.amount }}</td>
                            <td>{{ mutation.deskripsi }}</td>
                            <td>
                                <a href="/mutasi/delete/{{ mutation.id }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    {% endfor %}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{% endblock %}

{% block script %}
<!-- Page level plugins -->
<script src="/vendor/chart.js/Chart.min.js"></script>
<script src="/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
    <script src="/js/doughnut-debit.js"></script>
<script src="/js/demo/datatables-demo.js"></script>
{% endblock %}