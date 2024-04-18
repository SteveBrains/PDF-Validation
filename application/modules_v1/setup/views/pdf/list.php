<div class="container-fluid page-wrapper">

  <div class="main-container clearfix">
    <div class="">
      <a href="generatePdf" class="btn btn-primary">+ Generate PDF</a>
      <a href="readPdf" class="btn btn-primary">+ Verify PDF</a>
    </div>
    <h2>Upload PDF File</h2>
    <form action="handleUpload" method="post" enctype="multipart/form-data">
      <label for="pdfFile">Select PDF File:</label><br>
      <input class="btn btn-primary" type="file" name="pdfFile" id="pdfFile"><br>
      <input class="btn btn-primary" type="submit" value="Upload" name="submit">
    </form>
  </div>
</div>
<script>
  function clearSearchForm() {
    window.location.reload();
  }

</script>