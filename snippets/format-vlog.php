<div class="single-vlog">
    <a class="thumb-vlog" href="<?php the_permalink();?>"><?php the_post_thumbnail('large900'); ?></a>
    <div class="meta-vlog">
        <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
        <div class="temps-vlog">
            <a href="<?php the_permalink();?>"><svg viewBox="0 0 100 100" width="25" height="25"><use xlink:href="#icon-btn_play"></use></svg></a>
            <span><?php the_field('duree_video');?></span>
        </div>
    </div>
</div>