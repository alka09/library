<?php
session_start();
include '../layouts/header_signup.php';
include '../../vendor/author.php';

ini_set('display_errors', 'Off');

if (!$_SESSION['user']) {
    header('Location: ../index.php');
}
?>

    <h2>Авторы</h2>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <!--                --><?//=$success ?>
                <button class="btn btn-success mt-2" data-toggle="modal" data-target="#create"><i class="fa fa-plus">Добавить автора</i></button>
                <table class="table shadow table-striped table-hover mt-2">
                    <thead class="thead-dark">
                        <th>№</th>
                        <th>Автор</th>
                        <th>Действие</th>
                    </thead>
                    <tbody>
                    <?php foreach ($result as $res) { ?>
                    <tr>
                        <td><?php echo $res->author_id; ?></td>
                        <td> <?php echo $res->author_name; ?></td>
                        <td>
                            <a href="?id=<?php echo $res->author_id; ?>" class="btn btn-success" data-toggle="modal" data-target="#edit<?php echo $res->author_id; ?>"><i class="fa fa-edit"></i></a>
                            <a href="" class="btn btn-danger" data-toggle="modal" data-target="#delete<?php echo $res->author_id; ?>"><i class="fa fa-trash-alt" ></i></a>
                        </td>
                    </tr>
                        </tr>
                        <!-- Modal edit-->
                        <div class="modal fade" tabindex="-1" role="dialog" id="edit<?php echo $res->author_id; ?>" area-labelledby="exampleModalLabel" area-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content shadow">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Редактировать</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="?author_id=<?php echo $res->author_id; ?>" method="post">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="author_name" placeholder="Автор" value="<?php echo $res->author_name; ?>">
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                                        <button type="submit" name="edit" class="btn btn-primary">Сохранить</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Modal edit-->
                        <!-- Modal delete-->
                        <div class="modal fade" tabindex="-1" role="dialog" id="delete<?php echo $res->author_id; ?>" area-labelledby="exampleModalLabel" area-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content shadow">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Удалить автора <?php echo $res->author_name; ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times</span>
                                        </button>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="?author_id=<?php echo $res->author_id; ?>" method="post">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                                        <button type="submit" name="delete" class="btn btn-danger">Удалить</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Modal delete-->
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
                    <form action="" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" name="author_name" value="" placeholder="Автор">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                    <button type="submit" name="add" class="btn btn-primary">Сохранить</button>
                </div>
                </form>
            </div>
        </div>
    </div>

<?php
require_once '../layouts/footer.php';
?>
