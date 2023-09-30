                <!-- Begin Page Content -->
                <div class="container-fluid">

                    

                    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <div class="card">   
                    <div class="card-header">
                        <h3>Product List</h3>
                    </div>  
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">        
                                    <form action="/save" method="post">
                                        <input type="hidden" name="id" value="<?php if (isset($pro['id'])) {echo $pro['id'];}?>">
                                <div class="form-group mb-3">
                                    <label>Product Name</label>
                                    <input type="text" name="name" class="form-control" value="<?php if (isset($pro['name'])) {echo $pro['name'];}?>">
                                </div>
                            </div>        
                                <div class="col-md-6">  
                                    <div class="form-group mb-3">   
                                        <label>Product Description</label>
                                        <input type="text" name="description" class="form-control" value="<?php if (isset($pro['description'])) {echo $pro['description'];}?>">
                                    </div>
                                </div>
                                <div class="col-md-6">  
                                    <div class="form-group mb-3">   
                                        <label for="category">Product Category</label>
                                        <select name="category" id="category" class="form-control">
                                        <option value="">Select a category</option>
                                            <?php $uniqueCategories = array(); 
                                                foreach ($category as $pr) {$category = $pr['category'];
                                                if (!in_array($category, $uniqueCategories)) {$uniqueCategories[] = $category; 
                                                echo '<option value="' . $category . '">' . $category . '</option>';}}?> 
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">  
                                    <div class="form-group mb-3"> 
                                        <label>Product Price</label>
                                        <input type="number" name="price" class="form-control" value="<?php if (isset($pro['price'])) {echo $pro['price'];}?>">
                                    </div>
                                </div>    
                                <div class="col-md-6">  
                                    <div class="form-group mb-3"> 
                                        <label>Product Quantity</label>
                                        <input type="number" name="quantity" class="form-control" value="<?php if (isset($pro['quantity'])) {echo $pro['quantity'];}?>">
                                    </div>
                                </div>
                                <div class="col-md-6">  
                                    <div class="form-group mb-3"> 
                                        <label>Image Link</label>
                                        <input type="text" name="image" class="form-control" value="<?php if (isset($pro['image'])) {echo $pro['image'];}?>">
                                    </div>
                                </div>
                                <div class="col-md-12">  
                                    <div class="form-group mb-3">         
                                       <center><button type="submit" class="btn btn-info" value="insert">Insert to Products</button></center>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>     
            </div>
        </div>

        <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h3>Product Data</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($product as $row):?>   
                                    <tr>
                                        <td><?= $row['id'] ?></td>
                                        <td><?= $row['name'] ?></td>
                                        <td><?= $row['description'] ?></td>
                                        <td><?= $row['category'] ?></td>
                                        <td><?= $row['price'] ?></td>
                                        <td><?= $row['quantity'] ?></td>
                                        <td><?= $row['image'] ?></td>
                                        <td>
                                        <a href="/edit/<?= $row['id'] ?>" class='btn btn-primary'>Edit</a>
                                        <a href="/delete/<?= $row['id'] ?>" class='btn btn-danger'>Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>  
                    </div>  
                </div>
            </div>
        </div>
    </div>