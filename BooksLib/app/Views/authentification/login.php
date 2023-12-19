<div class="row">
    <div class="col col-4"></div>
    <div class="col col-4">
    <h2 class="alert alert-danger <?=session()->getFlashdata('error')==null?"d-none":""?>"><?=session()->getFlashdata('error')?></h2>
        <div class="alert alert-warning <?=validation_list_errors()==null?"d-none":""?>">
        <?=validation_list_errors(); ?>
        </div>
        <h2><?echo isset($test)?$test:""?></h2>
        <form method="POST">
        <?=csrf_field()?>
            <div class="mb-3"><label  class="w-100">Login:<input name="login" type="text" class="form-control"></label></div>
            <div class="mb-3"><label  class="w-100">Password:<input name="password" type="password" class="form-control"></label></div>
            <div class="btn-group w-100">
                <button class="btn btn-outline-success">Log in</button>
                <a href="/registration" class="btn btn-outline-primary">Registration</a>
            </div>
        </form>
    </div>
    <div class="col col-4"></div>
</div>