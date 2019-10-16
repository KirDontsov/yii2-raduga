<?php if(!empty($session['print'])):

?>
    <div class="table-responsive" id="printList">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>№</th>
                <th>Наименование</th>
                <th>Адрес</th>
                <th>Этаж</th>
                <th>Кол-во комнат</th>
                <th>Цена</th>
                <th>Имя</th>
                <th>Телефон</th>
                <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($session['print'] as $id => $item):?>
                <tr>
                    <td><?= $id ?></td>
                    <td><?= $item['name']?></td>
                    <td><?= $item['street'] . ' ' . $item['h_number']?></td>
                    <td><?= $item['floor']?></td>
                    <td><?= $item['rooms']?></td>
                    <td><?= $item['price']?></td>
                    <td><?= $item['contact']?></td>
                    <td><?= $item['phone']?></td>

                    <td><span data-id="<?= $id?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></td>
                </tr>
                <tr>
                    <th colspan="9">Контент</th>
                </tr>
                <tr>
                    <td colspan="9"><?= $item['content']?></td>
                </tr>
            <?php endforeach?>
            <tr>
                <td colspan="8">Итого: </td>
                <td><?= $session['print.qty']?></td>
            </tr>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <h3>Список пуст</h3>
<?php endif;?>