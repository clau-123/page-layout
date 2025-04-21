<h1>Productos</h1>
<a href="/products/new" class="btn btn-primary">Crear Producto</a>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Stock</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo $product['id']; ?></td>
                <td><?php echo htmlspecialchars($product['name']); ?></td>
                <td><?php echo htmlspecialchars($product['description']); ?></td>
                <td><?php echo $product['stock']; ?></td>
                <td><?php echo $product['price']; ?></td>
                <td>
                    <a href="/products/edit/<?php echo $product['id']; ?>" class="btn btn-warning">Editar</a>
                    <a href="/products/delete/<?php echo $product['id']; ?>" class="btn btn-danger">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
