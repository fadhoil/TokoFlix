<?php 
	function ConvertR($rating=0)
	{
		$price=0;
		switch (true) {
			case (1<=$rating and $rating<3):
				# code...
				$price=3500;
				break;
			case (3<=$rating and $rating<6):
				# code...
				$price=8250;
				break;
			case (6<=$rating and $rating<8):
				# code...
				$price=16350;
				break;
			case (8<=$rating and $rating<=10):
				# code...
				$price=21250;
				break;
			
			default:
				# code...
				break;
		}
		return $price;
	}
	function Rupiah($angka)
	{
		$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
		return $hasil_rupiah;	# code...
	}
	function seoUrl($string) {
	    //Lower case everything
	    $string = strtolower($string);
	    //Make alphanumeric (removes all other characters)
	    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
	    //Clean up multiple dashes or whitespaces
	    $string = preg_replace("/[\s-]+/", " ", $string);
	    //Convert whitespaces and underscore to dash
	    $string = preg_replace("/[\s_]/", "-", $string);
	    return $string;
	}
?>

<?php $this->load->view('TokoFlix/layout/l_slider');?>
			
<!-- Main content -->
<section class="container">
	<?php $this->load->view('TokoFlix/layout/m_bestmovie');?>
	<div class="clearfix"></div>
	<h2 id='target' class="page-heading heading--outcontainer">Now in the cinema</h2>
	<div class="col-sm-12">
		<div class="row">
			<!-- List Movie -->
			<div class="col-sm-8 col-md-9">
			    <!-- Movie variant with time -->
			    	<?php foreach ($movies as $row) { ?>
				        <div class="movie movie--test movie--test--dark movie--test--left">
				            <div class="movie__images">
				                <a target="_blank" href="<?=base_url('H/detail/').$row['id'].'-'.seoUrl($row['title'])?>" class="movie-beta__link">
				                    <img height="285px" alt='' src="https://image.tmdb.org/t/p/w500/<?=$row['poster_path']?>">
				                </a>
				            </div>

				            <div class="movie__info">
				                <a target="_blank" href="<?=base_url('H/detail/').$row['id'].'-'.seoUrl($row['title'])?>" class="movie__title"><?=$row['title'].' ('.date('Y', strtotime($row['release_date'])).') '?></a>

				                <p class="movie__time">91 min</p>

				                <p class="movie__option" style="font-size: 15px"> <strong> Price : <?= Rupiah(ConvertR($row['vote_average']))?> </strong>
								</p>	
				                <p class="movie__describe"><?=$row['overview']?></p>
				                <div class="movie__rate row">
				                    <span class="movie__rating" style="top: 20%;"><span class="fa fa-star"></span> <?=$row['vote_average']?> / 10</span>
				                    <?php 
				                    $strings = array(
									    'title="Buy Now!" class="fa fa-usd"',
									    'title="Play Now!" class="fa fa-play-circle-o"',
									);
									$key = array_rand($strings);
				                    ?>
				                  	<a href="<?=base_url('H/detail/').$row['id'].'-'.seoUrl($row['title'])?>" class="button"><i <?=$strings[$key]?> style="font-size: 40px;float: right;padding-right: 25px;"></a></i>
				                </div>               
				            </div>
				        </div>
			       	<?php } ?>
			     <!-- Movie variant with time -->
			</div>
			<!-- Iklan -->
			<aside class="col-sm-4 col-md-3">
			    <div class="sitebar first-banner--left">
			        <div class="banner-wrap first-banner--left">
			            <img alt='banner' src="<?=base_url()?>assets/images/banners/sale.jpg">
			        </div>

			         <div class="banner-wrap">
			            <img alt='banner' src="<?=base_url()?>assets/images/banners/sport.jpg">
			        </div>

			         <div class="banner-wrap banner-wrap--last">
			            <img alt='banner' src="<?=base_url()?>assets/images/banners/boots.jpg">
			        </div>

			        <div class="promo marginb-sm">
			          <div class="promo__head">A.Movie app</div>
			          <div class="promo__describe">for all smartphones<br> and tablets</div>
			          <div class="promo__content">
			              <ul>
			                  <li class="store-variant"><a href="#"><img alt='' src="<?=base_url()?>assets/images/apple-store.svg"></a></li>
			                  <li class="store-variant"><a href="#"><img alt='' src="<?=base_url()?>assets/images/google-play.svg"></a></li>
			                  <li class="store-variant"><a href="#"><img alt='' src="<?=base_url()?>assets/images/windows-store.svg"></a></li>
			              </ul>
			          </div>
			      </div>

			    </div>
			</aside>
		</div>
	</div>
</section>
<div class="clearfix"></div>