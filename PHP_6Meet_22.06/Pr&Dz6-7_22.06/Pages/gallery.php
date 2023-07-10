<div class="container">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4">
        <?
        $file = fopen("Files/Images.json", "r");
        $arr = array();
        while ($row = fgets($file)) {
    
            if($row)
            {
                $arr[] = unserialize($row);
            }
        }
        // var_dump($arr);
        foreach ($arr as $elem) {
        ?>
        <div class="col">
            <div class="card mb-3 h-100">
                <img src="<?echo $elem->ImagePath?>" class="card-img-top w-100 h-100" />
                <div class="card-body">
                    <h5 class="card-title"><?echo $elem->Title?></h5>
                    <p class="card-text">Author: <?echo $elem->Author?></p>
                </div>
            </div>
        </div>
        <?
        }
        ?>
</div>
</div>