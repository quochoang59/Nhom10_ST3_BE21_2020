<?php include "header.php" ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Product</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <?php
    if (isset($_GET['id'])) :
        $id = $_GET['id'];
        $getProductsById = $product->getProductById($id);
        foreach ($getProductsById as $values) :
    ?>
            <section class="content">
                <form action="edit.php?id=<?php echo $values['id'] ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">General</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputName">Name</label>
                                        <input type="text" id="inputName" class="form-control" required="required" name="name" value="<?php echo $values['name'] ?>" >
                                    </div>
                                    <div class="form-group">
                                        <label for="inputStatus">Manufacture</label>
                                        <select id="inputStatus" class="form-control custom-select" name="manu">
                                            <option selected disabled>Select one</option>
                                            <?php
                                            $getAllManu = $manufacture->getAllManu();
                                            foreach ($getAllManu as $value) :
                                            ?>
                                                <option value=<?php echo $value['manu_id'] ?> <?php if ($value['manu_id'] == $values['manu_id']) echo 'selected' ?>>
                                                    <?php echo $value['manu_name'] ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputStatus">Protype</label>
                                        <select id="inputStatus" class="form-control custom-select" name="type" value="<?php echo $value['type_name'] ?>">
                                            <option selected disabled>Select one</option>
                                            <?php
                                            $getAllProtype = $protype->getAllProtype();
                                            foreach ($getAllProtype as $value) :
                                            ?>
                                                <option value=<?php echo $value['type_id'] ?> <?php if ($value['type_id'] == $values['type_id']) echo 'selected' ?>>
                                                    <?php echo $value['type_name'] ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDescription">Description</label>
                                        <textarea id="inputDescription" name="desc" class="form-control" required="required" rows="4"><?php echo $values['description'] ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputClientCompany">Price</label>
                                        <input type="text" id="inputClientCompany" class="form-control" required="required" name="price" value="<?php echo $values['price'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputProjectLeader">Image</label>
                                        <input type="file" name="image" id="inputProjectLeader" class="form-control" name="img" value="<?php echo $values['image'] ?>" ?>
                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Feature</label>
                                        <input type="text" id="inputName" class="form-control" required="required" name="feature" value="<?php echo $values['feature'] ?>">
                                    </div>
                                    
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <input type="submit" name="submit" value="Edit Product" class="btn btn-success float-right">
                        </div>
                    </div>
                </form>
            </section>
    <?php endforeach;
    endif ?>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->