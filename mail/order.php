<div class="table-responsive">
    <table class="table table-hover table-striped">
        <tr>
            <th>Название</th>
            <th>Кол-во</th>
            <th>Цена</th>
        </tr>
        <?php foreach ($session['cart'] AS $id => $product): ?>
            <tr>
                <td><?=$product['name']?></td>
                <td><?=$product['qty']?></td>
                <td><?=$product['price']?></td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="3">Итого: </td>
            <td><?=$session['cart.qty']?></td>
        </tr>
        <tr>
            <td colspan="3">На сумму: </td>
            <td><?=$session['cart.sum']?></td>
        </tr>
    </table>
</div>