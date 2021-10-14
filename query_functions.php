<?php
  function find_all_complain_public()
  {
    global $db;
    $sql="SELECT cid,date_format(date,'%d-%b-%Y') as date,type,description,status,ST_Y(position) as lat,ST_X(position) as lng FROM complain ORDER BY cid DESC";
    $result=mysqli_query($db,$sql);
    return $result;
  }

  function find_all_complain_admin()
  {
    global $db;
    $sql="SELECT cid,name,phone,date_format(date,'%d-%b-%Y') as date,type,description,status,ST_Y(position) as lat,ST_X(position) as lng FROM complain ORDER BY cid DESC";
    $result=mysqli_query($db,$sql);
    return $result;
  }

  function find_complain_public_by_cid($id)
  {
    global $db;
    $sql="SELECT cid,date_format(date,'%d-%b-%Y') as date,type,description,status,ST_X(position) as lat,ST_Y(position) as lng FROM complain";
    $sql.=" WHERE cid=$id";
    $result=mysqli_query($db,$sql);
    $result = mysqli_fetch_assoc($result);
    return $result;
  }

  function find_complain_admin_by_cid($id)
  {
    global $db;
    $sql="SELECT cid,name,phone,date_format(date,'%d-%b-%Y') as date,type,description,status,ST_X(position) as lat,ST_Y(position) as lng FROM complain";
    $sql.=" WHERE cid=$id";
    $result=mysqli_query($db,$sql);
    $result = mysqli_fetch_assoc($result);
    return $result;
  }

  function insert_complain($complain){
    global $db;
    $sql = "INSERT INTO COMPLAIN(date,type,description,name,phone,position,status) VALUES (";
    $sql.= "'".$complain['date']."',";
    $sql.= "'".$complain['type']."',";
    $sql.= "'".db_escape($db,$complain['description'])."',";
    $sql.= "'".db_escape($db,$complain['name'])."',";
    $sql.= "'".$complain['phone']."',";
    $sql.="ST_GeomFromText('POINT(";
    $sql.=$complain['lat']." ".$complain['lng'].")'),";
    $sql.= "'0');";
    $result=mysqli_query($db,$sql);
    if(!$result){
      echo $sql;
      echo $db->error;
    }
		return $result;
  }
  function update_complain($cid,$status){
    global $db;
    $sql = "UPDATE complain set status=$status where cid=$cid";
    $result = mysqli_query($db,$sql);
    if(!$result){
      echo $sql;
      echo $db->error;
    }
    return $result;
  }

  function insert_notice($notice){
    global $db;
    $sql = "INSERT INTO notice(date,title,content,position) VALUES (";
    $sql.= "'".db_escape($db,$notice['date'])."',";
    $sql.= "'".db_escape($db,$notice['title'])."',";
    $sql.= "'".db_escape($db,$notice['content'])."',";
    $sql.="ST_GeomFromText('POINT(";
    $sql.=$notice['lat']." ".$notice['lng'].")'));";
    $result=mysqli_query($db,$sql);
    if(!$result){
      echo $sql;
      echo $db->error;
    }
		return $result;
  }

  function find_all_notice()
  {
    global $db;
    $sql="SELECT nid,title,content,date_format(date,'%d-%b-%Y') as date,ST_Y(position) as lat,ST_X(position) as lng FROM notice ORDER BY nid DESC";
    $result=mysqli_query($db,$sql);
    return $result;
  }

  function find_notice_by_nid($nid)
  {
    global $db;
    $sql="SELECT nid,title,content,date_format(date,'%d-%b-%Y') as date,ST_Y(position) as lat,ST_X(position) as lng FROM notice";
    $sql.=" WHERE nid=$nid";
    $result=mysqli_query($db,$sql);
    $result = mysqli_fetch_assoc($result);
    return $result;
  }

  function update_notice($notice){
    global $db;
    $sql = "UPDATE notice SET ";
    $sql.= "title ='".db_escape($db,$notice['title'])."',";
    $sql.= "content ='".db_escape($db,$notice['content'])."',";
    $sql.= "date ='".db_escape($db,$notice['date'])."',";
    $sql.="position=";
    $sql.="ST_GeomFromText('POINT(";
    $sql.=$notice['lat']." ".$notice['lng'].")')";
    $sql.=" WHERE nid=";
    $sql.=$notice['nid'].";";
    $result=mysqli_query($db,$sql);
    if(!$result){
      echo $sql;
      echo $db->error;
    }
    return $result;
  }

  function delete_notice($nid){
    global $db;
    $sql = "DELETE FROM notice WHERE nid = ".$nid.";";
    $result=mysqli_query($db,$sql);
    if(!$result){
      echo $sql;
      echo $db->error;
    }
    return $result;
  }

  function insert_staff($staff){
    global $db;
    $hash_pass = password_hash($staff['password'],PASSWORD_BCRYPT);
    $sql = "INSERT INTO staff(name,email,phone,pass) VALUES(";
    $sql.= "'".db_escape($db,$staff['name'])."',";
    $sql.= "'".db_escape($db,$staff['email'])."',";
    $sql.= "'".db_escape($db,$staff['phone'])."',";
    $sql.= "'".db_escape($db,$hash_pass)."'";
    $sql.= ");";
    $result=mysqli_query($db,$sql);
    if(!$result){
      echo $sql;
      echo $db->error;
    }
    return $result;
  }

  function find_all_staff(){
    global $db;
    $sql = "SELECT * FROM staff";
    $result=mysqli_query($db,$sql);
    if(!$result){
      echo $sql;
      echo $db->error;
    }
    return $result;
  }

  function find_staff_by_sid($sid){
    global $db;
    $sql = "SELECT * FROM staff";
    $sql.= " WHERE sid=".$sid;
    $result=mysqli_query($db,$sql);
    $result = mysqli_fetch_assoc($result);
    if(!$result){
      echo $sql;
      echo $db->error;
    }
    return $result;
  }

  function update_staff($staff){
    global $db;
    $sql = "UPDATE staff SET ";
    $sql.= "name ='".$staff['name']."',";
    $sql.= "email ='".$staff['email']."',";
    $sql.= "phone ='".$staff['phone']."'";
    $sql.=" WHERE sid=";
    $sql.=$staff['sid'].";";
    $result=mysqli_query($db,$sql);
    if(!$result){
      echo $sql;
      echo $db->error;
    }
    return $result;
  }

  function update_staff_password($staff){
    global $db;
    $hash_pass = password_hash($staff['password'],PASSWORD_BCRYPT);
    $sql = "UPDATE staff SET pass='".db_escape($db,$hash_pass)."'";
    $sql.= " WHERE sid=".$staff['sid'];
    $result=mysqli_query($db,$sql);
    if(!$result){
      echo $sql;
      echo $db->error;
    }
    return $result;
  }

  function delete_staff($sid){
    global $db;
    $sql = "DELETE FROM staff WHERE sid = ".$sid.";";
    $result=mysqli_query($db,$sql);
    if(!$result){
      echo $sql;
      echo $db->error;
    }
    return $result;

  }

  function insert_admin($admin){
    global $db;
    $hash_pass = password_hash($admin['password'],PASSWORD_BCRYPT);
    $sql = "INSERT INTO admin(name,email,phone,pass) VALUES(";
      $sql.= "'".db_escape($db,$admin['name'])."',";
      $sql.= "'".db_escape($db,$admin['email'])."',";
      $sql.= "'".db_escape($db,$admin['phone'])."',";
      $sql.= "'".db_escape($db,$hash_pass)."'";
      $sql.= ");";
      $result=mysqli_query($db,$sql);
      if(!$result){
        echo $sql;
        echo $db->error;
      }
      return $result;
    }

    function find_admin_by_aid($aid){
      global $db;
      $sql = "SELECT * FROM admin";
      $sql.= " WHERE aid='".db_escape($db,$aid)."';";
      $result=mysqli_query($db,$sql);
      $result = mysqli_fetch_assoc($result);
      if(!$result){
        // echo $sql;
        // echo $db->error;
      }
      return $result;
    }
    function update_admin($admin){
      global $db;
      $sql = "UPDATE admin SET ";
      $sql.= "name ='".$admin['name']."',";
      $sql.= "email ='".$admin['email']."',";
      $sql.= "phone ='".$admin['phone']."'";
      $sql.=" WHERE aid=";
      $sql.=$admin['aid'].";";
      $result=mysqli_query($db,$sql);
      if(!$result){
        echo $sql;
        echo $db->error;
      }
      return $result;
    }

    function update_admin_password($admin){
      global $db;
      $hash_pass = password_hash($admin['password'],PASSWORD_BCRYPT);
      $sql = "UPDATE admin SET pass='".db_escape($db,$hash_pass)."'";
      $sql.= "  WHERE aid=".$admin['aid'];
      $result=mysqli_query($db,$sql);
      if(!$result){
        echo $sql;
        echo $db->error;
      }
      return $result;
    }
 ?>
