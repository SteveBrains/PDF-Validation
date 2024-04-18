<style>
  table th,
  table td {
    text-align: center;
  }
</style>
<div class="container-fluid page-wrapper">

  <div class="main-container clearfix">
    <div class="page-title clearfix">
      <h3> Result</h3>
    </div>

    
    <form action="" method="post" id="searchForm" enctype="multipart/form-data">

      <div class="custom-table">
        <table class="table"  style="text-align: center;">
          <thead>
            <tr>
              <th>&nbsp;</th>
              <th>&nbsp;</th>
              <th>&nbsp;</th>
              <th>&nbsp;</th>
              <?php
              foreach ($subjects as $subject) {
              ?>
                <th><?php echo $subject->code; ?></th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
              <?php } ?>
              <th>&nbsp;</th>
            </tr>
            <tr>
              <th>Sl. No</th>
              <th>Registration Number</th>
              <th>Student Name</th>
              <th>Father Name</th>
              <?php
              foreach ($subjects as $subject) {
              ?>
                <th>S</th>
                <th>E</th>
                <th>T</th>
              <?php } ?>
              <th>Marks Card</th>
            </tr>
            
          </thead>
          <tbody>
            <?php
            $i = 1;
            if (!empty($studentList)) {

              foreach ($studentList as $record) {
            ?>
                <tr>
                  <td><?php echo $i ?></td>
                  <td><?php echo $record->registration_number; ?></td>
                  <td><?php echo $record->studentName; ?></td>
                  <td><?php echo $record->fatherName; ?></td>
                  <?php foreach ($subjects as $subject) {
                    $sub_code_s = $subject->code . "_s";
                    $sub_code_e = $subject->code . "_e";
                    $sub_code_t = $subject->code . "_t"; ?>
                    <td><?php echo $record->$sub_code_s; ?></td>
                    <td><?php echo $record->$sub_code_e; ?></td>
                    <td><?php echo $record->$sub_code_t; ?></td>
                  <?php } ?>

                  <!-- <td class="text-center">
                    <a  href="<?php echo 'viewmarks/' . $record->student_id . '?course_id=' . $course_id . '&semester_id=' . $semester_id; ?>" title="Edit"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>View</a>
                  </td> -->
                  <td class="text-center">
                    <a target="_blank" href="<?php echo 'markscard/' . $record->student_id . '?course_id=' . $course_id . '&semester_id=' . $semester_id; ?>" title="Edit"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>view</a>
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
  $(document).ready(function() {
    $('#course_id').trigger("change");
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
  $(document).ready(function() {
    $('#example').DataTable({
      dom: 'Bfrtip',
      buttons: [{
          extend: 'excel',
          filename: 'marks'
        },
        {
          extend: 'pdf',
          filename: 'marks'
        }, 'print'
      ],
    });

  });
</script>