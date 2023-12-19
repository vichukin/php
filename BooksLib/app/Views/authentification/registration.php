<div class="row">
    <div class="col col-4"></div>
    <div class="col col-4">
       
        <h2 class="alert alert-danger <?=session()->getFlashdata('error')==null?"d-none":""?>"><?=session()->getFlashdata('error')?></h2>
        <div class="alert alert-warning <?=validation_list_errors()==null?"d-none":""?>">
        <?=validation_list_errors(); ?>
        </div>
        <form method="POST" >
        <?=csrf_field()?>
            <div class="mb-3"><label  class="w-100">Login:<input type="text" name="login" class="form-control"></label></div>
            <div class="mb-3"><label  class="w-100">Password:<input type="text" name="password" class="form-control"></label></div>
            <div class="mb-3"><label  class="w-100">Confirm password:<input type="text" name="confirmPassword" class="form-control"></label></div>
            <div class="btn-group w-100">
                <button class="btn btn-outline-success">Register</button>
                <a href="/login" class="btn btn-outline-primary">Log in</a>
            </div>
        </form>
    </div>
    <div class="col col-4"></div>
</div>