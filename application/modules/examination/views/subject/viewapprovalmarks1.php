<style>
  table th,
  table td {
    text-align: center;
  }
</style>
<div class="container-fluid page-wrapper">

  <div class="main-container clearfix">
    <div class="page-title clearfix">
      <h3>Approve Marks</h3>
    </div>

    <form action="" method="post" id="searchForm" enctype="multipart/form-data">

      <div class="custom-table">
        <table class="table">
          <thead>
            <tr>
              <th>Sl. No</th>
              <th>Registration Number</th>
              <th>Student Name</th>
              <th>Father Name</th>
              <th>Centre</th>
              <th>Booklet Number</th>
              <th>Barcode</th>
              <th>Internal Marks</th>
              <th>External Marks</th>
              <th>Packet Number</th>
              <th>Packet SL Number</th>
              <th>Approve</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $i = 1;
            if (!empty($barcodeList)) {

              foreach ($barcodeList as $record) {
            ?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $record->registration_number; ?></td>
                  <td><?php echo $record->name; ?></td>
                  <td><?php echo $record->father_name; ?></td>
                  <td><?php echo $record->centre; ?></td>
                  <td><?php echo $record->booklet_number; ?></td>
                  <td><?php echo $record->barcode; ?></td>
                  <td><?php echo $record->internal_marks; ?></td>
                  <td><?php echo $record->external_marks; ?></td>
                  <td><?php echo $record->packet_no; ?></td>
                  <td><?php echo $record->packet_sl_no; ?></td>
                  <td class="text-center">
                  <a href="<?php echo 'approve1/' . $record->Id; ?>" title="Edit">Approve</a>
                </td>
                </tr>
            <?php
                $i++;
              }
            }
            ?>
          </tbody>
        </table>
      </div>

    </form>
  </div>
  <footer class="footer-wrapper">
    <p>&copy; 2019 All rights, reserved</p>
  </footer>
</div>
<script>
  function clearSearchForm() {
    window.location.reload();
  }

  var semester_id = "<?php echo ($semester_id > 0) ? $semester_id : 0; ?>";
  var subject_id = "<?php echo ($subject_id > 0) ? $subject_id : 0; ?>";
  // var course_id = "<?php echo ($course_id > 0) ? $course_id : 0; ?>";
  $(document).ready(function() {
    $('#course_id').trigger("change");
    if (semester_id > 0) {
      getSubjectsById(semester_id);
    }
  });

  function getSemestersById(id) {
    if (id != '') {
      $.ajax('/placement/candidate/getSemestersById', {
        type: 'POST',
        data: {
          course_id: id,
          semester_id: semester_id
        },
        success: function(data, status, xhr) {
          $('#semester_id').html(data);
        },
        error: function(jqXhr, textStatus, errorMessage) { // error callback 
          console.log(errorMessage);
        }
      });
    }
  }

  function getSubjectsById(id) {
    var course_id = $('#course_id').val();
    if (id != '') {
      $.ajax('/placement/candidate/getSubjectsById', {
        type: 'POST',
        data: {
          course_id: course_id,
          semester_id: id,
          subject_id: subject_id
        },
        success: function(data, status, xhr) {
          $('#subject_id').html(data);
        },
        error: function(jqXhr, textStatus, errorMessage) { // error callback 
          console.log(errorMessage);
        }
      });
    }
  }
</script>