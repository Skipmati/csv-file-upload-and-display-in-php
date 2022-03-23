<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <style> table, td{border: 1px solid black; border-collapse: collapse;} </style>
    <form action="" method="post" enctype="multipart/form-data">
      <input type="file" name="myfile">
      <input type="submit" name="submit">
    </form>
    <br>
    <?php
    if(isset($_FILES)){
      $name=$_FILES["myfile"]["name"];
      $type=$_FILES["myfile"]["type"];
      $error=$_FILES["myfile"]["error"];
      $tmp=$_FILES["myfile"]["tmp_name"];
    if($error>0){
        die("error");
      }
      else{
        if($type=="text/csv"){
            move_uploaded_file($tmp, $name);
            $dane = file($name);
            $array = array();
            foreach($dane as $row){$array[] = str_getcsv($row);}?>
            <table>
              <tbody>
                <?php foreach($array as $text): ?>
                  <tr>
                    <?php foreach($text as $data): ?>
                      <td><?=$data;?></td>
                    <?php endforeach; ?>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          <?php
          }
        }
      }
    ?>
  </body>
</html>
