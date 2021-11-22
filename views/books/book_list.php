<?php
session_start();
include '../layouts/header_signup.php';
include '../../vendor/books.php';
include '../../vendor/library.php';

ini_set('display_errors', 'Off');

if (!$_SESSION['user']) {
    header('Location: ../index.php');
}
?>

<h2>Книги</h2>

<div class="container">
    <div class="row">
        <div class="col-12">
            <!--                --><?//=$success ?>
            <table class="table shadow table-striped table-hover mt-2">
                <thead class="thead-dark">
                <th>№</th>
                <th>Название</th>
                <th>Количество</th>
                <th>Действие</th>
                </thead>
                <tbody>
                <?php
                foreach ($result as $res) { ?>
                    <tr>
                        <td><?php echo $res->book_id; ?></td>
                        <td> <?php echo $res->book_name; ?></td>
                        <td> <?php echo $res->quantity; ?></td>
                        <td>
                            <!--                        <a href="?id=--><?php //echo $res->book_id; ?><!--" class="btn btn-success" data-toggle="modal" data-target="#edit--><?php //echo $res->book_id; ?><!--"><i class="fa fa-edit"></i></a>-->
                            <!--                        <a href="" class="btn btn-danger" data-toggle="modal" data-target="#delete--><?php //echo $res->book_id; ?><!--"><i class="fa fa-trash-alt" ></i></a>-->
                            <button type="submit" name="addbook" class="btn btn-success mt-2" data-toggle="modal" data-target="#create">Взять книгу</button>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal create-->
<div class="modal fade" tabindex="-1" role="dialog" id="create" area-labelledby="exampleModalLabel" area-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content shadow">
            <div class="modal-header">
                <h5 class="modal-title">Добавить автора</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../../vendor/library.php" method="post">
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="user_id" placeholder="Абонент" value="<?php echo $_SESSION['user']['id']; ?>">
                        <input type="hidden" class="form-control" name="book_id" placeholder="Книга" value="<?php echo $res->book_id; ?>">
                        <label>Выбрать дату возврата книги</label>
                        <input type="text" class="btn btn-primary" name="date" value="10.10.2022">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                <button type="submit" name="addbook" class="btn btn-primary">Сохранить</button>
            </div>
            </form>
        </div>
    </div>
</div>

<?php
require_once '../layouts/footer.php';
?>
