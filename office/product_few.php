<?php
include "header.php";
include "../connect_DB.php";
if($_REQUEST['chk'] == "delete")
{
    $sql = " select * from tbl_product";
    $sql.= " where product_id = '$_REQUEST[product_id]'";
    $qdel = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($qdel);
    if ($num == 1)
    {
        $sql = " delete from tbl_product";
        $sql.= " where product_id = '$_REQUEST[product_id]'";
        mysqli_query($conn,$sql);
        echo"<script>window.location='product.php'</script>";
    }else{
        echo"<script>alert('ไม่พบข้อมูล')</script>";
    }
}
$conn
?>
            <div id="layoutSidenav_content">
                <main>
                        <div class="card mb-4">
                            <div class="card-header">
                            <center>
                                <h3>
                                <i class="fas fa-shopping-basket"></i>
                                รายการสินค้าใกล้หมด
                                </h3>
                                </center>
                            </div>
                            <div class="card-body">
                            <div  class="table-responsive">
                            <table id="example1" class="table table-bordered table table-hover" role="grid" aria-describedby="example1_info">
                                    <thead>
                                    <tr>
                                                <th class="cell">ลำดับที่</th>
                                                <th class="cell">รูปภาพ</th>
												<th class="cell">รายการสินค้า</th>
                                                <th class="cell">ประเภท</th>
												<th class="cell">ไซส์</th>
												<th class="cell">ราคา</th>
												<th class="cell">จำนวนสินค้า</th>
												<th class="cell">เครื่องมือ</th>
                                    </tr>
                                    </thead>
                                
                                    <?php
//แสดงข้อมูล
$sql = "select * from tbl_product";
$sql.= " inner join tbl_site on (tbl_product.site_id = tbl_site.site_id)";
$sql.= " inner join tbl_type on (tbl_product.type_id = tbl_type.type_id)";
$sql.= " WHERE tbl_product.qty_name <= 5";
$quser = mysqli_query($conn,$sql);  
?>
<?php
$no=1;
  while($rs = mysqli_fetch_array($quser))	
  {

?>
									
											<tr>
                                                <td class="cell"><?php echo $no; ?></td>
                                                <td class="cell"><img src="../p_img/<?php echo $rs['p_img'];?>" class="fluke"></td>
												<td class="cell"><?php echo $rs['product_name']; ?></td>
                                                <td class="cell"><?php echo $rs['type_name']; ?></td>
												<td class="cell"><?php echo $rs['site_name']; ?></td>
												<td class="cell"><?php echo $rs['price_name']; ?> บาท</td>
												<td class="cell"><?php echo $rs['qty_name']; ?></td>
												
												<td><a  class="btn btn-warning  btn-sm edit btn-flat" href="product_form_edit.php?product_id=<?php echo $rs['product_id']; ?>"><i class='far fa-edit'></i>แก้ไข</a>
													<a href="?chk=delete&product_id=<?php echo $rs['product_id']; ?> 
         "onclick = "return confirm('ลบใช่หรือไม่')"<button type="button" class="btn btn-danger btn-sm delete btn-flat"><i class='fa fa-trash'></i> ลบ</button></a> </td>
											</tr>
										
											<?php 
                                        $no++;
                                        } ?>
										
                                        <a href="product_form_add.php"  class="btn btn-success btn-sm btn-flat" ><i class="fa fa-plus"></i> เพิ่มข้อมูล</a> <br>
            </div>
                                    </div>
  </br>
        </div>
       
        <?php include('footer.php'); ?>
        <script>
$(function () {
$(".datatable").DataTable();
$('#example2').DataTable({
"paging": true,
"lengthChange": false,
"searching": false,
http://fordev22.com/
"ordering": true,
"info": true,
"autoWidth": false,
});
});
</script>
    </body>
</html>
