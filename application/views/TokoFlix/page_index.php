<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
	<?php $this->load->view('TokoFlix/layout/l_head');?>
	<body>
		
		
	    <!-- ============================================================== -->
	    <!-- Preloader - style you can find in spinners.css -->
	    <!-- ============================================================== -->
	    <!-- <div class="preloader">
	        <svg class="circular" viewBox="25 25 50 50">
	            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
	    </div> -->
	    <!-- ============================================================== -->
	    <!-- Main wrapper - style you can find in pages.scss -->
	    <!-- ============================================================== -->
	    
	    <div class="wrapper">

	    	<!-- Banner -->
	        <!-- <div class="banner-top">
	            <img alt='top banner' src="<?=base_url()?>assets/images/banners/bra.jpg">
	        </div> -->
			<?php $this->load->view('TokoFlix/layout/m_top');?>
			<?=$content?>

			
			<?php $this->load->view('TokoFlix/layout/l_footer');?>
		
    	</div>
		<?php $this->load->view('TokoFlix/layout/m_login');?>
		<?php $this->load->view('TokoFlix/layout/l_bot');?>
	</body>
</html>
