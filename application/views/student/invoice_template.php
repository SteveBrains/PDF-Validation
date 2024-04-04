<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="invoice-title">
                <h1>INVOICE <img class="pull-right" src="https://kepuncakacademy.com/assets/img/logo.png" width="100" /></h1>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <strong>Student Name :</strong>
                    <?php echo $user->first_name . ' ' . $user->last_name ?>
                </div>
                <div class="col-md-6 text-right">
                    <strong>Invoice No :</strong>
                    <?php echo $invoice->invoice_number; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">

                </div>
                <div class="col-md-6 text-right">
                    <strong>Invoice Date :</strong>
                    <?php echo $invoice->invoice_date; ?>
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
                                    <td class="text-center"><strong>COURSE NAME</strong></td>
                                    <td class="text-center"><strong>UNIT PRICE (RM)</strong></td>
                                    <td class="text-right"><strong>TOTAL (RM)</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $sno = 1; foreach ($invoice_items as $row) {
                                ?>
                                    <tr>
                                        <td><?php echo $sno++; ?></td>
                                        <td class="text-center"><?php echo $row->courseName; ?></td>
                                        <td class="text-center"><?php echo $row->price; ?></td>
                                        <td class="text-right"><?php echo $row->price; ?></td>
                                    </tr>
                                <?php
                                }
                                ?>

                                <tr>
                                    <td class="text-center" colspan="3">GRAND TOTAL</td>
                                    <td class="text-right"><?php echo $invoice->total_amount; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <p>1. All cheque should be crossed and make payable to::</p>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    PAYEE : SPEED TRAINING SDN BHD
                </div>
                <div class="col-md-6 text-right">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    BANK : CIMB BANK
                </div>
                <div class="col-md-6 text-right">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    ADDRESS : 6, JALAN TUN PERAK , Kuala LUmpur , Wilayah Persekutuan , Abkhazia - 50050
                </div>
                <div class="col-md-6 text-right">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    ACCOUNT NO : 8000283319
                </div>
                <div class="col-md-6 text-right">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    SWIFT CODE : CIBBMYKL
                </div>
                <div class="col-md-6 text-right">
                </div>
            </div>
        </div>
    </div>
    <br>
    <p>2. This is auto generated Receipt. No signature is required.</p>

</div>