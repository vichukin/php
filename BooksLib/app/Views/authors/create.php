<h2 class="alert alert-danger <?=session()->getFlashdata('error')==null?"d-none":""?>"><?=session()->getFlashdata('error')?></h2>
<p class="alert alert-warning <?=validation_list_errors()==null?"d-none":""?>"  ><?= validation_list_errors()?></p>
<form  method="post">
    <?=csrf_field()?>
    <div class="mb-3"><label for="firstname" class="form-label">Firstname: <input type="text" name="firstname" value="<?=set_value("firstname")?>" class="form-control"></label></div>
    <div class="mb-3"><label for="surname" class="form-label">Surname: <input type="text" name="surname" value="<?=set_value("surname")?>" class="form-control"></label></div>
    <div class="mb-3"><label for="yearOfBirth" class="form-label">Year of Birth: <input type="number" value="<?=set_value("yearOfBirth")?>" name="yearOfBirth" class="form-control"></label></div>
    <button class="btn btn-success">Create</button>
</form>