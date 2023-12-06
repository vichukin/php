<?

?>
<style>
            .checked {
                color: orange;
            }

            #stars {
                width: max-content;
                height: max-content;
            }
        </style>
<div class="container">

    <form method="GET">
        <div class="d-flex mb-4  w-100 p-2" style="background-color: rgb(150,150,150)">
            <h2 class="w-25 text-white">Tours</h2>
            <select name="City" class='form-select w-25'>
                <option value="">Choose city</option>
                <?
                foreach ($Cities as $elem) {
                    echo "<option ".($city==$elem?"selected":"")." >$elem</option>";
                }
                ?>
            </select>
            <select name="Stars" class='form-select w-25 ms-2'>
                <option value="">Choose stars</option>
                <?
                foreach (range(1, 5) as $elem) {
                    echo "<option value='$elem' ".($stars==$elem?"selected":""). " >$elem " . ($elem == 1 ? "Star" : "Stars") . "</option>";
                }
                ?>
            </select>
            <button class="btn btn-primary w-25 ms-2">Search</button>
            <a href="/" class="btn btn-secondary w-25 ms-2">Clear filter</a>
        </div>
    </form>
    <?
    echo $message==""?"":"<h4>$message:</h4>";
    ?>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 m-2">

        <?
        
        if (isset($hotels)) {
            foreach ($hotels as $elem) {
        ?>
                <div class="card mb-3">
                    <img src="<? echo $elem["image"] ?>" style='object-fit: cover; width: 100%;height: 25vh;' class="card-img-top" alt="photo">
                    <div class="card-body">
                        <h5 class="card-title"><? echo $elem["HotelName"] ?></h5>
                        <p class="card-text"><? echo $elem["Description"] ?></p>
                        <div class="d-flex justify-content-end">
                            <p class="card-text me-auto"><small class="text-body-secondary d-flex"><? echo $elem["City"] ?>, <? echo $elem["Country"] ?></small></p>
                            <div id="stars">
                                    <?
                                        foreach(range(1,$elem["Stars"])as $star)
                                        {
                                            echo "<p class='fa fa-star checked' id='star$star'></p>";
                                        }
                                        foreach(range($elem["Stars"]+1,5)as $star)
                                        {
                                            echo "<p class='fa fa-star' id='star$star'></p>";
                                        }
                                    ?>
                            </div>
                        </div>
                    </div>
                </div>
        <?
            }
        } ?>
    </div>
</div>