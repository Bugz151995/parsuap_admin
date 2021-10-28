	  </div>
  </div>
</body>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script type="text/javascript">
  document.addEventListener("DOMContentLoaded", ()=>{
		// Set the options that I want
		toastr.options = {
			"closeButton": true,
			"debug": false,
			"newestOnTop": false,
			"progressBar": true,
			"positionClass": "toast-top-right",
			"preventDuplicates": true,
			"onclick": null,
			"showDuration": "300",
			"hideDuration": "1000",
			"timeOut": "5000",
			"extendedTimeOut": "1000",
			"showEasing": "swing",
			"hideEasing": "linear",
			"showMethod": "fadeIn",
			"hideMethod": "fadeOut"
		}
		

    <?php if(session()->getTempData('success')): ?>
        toastr.success("<?= session()->getTempData('success'); ?>", "Success");
    <?php endif?>
    
    <?php if(session()->getTempData('error')):  ?>
        toastr.error("<?= session()->getTempData('error'); ?>", "Error");
    <?php endif?>

    <?php if(session()->getTempData('warning')):  ?>
        toastr.warning("<?= session()->getTempData('warning'); ?>", "Warning");
    <?php endif?>

    <?php if(session()->getTempData('info')):  ?>
        toastr.info("<?= session()->getTempData('info'); ?>", "Info");
    <?php endif?>
  });
</script>

<script src="<?= site_url()?>assets/js/main.js"></script>
<script src="<?= site_url()?>assets/js/show_modal.js"></script>

</html>