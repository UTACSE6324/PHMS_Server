<html>
<body>
<?php
   $summary = $_GET['summary'];
   $description = $_GET['description'];

   $list1  = explode(".",$summary);
   $list11 = explode(",",$list1[0]);
   $id1 = strstr($list11[0],'=');
   $id1 = preg_replace('/[=]/','',$id1);
   $name1 = strstr($list11[1],'=');
   $name1 = preg_replace('/[=]/','',$name1);

   $list12 = explode(",",$list1[1]);
   $id2 = strstr($list12[0],'=');
   $id2 = preg_replace('/[=]/','',$id2);
   $name2 = strstr($list12[1],'=');
   $name2 = preg_replace('/[=]/','',$name2);

   $section = "";
   $section .= "<table rules='all' width= '100%' style='margin:20px; padding: 10px; border-color: #666;' cellpadding='10'>";
   $section .= "<tr style='background: #eee;'>
                <td colspan='2'> Drug1 </td>
                </tr>";
   $section .= "<tr>
                <td><strong>Id:</strong> </td>
                <td>".$id1."</td>
                </tr>";
   $section .= "<tr>
                <td><strong>Name:</strong> </td>
                <td>".$name1."</td>
                </tr>";
   $section .= "<tr style='background: #eee;'>
                <td colspan='2'> Drug2 </td>
                </tr>";
   $section .= "<tr>
                <td><strong>Id:</strong> </td>
                <td>".$id2."</td>
                </tr>";
   $section .= "<tr>
                <td><strong>Name:</strong> </td>
                <td>".$name2."</td>
                </tr>";

   $section .= "<tr style='background: #eee;'>
                <td colspan='2'>".$description."</td>
                </tr>";
   $section .= "</table>";
   
   echo $section;
?>
</body>
</html>
