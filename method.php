<?php
require_once "koneksi.php";
class Buku
{
    public function get_buku()
    {
        global $mysqli;
        $query="SELECT * FROM tbl_buku";
        $data=array();
        $result=$mysqli->query($query);
        while($row=mysqli_fetch_object($result))
        {
            $data[]=$row;
        }
        $response=array(
            'status' =>1,
            'message' => 'Get List Buku Successfully',
            'data' => $data
        );
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    public function get_bk($id=0)
    {
        global $mysqli;
        $query="SELECT * FROM tbl_buku";
        if($id != 0)
        {
            $query.=" WHERE id=".$id." LIMIT 1";
        }
        $data=array();
        $result=$mysqli->query($query);
        while($row=mysqli_fetch_object($result))
        {
            $data[]=$row;
        }
        $response=array(
            'status' =>1,
            'message' => 'Get  Buku Successfully',
            'data' => $data
        );
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function insert_buku()
    {
        global $mysqli;
        $arrcheckpost = array('code_buku' =>'', 'nama_buku' =>'', 'pengarang_buku' =>'', 'penerbit_buku' =>'', 'jenis_buku' =>'');
        $hitung = count(array_intersect_key($_POST,$arrcheckpost));
        if($hitung == count($arrcheckpost)){
            $result = mysqli_query($mysqli, "INSERT INTO tbl_buku SET
            code_buku = '$_POST[code_buku]',
            nama_buku = '$_POST[nama_buku]',
            pengarang_buku = '$_POST[pengarang_buku]',
            penerbit_buku = '$_POST[penerbit_buku]',
            jenis_buku = '$_POST[jenis_buku]'");
            if($result)
            {
                $response=array(
                    'status' => 1,
                    'message' => 'Buku Added Successfully.'
                );
            }
            else
            {
                $response=array(
                    'status' => 0,
                    'message' => 'Buku Addition Failed.'
                );
            }
        }else{
            $response=array(
                'status' => 0,
                'message' =>'parameter Do Not Match'
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    function update_buku($id)
    {
        global $mysqli;
        $arrcheckpost = array('code_buku' =>'', 'nama_buku' =>'', 'pengarang_buku' =>'', 'penerbit_buku' =>'', 'jenis_buku' =>'');
        $hitung = count(array_intersect_key($_POST,$arrcheckpost));
        if($hitung == count($arrcheckpost)){
            
            $result = mysqli_query($mysqli, "UPDATE tbl_buku SET
            code_buku = '$_POST[code_buku]',
            nama_buku = '$_POST[nama_buku]',
            pengarang_buku = '$_POST[pengarang_buku]',
            penerbit_buku = '$_POST[penerbit_buku]',
            jenis_buku = '$_POST[jenis_buku]'");
            if($result)
            {
                $response=array(
                    'status' => 1,
                    'message' => 'Buku updated Successfully.'
                );
            }
            else
            {
                $response=array(
                    'status' => 0,
                    'message' => 'Buku updation Failed.'
                );
            }
        }else{
            $response=array(
                'status' => 0,
                'message' =>'parameter Do Not Match'
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);  
    }

    function delete_buku($id)
    {
        global $mysqli;
        $query="DELETE FROM tbl_buku WHERE id=".$id;
        if(mysqli_query($mysqli, $query))
        {
            $response=array(
                'satatus' => 1,
                'message' => 'Buku Deleted Successfully.'
            );
        }
        else
        {
            $response=array(
                'status' => 0,
                'message' => 'Buku Deletion Failed.'
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}
?>