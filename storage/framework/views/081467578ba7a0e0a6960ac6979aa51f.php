

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1 class="mb-4">Relatório de Fretes</h1>

    <form action="<?php echo e(route('fretes.relatorio')); ?>" method="GET" class="mb-4">
        <div class="row g-3">
            <div class="col-md-3">
                <label for="tipo" class="form-label">Tipo de Frete</label>
                <select name="tipo" class="form-control">
                    <option value="">Todos</option>
                    <option value="normal" <?php echo e(request('tipo') == 'normal' ? 'selected' : ''); ?>>Normal</option>
                    <option value="expresso" <?php echo e(request('tipo') == 'expresso' ? 'selected' : ''); ?>>Expresso</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="cliente" class="form-label">Nome do Cliente</label>
                <input type="text" name="cliente" class="form-control" value="<?php echo e(request('cliente')); ?>">
            </div>
            <div class="col-md-3">
                <label for="valor_min" class="form-label">Valor Mínimo</label>
                <input type="number" step="0.01" name="valor_min" class="form-control" value="<?php echo e(request('valor_min')); ?>">
            </div>
            <div class="col-md-3">
                <label for="valor_max" class="form-label">Valor Máximo</label>
                <input type="number" step="0.01" name="valor_max" class="form-control" value="<?php echo e(request('valor_max')); ?>">
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Filtrar</button>
        <a href="<?php echo e(route('fretes.exportar_pdf', request()->all())); ?>" class="btn btn-danger mt-3">Exportar PDF</a>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Cliente</th>
                <th>Peso (kg)</th>
                <th>Distância (km)</th>
                <th>Tipo</th>
                <th>Valor (R$)</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $fretes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $frete): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($frete->cliente); ?></td>
                    <td><?php echo e($frete->peso); ?></td>
                    <td><?php echo e($frete->distancia); ?></td>
                    <td><?php echo e(ucfirst($frete->tipo)); ?></td>
                    <td>R$ <?php echo e(number_format($frete->valor, 2, ',', '.')); ?></td>
                    <td><?php echo e($frete->created_at->format('d/m/Y')); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="6">Nenhum frete encontrado.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\RUAN\Documents\projetos HTML\laravel projeto2\laravel projeto\frete-app\resources\views/frete/relatorio.blade.php ENDPATH**/ ?>