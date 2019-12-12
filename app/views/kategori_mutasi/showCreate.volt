{% extends 'template/dashboard.volt' %}

{% block title %}Input Kategori Pemasukan{% endblock %}

{% block body %}

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Input Pemasukan</h1>
    </div>

    <!-- Content Row -->

    <!-- Content Row -->

    <div class="row">
        <form method="post" action="/kategori_mutasi/store">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="inputPengeluaran">Nama Kategori</label>
                    {{ form.render('nama_kategori') }}
                </div>
                <div class="form-group">
                    <label for="inputKategori">Kategori</label>
                    {{ form.render('tipe')}}
                </div>
                <button type="submit" class="btn btn-primary col-md-5">Submit</button>
            </div>
        </form>
    </div>

{% endblock %}