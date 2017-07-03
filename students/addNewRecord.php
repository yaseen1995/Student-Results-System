<?php
include('connect.php');
include('ajax.php');

 ?>

 <head>



   <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

   <style type="text/css">

           body {
             background: #fafcfc;
         }

         #wrapper {

             width: 50%;
             height: auto;
             margin: 10px auto;
             border: 1px solid #cbcbcb;
             background: white;
                  }

          #input_form li {

             list-style-type: none;
             margin: 5px;
          }

          #input_form {

             width: 50%;
             margin: 100px auto;
             background: #fafcfc;
             padding: 20px;
          }

          #name {
            width: 51%;
          }

          .font-size {

            font-size: 30px;
            text-align: center;
            padding-top: 50px;
          }


   </style>


 </head>

 <body>


 <div id="wrapper">

                      <p class="font-size">Student Results Form </p>


   <div id="input_form">


                <li>Student Name: </li>
                <li><input type="text" id="name"> <input type="hidden" name="txtid"> </li>


                <li>Maths Score: </li>
                <li><input type="text" id="maths"></li>


                <li>Enlgish Score: </li>
                <li><input type="text" id="english"></li>


                <li>Science Score: </li>
                <li><input type="text" id="science"></li>

                <li><input class="btn btn-info"type="Submit" id="submit_post" value="Submit"></li>

 </div>


 </div>

 <div id="display_area">

 </div>




  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script>

      $(document).ready(function() {

        $("#submit_post").click(function(){
          var name   = $("#name").val();
          var maths  = $("#maths").val();
          var english = $("#english").val();
          var science = $("#science").val();

          $.ajax({
              url: "ajax.php",
              type: "POST",
              async: false,
              data: {
                  "done": 1,
                  "username" : name,
                  "eng" : english,
                  "math" : maths,
                  "sci" : science
              },
              success: function(data){
                displayFromDatabase();
                $("#name").val('');
                $("#maths").val('');
                $("#english").val('');
                $("#science").val('');
              }
          })

        });

      });

      function displayFromDatabase(){
        $.ajax({
          url: "ajax.php",
          type: "POST",
          async: false,
          data: {
            "display": 1
          },
          success: function(e){
            $("#display_area").html(e);
          }
        });

      }

  </script>

</body>
