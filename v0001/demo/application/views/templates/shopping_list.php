<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col" style="width:8.33%;">#</th>
            <th scope="col" style="width:8.33%;">Product</th>
            <th scope="col" style="width:8.33%;">Price</th>
            <th scope="col" style="width:8.33%;">Quantity</th>
            <th scope="col" style="width:8.33%;">Subtotal</th>
            <th style="width:8.33%;"></th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 0; foreach($products as $product): ?>
        <tr>
            <th scope="row"><?php echo $i+1; ?></th>
            <td><?php echo $product['name']; ?></td>
            <td><?php echo $product['price']; ?> VND</td>
            <td>
                <input type="number" class="form-control text-center" value="<?php echo $product['quantities'];?>">
            </td>
            <td><?php echo $product['total']; ?> VND</td>
            <td>
                <button class="btn btn-sm btn-outline-primary">Update</button>
                <button class="btn btn-sm btn-outline-danger">Delete</button>
            </td>
        </tr>
        <?php $i++; endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <td><a href="#" class="btn btn-danger"><i class="fa fa-angle-left"> Back to tables</i></a></td>
            <td colspan="3"></td>
            <td><strong>Total <?php echo $invoice->total; ?> VND</strong></td>
            <td><a href="#" class="btn btn-info">Checkout <i class="fa fa-angle-right"></i></a></td>
        </tr>
    </tfoot>
</table>

<script>

</script>