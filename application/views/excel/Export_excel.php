<?php
header("Content-type:application/octet-stream/");
header("Content-Disposition:attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<table>
    <thead>
        <tr>
            <th class="bg-teal">NO</th>
            <th class="bg-teal">Date</th>
            <th class="bg-teal">Status</th>
            <th class="bg-teal">Invoice</th>
            <th class="bg-teal">Nominal (Rp)</th>
            <th class="bg-teal">Balance</th>
            <th class="bg-gray disabled" width='1%'></th>
            <th class="bg-lime">Invoice Trx</th>
            <th class="bg-lime">Product Name</th>
            <th class="bg-lime">Price</th>
            <th class="bg-lime">Total Amount</th>
        </tr>
    </thead>
            <tbody>
                <?php $no= 0; foreach ($list as $d ): $no++;?>
                    <tr>
                          <td><?php echo $no; ?></td>
                          <td><?php echo $d->date; ?></td>
                          <td><?php echo $d->status; ?></td>
                          <td><?php echo $d->invoice; ?></td>
                          <td><?php echo $d->nominal; ?></td>
                          <td><?php echo $d->balance; ?></td>
                          <td class="bg-gray disabled"></td>
                          <td><?php echo $d->invoice; ?></td>
                          <td><?php echo $d->product_name; ?></td>
                          <td><?php echo $d->price; ?></td>
                          <td><?php echo $d->total_amount; ?></td>
                    </tr>
                <?php endforeach;?>
            </tbody>
</table>