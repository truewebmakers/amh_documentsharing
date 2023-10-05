<!-- CoreUI and necessary plugins-->
<script src="assets/vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
<script src="assets/vendors/simplebar/js/simplebar.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
    $(".toggle-password").click(function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        input = $("#password");
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
</script>

</body>

</html>
