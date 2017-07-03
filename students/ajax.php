<?php

include ("connect.php");

if (isset($_POST['done'])) {

    $name = $_POST['username'];
    $english = $_POST['eng'];
    $maths = $_POST['math'];
    $science = $_POST['sci'];



          if($name == "" || $english == "" || $maths == ""|| $science == "") {}// Won't do anything i.e print unnecessary records to database when trying to post.


          else {

        $avg_mark_all_tests = (($maths + $english + $science) / 300) * 100; // working at new average

        // name = ... maths = ... emglish = ... (Are all database table field names) $name is the post data
        $sql = "INSERT INTO students_tb (name, maths, english, science, avg_mark_all_tests)
        VALUES ('$name','$maths','$english','$science','$avg_mark_all_tests')";

        mysqli_query($conn, $sql);

        // Class Average score
        $sql = "select avg(avg_mark_all_tests) AS total from students_tb;";

        $query = mysqli_query($conn, $sql);
        $values = mysqli_fetch_assoc($query);
        $num_rows = $values['total'];


        // Number of Students below average score
        $sql = "select count(student_id) AS total from students_tb where avg_mark_all_tests < 50";

        $result = mysqli_query($conn, $sql);
        $values = mysqli_fetch_assoc($result);
        $below_avg = $values['total'];


        // Average Mark for English
        $sql = "select avg(english) AS total from students_tb";

        $result = mysqli_query($conn, $sql);
        $values = mysqli_fetch_assoc($result);
        $eng = $values['total'];

        // Average Mark for Maths

        $sql = "select avg(maths) AS total from students_tb";

        $result = mysqli_query($conn, $sql);
        $values = mysqli_fetch_assoc($result);
        $math = $values['total'];

        // Average Mark for Science

        $sql = "select avg(science) AS total from students_tb";

        $result = mysqli_query($conn, $sql);
        $values = mysqli_fetch_assoc($result);
        $science = $values['total'];

        // Student with highest score

        $sql = "SELECT name AS name FROM students_tb WHERE avg_mark_all_tests = (SELECT MAX(avg_mark_all_tests) FROM students_tb)";

        $result = mysqli_query($conn, $sql);
        $values = mysqli_fetch_assoc($result);
        $max = $values['name'];


        // STudent with lowest score

        $sql = "SELECT name AS name FROM students_tb WHERE avg_mark_all_tests = (SELECT MIN(avg_mark_all_tests) FROM students_tb)";

        $result = mysqli_query($conn, $sql);
        $values = mysqli_fetch_assoc($result);
        $min = $values['name'];
        mysqli_query($conn, $sql);


        $result = "INSERT INTO total_tb (class_avg_score, no_below_avg, avg_english_mark, avg_maths_mark, avg_science_mark, high_avg_mark, low_avg_mark)
        VALUES ('$num_rows','$below_avg','$eng','$math','$science', '$max', '$min')";

        mysqli_query($conn, $result);


}


      }


      if (isset($_POST['display'])) {

        ?>

        <header>

          <style>

          .centre {

              margin-left: 330px;
              margin-top: 50px;
          }

          </style>


          <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> </header>



        <div class="col-sm-7 centre">

        <table class="table table-condensed" cellpadding="5" cellspacing="0" border="1">

        <tr>
            <th>Name          </th>
            <th>Maths         </th>
            <th>English       </th>
            <th>Science       </th>
            <th>Average Mark Across All Tests  </th>

        </tr>



        <?php

      $sql = "select * from students_tb";
      $query = mysqli_query($conn, $sql);



      while($row = mysqli_fetch_object($query))

                {
              ?>

                  <tr>
                  <td><?php echo $row->name; ?>                       </td>
                  <td><?php echo $row->maths; ?>                      </td>
                  <td><?php echo $row->english; ?>                    </td>
                  <td><?php echo $row->science; ?>                    </td>
                  <td><?php echo $row->avg_mark_all_tests; ?>%        </td>

                </tr>

                <?php
              }
                ?>

            </table>

               <br><br>

          </div>

        </div>

              <table class="table table-condensed" cellpadding="5" cellspacing="0" border="1">
                  <tr>
                      <th>Class Average Score                      </th>
                      <th>Number of Students Below Average         </th>
                      <th>Average English Mark                     </th>
                      <th>Average Maths Mark                       </th>
                      <th>Average Science Mark                     </th>
                      <th>Highest Student Average Mark             </th>
                      <th>Lowest  Student Average Mark             </th>



                  </tr>

            <?php



            $sql = "SELECT * FROM total_tb ORDER BY id DESC LIMIT 1";
            $query = mysqli_query($conn, $sql);





          while($row = mysqli_fetch_object($query))

                    {
                  ?>

                  <tr>
                 <th><?php echo $row->class_avg_score; ?>%     </th>
                 <th><?php echo $row->no_below_avg; ?>     </th>
                 <th><?php echo $row->avg_english_mark; ?>%          </th>
                 <th><?php echo $row->avg_maths_mark; ?>%         </th>
                 <th><?php echo $row->avg_science_mark; ?>%      </th>
                 <th><?php echo $row->high_avg_mark; ?>           </th>
                 <th><?php echo $row->low_avg_mark; ?>           </th>

               </tr>
                    <?php

                  }

                }


                    ?>

                </table>
