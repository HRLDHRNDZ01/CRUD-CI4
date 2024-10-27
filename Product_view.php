<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Product Management</h1>

        <!-- Flash Message for Success -->
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>

        <!-- Add New Product Form -->
        <form action="<?= route_to('product.save') ?>" method="post">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label for="product_name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="product_name" name="product_name" required>
            </div>
            <div class="mb-3">
                <label for="product_prize" class="form-label">Product Price</label>
                <input type="number" class="form-control" id="product_prize" name="product_prize" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>

        <hr>

        <!-- Product Table -->
        <h2>Existing Products</h2>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= esc($product['product_id']) ?></td>
                    <td><?= esc($product['product_name']) ?></td>
                    <td><?= esc($product['product_prize']) ?></td>
                    <td>
                        <a href="<?= route_to('product.edit', $product['product_id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                        <form action="<?= route_to('product.delete', $product['product_id']) ?>" method="post" style="display:inline;">
                            <?= csrf_field() ?>
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
