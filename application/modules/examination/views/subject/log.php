<style>
  table th,
  table td {
    text-align: center;
  }
</style>
<div class="container-fluid page-wrapper">

  <div class="main-container clearfix">
    <div class="page-title clearfix">
      <h3>Audit Log</h3>
    </div>

    <form action="" method="post" id="searchForm" enctype="multipart/form-data">

      <div class="custom-table">
        <table class="table">
          <thead>
            <tr>
              <th>Sl. No</th>
              <th>Description</th>
              <th>Date & Time</th>
            </tr>
          </thead>
          <tbody>
         
                <tr>
                  <td>1</td>
                  <td>Approved by Admin from 192.45.32.24</td>
                  <td>03-03-2024 12:45 PM</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Approved by Approval Head from 193.35.31.90</td>
                  <td>03-03-2024 1:45 PM</td>
                </tr>
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