
<?
    $session = session();
    $user_data = $session->get();
    if(isset($user_data["isAdmin"])&&$user_data["isAdmin"]==1)
    {
        ?>
        <a  href="/create" class="btn btn-outline-success">Create</a>
        <?
    }
?>
<hr>
            <?
            
            if(!empty($books&&is_array($books))):?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Year of publish</th>
                            <th>Author</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?
                            foreach($books as $elem)
                            {
                                ?>
                                    <tr>
                                        <td><?=esc($elem["id"])?></td>
                                        <td><?=esc($elem["title"])?></td>
                                        <td><?=esc($elem["price"])?></td>
                                        <td><?=esc($elem["yearOfPublish"])?></td>
                                        <td><?=esc($elem["author"]["firstname"])." ".$elem["author"]["surname"]?></td>
                                        <!-- <td><a href="authors/view/<?=esc($elem["id"],"url")?>" class="btn"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                            <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                            </svg></a></td> -->
                                    </tr>
                                <?
                            }
                        ?>
                    </tbody>
                </table>
            <? else : ?>
                <h2>Not found any author</h2> 
            <? endif ?> 
        