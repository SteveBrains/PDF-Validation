<div class="container-fluid page-wrapper">

    <div class="main-container clearfix">
        <div class="page-title clearfix">
            <h3>Dashboard</h3>
        </div>

        <div class="panel-group advanced-search" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Low Stock
                        </a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                    <div class="custom-table">
                        <table class="table" id="list-table">
                            <thead>
                                <tr>
                                    <th>Sl. No</th>
                                    <th>Category</th>
                                    <th>Subcategory</th>
                                    <th>Package</th>
                                    <th>Manufacturer</th>
                                    <th>Unit</th>
                                    <th>PartNumber / Value</th>
                                    <th>SPQ</th>
                                    <th>MOQ</th>
                                    <th>Threshold</th>
                                    <th>Lead Time</th>
                                    <th>Quantity</th>
                                    <th>Store Location</th>
                                    <th>Avg Price</th>
                                    <th>Alternative Part Number</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($part_numberList)) {
                                    $i = 1;
                                    foreach ($part_numberList as $record) {
                                ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $record->categoryname ?></td>
                                            <td><?php echo $record->subcategoryname ?></td>
                                            <td><?php echo $record->packagename ?></td>
                                            <td><?php echo $record->manufacturername ?></td>
                                            <td><?php echo $record->unitname ?></td>
                                            <td><?php echo $record->name ?></td>
                                            <td><?php echo $record->spq ?></td>
                                            <td><?php echo $record->moq ?></td>
                                            <td><b><?php echo $record->threshold ?></b></td>
                                            <td><?php echo $record->lead_time ?></td>
                                            <td><b><a href="<?php echo 'history/' . $record->id; ?>"><?php echo $record->quantity ?></a></b></td>
                                            <td><?php echo $record->store_location ?></td>
                                            <td><?php echo $record->avg_price ?></td>
                                            <td><?php echo $record->alternative_part_number ?></td>
                                            <td><?php echo $record->description ?></td>
                                        </tr>
                                <?php
                                        $i++;
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>



    </div>
    <footer class="footer-wrapper">
        <p>&copy; 2023 All rights, reserved</p>
    </footer>
</div>
<script>
    function clearSearchForm() {
        window.location.reload();
    }
</script>