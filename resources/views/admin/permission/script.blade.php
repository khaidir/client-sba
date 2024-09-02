<script type="text/javascript">
    $(document).ready(function () {

        $(function () {
            var table = $('.data-table').DataTable({
                pageLength: 25,
                processing: true,
                serverSide: true,
                ajax: "{{ route('permission.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'aksi', name: 'aksi', orderable: false, searchable: false},
                    {data: 'permission', name: 'permission'},
                    {data: 'key', name: 'key'},
                    {data: 'group', name: 'group'},
                ]
            });

            $("#dlength").append($("#table_length"));
            $("#dfilter").append($("#table_filter"));
            $("#dinfo").append($("#table_info"));
            $("#dpaging").append($("#table_paginate"));

            $('#dfilter input').removeClass('form-control-sm');
            $('.dataTables_paginate').parent().addClass('pagination-rounded justify-content-end mb-2');
            $('#dfilter input').parent().parent().addClass('col-xs-4');
            $('.select2-container').attr("width","70");
            $(".select2").select2({ width: 'resolve' });

            $('select').select2({
                placeholder: 'Pilih'
            });
        });

        $('#generate').addClass("mm-active");

        $(document).on('click', '.delete', function () {

            var id = $(this).data('id');
            const swalWithBootstrapButtons = swal.mixin({
                confirmButtonClass: 'btn btn-success btn-rounded',
                cancelButtonClass: 'btn btn-danger btn-rounded mr-3',
                buttonsStyling: false,
            })

            Swal.fire({
                title: 'Apakah Anda Yakin ingin Menghapus ?',
                icon: 'warning',
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonClass: 'btn btn-success',
                confirmButtonText: "Ya, hapus!",
                confirmButtonAriaLabel: 'Ya Hapus',
                cancelButtonClass: 'btn btn-danger',
                cancelButtonText:'Batalkan!',
                cancelButtonAriaLabel: 'Batal'
            }).then(function(result) {
                if (result?.value && (result?.value[0] != "")) {
                    $.ajax({
                        url : '/permission/delete/' + id,
                        type : "get",
                        success: function(response){
                            Swal.fire(
                                'Berhasil!',
                                'Data telah berhasil dihapus',
                                'success'
                            )
                            $('.data-table').dataTable().api().ajax.reload();
                        },
                        error: function (data) {
                            Swal.fire(
                                'Gagal',
                                'Terjadi Kesalah Sistem',
                                'error'
                            )
                        }
                    });
                } else if (
                result.dismiss === swal.DismissReason.cancel
                ) {
                    Swal.fire(
                        'Dibatalkan',
                        'Data batal dihapus',
                        'error'
                    )
                }
            })
        });
    });
    </script>
