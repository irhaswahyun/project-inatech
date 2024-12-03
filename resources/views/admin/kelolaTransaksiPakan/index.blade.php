@extends('layouts.template')
@section('title', 'Kelola Transaksi Pakan')
@section('content')
    <div class="card">
        <div class="card-header">Data Transaksi Pakan</div>
        <div class="card-body">
            {{-- @if (session('success'))
                <div class="alert alert-success" id="success-alert">
                    {{ session('success') }}
                </div>
            @endif --}}
            <table class="table mb-3" id="table_kelolaTransaksiPakan">
                <thead>
                    <tr>
                        <th style="display: none">ID</th>
                        <th class="text-center">KODE</th>
                        <th class="text-center">TANGGAL</th>
                        <th class="text-center">NAMA PAKAN</th>
                        <th class="text-center">TIPE TRANSAKSI</th>
                        <th class="text-center">QUANTITY</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    {{-- Modal --}}
    <div class="modal fade text-left" id="transaksiPakanDetailModal" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel17" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content" style="border-radius: 15px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
                <div class="modal-header bg-primary" style="border-top-left-radius: 15px; border-top-right-radius: 15px;">
                    <h5 class="modal-title white" id="myModalLabel17">Detail Transaksi Pakan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body" style="padding: 20px; max-height: 70vh; overflow-y: hidden;">
                    <div id="transaksiPakan-detail-content" class="container-fluid">
                        <div class="text-center mb-3">
                            <h4 class="mb-4"></h4>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="image-container text-center" style="position: sticky; top: 20px;">
                                    <img src="" alt="Foto Pakan" class="img-fluid"
                                        style="width: auto; height: 30vh;">
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div style="max-height: 30vh; overflow-y: auto; padding-right: 15px;">
                                    <p><strong>Kode : </strong></p>
                                    <p><strong>Nama Pakan : </strong></p>
                                    <p><strong>Tipe Transaksi : </strong></p>
                                    <p><strong>Quantity : </strong></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="border-bottom-left-radius: 15px; border-bottom-right-radius: 15px;">
                    <button type="button" class="btn btn-danger" id="btn-delete-transaksiPakan">Hapus</button>
                    <button type="button" class="btn btn-primary" id="btn-edit-transaksiPakan">Edit</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('css')
@endpush
@push('js')
    <script>
        var currentTransaksiPakanId;
        $(document).ready(function() {
            var dataKelolaTransaksiPakan = $('#table_kelolaTransaksiPakan').DataTable({
                serverSide: true,
                ajax: {
                    "url": "{{ url('kelolaTransaksiPakan/list') }}",
                    "dataType": "json",
                    "type": "POST",
                    "error": function(xhr, error, thrown) {
                        console.error('Error fetching data: ', thrown);
                    }
                },
                columns: [{
                    data: "id_transaksi_pakan",
                    visible: false
                }, {
                    data: "kd_transaksi_pakan",
                    className: "col-md-2 text-center", // Jika tidak ada class, hapus baris ini
                    orderable: true,
                    searchable: false,
                    render: function(data, type, row) {
                        var url = '{{ route('admin.kelolaTransaksiPakan.show', ':id') }}';
                        url = url.replace(':id', row.id_transaksi_pakan);
                        return '<a href="javascript:void(0);" data-id="' + row
                            .id_transaksi_pakan +
                            '" class="view-transaksiPakan-details" data-url="' + url +
                            '" data-toggle="modal" data-target="#transaksiPakanDetailModal">' +
                            data + '</a>';
                    }
                }, {
                    data: "created_at_formatted",
                    className: "col-md-2 text-center",
                    orderable: true,
                    searchable: false,
                }, {
                    data: "pakan_gudang",
                    className: "col-md-4", // Jika tidak ada class, hapus baris ini
                    orderable: false,
                    searchable: true
                }, {
                    data: "tipe_transaksi",
                    className: "col-md-2 text-center", // Jika tidak ada class, hapus baris ini
                    orderable: true,
                    searchable: true
                }, {
                    data: "quantity",
                    className: "col-md-2 text-center", // Jika tidak ada class, hapus baris ini
                    orderable: true,
                    searchable: false,
                    render: function(data, type, row) {
                        return data ? new Intl.NumberFormat('id-ID').format(data) : '-';
                    }
                }],
                pagingType: "simple_numbers", // Tambahkan ini untuk menampilkan angka pagination
                dom: 'frtip', // Mengatur layout DataTables
                language: {
                    search: "" // Menghilangkan teks "Search"
                }
            });

            // Event listener untuk menampilkan detail tambak
            $(document).on('click', '.view-transaksiPakan-details', function() {
                var url = $(this).data('url');
                currentTransaksiPakanId = $(this).data('id');

                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(response) {
                        if (response.html) {
                            // Load konten detail ke modal
                            $('#transaksiPakan-detail-content').html(response.html);
                            $('#transaksiPakanDetailModal').modal('show');
                        } else {
                            alert('Gagal memuat detail transaksi pakan');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                        alert('Gagal memuat detail transaksi pakan');
                    }
                });
            });

            $(document).on('click', '#btn-edit-transaksiPakan', function() {
                if (currentTransaksiPakanId) {
                    var editUrl = '{{ route('admin.kelolaTransaksiPakan.edit', ':id') }}'.replace(':id',
                        currentTransaksiPakanId);
                    window.location.href = editUrl;
                } else {
                    alert('ID transaksi pakan tidak ditemukan');
                }
            });

            $(document).on('click', '#btn-delete-transaksiPakan', function() {
                if (currentTransaksiPakanId) {
                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: 'Data transaksi pakan ini akan dihapus secara permanen!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            var deleteUrl =
                                '{{ route('admin.kelolaTransaksiPakan.destroy', ':id') }}'
                                .replace(':id', currentTransaksiPakanId);
                            $.ajax({
                                url: deleteUrl,
                                type: 'POST',
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    "_method": "DELETE"
                                },
                                success: function(response) {
                                    if (response.success) {
                                        Swal.fire({
                                            title: 'Berhasil!',
                                            text: response.message,
                                            icon: 'success',
                                            timer: 2000,
                                            showConfirmButton: true
                                        }).then(() => {
                                            window.location.href =
                                                "{{ route('admin.kelolaTransaksiPakan.index') }}"; // Redirect ke index
                                        });
                                    } else {
                                        Swal.fire({
                                            title: 'Gagal!',
                                            text: 'Gagal menghapus transaksi pakan: ' +
                                                response.message,
                                            icon: 'error'
                                        });
                                    }
                                },
                                error: function(xhr) {
                                    let errorMsg = 'Gagal menghapus transaksi pakan.';
                                    if (xhr.responseJSON && xhr.responseJSON.message) {
                                        errorMsg += ' ' + xhr.responseJSON.message;
                                    }
                                    Swal.fire({
                                        title: 'Error!',
                                        text: errorMsg,
                                        icon: 'error'
                                    });
                                }
                            });
                        }
                    });
                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: 'ID transaksi pakan tidak ditemukan',
                        icon: 'error'
                    });
                }
            });

            // Tambahkan tombol "Tambah" setelah kolom pencarian
            $("#table_kelolaTransaksiPakan_filter").append(
                '<button id="btn-tambah" class="btn btn-primary ml-2">Tambah</button>'
            );

            // Tambahkan event listener untuk tombol
            $("#btn-tambah").on('click', function() {
                window.location.href =
                    "{{ url('kelolaTransaksiPakan/create') }}"; // Arahkan ke halaman tambah pengguna
            });

            // Menambahkan placeholder pada kolom search
            $('input[type="search"]').attr('placeholder', 'Cari data transaksi pakan...');
            $('#id_role').on('change', function() {
                dataKelolaTransaksiPakan.ajax.reload();
            })
        });
    </script>
@endpush
