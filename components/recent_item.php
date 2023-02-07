<?php
$items = get_posts(
    array(
        'post_type' => 'item'
    )
);
// The Loop
if ($items) {
?>
    <center>
        <img crossOrigin="anonymous" style="width:10vmin;" src="<?php echo get_template_directory_uri() . "/assets/images/rys.png"; ?>" alt="Rakhine Youth Sports Corner" />
        <h2 class="h1">
            RY sports corner ကို လာပါ
        </h2>
        <p>
            ပစ္စည်းစုံ ဈီးမှန် ပနာ ဂျာစီ စတီကာလည်းရိုက်လို့ရပါရေ
        </p>
        <a target="_blank" href="https://goo.gl/maps/3H8SWsVaKY89W6zt6"><span class="mx-2"><i class="fa-solid fa-map-location-dot fa-lg"></i> Google map</span></a>
        <a href="http://fb.com/100087126348301" target="_blank" rel="noopener noreferrer"><span class="mx-2"><i class="fa-brands fa-facebook fa-lg"></i> RY sports corner</span></a>
    </center>
    <br/>
    <div class="row pt-3">
        <?php
        foreach ($items as $item) {
        ?>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                <?php
                get_template_part('views/item/small', null, $item);
                ?>
            </div>
        <?php
        }
        wp_reset_postdata();
        ?>
    </div>
<?php
} else {
    // no posts found
}
?>