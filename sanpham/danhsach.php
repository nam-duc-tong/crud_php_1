<?php
    $sql = "SELECT * FROM products inner join brands on products.brand_id = brands.brand_id";
    $query = mysqli_query($connect,$sql);
?>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>Danh sach san pham</h2>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dask">
                    <tr>
                        <th>#</th>
                        <th>Ten san pham</th>
                        <th>Anh san pham</th>
                        <th>Gia san pham</th>
                        <th>So luong san pham</th>
                        <th>Mo ta</th>
                        <th>Thuong hieu</th>
                        <th>
                            Sua
                        </th>
                        <th>
                            Xoa
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                        while($row = mysqli_fetch_assoc($query))
                        {?>
                        <tr>
                            <td><?php echo $i++;?></td>
                            <td><?php echo $row['prd_name']?></td>
                            <td>
                                <img src="images/<?php echo $row['image']?>" style="width: 100px;height: auto;">
                                
                            </td>
                            <td><?php echo $row['price']?></td>
                            <td><?php echo $row['quantity']?></td>
                            <td><?php echo $row['description']?></td>
                            <td><?php echo $row['brand_name']?></td>
                            <td><a href="index.php?page_layout=sua&id=<?php echo $row['prd_id']?>">Sua</a></td>
                            <td><a onclick="return Del('<?php echo $row['prd_name'];?>')"href="index.php?page_layout=xoa&id=<?php echo $row['prd_id']?>">Xoa</a></td>
                        </tr>
                        <?php
                        }
                    ?>
                </tbody>
            </table>
            <a class="btn btn-primary" href="index.php?page_layout=them">Them Moi</a>
        </div>
    </div>
</div>

<script>
    function Del(name) {
        return confirm("Ban co chac chan muon xoa san pham: "+name+" khong ?");
    }
</script>