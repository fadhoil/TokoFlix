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
        return $hasil_rupiah;   # code...
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
<div class="col-md-12" style="    padding-bottom: 35px;"></div>
<section class="container">
    <div class="col-sm-8 col-md-9">
        <div class="movie">
            <h2 class="page-heading"><?=$movies['title']?></h2>
            
            <div class="movie__info">
                <div class="col-sm-4 col-md-3 movie-mobile">
                    <div class="movie__images">
                        <span class="movie__rating"><span class="fa fa-star"></span> <?=$movies['vote_average']?> / 10</span>
                        <img alt='' style="width: 100%;height: auto;" src="https://image.tmdb.org/t/p/w500/<?=$movies['poster_path']?>">
                    </div>
                    <div class="movie__rate" ><small class="fa fa-eye" style="margin-bottom: 0px;padding-left: 10px"></small>  &nbsp;&nbsp;&nbsp;<?=$movies['popularity']?> views</div>
                </div>

                <div class="col-sm-8 col-md-9">
                    <p class="movie__time"><?=$movies['runtime']?> min</p>

                    <p class="movie__option"><strong>Country : </strong><a href="#"><?=(!empty($movies['production_countries'][0]['name']) ? $movies['production_countries'][0]['name'] : '-')  ?></a></p>
                    <p class="movie__option"><strong>Year : </strong><a href="#"><?=date('Y', strtotime($movies['release_date']))?></a></p>
                    <p class="movie__option"><strong>Category : </strong><?php $genre=''; foreach ($movies['genres'] as $row) { 
                            $genre=$genre.'<a href="#">'.$row['name'].'</a>, ';
                        } ?><?= substr($genre,0,-2)?></p>
                    <p class="movie__option"><strong>Release date : </strong><?=date('F d, Y', strtotime($movies['release_date']))?></p>
                    <p class="movie__option"><strong>Director : </strong><?php $director=''; foreach ($credits['crew'] as $row) {
                        if ($row['job']=='Director') {
                            $director=$director.'<a href="#">'.$row['name'].'</a>, ';
                            }
                        } ?><?= substr($director,0,-2)?></p>
                    <p class="movie__option"><strong>Actors : </strong><?php $actors=''; foreach ($credits['cast'] as $key=>$row) {
                            $actors=$actors.'<a href="#">'.$row['name'].'</a>, ';
                            if ($key==6) {
                                # code...
                                break;
                            }
                        } ?><?= substr($actors,0,-2)?></p>

                        <div class="movie__btns movie__btns--full">
                        <a href="#" class="btn btn-md btn--warning" onclick="BuyIt(<?=ConvertR($movies['vote_average'])?>)">Buy this movie<br>
                          <strong style="font-size: 30px;"><?= Rupiah(ConvertR($movies['vote_average']))?></strong></a>
                        <!-- <a href="#" class="watchlist">Add to watchlist</a> -->
                    </div>

                    <div class="share">
                        <span class="share__marker">Share: </span>
                        <div class="addthis_toolbox addthis_default_style ">
                            <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
                            <a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="clearfix"></div>
            
            <h2 class="page-heading">The plot</h2>
            <p class="movie__describe"><?=$movies['overview']?> </p>

            <h2 class="page-heading">photos &amp; videos</h2>
            <div class="movie__media">
                <div class="movie__media-switch">
                    <a href="#" class="watchlist list--photo" data-filter='media-photo'>234 photos</a>
                    <a href="#" class="watchlist list--video" data-filter='media-video'>10 videos</a>
                </div>

                <div class="swiper-container">
                  <div class="swiper-wrapper">
                      <!--First Slide-->
                      <?php foreach ((array)$videos as $row) {?>
                        <div class="swiper-slide media-video">
                          <a href='https://www.youtube.com/watch?v=<?=$row['key']?>' class="movie__media-item ">
                               <img alt='' style="width: 100%;height: auto;" src="https://img.youtube.com/vi/<?=$row['key']?>/hqdefault.jpg">
                          </a>
                        </div>
  
                      <?php } ?>

                      <?php foreach ((array)$images as $row) {?>
                      <div class="swiper-slide media-photo"> 
                            <a href='https://image.tmdb.org/t/p/w500/<?=$row['file_path']?>' class="movie__media-item">
                                <img alt='' style="width: 100%;height: auto;" src="https://image.tmdb.org/t/p/w500/<?=$row['file_path']?>">
                             </a>
                      </div>
                      <?php } ?>

                  </div>
                </div>

            </div>
            

        </div>
       
    </div>
    <aside class="col-sm-4 col-md-3">
        <div class="sitebar">
            <div class="category category--cooming category--count marginb-sm mobile-category ls-cat">
                <h3 class="category__title">the Similiar <br><span class="title-edition">Movies</span></h3>
                <ol>
                  <?php foreach ((array)$similiars as $row) {?>
                    <li><a target="_blank" href="<?=base_url('H/detail/').$row['id'].'-'.seoUrl($row['title'])?>" class="category__item"><?=$row['title']?></a></li>
                  <?php } ?>
                </ol>
            </div>

            <div class="category category--cooming category--count marginb-sm mobile-category rs-cat">
                <h3 class="category__title">recommends<br><span class="title-edition">movies</span></h3>
                <ol>
                  <?php foreach ((array)$recommendations as $row) {?>
                    <li><a target="_blank" href="<?=base_url('H/detail/').$row['id'].'-'.seoUrl($row['title'])?>" class="category__item"><?=$row['title']?></a></li>
                  <?php } ?>
                </ol>
            </div>
            
           

        </div>
    </aside>
</section>
<div class="clearfix"></div>