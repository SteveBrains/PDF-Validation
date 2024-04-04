<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="invoice-title">
                <h1>OFFICIAL RECEIPT <img class="pull-right" src="https://kepuncakacademy.com/assets/img/logo.png" width="200" /></h1>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <strong>Received From :</strong>
                    <?php echo $user->first_name . ' ' . $user->last_name ?>
                </div>
                <div class="col-md-6 text-right">
                    <strong>Receipt No :</strong>
                    <?php echo $receipt->receipt_number; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    IC No / Passport No :
                </div>
                <div class="col-md-6 text-right">
                    <strong>Receipt Date :</strong>
                    <?php echo $receipt->receipt_date; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed" border="1" style="padding:15px;">
                            <thead>
                                <tr>
                                    <td><strong>No</strong></td>
                                    <td class="text-center"><strong>DESCRIPTION</strong></td>
                                    <td class="text-right"><strong>TOTAL (RM)</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td class="text-center">BEING PAYMENT FOR:</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td class="text-center"><?php echo $receipt->invoice_number; ?>, Invoice</td>
                                    <td class="text-right"><?php echo $receipt->invoiceAmount; ?></td>
                                </tr>
                                <?php $sno = 1;
                                foreach ($receipt_items as $row) {
                                ?>
                                    <tr>
                                        <td></td>
                                        <td class="text-center">Payment Mode : <?php echo $row->payment_mode; ?></td>
                                        <td></td>
                                    </tr>
                                <?php
                                }
                                ?>
                                <tr>
                                    <td></td>
                                    <td class="text-center">TOTAL AMOUNT RECEIVED :</td>
                                    <td class="text-right"><?php echo $receipt->total_amount; ?></td>
                                </tr>
                                <tr>
                                    <td class="text-center" colspan="3">MYR :</td>
                                </tr>
                                <tr>
                                    <td colspan="3">Issued by:
                                        Finance & Accounts Department</td>
                                </tr>
                                <tr>
                                    <td colspan="3">This is auto generated Official Receipt. No signature is required.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>