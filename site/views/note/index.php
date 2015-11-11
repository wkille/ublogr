<h1>Note</h1>

<form method="post" action="<?php echo URL; ?>note/create">
    <label>Login</label><input type="text" name="login" /><br />
    <label>&nbsp;</label><input type="submit" />
</form>

<hr />

<table>
    <?php
        foreach($this->noteList as $key => $value) {
        //    echo '<tr>';
        //    echo '<td>' . $value['id'] . '</td>';
        //    echo '<td>' . $value['login'] . '</td>';
        //    echo '<td>' . $value['role'] . '</td>';
        //    echo '<td>
        //        <a href="'.URL.'user/edit/'.$value['id'].'">Edit</a> 
        //        <a href="'.URL.'user/delete/'.$value['id'].'">Delete</a>
        //    </td>';
        //    echo '</tr>';
        }
    ?>
</table>

