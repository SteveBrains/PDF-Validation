<?php
function inwords($number, $true = true)
{
  $no = floor($number);
  $point = number_format(number_format($number, 2, '.', '') - $no, 2, '', '');
  $digitpoint = strlen($point);
  $digit = strlen($no);
  //Ones, Tens, Hundreds
  $ones = array(0 => 'Zero', '1' => 'One', '2' => 'Two', '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six', '7' => 'Seven', '8' => 'Eight', '9' => 'Nine', '10' => 'Ten');
  $tens = array('11' => 'Eleven', '12' => 'Twelve', '13' => 'Thirteen', '14' => 'Fourteen', '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen', '18' => 'Eighteen', '19' => 'Nineteen', '20' => 'Twenty', '30' => 'Thirty', 40 => 'Forty', '50' => 'Fifty', '60' => 'Sixty', '70' => 'Seventy', '80' => 'Eighty', '90' => 'Ninety');
  $hundred = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
  $string_word = array();
  $numbers = array_reverse(str_split($no, 1));
  // print_r($numbers);
  $i = 0;
  while ($i < $digit) {
    if ($i == 0) {
      if (!isset($numbers[2]) && !isset($numbers[1])) {
        $string_word[] = $ones[$numbers[0]];
      }
    }
    if ($i == 1) {
      $temp = intval($numbers[1] . "" . $numbers[0]);
      $ten = intval($numbers[1] . "0");
      if ($ten == 0 && $temp == 0) {
      } else if ($temp <= 10) {
        $string_word[] = $ones[$temp];
      } else if ($temp > 11 && $temp <= 20) {
        $string_word[] = $tens[$temp];
      } else if (isset($tens[$temp])) {
        $string_word[] = $tens[$temp];
      } else {
        $string_word[] = $tens[$ten] . " " . $ones[$numbers[0]];
      }
    }
    if ($i == 2) {
      if (!isset($numbers[3]) && $numbers[2] != 0) {
        $string_word[] = $ones[$numbers[2]] . " " . $hundred[1];
      }
      if (isset($numbers[3]) && $numbers[2] != 0) {
        $string_word[] = $ones[$numbers[2]] . " " . $hundred[1];
      }
    }
    if ($i == 3 || $i == 4) {
      if (isset($numbers[4])) {
        $temp = intval($numbers[4] . "" . $numbers[3]);
        $ten = intval($numbers[4] . "0");
        echo $temp . "--" . $ten;
        if ($temp == 0 && $ten == 0) {
        } else if ($temp == 10) {
          $string_word[] = $ones[$temp] . " " . $hundred[2];
        } elseif ($temp > 10 && $temp <= 20) {
          $string_word[] = $tens[$temp] . " " . $hundred[2];
        } else {
          $num = ($numbers[3] == 0) ? '' : $ones[$numbers[3]];
          $string_word[] = $tens[$ten] . " " . $num . " " . $hundred[2];
        }
      } else {
        $string_word[] = $ones[$numbers[3]] . " " . $hundred[2];
      }
      $i++;
    }
    if ($i == 5 || $i == 6) {
      if (isset($numbers[6])) {
        $temp = intval($numbers[6] . "" . $numbers[5]);
        $ten = intval($numbers[6] . "0");
        if ($numbers[5] == 0 && $numbers[6] == 0) {
        } elseif ($temp == 10) {
          $string_word[] = $ones[$temp] . " " . $hundred[5];
        } elseif ($temp > 10 && $temp <= 20) {
          $string_word[] = $tens[$temp] . " " . $hundred[5];
        } else {
          $num = ($numbers[5] == 0) ? '' : $ones[$numbers[5]];
          $tens_1 = (!isset($tens[$ten])) ? '' : $tens[$ten];
          $string_word[] = $tens_1 . " " . $num . " " . $hundred[3];
        }
      } else {
        $string_word[] = $ones[$numbers[5]] . " " . $hundred[3];
      }
      $i++;
    }
    if ($i == 7 || $i == 8) {
      if (isset($numbers[8])) {
        $temp = intval($numbers[8] . "" . $numbers[7]);
        $ten = intval($numbers[8] . "0");
        if ($numbers[7] == 0 && $numbers[8] == 0) {
          continue;
        } else if ($temp == 10) {
          $string_word[] = $ones[$temp] . " " . $hundred[4];
        } elseif ($temp > 10 && $temp <= 20) {
          $string_word[] = $tens[$temp] . " " . $hundred[4];
        } else {
          $num = ($numbers[7] == 0) ? '' : $ones[$numbers[7]];
          $string_word[] = $tens[$ten] . " " . $num . " " . $hundred[4];
        }
      } else {
        $string_word[] = $ones[$numbers[7]] . " " . $hundred[4];
      }
      $i++;
    }
    if ($i == 9) {
      $string_word[] = $ones[$numbers[9]] . " " . $hundred[1];
    }
    $i++;
    //$string_word[] = $i;
  }
  $str = array_reverse($string_word);
  return implode(' ', $str);
}
?>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Marks Card</title>

  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
    }

    * {
      margin: 0px;
      padding: 0px;
      box-sizing: border-box;
    }

    .main-container {
      width: 1000px;
      border: 5px solid #1a4169;
      margin: 0 auto;
      padding: 1rem;
    }

    .logo-row {
      display: flex;
      gap: 2rem;
      align-items: center;
    }

    .gttc-logo {
      width: 150px;
      margin-left: 2rem;
    }

    .gttc-logo img {
      width: 100%;
    }

    .gok-logo-block {
      text-align: center;
      font-size: 36px;
      text-transform: uppercase;
      font-weight: bold;

    }

    .field-border {
      font-size: 20px;
      font-weight: bold;
      margin-top: 2rem;
      margin-bottom: 1rem;
      position: relative;
    }

    .field-border span {
      display: inline-block;
      background-color: #fff;
      padding-right: 0.5rem;
    }

    .field-border::before {
      /* content: ''; */
      display: block;
      position: absolute;
      bottom: 4px;
      left: 0px;
      background-color: rgba(0, 0, 0, 0.3);
      height: 1px;
      width: 100%;
      z-index: -1;
    }

    .flex-row {
      display: flex;
      gap: 0.5rem;
    }

    .flex-row>div {
      flex-basis: 100%;
    }

    .marks-table table {
      width: 100%;
      text-align: center;
    }

    .marks-table table th {
      background-color: #dfc9f6;
      padding: 0.5rem;
    }

    .marks-table table td {
      background-color: #f2eff5;
      padding: 0.5rem;
    }

    .note-block {
      background-color: #f2eff5;
      padding: 1rem;
      font-size: 0.75rem;
      margin-bottom: 1rem;
    }

    .note-block ul {
      -webkit-column-count: 2;
      -moz-column-count: 2;
      column-count: 2;
      margin-left: 1rem;
    }

    .note-block ul li {
      padding-top: 1rem;
      padding-right: 1rem;
    }

    .sign-block {
      display: flex;
      align-items: flex-end;
    }

    .sign-block>div {
      flex-basis: 100%;
      text-align: center;
      font-size: 20px;
      font-weight: bold;
    }
  </style>
</head>

<body>
  <div class="main-container">
    <div class="logo-row">
      <div class="gttc-logo">
        <img src="<?php echo BASE_PATH; ?>/assets/img/GTTC-Lgo-for web.png" />
      </div>
      <div class="gok-logo-block">
        <img src="<?php echo BASE_PATH; ?>/assets/img/gok_logo.jpg" />
        <div>
          Government <br />Tool Room & Training Center
        </div>
        <div style="color: #00a0e3; padding-top: 1rem;">
          Post Diploma in Tool Design <br />Statement of Marks
        </div>
        <div style=" padding-top: 1rem; font-size: 30px; padding-bottom: 1rem;">
          First Semester Examination
        </div>
      </div>
    </div>
    <div class="field-border">
      <span>Name of the Centre: <u><?php echo $candidate->trainingCenter; ?></u></span>
    </div>
    <div class="field-border">
      <span>Student's Name: <u><?php echo $candidate->name; ?></u></span>
    </div>
    <div class="field-border">
      <span>Register No: <u><?php echo $candidate->registration_number; ?></u></span>
    </div>
    <div class="field-border" style="margin-bottom: 0px;">
      <span>Father's/Mother's Name: <u><?php echo $candidate->father_name; ?></u></span>
    </div>
    <div class="flex-row">
      <div class="field-border">
        <span>Examination held during:</span>
      </div>
      <div class="field-border">
        <span>Date of issue: <u><?php echo date('d/m/Y'); ?></u></span>
      </div>
    </div>
    <div class="marks-table">
      <table>
        <tr>
          <th rowspan="2">SI. No.</th>
          <th rowspan="2">Code</th>
          <th rowspan="2">Subjects</th>
          <th colspan="2">Maximum Marks</th>
          <th colspan="3">Marks Obtained</th>
          <th rowspan="2">Remarks</th>
        </tr>
        <tr>
          <th>Sessional</th>
          <th>Examination</th>
          <th>Sessional</th>
          <th>Examination</th>
          <th>Total</th>
        </tr>
        <?php $i = 1;
        $internal_total = 0;
        $external_total = 0;
        $internal_max_total = 0;
        $external_max_total = 0;
        foreach ($subjectList as $row) { ?>
          <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $row->code; ?></td>
            <td><?php echo $row->name; ?></td>
            <td><?php echo $row->internal_max; ?></td>
            <td><?php echo $row->external_max; ?></td>
            <td><?php echo $row->internal_marks; ?></td>
            <td><?php echo $row->external_marks; ?></td>
            <td><?php echo $row->total_marks; ?></td>
            <td><?php echo ($row->total_marks > ($row->internal_min + $row->external_min)) ? "Pass" : "Fail"; ?></td>
          </tr>
        <?php
          $internal_total += $row->internal_marks;
          $external_total += $row->external_marks;
          $internal_max_total += $row->internal_max;
          $external_max_total += $row->external_max;
        } ?>

        <tr>
          <td colspan="3" style="font-weight: bold">Total</td>
          <td style="font-weight: bold"><?php echo $internal_max_total; ?></td>
          <td style="font-weight: bold"><?php echo $external_max_total; ?></td>
          <td style="font-weight: bold"><?php echo $internal_total; ?></td>
          <td style="font-weight: bold"><?php echo $external_total; ?></td>
          <td style="font-weight: bold"><?php echo $external_total + $internal_total; ?></td>
          <td style="font-weight: bold"></td>
        </tr>
      </table>
    </div>
    <div class="field-border">
      <span style="color: #00a0e3;">Total Marks in Words:</span> <?php echo inwords($external_total + $internal_total); ?>
    </div>
    <div class="field-border">
      <span style="color: #00a0e3;">Result:</span>
    </div>
    <div class="note-block">
      <div style="font-size: 18px; font-weight: bold;">Note: </div>
      <ul>
        <li>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Hic quo eius sed natus voluptate sequi minus modi
          illum adipisci nihil mollitia, autem recusandae sit tempore libero tempora quam sunt veniam?</li>
        <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore obcaecati molestias tempora quisquam saepe
          culpa quidem, harum natus, officia ut labore nostrum corporis ipsum necessitatibus id, dolor enim consectetur
          explicabo.</li>
        <li>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Perspiciatis autem, exercitationem ex voluptate
          velit a ipsam tempore molestiae fugit, laborum maxime adipisci mollitia consequatur commodi sit porro aliquam
          accusantium perferendis.</li>
        <li>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Hic quo eius sed natus voluptate sequi minus modi
          illum adipisci nihil mollitia, autem recusandae sit tempore libero tempora quam sunt veniam?</li>
        <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore obcaecati molestias tempora quisquam saepe
          culpa quidem, harum natus, officia ut labore nostrum corporis ipsum necessitatibus id, dolor enim consectetur
          explicabo.</li>
        <li>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Perspiciatis autem, exercitationem ex voluptate
          velit a ipsam tempore molestiae fugit, laborum maxime adipisci mollitia consequatur commodi sit porro aliquam
          accusantium perferendis.</li>
      </ul>
    </div>
    <div class="flex-row">
      <div class="field-border">
        <span>Entered by: Administrator</span>
      </div>
      <div class="field-border">
        <span>Date: 06-11-2023</span>
      </div>
      <div class="field-border">
        <span>Verified by: GTTC, Bangalore</span>
      </div>
      <div class="field-border">
        <span>Date: 06-11-2023</span>
      </div>
    </div>
    <div class="sign-block">
      <div>
        Signature of Candidate
      </div>
      <div style="height: 180px">

      </div>
      <div>
        <div style="padding-bottom: 75px;">Principal</div>
        Chief Examiner
      </div>
    </div>
  </div>
</body>

</html>