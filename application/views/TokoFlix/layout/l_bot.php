
<!-- Migrate --> 
<script src="<?=base_url()?>assets/js/external/jquery-migrate-1.2.1.min.js"></script>
<!-- Bootstrap 3--> 
<script src="<?=base_url()?>assets/http://netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>

<!-- Slider Revolution core JavaScript files -->
<script type="text/javascript" src="<?=base_url()?>assets/revolution/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/revolution/js/jquery.themepunch.revolution.min.js"></script>

<!-- Slider Revolution extension scripts. --> 
<script type="text/javascript" src="<?=base_url()?>assets/revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/revolution/js/extensions/revolution.extension.migration.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/revolution/js/extensions/revolution.extension.video.min.js"></script>

<!-- Mobile menu -->
<script src="<?=base_url()?>assets/js/jquery.mobile.menu.js"></script>
 <!-- Select -->
<script src="<?=base_url()?>assets/js/external/jquery.selectbox-0.2.min.js"></script>
<!-- Stars rate -->
<script src="<?=base_url()?>assets/js/external/jquery.raty.js"></script>
<!-- Swiper slider -->
<script src="<?=base_url()?>assets/js/external/idangerous.swiper.min.js"></script>
<!-- Magnific-popup -->
<script src="<?=base_url()?>assets/js/external/jquery.magnific-popup.min.js"></script>
<!--*** Google map  ***-->
<script src="https://maps.google.com/maps/api/js?sensor=true"></script> 
<!--*** Google map infobox  ***-->
<script src="<?=base_url()?>assets/js/external/infobox.js"></script>  

<!-- Share buttons -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-525fd5e9061e7ef0"></script>

<!-- Form element -->
<script src="<?=base_url()?>assets/js/external/form-element.js"></script>
<!-- Form validation -->
<script src="<?=base_url()?>assets/js/form.js"></script>

<!-- Twitter feed -->
<script src="<?=base_url()?>assets/js/external/twitterfeed.js"></script>

<!-- Custom -->
<script src="<?=base_url()?>assets/js/custom.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    init_Home();
    init_MoviePage();
    init_MoviePageFull();
  });
</script>
<script type="text/javascript">

	function convertToRupiah(angka){
	    var rupiah = '';
	    var angkarev = angka.toString().split('').reverse().join('');
	    for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
	    return rupiah.split('',rupiah.length-1).reverse().join('');
	}
	function BuyIt(price) {
		
		var wallet = parseInt(localStorage.getItem("mywallet"));
		var hasil = wallet-price;
		if (hasil < 0) {
			Swal(
			  'Oh No!',
			  'Transaction Fail, Not Enough Money',
			  'error'
			)
		}else{
			Swal(
			  'Congratulation',
			  'Transaction Success',
			  'info'
			);
			localStorage.setItem("mywallet", hasil);
		}

		// parseInt(localStorage.getItem("mywallet"))=parseInt(localStorage.getItem("mywallet"))-price;
		document.getElementById("mywallet").innerHTML = convertToRupiah(localStorage.getItem("mywallet"));
	}
	  	if (localStorage.getItem("mywallet")===null) {
			localStorage.setItem("mywallet", 100000);
			Swal(
			  'Congratulation',
			  'You Got 100.000 rupiah free',
			  'info'
			)
		}

		// document.getElementById("mywallet").innerHTML = 'Rp '&convertToRupiah(localStorage.getItem("mywallet"));
		document.getElementById("mywallet").innerHTML = convertToRupiah(localStorage.getItem("mywallet"));
</script>
