<html>

<head>
    <title>Hall Ticket</title>
    <style>
        .logo {
            float: left;
            padding: 10px;
        }

        .logo img {
            width: 50px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            padding: 10px;
            font-size: 15px;
        }

        li {
            font-size: 15px;

        }

        p {
            float: right;
        }
    </style>
</head>

<body>
    <table border="1">
        <tr>
            <th colspan="2">
                <div class="logo">
                    <img src="https://gttckarnataka.com/assets/img/perhebat_logo.png" width="100">
                </div>
                <div class="heading">
                    <h1>Government Tool Room & Training Centre</h1>
                    <h2>ADMISSION TICKET</h2>
                    <h2>WRITTEN TEST FOR THE POST OF LECTURER ON CONTRACT BASIS</h2>
                </div>
            </th>
        </tr>
        <tr>
            <th style="text-align: left;">Name of the Candidate</th>
            <td><?php echo $lecturer->name; ?></td>
        </tr>
        <tr>
            <th style="text-align: left;">Date of Birth</th>
            <td><?php echo $lecturer->dob; ?></td>
        </tr>
        <!-- <tr>
            <th style="text-align: left;">Gender</th>
            <td><?php echo $lecturer->gender; ?></td>
        </tr> -->
        <tr>
            <th style="text-align: left;">Qualification</th>
            <td>
                <?php
                $qual = "";
                if ($lecturer->msc_branch) {
                    $qual .= $lecturer->msc_branch . ",";
                }
                if ($lecturer->me_branch) {
                    $qual .= $lecturer->me_branch . ",";
                }
                if ($lecturer->be_branch) {
                    $qual .= $lecturer->be_branch . ",";
                }
                if ($lecturer->puc_branch) {
                    $qual .= $lecturer->puc_branch . ",";
                }
                echo rtrim($qual, ',');
                ?>
            </td>
        </tr>
        <tr>
            <th style="text-align: left;">Acknowledgment Number</th>
            <td><?php echo $lecturer->acknowledge_number; ?></td>
        </tr>
        <tr>
            <th style="text-align: left;">Venue</th>
            <td>Government Tool Room and Training Centre, COE Building, Rajajinagar Industrial Estate, Bangalore -560010
            </td>
        </tr>
        <tr>
            <th style="text-align: left;">Candidate</th>
            <td>
                <?php if ($lecturer->photo_file) { ?>
                    <img src="<?php echo BASE_PATH . '/assets/resources/' . $lecturer->photo_file; ?>" width="100">
                <?php } ?>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <table border="1" style="text-align: center;">
                    <tr>
                        <th>SL.No</th>
                        <th>Graduation</th>
                        <th>Date and Time of Technical Exam</th>
                        <th>Date and Time of Kannada and English Exam</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>B.E in Electronics & Communication -
                            B. E in Electrical and Electronics Engineering
                            B. E in Computer Science Engineering</td>
                        <td>21-01-2024
                            11:00 am to 12:30 pm</td>
                        <td>21-01-2024
                            12:30 pm to 02:00 pm</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>M. Tech in Electronics & Communication –
                            M. Sc - Mathematics and Science</td>
                        <td>21-01-2024
                            02:30 pm to 04:00 pm</td>
                        <td>21-01-2024
                            04:00 pm to 05:30 pm</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>B. E in Mechanical Engineering</td>
                        <td>22-01-2024
                            11:00 am to 12:30 pm</td>
                        <td>22-01-2024
                            12:30 pm to 02:00 pm</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>M. Tech in Mechanical /Tool Engineering</td>
                        <td>22-01-2024
                            02:30 pm to 04:00 pm</td>
                        <td>22-01-2024
                            04:00 pm to 05:30 pm</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <th style="padding-top: 30px;text-align: center;">Signature of the Invigilator</th>
            <th style="padding-top: 30px;text-align: center;">Signature of the Candidate</th>
        </tr>
    </table>
    <h3>Terms and Conditions:</h3>
    <ol>
        <li>Candidates should bring admission ticket to the written test for inspection by the invigilators or
            examiners.</li>
        <li>Candidates shall occupy their respective seats in the examination hall at least 15 minutes before the
            commencement of examination. <br>Those candidates coming late by more than 15 minutes after the commencement
            of the examination will not be allowed to the examination hall.</li>
        <li>Candidates are not allowed to leave the examination hall before completion of the examination hours.</li>
        <li>Calculators, Mobile/Cell phones and other electronic gadgets will not be allowed in the examination hall.
        </li>
        <li>Candidates shall preserve the Admission Tickets safely as they are supposed to produce the same at the time
            of Verification of documents. </li>
        <li>Candidates shall bring any one of the Identity card, such as, original Aadhaar Card/Voter ID etc, issued by
            Government.</li>
        <li>Helpline No-080-23507448</li>
    </ol>
    <p style="text-align: right;">
        <img src="<?php echo BASE_PATH . '/assets/img/sign.jpeg'; ?>" width="220">
        <br>
        Deputy General Manager - Administration
    </p>
</body>

</html>