<!-- best movie -->
<div class="movie-best">
     <div class="col-sm-10 col-sm-offset-1 movie-best__rating">The 6 Best Movies</div>
     <div class="col-sm-12 change--col">
        <?php
        $i=0;
        foreach ($trendings as $row) { ?>
            <div class="movie-beta__item ">
                <img alt='' height="280px" style="min-width: 100%" src="https://image.tmdb.org/t/p/w500/<?=$row['poster_path']?>">
                 <span class="best-rate"><?=$row['vote_average']?></span>

                 <ul class="movie-beta__info">
                     <li><span class="best-voted"><small class="fa fa-thumbs-up" style="margin-bottom: 0px;"></small><?=$row['title'].' ('.date('Y', strtotime($row['release_date'])).') '?></span></li>
                     <li>
                        <p><small class="fa fa-eye" style="margin-bottom: 0px;"></small><?=$row['popularity']?> views</p>
                     </li>
                     <li class="last-block">
                         <a target="_blank" href="<?=base_url('H/detail/').$row['id'].'-'.seoUrl($row['title'])?>" class="slide__link">more</a>
                     </li>
                 </ul>
             </div>
             <?php $i++;
             if ($i>5) {
                break;
             }
             ?>
        <?php } ?>
     
     </div>
    <div class="col-sm-10 col-sm-offset-1 movie-best__check">check all movies now playing</div>
</div>