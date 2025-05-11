<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Relatório de Fretes</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 14px; }
        h1 { text-align: center; }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #444;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        thead {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Relatório de Fretes</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Tipo</th>
                <th>Valor</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $fretes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $frete): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($frete->id); ?></td>
                    <td><?php echo e($frete->cliente); ?></td>
                    <td><?php echo e($frete->tipo); ?></td>
                    <td>R$ <?php echo e(number_format($frete->valor, 2, ',', '.')); ?></td>
                    <td><?php echo e(\Carbon\Carbon::parse($frete->created_at)->format('d/m/Y')); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</body>
</html>
<?php /**PATH C:\Users\RUAN\Documents\projetos HTML\laravel projeto2\laravel projeto\frete-app\resources\views/frete/pdf.blade.php ENDPATH**/ ?>