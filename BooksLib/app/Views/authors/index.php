<?
$session = session();
$user_data = $session->get();
    if(isset($user_data["isAdmin"])&&$user_data["isAdmin"]==1)
    {
        ?>
            <a href="/authors/create" class="btn btn-outline-success">Create</a>
        <?
    }
?>
<hr>
            <?
            
            if(!empty($authors&&is_array($authors))):?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Fullname</th>
                            <th>Year of Birth</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?
                            foreach($authors as $elem)
                            {
                                ?>
                                    <tr>
                                        <td><?=esc($elem["id"])?></td>
                                        <td><?=esc($elem["firstname"])." ".esc($elem["surname"])?></td>
                                        <td><?=esc($elem["yearOfBirth"])?></td>
                                    </tr>
                                <?
                            }
                        ?>
                    </tbody>
                </table>
            <? else : ?>
                <h2>Not found any author</h2> 
            <? endif ?> 
        