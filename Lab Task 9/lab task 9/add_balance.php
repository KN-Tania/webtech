<?php ob_start();
   session_start();

   if(!isset($_SESSION['valid'])){
    header('location:login.php'); 
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    
</head>
<body>
  <!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="username" id="usernamebalance" value="">
        <p>Add Balance Value</p>
        <input type="number" id="balance" name="balance">
        <div id="response"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="addbalanceid()" class="btn btn-primary">Add Balance</button>
      </div>
    </div>
  </div>
</div>
    <form>
        
        <table border="1"  width="100%">
            <?php 
             include 'header.php';
            ?>

        <tr rowspan class="web">
            <td class="vertical">
            <?php include 'nav.php';?>
            </td>   
            <td>
              <div style="width: 95%; margin-left: 20px;">
                <table id="user" class="display" width="100%">
                     
                      <thead>
                        <tr>
                              <th>Name</th>
                              <th >Email</th>
                              <th>Balance</th>
                              <th>Option</th>
                        </tr>
                      </thead>
                      
                </table>
                </div>

            </td>
        </tr>
        

        <?php include 'footer.php';?>
        

        </table>
    </form>
    
    <script type="text/javascript">
          $(document).ready(function() {
            $('#user').DataTable( {
                "ajax": "userlist.php",
                "columnDefs": [{
                "targets": -1,
                "render": function (data, type, row) {
                    var hre = '<input type="button" value="Add Balance" onClick="addbalance(\'' + data.User_Name + '\')" >';
                    return hre;
                }
            }],
                "columns": [
                    { "data": "Name" },
                    { "data": "Email" },
                    { "data": "Balance" },
                    { "data": null }]

            } );
        } );
        function addbalance(id){
            $('#usernamebalance').val(id);
          
            console.log(id);
            $('#exampleModalCenter').modal('show');
        }

        $('#exampleModalCenter').on('hidden.bs.modal', function () {
            // do something…
            location.reload();
        });
        function addbalanceid(){
          id = $('#usernamebalance').val();
          bal = $('#balance').val();

           $.ajax
          ({
              type: "POST",
              url: 'addbalanceapi.php',
              dataType: 'json',
              async: true,
              //json object to sent to the authentication url
              data: JSON.stringify({ "username": id, "balance" : bal }),
              success: function (data, textStatus, jQxhr) {
                var json = $.parseJSON(data);
                console.log(json.message);
               $('#response').html( json.message );
              }
          });

        }
    </script>
</body>
</html>
