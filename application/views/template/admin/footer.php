<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

<!-- Main Footer -->
<footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.1.0-rc
    </div>
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?= base_url('assets/dashboard') ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?= base_url('assets/dashboard') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('assets/dashboard') ?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/dashboard') ?>/dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?= base_url('assets/dashboard') ?>/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?= base_url('assets/dashboard') ?>/plugins/raphael/raphael.min.js"></script>
<script src="<?= base_url('assets/dashboard') ?>/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?= base_url('assets/dashboard') ?>/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<script src="<?= base_url('assets/dashboard') ?>/plugins/jquery/jquery.js"></script>
<!-- ChartJS -->
<script>
    $('.lihat-gambar').click(function() {
        const id = $(this).data("id");

        $.ajax({
            url: "<?= base_url() ?>dashboard/admin/admin/getBukuById",
            data: {
                "id": id,
            },
            dataType: "json",
            type: "get",
            success: function(data) {
                const img = data.gambar_buku;
                $('img.img-fluid.image').attr('src', `<?= base_url() ?>/assets/dashboard/docs/assets/img/upload/` + img);
            }
        });
    });

    $(document).on('click', '.badge.badge-primary.edit', function() {
        const id = $(this).data("id");
        $('#formJenis').attr("action", "<?= base_url() ?>dashboard/admin/admin/updateJenis");
        $('.hidden.id').val(id);
        $('#formModal').html("Edit Data");
        console.log(id);
        $.ajax({
            url: "<?= base_url() ?>/dashboard/admin/admin/getJenisPerIdAjax",
            data: {
                ids: id,
            },
            type: "post",
            dataType: "json",
            success: function(data) {
                $('#nama_jenis').val(data[0].nama_jenis);
            }
        })
    });
    $(document).on('click', '#tombol_tambah_jenis', function() {
        $('#formJenis').attr("action", "<?= base_url() ?>dashboard/admin/admin/tambahJenis");
        $('.hidden.id').val("");
        $('#formModal').val("");
        $('#nama_jenis').val("");
        $('#formModal').html("tambah Data");
    })
</script>
<script src="<?= base_url('assets/dashboard') ?>/plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/dashboard') ?>/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url('assets/dashboard') ?>/dist/js/pages/dashboard2.js"></script>
<!-- <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.23/r-2.2.7/datatables.min.js"></script>
 -->
<script src="<?= base_url('assets/dashboard/datatables/js/datatables.js') ?>"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script> -->


<script>
    var doc = new jsPDF();


    $('.convert').click(function() {
        const nama = $(this).data('convert');
        doc.fromHTML($('.table.datatable').html(), 15, 15, {
            'width': 170,
        });
        doc.save(nama + '.pdf');
    });
</script>


<script>
    $(document).ready(function() {
        $('#datatable').DataTable();
        setTimeout(function() {
            $('.alert.alert-danger.alert-dismissible.mt-3.fade.show.text-light').fadeOut(500);
        }, 3000);
    });
    $(document).ready(function() {
        $('.table.datatable').DataTable();
        setTimeout(function() {
            $('.alert.alert-danger.alert-dismissible.mt-3.fade.show.text-light').fadeOut(500);
        }, 3000);
    });


    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('.img-fluid.image').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#inputGroupFile01").change(function() {
        readURL(this);
    });
</script>
</body>

</html>