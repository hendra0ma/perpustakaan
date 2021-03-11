<!-- Footer Start -->
<footer class="ct-footer footer-2 footer-dark large-padding">
    <div class="container">
        <div class="footer-widget">
            <ul class="social-media">
                <li> <a href="#"> <i class="fab fa-facebook-f"></i> </a> </li>
                <li> <a href="#"> <i class="fab fa-twitter"></i> </a> </li>
                <li> <a href="#"> <i class="fab fa-pinterest-p"></i> </a> </li>
                <li> <a href="#"> <i class="fab fa-linkedin-in"></i> </a> </li>
            </ul>
        </div>
        <div class="footer-widget">
            <ul>
                <li> <a href="#">Physics</a> </li>
                <li> <a href="#">Arabic</a> </li>
                <li> <a href="#">Science</a> </li>
                <li> <a href="#">Geography</a> </li>
            </ul>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <p class="m-0">&copy; Copyright 2021 - <a href="#">YourWebsite</a> All Rights Reserved.</p>
            </div>
        </div>
    </div>
</footer>
<!-- Footer End -->

<!-- Vendor Scripts -->
<script src="<?= base_url('assets/template') ?>/assets/js/plugins/jquery-3.4.1.min.js"></script>
<script src="<?= base_url('assets/template') ?>/assets/js/plugins/popper.min.js"></script>
<script src="<?= base_url('assets/template') ?>/assets/js/plugins/waypoint.js"></script>
<script src="<?= base_url('assets/template') ?>/assets/js/plugins/bootstrap.min.js"></script>
<script src="<?= base_url('assets/template') ?>/assets/js/plugins/jquery.inview.min.js"></script>
<script src="<?= base_url('assets/template') ?>/assets/js/plugins/jquery.magnific-popup.min.js"></script>
<script src="<?= base_url('assets/template') ?>/assets/js/plugins/jquery.slimScroll.min.js"></script>
<script src="<?= base_url('assets/template') ?>/assets/js/plugins/imagesloaded.min.js"></script>
<script src="<?= base_url('assets/template') ?>/assets/js/plugins/jquery.steps.min.js"></script>
<script src="<?= base_url('assets/template') ?>/assets/js/plugins/jquery.countdown.min.js"></script>
<script src="<?= base_url('assets/template') ?>/assets/js/plugins/isotope.pkgd.min.js"></script>
<script src="<?= base_url('assets/template') ?>/assets/js/plugins/slick.min.js"></script>

<!-- Tutorz Scripts -->
<script src="<?= base_url('assets/template') ?>/assets/js/main.js"></script>

<script>
    $(document).ready(function() {
        $('.btn.btn-primary.ml-3.cari').on('click', function() {
            $.ajax({
                url: "<?= base_url() ?>/home/cari",
                data: {
                    search: $('input[name=cari]').val(),
                },
                type: "post",
                success: function(data) {
                    $('.container-hasil').html(data);
                }
            });
        });
    });
</script>

</body>

</html>