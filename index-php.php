<?php
include __DIR__ .'/partials/template/header.php';
include __DIR__ .'/partials/home/server.php';
?>

            <div class="container">
                <?php if (!empty($_GET['roomId'])) {
                    $room_delete = $_GET['roomId']; ?>
                <div class="alert alert-warning">
                    <?php echo "Stanza n. $room_delete cancellata"; ?>
                </div>
                <?php } ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Numero stanza</th>
                            <th>Floor</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($results as $room) { ?>
                        <tr>
                            <td><?php echo $room['id'];?></td>
                            <td><?php echo $room['room_number'];?></td>
                            <td><?php echo $room['floor'];?></td>
                            <td><a href="show.php?id=<?php echo $room['id']; ?>">VIEW</a></td>
                            <td><a href="update.php?id=<?php echo $room['id']; ?>">UPDATE</a></td>
                            <td>
                                <form class="" action="partials/delete/server.php" method="post">
                                    <input type="submit" name="" value="DELETE" class="btn btn-danger">
                                    <input type="hidden" name="id" value="<?php echo $room['id']; ?>">
                                </form>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
<?php
include __DIR__ .'/partials/template/footer.php';
?>
