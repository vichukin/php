<div class="row">
    <div class="col-4"></div>
    <div class="col-4">
        <h2 class="alert alert-danger <?=session()->getFlashdata('error')==null?"d-none":""?>"><?=session()->getFlashdata('error')?></h2>
        <div class="alert alert-warning <?=validation_list_errors()==null?"d-none":""?>">
        <?=validation_list_errors(); ?>
</div>
        
        <form method="post">
        <?=csrf_field()?>
            <div class="mb-3"><label class="w-100">Title:<input type="text" class="form-control" name="title"></label></div>
            <div class="mb-3"><label class="w-100">Price:<input type="number" class="form-control" name="price"></label></div>
            <div class="mb-3"><label class="w-100">Year of publish:<input type="number" class="form-control" name="yearOfPublish"></label></div>
            <div class="mb-3"><label class="w-100">
                Author:
                <select name="authorid" class="form-select">
                    <?
                        foreach($authors as $elem)
                        {
                            $id = $elem["id"];
                            $fullname = $elem["firstname"]." ".$elem["surname"];
                            echo("<option value=$id>$fullname</option>");
                        }
                    ?>
                </select>
            </label></div>
            <div class="btn-group w-100"><button class="btn btn-outline-success">Create</button>
            <a href="/" class="btn btn-outline-secondary">Go back</a></div>
        </form>
    </div>
    <div class="col-4"></div>
</div>