{% extends 'template/dashboard.volt' %}

{% block title %}Input Pengeluaran{% endblock %}

{% block body %}

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Input Pengeluaran</h1>
    </div>

    <!-- Content Row -->

    <!-- Content Row -->

    <div class="row">
        <form method="post" action="/mutasi/storePengeluaran">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="judul">Nama Pengeluaran</label>
                    {{ form.render('judul') }}
                </div>
                <div class="form-group col-md-6">
                    <label for="amount">Jumlah Pengeluaran</label>
                    {{ form.render('amount') }}
                </div>
            </div>
            <div class="form-group">
                <label for="kategori_id">Kategori</label>
                {{ form.render('kategori_id')}}
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                {{ form.render('deskripsi') }}
            </div>
            {{ form.render('tipe') }}
            <button type="submit" class="btn btn-primary col-md-5">Submit</button>
        </form>
    </div>

{% endblock %}