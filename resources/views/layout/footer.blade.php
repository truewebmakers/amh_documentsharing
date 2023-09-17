{{-- <footer class="footer">
    <div><a href="https://coreui.io">CoreUI </a><a href="https://coreui.io">Bootstrap Admin Template</a> © 2023 creativeLabs.</div>
    <div class="ms-auto">Powered by&nbsp;<a href="https://coreui.io/docs/">CoreUI UI Components</a></div>
  </footer> --}}
</div>
<!-- CoreUI and necessary plugins-->

<script src="/assets/vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
<script src="/assets/vendors/simplebar/js/simplebar.min.js"></script>
<!-- Plugins and scripts required by this view-->
<script src="/assets/vendors/chart.js/js/chart.min.js"></script>
<script src="/assets/vendors/@coreui/chartjs/js/coreui-chartjs.js"></script>
<script src="/assets/vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="/assets/js/main.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://yaireo.github.io/tagify/dist/jQuery.tagify.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

 
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<script src="/assets/js/dropzone.js"></script>
<script>
   $(document).ready(function() {
            // Select the alert element by its ID
            var alertElement = $(".alert");

            // Function to hide the alert
            function hideAlert() {
                alertElement.fadeOut(1000); // You can adjust the fadeout duration
            }

            // Show the alert
            alertElement.fadeIn(1000); // You can adjust the fadein duration

            // Set a timer to hide the alert after 10 seconds
            setTimeout(hideAlert, 5000); // 10000 milliseconds = 10 seconds
        });
</script>

</body>
</html>