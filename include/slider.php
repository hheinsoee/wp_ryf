<div id="mainSlider" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner">

        <?php
        $dir = new DirectoryIterator(get_template_directory() . '/assets/img/slider/');
        $index = 0;
        foreach ($dir as $fileinfo) {
            if (!$fileinfo->isDot()) {
                $filename = $fileinfo->getFilename();
                ?>
                <div class="carousel-item <?php if($index == 0){echo "active";}?> ">
                    <img src="<?php echo get_template_directory_uri() . '/assets/img/slider/' . $filename; ?>" class="d-block w-100" alt="...">
                    <div class="_content">
                        <div class="p-2 m-2">
                            <h2>RYF Stadium</h2>
                            <p>ရွာကြီးမြောက်ရပ်ကွက် စစ်တွေမြို့</p>
                        </div>
                    </div>
                </div>
                <?php
                $index++;
            }
        }
        ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#mainSlider" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#mainSlider" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<!-- <div class="carousel-item">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSWK60Q23udTx8hcXDTqO8i1BGJlUINprrO6dTvswWvZ_BkfTzjBNiumxgzqnz9o5vKLH0&usqp=CAU" class="d-block w-100" alt="...">
            <h2>Hello 2</h2>
        </div>
        <div class="carousel-item">
            <img src="https://www.manilatimes.net/manilatimes/uploads/images/2021/10/26/22700.jpg" class="d-block w-100" alt="...">
            <h2>Hello 3</h2>
        </div> -->