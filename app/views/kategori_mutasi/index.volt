{% extends 'template/dashboard.volt' %}

{% block title %}Kategori Mutasi{% endblock %}

{% block body %}
<div class="row">
    <div class="col-md-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Kategori Pengeluaran</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="/kategori_mutasi/showCreate">Tambah</a>
                        <a class="dropdown-item" href="#">Hapus</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    {% for debit in debits %}
                        <li class="list-group-item">
                            {{ debit.nama_kategori }}
                            <button class="btn btn-outline-warning">Edit</button>
                            <button class="btn btn-outline-danger">Delete</button>
                        </li>
                    {% endfor %}
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Kategori Pemasukan</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="/kategori_mutasi/showCreate">Tambah</a>
                        <a class="dropdown-item" href="#">Hapus</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    {% for credit in credits %}
                    <li class="list-group-item">
                        {{ credit.nama_kategori }}
                        <a href="/kategori_mutasi/showEdit/{{ credit.id }}" class="btn btn-outline-warning">Edit</a>
                        <a href="/kategori_mutasi/delete/{{ credit.id }}" class="btn btn-outline-danger">Delete</a>
                    </li>
                    {% endfor %}
                </ul>
            </div>
        </div>
    </div>
</div>
{% endblock %}